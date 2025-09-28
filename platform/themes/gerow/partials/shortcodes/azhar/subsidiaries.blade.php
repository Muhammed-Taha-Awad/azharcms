@php use Illuminate\Support\Arr; @endphp
@php
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













