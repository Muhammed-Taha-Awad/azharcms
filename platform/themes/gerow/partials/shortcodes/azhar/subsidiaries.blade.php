@php
    $links = collect(azhar_decode_shortcode_json_attribute($shortcode->toArray(), 'header_links') ?? [])
        ->map(function ($link) {
            $label = data_get($link, 'label');
            $url = data_get($link, 'url');

            if (! $label || ! $url) {
                return null;
            }

            return (object) [
                'label' => $label,
                'url' => $url,
            ];
        })
        ->filter();

    if ($links->isEmpty()) {
        $links = collect(range(1, 3))->map(function ($index) use ($shortcode) {
            $label = $shortcode->{"header_link_label_{$index}"} ?? null;
            $url = $shortcode->{"header_link_url_{$index}"} ?? null;

            if (! $label || ! $url) {
                return null;
            }

            return (object) [
                'label' => $label,
                'url' => $url,
            ];
        })->filter();
    }

    $items = collect(azhar_decode_shortcode_json_attribute($shortcode->toArray(), 'items') ?? [])
        ->map(function ($item) {
            return (object) [
                'image' => data_get($item, 'image'),
                'category' => data_get($item, 'category'),
            ];
        })
        ->filter(function ($item) {
            return $item->image || $item->category;
        });

    if ($items->isEmpty()) {
        $items = collect(range(1, 6))->map(function ($index) use ($shortcode) {
            $image = $shortcode->{"item_image_{$index}"} ?? null;
            $category = $shortcode->{"item_category_{$index}"} ?? null;

            if (! $image && ! $category) {
                return null;
            }

            return (object) [
                'image' => $image,
                'category' => $category,
            ];
        })->filter();
    }
@endphp

@if ($items->isNotEmpty())
    <section class="subsidiaries-section">
        <div class="subsidiaries-container">
            <div class="subsidiaries-header">
                @if ($shortcode->title)
                    <h2 class="subsidiaries-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                @endif
                @if ($links->isNotEmpty())
                    <div class="header-links">
                        @foreach ($links as $link)
                            <a href="{{ $link->url }}" class="header-link">
                                <span>{{ $link->label }}</span>
                                <span class="arrow-icon">&#8594;</span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="subsidiaries-grid">
                @foreach ($items as $item)
                    <div class="subsidiary-card">
                        @if ($item->image)
                            <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->category }}">
                        @endif
                        @if ($item->category)
                            <p class="subsidiary-category">{{ $item->category }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

