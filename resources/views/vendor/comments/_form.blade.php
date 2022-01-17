<div class="card">
    <div class="card-body">
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />
            @if(auth()->user())
                <input type="hidden" name="profile_photo_path" value="{{ auth()->user()->profile_photo_path  }}" />
            @endif

            {{-- Guest commenting --}}
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
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="form-group">
                            <p style="font-weight:600;font-size:14px" class="font-name">{{ auth()->user()->name }}</p>
                            @if(Auth::user()->profile_photo_path)
                                <img src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="rounded float-start profile-photo" width="100px">
                            @endif
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded float-start profile-photo" width="100px">
                            @endif
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
                <div style="text-align: right">
                    <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.submit')</button>
                </div>
            @endif
        </form>
    </div>
</div>
<style>
    @media (max-width: 500px) {
        .profile-photo {
            width: 70px;
        }
    }
    @media (max-width: 400px) {
        .profile-photo {
            width: 50px;
        }

        .font-name {
            font-size: 10px;
        }
    }
</style>
<br />
