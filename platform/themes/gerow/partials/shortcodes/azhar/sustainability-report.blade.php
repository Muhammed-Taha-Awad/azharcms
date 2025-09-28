@php use Illuminate\Support\Arr; @endphp
@php
    $subtitle = $shortcode->subtitle ?? null;
    $title = $shortcode->title ?? null;
    $description = $shortcode->description ?? null;
    $buttonLabel = $shortcode->button_label ?? null;
    $buttonUrl = $shortcode->button_url ?? null;
    $image = $shortcode->image ?? null;
@endphp

<section class="sustainability-report-section">
    <div class="report-container">
        <div class="report-grid">
            <div class="report-image-col">
                @if ($image)
                    <div class="image-placeholder">
                        {{ RvMedia::image($image, $title ?: $subtitle ?: __('Sustainability report')) }}
                    </div>
                @else
                    <div class="image-placeholder"></div>
                @endif
            </div>
            <div class="report-text-col">
                @if ($subtitle)
                    <p class="section-label">{{ $subtitle }}</p>
                @endif
                @if ($title)
                    <h2 class="report-title">{!! BaseHelper::clean($title) !!}</h2>
                @endif
                @if ($description)
                    <p class="report-description">{!! BaseHelper::clean(nl2br($description)) !!}</p>
                @endif
            </div>
            <div class="report-button-col">
                @if ($buttonLabel && $buttonUrl)
                    <a class="view-report-btn" href="{{ $buttonUrl }}">
                        {{ $buttonLabel }}
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>













