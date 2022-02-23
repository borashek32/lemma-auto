<div>
    <div class="text-right">
        <a href="{{ route('faq') }}">
            <div class="row">
                <div class="col-12">
                    <img src="/files/icon_faq.png" alt="Ответы на частые вопросы">
                </div>
            </div>
        </a>
    </div>
    <div style="margin-top: 30px">
        <p class="text-right" style="font-size:18px;color:white;">Статьи в блоге</p>
        <div style="margin-top: -15px">
            @foreach($lastPosts as $lastPost)
                <a href="{{ route('post', $lastPost->slug) }}">
                    <div style="background-image: url({{ $lastPost->img }});background-size: cover;padding-top: 100px">
                        <p class="text-white text-center text-xs" style="background: black">
                            {{ Str::limit($lastPost->title, 25) }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

