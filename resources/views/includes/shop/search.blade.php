<div id="bigSearch">
    <div class="row">
        <div class="col-xl-10 cpl-lg-10 col-md-10 col-sm-10 col-10">
            <form method="get" action="{{ route('search') }}" class="input-group mb-4">
                <input type="text" class="form-control shadow p-3 bg-body rounded"
                    style="margin-bottom:0px;margin-right: 10px" placeholder="Введите каталожный номер или название"
                    aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">
                <button type="submit" class="btn btn-secondary" style="height: 40px">
                    Поиск
                </button>
            </form>
        </div>
        <div class="col-xl-2 cpl-lg-2 col-md-2 col-sm-2 col-2">
            <a href="{{ route('auto-parts') }}">
                <button class="btn btn-success" style="margin-left: -20px;height: 40px;margin-right: 10px">
                    Сброс
                </button>
            </a>
        </div>
    </div>
</div>


<div id="smallSearch">
    <form method="get" action="{{ route('search') }}" class="input-group mb-4">
        <div class="col-xl-12 cpl-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:10px">
            <input type="text" class="form-control shadow p-3 bg-body rounded"
                   style="margin-bottom:0px;margin-right: 10px" placeholder="Введите каталожный номер или название"
                   aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">
        </div>
        
        <div class="col-xl-12 cpl-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:10px">
            <button type="submit" class="btn btn-secondary" style="height: 40px">
                Поиск
            </button>
        </div>
        
        <div class="col-xl-12 cpl-lg-12 col-md-12 col-sm-12 col-12">
            <a href="{{ route('auto-parts') }}">
                <button class="btn btn-success" style="height: 40px;margin-right: 10px">
                    Сброс
                </button>
            </a>
        </div>
    </form>
</div>

<style>
    
    #bigSearch {
    display: block;
}

#smallSearch {
    display: none;
}

@media (max-width: 769px) {
    .header-advs {
        display: none;
    }
}

@media (max-width: 515px) {
    #bigSearch {
        display: none;
    }
    #smallSearch {
        display: block;
    }
}
    
</style>
