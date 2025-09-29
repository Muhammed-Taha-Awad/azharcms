@php
    $slides = collect(data_get($shortcode, 'slides', []))
        ->map(function ($slide) {
            return (object) [
                'image' => data_get($slide, 'image'),
                'title' => data_get($slide, 'title'),
                'subtitle' => data_get($slide, 'subtitle'),
                'description' => data_get($slide, 'description'),
                'button_label' => data_get($slide, 'button_label'),
                'button_url' => data_get($slide, 'button_url'),
            ];
        })
        ->filter(function ($slide) {
            return $slide->image || $slide->title || $slide->subtitle || $slide->description;
        });

    if ($slides->isEmpty()) {
        $slides = collect(range(1, 5))->map(function ($index) use ($shortcode) {
            $image = $shortcode->{"image_{$index}"} ?? null;
            $title = $shortcode->{"title_{$index}"} ?? null;
            $subtitle = $shortcode->{"subtitle_{$index}"} ?? null;
            $description = $shortcode->{"description_{$index}"} ?? null;
            $buttonLabel = $shortcode->{"button_label_{$index}"} ?? null;
            $buttonUrl = $shortcode->{"button_url_{$index}"} ?? null;

            if (! $image && ! $title && ! $subtitle && ! $description) {
                return null;
            }

            return (object) [
                'image' => $image,
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description,
                'button_label' => $buttonLabel,
                'button_url' => $buttonUrl,
            ];
        })->filter();
    }

    $highlight = $shortcode->highlight_text ?? null;
    $firstSlide = $slides->first();
@endphp

@if ($slides->isNotEmpty())
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="slider-container">
            @foreach ($slides as $slide)
                <img
                    class="slider-image @if ($loop->first) active @endif"
                    src="{{ RvMedia::getImageUrl($slide->image) }}"
                    alt="{{ $slide->title }}"
                >
            @endforeach
        </div>
        <div class="slider-nav-arrows">
            <div class="slider-nav-buttons">
                <button class="prev-arrow" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
                <button class="next-arrow" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </div>
            <div class="slider-dots">
                @foreach ($slides as $slide)
                    <span class="dot @if($loop->first) active @endif" data-slide="{{ $loop->index }}"></span>
                @endforeach
            </div>
        </div>
        <div class="hero-content">
            <div class="hero-text-container">
                @if ($highlight)
                    <p class="whats-new">{{ $highlight }}</p>
                @endif
                @if ($firstSlide && $firstSlide->title)
                    <h1 class="hero-title">{!! BaseHelper::clean($firstSlide->title) !!}</h1>
                @endif
                @if ($firstSlide && $firstSlide->description)
                    <p class="hero-description">{!! BaseHelper::clean($firstSlide->description) !!}</p>
                @endif
                @if ($firstSlide && $firstSlide->button_label && $firstSlide->button_url)
                    <a class="discover-btn" href="{{ $firstSlide->button_url }}">{{ $firstSlide->button_label }}</a>
                @endif
            </div>
        </div>
    </section>
@endif

