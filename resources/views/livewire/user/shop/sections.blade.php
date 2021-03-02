@foreach($sections as $section)
    <div class="list-group shadow mb-2">
        <a href="#"
           class="list-group-item list-group-item-action list-group-item-secondary">
            <p style="font-size:14px;color:black;margin:0px">
                {{ $section->name }}
                <span class="badge bg-light rounded-pill">
            {{ $section->autoparts->count() }}
        </span>
            </p>
        </a>
    </div>
@endforeach
