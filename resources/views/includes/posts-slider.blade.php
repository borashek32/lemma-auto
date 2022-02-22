<div>
    @foreach($lastPosts as $lastPost)
        <a href="{{ route('post', $lastPost->slug) }}">
            <div style="background-image: url({{ $lastPost->img }});background-size: cover;padding-top: 100px">
                <p class="text-white text-center text-xs" style="background: black">
                    {{ Str::limit($lastPost->title, 25) }}
                </p>
            </div>
        </a>
    @endforeach

    <div class="text-right">
        <a href="{{ route('faq') }}">
            <button type="button" class="btn btn-md btn-danger">
                <div class="row">
                    <div class="col-12">
                        <p style="color:white;margin-top:5px;mrgin-bottom:-3px">FAQ</p>
                    </div>
                </div>
            </button>
        </a>
    </div>
</div>

