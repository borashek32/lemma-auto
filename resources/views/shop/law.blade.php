@extends('layouts.site')
@section('title-block')Гарантии и возврат@endsection('title-block')
@section('description')<meta name="description" content="Интернет-магазин Лемма-авто осуществляет возврат и обмен неисправных запчастей в сжатые сроки. Вы можете ознакомится с условия обмена/возврата на нашем сайте, а также получить консультацию специалиста." />@endsection('description')
@section('content')
<div class="autoparts-big">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <h2 class="text-center" style="margin-top:10px">Условия гарантии на запасные части на ваш автомобиль</h2>
            
            <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 20px;">
                <h6 style="font-weight: 600">Гарантия на запасные части (кроме электрических) составляет
                    14 дней с момента получения Товара покупателем, если приобретаемые
                    запасные части относятся к категории «Неоригинальные», и  6 месяцев,
                    если приобретаемые запасные части относятся к категории
                    «Оригинальные» и выполняется  при следующих условиях:
                </h6>

                <ul class="text" style="font-size: 14px;padding: 20px;">
                    <li>Наличие документа, подтверждающего приобретение запасной части у компании,</li>

                    <li>Наличие заказ – наряда на установку запасной части на автомобиль соответствующим
                        официальным дилером, в случае, если запасная часть является оригинальной и (или)
                        соответствующей сертифицированной станцией технического обслуживания автомобилей
                        (СТОА) с указанием данных автомобиля и выполненных работ, необходимых при установке
                        соответствующей запасной части,</li>

                    <li>Наличие сертификата СТОА на проведение данного вида работ,</li>

                    <li>Заключение о неработоспособности детали,</li>

                    <li>Документы, подтверждающие оплату выполненных в СТОА работ,</li>

                    <li>Запасная часть соответствует спецификации автомобиля (неоригинальная
                        запасная часть является ПОЛНЫМ заменителем оригинальной,</li>

                    <li>Автомобиль эксплуатируется нормальным образом, и обслуживание производится
                        в соответствии с рекомендациями фирмы-производителя автомобиля.</li>
                </ul>
                
                <h5 style="font-weight: 600" style="font-size: 14px;padding: 20px;">Гарантия на запасные части не распространяется в следующих случаях:</h5>

                <ul class="text" style="font-size: 14px;padding: 20px;">
                    <li>Нормальный износ запасной части,</li>

                    <li>Повреждение запасной части в результате ДТП или небрежной эксплуатации,</li>

                    <li>Неисправности запасных частей топливной системы и системы выпуска вследствие
                        применения некачественного топлива (в том числе из-за загрязнения
                        или применения этилированного бензина),</li>

                    <li>Повреждения (в том числе подвески и рулевого управления), возникшие из-за
                        неаккуратного вождения на неровностях дорог, сопряженного с ударными нагрузками на автомобиль,</li>

                    <li>Внешние повреждения стекол кузова и приборов освещения,</li>

                    <li>Дефекты, неисправности или коррозия запасных частей, возникшие в результате воздействия
                        промышленных и химических выбросов, кислотного или щелочного загрязнения воздуха,
                        растительного сока, продуктов жизнедеятельности птиц и животных, химически активных веществ,
                        в том числе применяемых для борьбы с обледенением дорог, града, молнии и прочих природных явлений,</li>

                    <li>Эксплуатационный износ и естественное изменение состояния (в том числе старение)
                        таких запасных частей как щетки стеклоочистителя, приводные ремни, тормозные колодки,
                        диски и барабаны, диски сцепления, свечи зажигания и т.п..</li>
                </ul>

                <p>Гарантия не распространяется на оригинальные электрические запасные части, установленные ВНЕ
                    дилерских сервисных станций.
                    Гарантия на неоригинальные электрические запасные части ограничивается ее работоспособностью в
                    момент установки.
                </p>
            
                <h5 style="font-weight: 600" style="font-size: 14px;padding: 20px;">Порядок возврата запасных частей:</h5>

                <ul class="text" style="font-size: 14px;padding: 20px;">
                    <li>Покупатель вправе отказаться от заказанного Товара в любое время до его получения,
                        а после получения Товара — в течение 7 (семи) дней. Возврат Товара надлежащего качества
                        возможен в случае, если сохранены его товарный вид, потребительские свойства, а также документ,
                        подтверждающий факт и условия покупки указанного Товара,</li>

                    <li>Покупатель не вправе отказаться от Товара надлежащего качества, имеющего индивидуально-определенные
                        свойства, если указанный Товар может быть использован исключительно приобретающим его потребителем</li>

                    <li>Покупатель не вправе возвратить Товары надлежащего качества, указанные в Перечне непродовольственных
                        товаров надлежащего качества, не подлежащих возврату или обмену, утвержденном
                        Постановлением Правительства РФ от 19.01.1998 № 55,</li>

                    <li>Возврат Товара производиться на основании письменного обращения Покупателя предоставляемого
                        в офис продаж Продавца,</li>

                    <li>Возврат Товара надлежащего качества осуществляется за счет Покупателя и организуется им самостоятельно,</li>

                    <li>Возврат Товара производится по рабочим дням с 10-00 до 18-00 в офисе продаж Продавца,</li>

                    <li>При возврате Покупателем Товара надлежащего качества составляются накладная или акт о возврате товара,</li>

                    <li>Возврат  стоимости  Товара производится не позднее чем через 10 (десять) дней с даты
                        предоставления Покупателем соответствующего требования.</li>
                </ul>
            </div>
            <br>
            <p>Источник:</p>
            <a href="http://www.consultant.ru/document/cons_doc_LAW_305/"><img src=".././img/consultant.jpg"></a>
        </div>
        
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="advertisements">
                <livewire:user.advertisements.advertisements />
            </div>
        </div>
    </div>
</div>

<div class="autoparts-small p-8">
    <h2 class="text-center">Условия гарантии на запасные части на ваш автомобиль</h2>
            
    <h6 style="font-weight: 600;margin-top: 20px">Гарантия на запасные части (кроме электрических) составляет
        14 дней с момента получения Товара покупателем, если приобретаемые
        запасные части относятся к категории «Неоригинальные», и  6 месяцев,
        если приобретаемые запасные части относятся к категории
        «Оригинальные» и выполняется  при следующих условиях:
    </h6>

    <ul class="text" style="font-size: 14px;padding: 20px;">
        <li>Наличие документа, подтверждающего приобретение запасной части у компании,</li>

        <li>Наличие заказ – наряда на установку запасной части на автомобиль соответствующим
            официальным дилером, в случае, если запасная часть является оригинальной и (или)
            соответствующей сертифицированной станцией технического обслуживания автомобилей
            (СТОА) с указанием данных автомобиля и выполненных работ, необходимых при установке
            соответствующей запасной части,</li>

        <li>Наличие сертификата СТОА на проведение данного вида работ,</li>

        <li>Заключение о неработоспособности детали,</li>

        <li>Документы, подтверждающие оплату выполненных в СТОА работ,</li>

        <li>Запасная часть соответствует спецификации автомобиля (неоригинальная
            запасная часть является ПОЛНЫМ заменителем оригинальной,</li>

        <li>Автомобиль эксплуатируется нормальным образом, и обслуживание производится
            в соответствии с рекомендациями фирмы-производителя автомобиля.</li>
    </ul>
    
    <h5 style="font-weight: 600" style="font-size: 14px;padding: 20px;">Гарантия на запасные части не распространяется в следующих случаях:</h5>

    <ul class="text" style="font-size: 14px;padding: 20px;">
        <li>Нормальный износ запасной части,</li>

        <li>Повреждение запасной части в результате ДТП или небрежной эксплуатации,</li>

        <li>Неисправности запасных частей топливной системы и системы выпуска вследствие
            применения некачественного топлива (в том числе из-за загрязнения
            или применения этилированного бензина),</li>

        <li>Повреждения (в том числе подвески и рулевого управления), возникшие из-за
            неаккуратного вождения на неровностях дорог, сопряженного с ударными нагрузками на автомобиль,</li>

        <li>Внешние повреждения стекол кузова и приборов освещения,</li>

        <li>Дефекты, неисправности или коррозия запасных частей, возникшие в результате воздействия
            промышленных и химических выбросов, кислотного или щелочного загрязнения воздуха,
            растительного сока, продуктов жизнедеятельности птиц и животных, химически активных веществ,
            в том числе применяемых для борьбы с обледенением дорог, града, молнии и прочих природных явлений,</li>

        <li>Эксплуатационный износ и естественное изменение состояния (в том числе старение)
            таких запасных частей как щетки стеклоочистителя, приводные ремни, тормозные колодки,
            диски и барабаны, диски сцепления, свечи зажигания и т.п..</li>
    </ul>

    <p>Гарантия не распространяется на оригинальные электрические запасные части, установленные ВНЕ
        дилерских сервисных станций.
        Гарантия на неоригинальные электрические запасные части ограничивается ее работоспособностью в
        момент установки.
    </p>

    <h5 style="font-weight: 600" style="font-size: 14px;padding: 20px;">Порядок возврата запасных частей:</h5>

    <ul class="text" style="font-size: 14px;padding: 20px;">
        <li>Покупатель вправе отказаться от заказанного Товара в любое время до его получения,
            а после получения Товара — в течение 7 (семи) дней. Возврат Товара надлежащего качества
            возможен в случае, если сохранены его товарный вид, потребительские свойства, а также документ,
            подтверждающий факт и условия покупки указанного Товара,</li>

        <li>Покупатель не вправе отказаться от Товара надлежащего качества, имеющего индивидуально-определенные
            свойства, если указанный Товар может быть использован исключительно приобретающим его потребителем</li>

        <li>Покупатель не вправе возвратить Товары надлежащего качества, указанные в Перечне непродовольственных
            товаров надлежащего качества, не подлежащих возврату или обмену, утвержденном
            Постановлением Правительства РФ от 19.01.1998 № 55,</li>

        <li>Возврат Товара производиться на основании письменного обращения Покупателя предоставляемого
            в офис продаж Продавца,</li>

        <li>Возврат Товара надлежащего качества осуществляется за счет Покупателя и организуется им самостоятельно,</li>

        <li>Возврат Товара производится по рабочим дням с 10-00 до 18-00 в офисе продаж Продавца,</li>

        <li>При возврате Покупателем Товара надлежащего качества составляются накладная или акт о возврате товара,</li>

        <li>Возврат  стоимости  Товара производится не позднее чем через 10 (десять) дней с даты
            предоставления Покупателем соответствующего требования.</li>
    </ul>
    <br>
    <p>Источник:</p>
    <a  href="http://www.consultant.ru/document/cons_doc_LAW_305/"><img src=".././img/consultant.jpg"></a>

    <div class="leftColumn" style="margin-top:10px">
        @include('includes.shop.left-column')
    </div>
</div>
@endsection('content')
