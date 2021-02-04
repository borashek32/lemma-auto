@if(auth()->user())
    <div class="col-xl-3 offset-xl-9 col-lg-3 offset-lg-9 col-md-4 offset-md-8 col-sm-4 offset-sm-8 col-4 offset-8">
        <button  wire:click="like" type="submit" class="btn btn-danger">
            Like
        </button>
    </div>
@else
    <div style="text-align: right;">
        <p style="font-weight:600;font-size:14px;">
            Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставлять отметки нравится
        </p>
    </div>
@endif

