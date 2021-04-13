<form method="POST" action="{{ route('comment', $post->id) }}">
    {{ csrf_field() }}
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    @if(auth()->user())
        <p style="font-weight:600;font-size:14px">{{ auth()->user()->name }}</p>
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3">
                <img src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="rounded float-start" width="100px">
                <p style="font-size:10px">Дата<br>регистрации:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9">
                        <textarea name="body" rows="4" id="body" class="form-control"
                                  placeholder="Введите ваш комментарий" required minlength="5"></textarea>
                <input type="submit" value="Добавить комментарий" class="btn btn-md btn-success"
                       style="width:200px;height:40px;margin-top:10px;">
            </div>
        </div>
    @else
        <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить комментарий</p>
        <div class="row">
            <div class="col-12">
                        <textarea name="body" rows="4" id="body" class="form-control"
                                  placeholder="Введите ваш комментарий" required minlength="5"></textarea>
                <input type="submit" value="Добавить комментарий" class="btn btn-md btn-success"
                       style="width:200px;height:40px;margin-top:10px;">
            </div>
        </div>
    @endif
</form>
