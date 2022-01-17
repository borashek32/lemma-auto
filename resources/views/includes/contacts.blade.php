 <table class="table">
    <thead>
    <tr>
        <th scope="col"><p class="text-center">Наши офисы</p></th>
        <th id="contacts" scope="col"><p class="text-center">Карта проезда</p></th>
    </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>
                    <p>{{ $contact->time }}</p>
                    <p class="text">{{ $contact->desc }}</p>
                    <p>{{ $contact->address }}</p>
                    <a href="tel:+{{ $contact->phone }}" class="textAddress">{{ $contact->phone }}</a> - менеджер
                </td>
                <td id="contacts">
                    <iframe src="{{ $contact->map }}" width="200" height="200" frameborder="0" style="border:0;"
                            allowfullscreen=""
                            aria-hidden="false"
                            tabindex="0">
                    </iframe>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    @media (max-width: 400px) {
        #contacts {
            display:none;
        }
    }
</style>







