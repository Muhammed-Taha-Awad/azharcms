@php use Illuminate\Support\Arr; @endphp
@php
    $label = $shortcode->label ?? null;
    $title = $shortcode->title ?? null;
    $cards = collect(range(1, 6))->map(function ($index) use ($shortcode) {
        $category = $shortcode->{"card_category_{$index}"} ?? null;
        $cardTitle = $shortcode->{"card_title_{$index}"} ?? null;
        $description = $shortcode->{"card_description_{$index}"} ?? null;
        $image = $shortcode->{"card_image_{$index}"} ?? null;

        if (! $cardTitle && ! $description && ! $image) {
            return null;
        }

        return (object) [
            'category' => $category,
            'title' => $cardTitle,
            'description' => $description,
            'image' => $image,
        ];
    })->filter();
@endphp

@if ($cards->isNotEmpty())
    <section class="initiatives-section">
        <div class="initiatives-container">
            <div class="initiatives-header">
                <div class="header-text">
                    @if ($label)
                        <p class="section-label">{{ $label }}</p>
                    @endif
                    @if ($title)
                        <h2 class="section-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
                <div class="slider-nav">
                    <button class="initiative-arrow prev-initiative-slide" type="button">&leftarrow;</button>
                    <button class="initiative-arrow next-initiative-slide" type="button">&rightarrow;</button>
                </div>
            </div>
            <div class="initiatives-slider-wrapper">
                <div class="cards-row">
                    @foreach ($cards as $card)
                        <div class="initiative-card">
                            <div class="image-placeholder" @if ($card->image) style="background-image: url('{{ RvMedia::getImageUrl($card->image) }}');" @endif>
                                @if ($card->category)
                                    <p class="card-category">{{ $card->category }}</p>
                                @endif
                            </div>
                            <div class="card-text">
                                @if ($card->title)
                                    <h3 class="card-title">{!! BaseHelper::clean($card->title) !!}</h3>
                                @endif
                                @if ($card->description)
                                    <p class="card-description">{!! BaseHelper::clean($card->description) !!}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif













