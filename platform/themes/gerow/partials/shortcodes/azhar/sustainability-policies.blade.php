@php
    $cards = collect(range(1, 6))->map(function ($index) use ($shortcode) {
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

@if ($cards->isNotEmpty())
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
                @foreach ($cards as $card)
                    <div class="policy-card">
                        <div class="card-image-placeholder">
                            @if ($card->image)
                                {{ RvMedia::image($card->image, $card->title ?: __('Policy image')) }}
                            @endif
                        </div>
                        <div class="card-text">
                            @if ($card->title)
                                @if ($card->url)
                                    <a class="card-title" href="{{ $card->url }}">{!! BaseHelper::clean($card->title) !!} &rarr;</a>
                                @else
                                    <h3 class="card-title">{!! BaseHelper::clean($card->title) !!} &rarr;</h3>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif














