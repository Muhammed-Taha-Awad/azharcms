@php use Illuminate\Support\Arr; @endphp
<section class="geography-section" @if ($shortcode->background_image) style="background-image: url('{{ RvMedia::getImageUrl($shortcode->background_image) }}');" @endif>
    <div class="geography-content-container">
        @if ($shortcode->title)
            <h2 class="geography-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
        @endif
        @if ($shortcode->description)
            <p class="geography-description">{!! BaseHelper::clean($shortcode->description) !!}</p>
        @endif
        @if ($shortcode->button_label && $shortcode->button_url)
            <a href="{{ $shortcode->button_url }}" class="view-portfolio-link">
                {{ $shortcode->button_label }}
                <span class="arrow-icon">&#8594;</span>
            </a>
        @endif
    </div>
</section>













