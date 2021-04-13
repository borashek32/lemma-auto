<form method="get" action="{{ route('blog') }}" class="input-group mb-3">
    <input type="text" class="form-control shadow p-3 bg-body rounded" style="margin-bottom:0px;margin-right: 10px" placeholder="Введите ключевые слова"
           aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">

    <button type="submit" class="btn btn-secondary" style="height: 40px">
        Поиск
    </button>

    <a href="{{ route('blog') }}">
        <button type="submit" class="btn btn-success" style="height: 40px;margin-left: 10px;">
            Сброс
        </button>
    </a>
</form>

