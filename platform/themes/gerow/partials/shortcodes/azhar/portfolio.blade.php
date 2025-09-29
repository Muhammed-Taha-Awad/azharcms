@php use Illuminate\Support\Str; @endphp
@php
    $filters = collect(data_get($shortcode, 'filters', []))
        ->map(function ($filter) {
            $label = data_get($filter, 'label');
            $value = data_get($filter, 'value');

            if (! $label) {
                return null;
            }

            return (object) [
                'label' => $label,
                'value' => $value ?: Str::slug($label),
            ];
        })
        ->filter();

    if ($filters->isEmpty()) {
        $filters = collect(range(1, 4))->map(function ($index) use ($shortcode) {
            $label = $shortcode->{"filter_label_{$index}"} ?? null;
            $value = $shortcode->{"filter_value_{$index}"} ?? null;

            if (! $label) {
                return null;
            }

            return (object) [
                'label' => $label,
                'value' => $value ?: Str::slug($label),
            ];
        })->filter();
    }

    $cards = collect(data_get($shortcode, 'cards', []))
        ->map(function ($card) {
            return (object) [
                'category' => data_get($card, 'category'),
                'title' => data_get($card, 'title'),
                'description' => data_get($card, 'description'),
                'image' => data_get($card, 'image'),
                'link_label' => data_get($card, 'link_label'),
                'link_url' => data_get($card, 'link_url'),
            ];
        })
        ->filter(function ($card) {
            return $card->title || $card->description || $card->image;
        });

    if ($cards->isEmpty()) {
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
            ];
        })->filter();
    }
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
                    @php $isFeatured = $loop->first; @endphp
                    <div class="portfolio-card {{ $isFeatured ? 'featured-card' : 'dark-card' }}">
                        @if ($isFeatured)
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

