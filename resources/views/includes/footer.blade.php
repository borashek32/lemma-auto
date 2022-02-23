<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-md-3 col-6 col-sm-6">
                <div class="row">
                    <div>
                        <img src="/img/digitalCoffeeSm.jpg" width="40px" alt="Digital coffee design">
                    </div>

                    <div>
                        <p class="d-block mb-3">
                            <a href="http://digitalcoffeedesign.com" style="color:grey;font-size:12px">
                                &copy; Digital coffee design<br>
                                <?= date('Y') ?>
                            </a>
                        </p>
                    </div>
                </div>
                <div style="margin-bottom:10px">
                    <a href="tel:+79169174630" style="margin-top: -10px;color:white">
                        +7 (916) 917-46-30
                    </a>
                    <a href="mailto:lemmaauto@gmail.com" style="color: black;">
                        lemmaauto@gmail.com
                    </a>
                </div>

            @include('includes.contact_button')
            <!--<a href="https://webmaster.yandex.ru/siteinfo/?site=https://lemma-auto.ru"><img width="88" height="31" alt="" border="0" src="https://yandex.ru/cycounter?https://lemma-auto.ru&theme=light&lang=ru"/></a>-->
            </div>

            <div class="col-lg-2 col-xl-2 col-md-3 col-6 col-sm-6">
                <h6>Автозапчасти</h6>

                <ul class="list-unstyled text">
                    <li><a class="text-muted" href="{{ route('auto-parts') }}">Магазин</a></li>

                    <li><a class="text-muted" href="#">Каталог расходных материалов</a></li>

                    <li><a class="text-muted" href="{{ route('partners') }}">Наши партнеры</a></li>

                    <li><a class="text-muted" href="{{ route('reviews') }}">Отзывы</a></li>

                    <li><a class="text-muted" href="#">Доставка</a></li>

                    <li><a class="text-muted" href="#">Оплата</a></li>

                    <li><a class="text-muted" href="{{ route('law') }}">Возврат</a></li>

                    <li><a class="text-muted" href="{{ route('law') }}">Гарантия</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-xl-2 col-md-2 col-6 col-sm-6">
                <h6>Наши партнеры</h6>

                <ul class="list-unstyled text">
                    <li><a class="text-muted" href="http://motul-ishop.ru/">Motul</a></li>

                    <li><a class="text-muted" href="https://favorit-parts.ru/">Favorit-parts</a></li>

                    <li><a class="text-muted" href="https://shop.autoeuro.ru/">Autoeuro</a></li>

                    <li><a class="text-muted" href="https://vianor.ru">Vianor</a></li>

                    <li><a class="text-muted" href="https://emex.ru/">Emex</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-xl-2 col-md-2 col-6 col-sm-6">
                <h6>О нас</h6>

                <ul class="list-unstyled text">
                    <li><a class="text-muted" href="{{ route('about-us') }}">Команда</a></li>

                    <li><a class="text-muted" href="{{ route('contact') }}">Контакты</a></li>

                    <li><a class="text-muted" href="{{ route('requisites') }}">Реквизиты</a></li>

                    <li><a class="text-muted" href="#">Программа скидок</a></li>

                    <li><a class="text-muted" href="#">Сотрудничество</a></li>

                    <li><a class="text-muted" href="{{ route('faq') }}">Ответы на частые вопросы FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-xl-2 col-md-2 col-6 col-sm-6">
                <h6>Статьи</h6>

                <ul class="list-unstyled text">
                    <li><a class="text-muted" href="{{ route('blog') }}">Блог</a></li>

                    <li>@include('includes.shop.subscription')</li>
                </ul>
            </div>
        </div>
    </footer>
</div>