@foreach($advertisements as $advertisement)
    <div style="display:flex;justify-content:center">
        <a href="{{ $advertisement->link }}">
            <img src="{{ url($advertisement->banner) }}"
                 style="height:auto;background-size:cover;" width="130px"
                 alt="{{ $advertisement->link }}" />
        </a>
    </div>
@endforeach



