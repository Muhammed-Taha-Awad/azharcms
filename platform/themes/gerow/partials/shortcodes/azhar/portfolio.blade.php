@php
    $filters = collect(range(1, 4))->map(function ($index) use ($shortcode) {
        $label = $shortcode->{"filter_label_{$index}"} ?? null;
        $value = $shortcode->{"filter_value_{$index}"} ?? null;

        if (! $label) {
            return null;
        }

        return (object) [
            'label' => $label,
            'value' => $value ?: \Illuminate.Support\\\Illuminate\\Support\\Str::slug($label),
        ];
    })->filter();

    $cards = collect(range(1, 4))->map(function ($index) use ($shortcode) {
        $category = $shortcode->{"card_category_{$index}"} ?? null;
        $title = $shortcode->{"card_title_{$index}"} ?? null;
        $description = $shortcode->{"card_description_{$index}"} ?? null;
        $image = $shortcode->{"card_image_{$index}"} ?? null;
        $linkLabel = $shortcode->{"card_link_label_{$index}"} ?? null;
        $linkUrl = $shortcode->{"card_link_url_{$index}"} ?? null;

        if (! $title && ! $description && ! $image) {
            return null;
        }

        return (object) [
            'category' => $category,
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'link_label' => $linkLabel,
            'link_url' => $linkUrl,
            'variant' => $index === 1 ? 'featured' : 'dark',
        ];
    })->filter();
@endphp

@if ($cards->isNotEmpty())
    <section class="portfolio-section" @if ($shortcode->background_image) style="background-image: url('{{ RvMedia::getImageUrl($shortcode->background_image) }}');" @endif>
        <div class="portfolio-container">
            <div class="portfolio-header">
                @if ($shortcode->title)
                    <h2 class="portfolio-title">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                @endif
                <div class="filter-dropdown">
                    <select name="industries" id="industries-filter">
                        @if ($shortcode->filter_default_label)
                            <option value="all">{{ $shortcode->filter_default_label }}</option>
                        @endif
                        @foreach ($filters as $filter)
                            <option value="{{ $filter->value }}">{{ $filter->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="portfolio-cards-row">
                @foreach ($cards as $card)
                    <div class="portfolio-card @if ($card->variant === 'featured') featured-card @else dark-card @endif">
                        @if ($card->variant === 'featured')
                            <div class="card-content">
                                @if ($card->category)
                                    <p class="card-category">{{ $card->category }}</p>
                                @endif
                                @if ($card->title)
                                    <h3 class="card-title">{!! BaseHelper::clean($card->title) !!}</h3>
                                @endif
                                @if ($card->description)
                                    <p class="card-description">{!! BaseHelper::clean($card->description) !!}</p>
                                @endif
                                @if ($card->link_label && $card->link_url)
                                    <a href="{{ $card->link_url }}" class="view-details-link">
                                        {{ $card->link_label }}
                                        <span class="arrow-icon">&#8594;</span>
                                    </a>
                                @endif
                            </div>
                            <div class="card-image-wrapper">
                                @if ($card->image)
                                    <img src="{{ RvMedia::getImageUrl($card->image) }}" alt="{{ $card->title }}">
                                @endif
                            </div>
                        @else
                            @if ($card->image)
                                <div class="card-image-wrapper">
                                    <img src="{{ RvMedia::getImageUrl($card->image) }}" alt="{{ $card->title }}">
                                </div>
                            @endif
                            <div class="card-content">
                                @if ($card->category)
                                    <p class="card-category">{{ $card->category }}</p>
                                @endif
                                @if ($card->title)
                                    <h3 class="card-title">{!! BaseHelper::clean($card->title) !!}</h3>
                                @endif
                                @if ($card->description)
                                    <p class="card-description">{!! BaseHelper::clean($card->description) !!}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            @if ($shortcode->button_label && $shortcode->button_url)
                <a href="{{ $shortcode->button_url }}" class="view-portfolio-btn">{{ $shortcode->button_label }}</a>
            @endif
        </div>
    </section>
@endif



















