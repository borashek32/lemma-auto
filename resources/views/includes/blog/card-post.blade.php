<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <div class="card mb-4 shadow">
        <ul class="list-group list-group-flush">
            <li style="font-size:12px;color:black;text-align:center;padding:0px;list-style: none;" class="list-group-item">
                {{ Date::parse($post->created_at)->format('j F Y') }}|

                <a href="{{ route('category', $post->category->slug) }}"
                   style="font-size:12px;color:dimgrey;">
                    {{ $post->category->name }}
                </a>
            </li>

            <a href="{{ route('post', $post->slug) }}" style="color: grey;">
                <li style="text-align: center" class="list-group-item">
                    <strong>
                        {{ $post->title }}
                    </strong>
                </li>

                <li class="list-group-item" style="display:flex;justify-content: center;align-items: center;padding: 10px;overflow: hidden; ">
                    <img src="{{ $post->img }}"
                         style="height: 100px; background-size: cover"
                         alt="{{ $post->title }}" />
                </li>
            </a>    

            <li class="list-group-item" style="font-size:12px;text-align:center;padding:3px;">
                @foreach($post->tags as $tag)
                    <a href="{{ route('tag', $tag->name) }}">#{{ $tag->name }}</a>
                @endforeach
            </li>

            <li class="list-group-item" style="font-size:12px;text-align:center;padding:3px;">
                <a href="/auto-magazine/{{ $post->slug }}">
                    Комментарии ({{ $post->comments->count() }})
                </a>
            </li>
        </ul>
    </div>
</div>
