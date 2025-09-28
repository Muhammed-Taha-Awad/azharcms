<section class="sustainability-section" @if ($shortcode->background_image) style="background-image: url('{{ RvMedia::getImageUrl($shortcode->background_image) }}');" @endif>
    <div class="sustainability-content-container">
        @if ($shortcode->title)
            <h2 class="sustainability-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
        @endif
        @if ($shortcode->description)
            <p class="sustainability-description">{!! BaseHelper::clean($shortcode->description) !!}</p>
        @endif
        @if ($shortcode->button_label && $shortcode->button_url)
            <a href="{{ $shortcode->button_url }}" class="find-out-more-link">
                {{ $shortcode->button_label }}
                <span class="circle-arrow-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </span>
            </a>
        @endif
    </div>
</section>














