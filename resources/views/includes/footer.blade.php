<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <img src="/img/digitalCoffeeSm.jpg" alt="Digital coffee design">
            <p class="d-block mb-3 text-muted"><a href="http://digitalcoffeedesign.com">&copy; Digital<br>coffee design</a><br>
                <?= date('Y') ?></p>
        </div>
        <div class="col-6 col-md">
            <h6>Автозапчасти</h6>
            <ul class="list-unstyled text">
                <li><a class="text-muted" href="{{ route('auto-parts') }}">Магазин</a></li>
                <li><a class="text-muted" href="{{ route('partners') }}">Наши партнеры</a></li>
                <li><a class="text-muted" href="{{ route('auto-parts') }}">Доставка</a></li>
                <li><a class="text-muted" href="{{ route('auto-parts') }}">Оплата</a></li>
                <li><a class="text-muted" href="#">Возврат</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h6>Наши партнеры</h6>
            <ul class="list-unstyled text">
                <li><a class="text-muted" href="http://motul-ishop.ru/">Motul</a></li>
                <li><a class="text-muted" href="https://favorit-parts.ru/">Favorit-parts</a></li>
                <li><a class="text-muted" href="https://shop.autoeuro.ru/">Autoeuro</a></li>
                <li><a class="text-muted" href="https://vianor.ru">Vianor</a></li>
                <li><a class="text-muted" href="https://emex.ru/">Emex</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h6>О нас</h6>
            <ul class="list-unstyled text">
                <li><a class="text-muted" href="#">Команда</a></li>
                <li><a class="text-muted" href="contact">Контакты</a></li>
                <li><a class="text-muted" href="#">Скидки</a></li>
                <li><a class="text-muted" href="#">Сотрудничество</a></li>
            </ul>
        </div>
    </div>
</footer>
