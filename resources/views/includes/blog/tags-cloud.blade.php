<div class="text-center p-3">
    @foreach($tags as $tag)
        <a href="{{ route('tag', $tag->name) }}" style="color:grey">
            #{{ $tag->name }}
        </a>
    @endforeach
</div>
