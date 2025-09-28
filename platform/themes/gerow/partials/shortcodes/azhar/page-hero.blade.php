@php
    $background = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;
    $overlay = $shortcode->overlay ? trim($shortcode->overlay) : null;

    $backgroundLayers = collect();

    if ($overlay) {
        $backgroundLayers->push($overlay);
    }

    if ($background) {
        $backgroundLayers->push(sprintf("url('%s') center/cover no-repeat", $background));
    }

    $styleAttribute = $backgroundLayers->isNotEmpty() ? 'background: ' . $backgroundLayers->join(', ') . ';' : null;

    $textAlignment = in_array($shortcode->alignment, ['center', 'right'], true) ? $shortcode->alignment : 'left';
@endphp

<section class="about-hero-section" @if ($styleAttribute) style="{{ $styleAttribute }}" @endif>
    <div class="about-hero-container" @if ($textAlignment !== 'left') style="text-align: {{ $textAlignment }};" @endif>
        @if ($shortcode->subtitle)
            <p class="about-hero-subtitle">{{ $shortcode->subtitle }}</p>
        @endif

        @if ($shortcode->title)
            <h1 class="about-hero-title">{!! BaseHelper::clean($shortcode->title) !!}</h1>
        @endif

        @if ($shortcode->description)
            <p class="about-hero-description">{!! BaseHelper::clean($shortcode->description) !!}</p>
        @endif

        @if ($shortcode->button_label && $shortcode->button_url)
            <a class="discover-btn" href="{{ $shortcode->button_url }}">{{ $shortcode->button_label }}</a>
        @endif
    </div>
</section>














