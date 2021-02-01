@foreach($categories as $category)
    <a href="{{ route('category', $category->id) }}" style="font-size:16px;color: black">
        {{ $category->name }}
    </a>
@endforeach
