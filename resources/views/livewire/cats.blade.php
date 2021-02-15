@foreach($categories as $category)
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('category', $category->slug) }}" style="font-size:16px;color: black">
                {{ $category->name }} ({{ $category->posts->count() }})
            </a>
        </li>
    </ul>
@endforeach
