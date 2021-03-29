@foreach($advs as $adv)
    <div style="display:flex;justify-content:center">
        <a href="{{ $adv->link }}">
            <img src="{{ url('/storage/advs/' . $adv->img) }}"
                 style="height:auto;background-size:cover;" width="130px"
                 alt="{{ $adv->title }}" />
        </a>
    </div>
@endforeach



