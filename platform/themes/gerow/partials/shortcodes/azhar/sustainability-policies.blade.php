@php
    $newItems = collect(azhar_decode_shortcode_json_attribute($shortcode->toArray(), 'items') ?? [])
        ->map(function ($item) {
            return (object) [
                'icon' => data_get($item, 'icon'),
                'title' => data_get($item, 'title'),
                'description' => data_get($item, 'description'),
            ];
        })
        ->filter(function ($item) {
            return $item->title || $item->description || $item->icon;
        });

    $legacyItems = collect(range(1, 6))->map(function ($index) use ($shortcode) {
        $title = $shortcode->{"card_title_{$index}"} ?? null;
        $url = $shortcode->{"card_url_{$index}"} ?? null;
        $image = $shortcode->{"card_image_{$index}"} ?? null;

        if (! $title && ! $image) {
            return null;
        }

        return (object) [
            'title' => $title,
            'url' => $url,
            'image' => $image,
        ];
    })->filter();
@endphp

@if ($newItems->isNotEmpty())
    <section class="policies-section">
        <div class="policies-container">
            @if ($shortcode->label || $shortcode->title)
                <div class="policies-header">
                    @if ($shortcode->label)
                        <p class="section-label">{{ $shortcode->label }}</p>
                    @endif
                    @if ($shortcode->title)
                        <h2 class="section-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    @endif
                </div>
            @endif
            <div class="policies-grid">
                @foreach ($newItems as $item)
                    <div class="policy-card">
                        @if ($item->icon)
                            <div class="policy-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                        @endif
                        <div class="card-text">
                            @if ($item->title)
                                <h3 class="card-title">{!! BaseHelper::clean($item->title) !!}</h3>
                            @endif
                            @if ($item->description)
                                <p class="card-description">{!! BaseHelper::clean($item->description) !!}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@elseif ($legacyItems->isNotEmpty())
    <section class="policies-section">
        <div class="policies-container">
            @if ($shortcode->label || $shortcode->title)
                <div class="policies-header">
                    @if ($shortcode->label)
                        <p class="section-label">{{ $shortcode->label }}</p>
                    @endif
                    @if ($shortcode->title)
                        <h2 class="section-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    @endif
                </div>
            @endif
            <div class="policies-grid">
                @foreach ($legacyItems as $item)
                    <div class="policy-card legacy">
                        <div class="card-image-placeholder">
                            @if ($item->image)
                                {{ RvMedia::image($item->image, $item->title ?: __('Policy image')) }}
                            @endif
                        </div>
                        <div class="card-text">
                            @if ($item->title)
                                @if ($item->url)
                                    <a class="card-title" href="{{ $item->url }}">{!! BaseHelper::clean($item->title) !!} &rarr;</a>
                                @else
                                    <h3 class="card-title">{!! BaseHelper::clean($item->title) !!} &rarr;</h3>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif


