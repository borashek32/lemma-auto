<div style="margin-top:-10px" class="margin-cats">
    @foreach($categories as $category)
        <a href="{{ route('category', $category->slug) }}">
            <div class="border-bottom border-success">
                <p class="font-weight-bold" style="margin-top:8px;color:black">
                    {{ $category->name }}
                    <span class="badge bg-light rounded-pill">
                        ({{ $category->posts->count() }})
                    </span>
                </p>
            </div>
        </a>
    @endforeach
</div>

<div class="margin-cats-without">
    @foreach($categories as $category)
        <a href="{{ route('category', $category->slug) }}">
            <div class="border-bottom border-success">
                <p class="font-weight-bold" style="margin-top:8px;color:black">
                    {{ $category->name }}
                    <span class="badge bg-light rounded-pill">
                        ({{ $category->posts->count() }})
                    </span>
                </p>
            </div>
        </a>
    @endforeach
</div>

