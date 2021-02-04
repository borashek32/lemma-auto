@foreach($categories as $category)
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('category', $category->id) }}" style="font-size:16px;color: black">
                {{ $category->name }} {{ $postCount }}
            </a>
        </li>
    </ul>
@endforeach
