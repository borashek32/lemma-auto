<div style="">
    <div class="border-bottom border-success">
        <a href="{{ route('auto-parts') }}">
            <p class="font-weight-bold" style="margin-top:8px; color: black">
                Магазин автозавпчастей
            </p>
        </a>
        <ul>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('auto-parts') }}" style="color:black">Поиск по каталожному номеру</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('laws') }}" style="color:black">Гарантии</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('delivery') }}" style="color:black">Доставка</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('payment') }}" style="color:black">Оплата</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('requisites') }}" style="color:black">Реквизиты</a>
                </p>
            </li>
        </ul>
    </div>
    <div class="border-bottom border-success">
        <a href="{{ route('about-us') }}">
            <p class="font-weight-bold" style="margin-top:8px; color: black">
                О нас
            </p>
        </a>    
        <ul>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('reviews') }}" style="color:black">Отзывы</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('contact') }}" style="color:black">Контакты</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('about-us') }}" style="color:black">Команда</a>
                </p>
            </li>
            <li>
                <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                    <a href="{{ route('faq') }}" style="color:black">Ответы на частые вопросы FAQ</a>
                </p>
            </li>
        </ul>
    </div>
    <div class="border-bottom border-success">
        <a href="{{ route('blog') }}">
            <p class="font-weight-bold" style="margin-top:8px; color: black">
                Блог
            </p>
        </a>
        <ul>
            @foreach ($cats as $cat)
                <li>
                    <p class="font-weight" style="font-size:14px;margin-top:-10px;margin-left:15px">
                        <a href="{{ route('category', $cat->slug) }}" style="color:black">{{ $cat->name }}</a>
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
   
    <div class="">
        @include('includes.shop.subscription')
    </div>
</div>