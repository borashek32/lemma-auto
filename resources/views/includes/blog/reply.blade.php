<form method="POST" action="{{ route('reply', $comment->id) }}">
    {{ csrf_field() }}

    <input type="hidden" name="comment_id" value="{{ $comment->id }}">

    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <input type="hidden" name="comment_author_email" value="{{ $comment->user->email }}">

    @if(auth()->user())
        <p style="font-weight:700;margin-left:80px;font-size:14px;">{{ Auth::user()->name }}</p>

        <div class="row" style="margin-left:60px;">
            <div class="col-2">
                <img src="/storage/{{ auth()->user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"
                     class="rounded float-start" width="60px">

                <p style="font-size:8px">Дата<br>регистрации:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
            </div>

            <div class="col-10">
                <textarea name="body" rows="2" id="body" class="form-control" style="width:100%;margin-left:-30px;"
                      placeholder="Ответьте на комментарий" required minlength="5"></textarea>

                <input type="submit" value="Ответить" class="btn btn-md btn-success"
                      style="width:100px;height:35px;margin-bottom:10px;margin-left:-30px;margin-top:5px;">
            </div>
        </div>
    @else
        <p style="font-weight:700;font-size:14px;">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы ответить на комментарий</p>
        <div class="row" style="margin-left:60px;">
            <div class="col-2">

            </div>

            <div class="col-10">
                <textarea name="body" rows="2" id="body" class="form-control" style="width:100%;margin-left:-30px;"
                      placeholder="Ответьте на комментарий" required minlength="5"></textarea>

                <input type="submit" value="Ответить" class="btn btn-md btn-success"
                       style="width:100px;height:35px;margin-bottom:10px;margin-left:-30px;margin-top:5px;">
            </div>
        </div>
    @endif
</form>
