<div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
        <livewire:sects />
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <h5 class="mb-2">Поиск автозапчастей</h5>
        <form method="get" action="{{ route('auto-parts') }}" class="input-group mb-4">
            <input type="text" class="form-control shadow p-3 bg-body rounded"
                   style="margin-bottom:0px;margin-right: 10px" placeholder="Введите каталожный номер или название"
                   aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-secondary" style="height: 40px">Поиск</button>
        </form>

            @if(!empty($search))
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Номер</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Заказать</th>
                </tr>
                </thead>
                @forelse($autoparts as $autopart)
                    <tbody>
                    <tr>
                        <form>
                            <td>{{ $autopart->number }}</td>
                            <td>{{ $autopart->title }}</td>
                            <td></td>
                            <td>
                                <input type="text" class="form-control p-3 bg-body rounded"
                                       style="margin-bottom:0px;margin-right:10px" width="10px" placeholder="Кол-во"
                                       aria-label="qnt" id="qnt" name="qnt" aria-describedby="basic-addon1">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-secondary" style="height: 35px;padding-bottom: 3px">
                                    <p>В корзину</p>
                                </button>
                            </td>
                        </form>
                    </tr>
                    </tbody>
                @empty
                    <p class="text-center">
                        Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                    </p>
                @endforelse
            </table>
            @else
            Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
            @endif

        <div style="display: flex;justify-content: center">
            {{ $autoparts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
        <livewire:advertisements />
    </div>
    </div>
</div>
