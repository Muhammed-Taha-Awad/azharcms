@php
    $items = collect(azhar_decode_shortcode_json_attribute($shortcode->toArray(), 'items') ?? [])
        ->map(function ($item) {
            return (object) [
                'title' => data_get($item, 'title'),
                'excerpt' => data_get($item, 'excerpt'),
                'image' => data_get($item, 'image'),
                'date' => data_get($item, 'date'),
                'tag' => data_get($item, 'tag'),
                'url' => data_get($item, 'url'),
            ];
        })
        ->filter(function ($item) {
            return $item->title || $item->excerpt || $item->image;
        });

    if ($items->isEmpty()) {
        $items = collect(range(1, 3))->map(function ($index) use ($shortcode) {
            $title = $shortcode->{"item_title_{$index}"} ?? null;
            $excerpt = $shortcode->{"item_excerpt_{$index}"} ?? null;
            $image = $shortcode->{"item_image_{$index}"} ?? null;
            $date = $shortcode->{"item_date_{$index}"} ?? null;
            $tag = $shortcode->{"item_tag_{$index}"} ?? null;
            $url = $shortcode->{"item_url_{$index}"} ?? null;

            if (! $title && ! $excerpt && ! $image) {
                return null;
            }

            return (object) [
                'title' => $title,
                'excerpt' => $excerpt,
                'image' => $image,
                'date' => $date,
                'tag' => $tag,
                'url' => $url,
            ];
        })->filter();
    }
@endphp

@if ($items->isNotEmpty())
    <section class="newsroom-section">
        <div class="news-container">
            <div class="news-header">
                @if ($shortcode->title)
                    <h2 class="news-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                @endif
                @if ($shortcode->cta_label && $shortcode->cta_url)
                    <a href="{{ $shortcode->cta_url }}" class="view-all-link">{{ $shortcode->cta_label }} <span class="arrow-icon">&#8594;</span></a>
                @endif
            </div>
            <div class="news-cards">
                @foreach ($items as $item)
                    <article class="news-card">
                        @if ($item->image)
                            <div class="card-image">
                                <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->title }}">
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="card-meta">
                                @if ($item->tag)
                                    <span class="card-tag">{{ $item->tag }}</span>
                                @endif
                                @if ($item->date)
                                    <span class="card-date">{{ $item->date }}</span>
                                @endif
                            </div>
                            @if ($item->title)
                                <h3 class="card-title">{!! BaseHelper::clean($item->title) !!}</h3>
                            @endif
                            @if ($item->excerpt)
                                <p class="card-excerpt">{!! BaseHelper::clean($item->excerpt) !!}</p>
                            @endif
                            @if ($item->url)
                                <a class="read-more-link" href="{{ $item->url }}">{{ $shortcode->item_cta_label ?: __('Read more') }}</a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

