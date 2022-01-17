<div class="bg-gray-200">
    <div class="p-4">
        <p class="text-xl text-red-900 mb-4" style="font-weight:700">
            Доставка по адресу
        </p>
        <p class="text-sm">
        * Доставка в пределах МКАД и по ближайшему Подмосковью осуществляется курьерской службой "Достависта".
            С актуальными тарифами вы можете ознакомиться на сайте Dostavista.ru.
            Вы всегда можете вызвать к нам курьера через данный сервис.
        </p>
        <p class="text-sm">
        ** Крупногабаритные заказы доставляются только транспортными компаниями.
        </p>
        <p class="text-sm">
        *** Бесплатная доставка до транспортной компании.
        </p>
{{--        @if(!$address)--}}
{{--            <div class="pl-8 mt-8 pr-10 justify-center">--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_fullname">--}}
{{--                        Полное имя--}}
{{--                    </label>--}}
{{--                    <input--}}
{{--                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                            name="shipping_fullname" id="shipping_fullname" type="text" placeholder="Иванов Петр Иванович">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_city">--}}
{{--                        Город--}}
{{--                    </label>--}}
{{--                    <input--}}
{{--                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                            name="shipping_city" id="shipping_city" type="text" placeholder="Москва">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_postcode">--}}
{{--                        Почтовый индекс--}}
{{--                    </label>--}}
{{--                    <input--}}
{{--                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                            name="shipping_postcode" id="shipping_postcode" type="text" placeholder="345124">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_address">--}}
{{--                        Адрес--}}
{{--                    </label>--}}
{{--                    <input--}}
{{--                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                            name="shipping_address" id="shipping_address" type="text" placeholder="ул. Карла Маркса, 2к4, 456">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_phone">--}}
{{--                        Телефон--}}
{{--                    </label>--}}
{{--                    <input--}}
{{--                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                            name="shipping_phone" id="shipping_phone" type="tel" placeholder="+7(999) 999-9999">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}

{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">--}}
{{--                        Примечание--}}
{{--                    </label>--}}

{{--                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                              name="notes" id="notes" type="text" rows="5" placeholder="Оставьте ваши комментарии здесь"></textarea>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="pl-8 mt-4 pr-8 justify-center">--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_fullname">--}}
{{--                        Полное имя--}}
{{--                    </label>--}}
{{--                    <input value="{{ $address->shipping_fullname }}"--}}
{{--                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                           name="shipping_fullname" id="shipping_fullname" type="text" placeholder="Иванов Петр Иванович">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_city">--}}
{{--                        Город--}}
{{--                    </label>--}}
{{--                    <input value="{{ $address->shipping_city }}"--}}
{{--                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                           name="shipping_city" id="shipping_city" type="text" placeholder="Москва">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_postcode">--}}
{{--                        Почтовый индекс--}}
{{--                    </label>--}}
{{--                    <input value="{{ $address->shipping_postcode }}"--}}
{{--                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                           name="shipping_postcode" id="shipping_postcode" type="text" placeholder="345124">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_address">--}}
{{--                        Адрес--}}
{{--                    </label>--}}
{{--                    <input value="{{ $address->shipping_address }}"--}}
{{--                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                           name="shipping_address" id="shipping_address" type="text" placeholder="ул. Карла Маркса, 2к4, 456">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_phone">--}}
{{--                        Телефон--}}
{{--                    </label>--}}
{{--                    <input value="{{ $address->shipping_phone }}"--}}
{{--                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                           name="shipping_phone" id="shipping_phone" type="tel" placeholder="+7(999) 999-9999">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}

{{--                    <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">--}}
{{--                        Примечание--}}
{{--                    </label>--}}

{{--                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                              name="notes" id="notes" type="text" placeholder="Оставьте ваши комментарии здесь"></textarea>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
</div>
