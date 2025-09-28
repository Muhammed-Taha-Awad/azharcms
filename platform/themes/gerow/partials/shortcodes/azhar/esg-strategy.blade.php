@php
    $label = $shortcode->label ?? null;
    $title = $shortcode->title ?? null;
    $description = $shortcode->description ?? null;
    $paragraphs = collect(preg_split('/\r\n|\r|\n/', (string) $description))
        ->map(fn ($item) => trim($item))
        ->filter();
@endphp

<section class="esg-strategy-section">
    <div class="esg-container">
        <div class="esg-left">
            @if ($label)
                <p class="section-label">{{ $label }}</p>
            @endif
            @if ($title)
                <h2 class="section-title">{!! BaseHelper::clean($title) !!}</h2>
            @endif
        </div>
        <div class="esg-right">
            @if ($paragraphs->isNotEmpty())
                @foreach ($paragraphs as $paragraph)
                    <p>{!! BaseHelper::clean($paragraph) !!}</p>
                @endforeach
            @endif
        </div>
    </div>
</section>














