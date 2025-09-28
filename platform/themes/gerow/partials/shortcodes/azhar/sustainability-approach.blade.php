@php
    $label = $shortcode->label ?? null;
    $quote = $shortcode->quote ?? null;
    $authorName = $shortcode->author_name ?? null;
    $authorPosition = $shortcode->author_position ?? null;
    $image = $shortcode->image ?? null;
    $quoteParagraphs = collect(preg_split('/\r\n|\r|\n/', (string) $quote))
        ->map(fn ($item) => trim($item))
        ->filter();
@endphp

<section class="sustainability-approach-section">
    <div class="approach-container">
        <div class="approach-left">
            @if ($label)
                <p class="section-label">{{ $label }}</p>
            @endif
            @if ($quoteParagraphs->isNotEmpty())
                <blockquote class="approach-quote">
                    @foreach ($quoteParagraphs as $paragraph)
                        <p>{!! BaseHelper::clean($paragraph) !!}</p>
                    @endforeach
                </blockquote>
            @endif
            @if ($authorName || $authorPosition)
                <div class="author-details">
                    @if ($authorName)
                        <h3 class="author-name">{{ $authorName }}</h3>
                    @endif
                    @if ($authorPosition)
                        <p class="author-position">{{ $authorPosition }}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="approach-right">
            @if ($image)
                <div class="image-placeholder">
                    {{ RvMedia::image($image, $authorName ?: $label ?: __('Approach image')) }}
                </div>
            @else
                <div class="image-placeholder"></div>
            @endif
        </div>
    </div>
</section>














