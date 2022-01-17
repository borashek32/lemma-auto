@foreach($categories as $category)
    <div class="list-group shadow mb-2">
        <a href="{{ route('category', $category->slug) }}"
           class="list-group-item list-group-item-action list-group-item-secondary">
            <p style="font-size:14px;color:black;margin:0px">
                {{ $category->name }}
                <span class="badge bg-light rounded-pill">
                    {{ $category->posts->count() }}
                </span>
            </p>
        </a>
    </div>
@endforeach
