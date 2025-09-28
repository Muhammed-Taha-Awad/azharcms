@php
    $description = collect([
        $shortcode->description_1 ?? null,
        $shortcode->description_2 ?? null,
    ])->filter();

    $metrics = collect(range(1, 4))->map(function ($index) use ($shortcode) {
        $value = $shortcode->{"metric_value_{$index}"} ?? null;
        $label = $shortcode->{"metric_label_{$index}"} ?? null;

        if (! $value && ! $label) {
            return null;
        }

        return (object) [
            'value' => $value,
            'label' => $label,
        ];
    })->filter();
@endphp

<section class="company-overview-section">
    <div class="overview-container">
        <div class="overview-left">
            @if ($shortcode->title)
                <h2 class="section-title">{!! BaseHelper::clean($shortcode->title) !!}
                    @if ($shortcode->link_url && $shortcode->link_label)
                        <a href="{{ $shortcode->link_url }}" class="more-about-link">{{ $shortcode->link_label }} <span class="arrow-icon">&#8594;</span></a>
                    @endif
                </h2>
            @endif
        </div>
        <div class="overview-right">
            @foreach ($description as $paragraph)
                <p>{!! BaseHelper::clean($paragraph) !!}</p>
            @endforeach
            @if ($metrics->isNotEmpty())
                <div class="metrics-row">
                    @foreach ($metrics as $metric)
                        <div class="metric-item">
                            <h3 class="metric-number">{!! BaseHelper::clean($metric->value) !!}</h3>
                            <p class="metric-description">{!! BaseHelper::clean($metric->label) !!}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
