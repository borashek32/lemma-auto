<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://lemma-auto.ru/</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    <url>
        <loc>https://lemma-auto.ru/partners/</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    <url>
        <loc>https://lemma-auto.ru/law</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    <url>
        <loc>https://lemma-auto.ru/reviews</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    <url>
        <loc>https://lemma-auto.ru/requisites</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    <url>
        <loc>https://lemma-auto.ru/contact</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    <url>
        <loc>https://lemma-auto.ru/auto-magazine</loc>
        <lastmod>2018-06-04</lastmod>
    </url>
    @foreach($posts as $post)
        <url>
            <loc>https://lemma-auto.ru/auto-magazine/posts/{{ $post->slug }}</loc>
        </url>
    @endforeach
    @foreach($categories as $category)
        <url>
            <loc>https://lemma-auto.ru/auto-magazine/category/{{ $category->slug }}</loc>
        </url>
    @endforeach
    @foreach($tags as $tag)
        <url>
            <loc>https://lemma-auto.ru/auto-magazine/tag/{{ $tag->slug }}</loc>
        </url>
    @endforeach
</urlset>