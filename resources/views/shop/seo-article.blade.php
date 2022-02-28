@foreach ($articles as $article)
    <p style="font-weight: 500;font-size: 24px; margin-top:20px" class="text-center">
        {{ $article->title}}
    </p>

    <p>
        {!! $article->seo_text !!}
    </p>
@endforeach