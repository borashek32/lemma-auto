@foreach($advs as $adv)
    <div style="display:flex;justify-content:center">
        <a href="{{ $adv->link }}">
            <img src="{{ url('/storage/advs/' . $adv->img) }}"
                 style="height:100px;background-size:cover;"
                 alt="{{ $adv->title }}" />
        </a>
    </div>
    <div style="display:flex;justify-content:center; margin-bottom:10px">
        <a href="{{ $adv->link }}" style="color:black;font-size:14px;text-align: center;">
            {{ $adv->title }}
        </a>
    </div>
@endforeach



