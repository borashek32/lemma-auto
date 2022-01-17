<div style="margin-top: 20px">
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="#" style="color:black">Каталог (в разработке)</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="/" style="color:black">Поиск по каталожному номеру</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('reviews') }}" style="color:black">Отзывы</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('delivery') }}" style="color:black">Доставка</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('requisites') }}" style="color:black">Реквизиты</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('payment') }}" style="color:black">Оплата</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('partners') }}" style="color:black">Наши партнеры</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('contact') }}" style="color:black">Контакты</a>
        </h6>
    </div>
    <div class="border-bottom border-success">
        <h6 class="font-weight-bold" style="margin-top:8px">
            <a href="{{ route('blog') }}" style="color:black">Блог</a>
        </h6>
    </div>
    <div class="">
        @include('includes.shop.subscription')
    </div>
</div>