@php
    $cards = collect(range(1, 6))->map(function ($index) use ($shortcode) {
        $title = $shortcode->{"card_title_{$index}"} ?? null;
        $description = $shortcode->{"card_description_{$index}"} ?? null;
        $image = $shortcode->{"card_image_{$index}"} ?? null;

        if (! $title && ! $description && ! $image) {
            return null;
        }

        return (object) [
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ];
    })->filter();
@endphp

@if ($cards->isNotEmpty())
    <section class="sectors-section">
        <div class="sectors-container">
            <div class="sectors-header">
                <div class="section-title-group">
                    @if ($shortcode->title)
                        <h2 class="sectors-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    @endif
                    @if ($shortcode->description)
                        <p class="sectors-description">{!! BaseHelper::clean($shortcode->description) !!}</p>
                    @endif
                </div>
                <div class="sectors-controls">
                    <div class="slider-nav-buttons">
                        <button id="prev-card" class="arrow-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        </button>
                        <button id="next-card" class="arrow-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                    @if ($shortcode->cta_label && $shortcode->cta_url)
                        <a class="view-all-link" href="{{ $shortcode->cta_url }}">{{ $shortcode->cta_label }} <span class="arrow-icon">&#8594;</span></a>
                    @endif
                </div>
            </div>
            <div class="sectors-cards-row">
                @foreach ($cards as $card)
                    <div class="sector-card" @if ($card->image) style="background-image: url('{{ RvMedia::getImageUrl($card->image) }}');" @endif>
                        <div class="card-overlay">
                            @if ($card->title)
                                <h3 class="card-title">{!! BaseHelper::clean($card->title) !!}</h3>
                            @endif
                            @if ($card->description)
                                <p class="card-description">{!! BaseHelper::clean($card->description) !!}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
