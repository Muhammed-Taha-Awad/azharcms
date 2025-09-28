@php
    $cards = collect(range(1, 6))->map(function ($index) use ($shortcode) {
        $title = $shortcode->{"card_title_{$index}"} ?? null;
        $url = $shortcode->{"card_url_{$index}"} ?? null;

        if (! $title && ! $url) {
            return null;
        }

        return (object) [
            'title' => $title,
            'url' => $url ?: '#',
        ];
    })->filter();
@endphp

@if ($cards->isNotEmpty())
    <section class="explore-more-section">
        <div class="explore-more-container">
            <div class="explore-more-header">
                @if ($shortcode->subtitle)
                    <p class="explore-small-title">{{ $shortcode->subtitle }}</p>
                @endif
                @if ($shortcode->title)
                    <h2 class="explore-main-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                @endif
            </div>
            <div class="explore-cards-grid">
                @foreach ($cards as $card)
                    <a class="explore-card" href="{{ $card->url }}">
                        <h3 class="card-title">{!! BaseHelper::clean($card->title) !!}</h3>
                        <span class="card-arrow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12L19 12M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif














