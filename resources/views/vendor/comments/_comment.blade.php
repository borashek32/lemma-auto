@inject('markdown', 'Parsedown')
@php
    // TODO: There should be a better place for this.
    $markdown->setSafeMode(true);
@endphp


<div id="comment-{{ $comment->getKey() }}" class="media">
    <img class="mr-3" src="/storage/{{ $comment->profile_photo_path }}" width="80px"
         alt="{{ $comment->commenter->name ?? $comment->guest_name}}">
    <div class="media-body">
        <h5 class="mt-0 mb-1">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>

        <div>
            @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}" class="btn btn-sm btn-link text-uppercase">@lang('comments::comments.reply')</button>
            @endcan
            @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}" class="btn btn-sm btn-link text-uppercase">@lang('comments::comments.edit')</button>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase">@lang('comments::comments.delete')</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">@lang('comments::comments.edit_comment')</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">@lang('comments::comments.update_your_message_here')</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                    <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">@lang('comments::comments.cancel')</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.update')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
                            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />
                            @if(auth()->user())
                                <input type="hidden" name="profile_photo_path" value="{{ auth()->user()->profile_photo_path  }}" />
                            @endif

                            <div class="modal-header">
                                <h5 class="modal-title">@lang('comments::comments.reply_to_comment')</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    @if(isset($guest_commenting) and $guest_commenting == true)
                                        <div class="form-group">
                                            <label for="message">@lang('comments::comments.enter_your_name_here')</label>
                                            <input type="text" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                                            @error('guest_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="message">@lang('comments::comments.enter_your_email_here')</label>
                                            <input type="email" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                                            @error('guest_email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="message">@lang('comments::comments.enter_your_message_here')</label>
                                            <textarea class="form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                                            <div class="invalid-feedback">
                                                @lang('comments::comments.your_message_is_required')
                                            </div>
                                            <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.submit')</button>
                                    @else
                                        <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
                                        <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />
                                        @if(auth()->user())
                                            <input type="hidden" name="profile_photo_path" value="{{ auth()->user()->profile_photo_path  }}" />
                                        @endif
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <div class="form-group">
                                                    <p style="font-weight:600;font-size:14px">{{ auth()->user()->name }}</p>
                                                    <img src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="rounded float-start" width="80px">
                                                    <p style="font-size:10px">Дата регистрации:<br>{{ \Jenssegers\Date\Date::parse(auth()->user()->created_at)->format('Y-m-d') }}</p>
                                                </div>
                                            </div>

                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                                <p>Сегодня: {{ \Jenssegers\Date\Date::now()->format('l j F Y') }}</p>
                                                <div class="form-group">
                                                    <label for="message">@lang('comments::comments.enter_your_message_here')</label>
                                                    <textarea class="form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                                                    <div class="invalid-feedback">
                                                        @lang('comments::comments.your_message_is_required')
                                                    </div>
                                                    <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">@lang('comments::comments.cancel')</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.reply')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        <?php
            if (!isset($indentationLevel)) {
                $indentationLevel = 1;
            } else {
                $indentationLevel++;
            }
        ?>

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()) && $indentationLevel <= $maxIndentationLevel)
            {{-- TODO: Don't repeat code. Extract to a new file and include it. --}}
            @foreach($grouped_comments[$comment->getKey()] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
</div>

{{-- Recursion for children --}}
@if($grouped_comments->has($comment->getKey()) && $indentationLevel > $maxIndentationLevel)
    {{-- TODO: Don't repeat code. Extract to a new file and include it. --}}
    @foreach($grouped_comments[$comment->getKey()] as $child)
        @include('comments::_comment', [
            'comment' => $child,
            'grouped_comments' => $grouped_comments
        ])
    @endforeach
@endif
