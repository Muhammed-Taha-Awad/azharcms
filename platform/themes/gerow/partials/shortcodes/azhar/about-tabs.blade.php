@php use Illuminate\Support\Str; @endphp
@php
    $tabs = collect(azhar_decode_shortcode_json_attribute($shortcode->toArray(), 'tabs') ?? [])
        ->map(function ($tab) {
            return [
                'title' => data_get($tab, 'title'),
                'content' => data_get($tab, 'content'),
                'id' => data_get($tab, 'id'),
            ];
        })
        ->filter(function ($tab) {
            return $tab['title'] || $tab['content'];
        })
        ->values();

    if ($tabs->isEmpty()) {
        $tabs = collect(range(1, 6))
            ->map(function ($index) use ($shortcode) {
                $title = $shortcode->{"tab_title_{$index}"} ?? null;
                $content = $shortcode->{"tab_content_{$index}"} ?? null;
                $id = $shortcode->{"tab_id_{$index}"} ?? null;

                if (! $title && ! $content) {
                    return null;
                }

                return [
                    'title' => $title ?: __('Tab :number', ['number' => $index]),
                    'content' => $content,
                    'id' => $id,
                ];
            })
            ->filter()
            ->values();
    }

    $tabs = $tabs->map(function ($tab, $index) {
        $id = $tab['id'] ?: Str::slug($tab['title'] ?: 'tab-' . ($index + 1));

        return (object) [
            'title' => $tab['title'] ?: __('Tab :number', ['number' => $index + 1]),
            'content' => $tab['content'],
            'id' => $id,
            'index' => $index,
        ];
    });

    $activeIndex = (int) ($shortcode->active_tab ?? 1) - 1;
    if ($activeIndex < 0 || $activeIndex >= $tabs->count()) {
        $activeIndex = 0;
    }
@endphp

@if ($tabs->isNotEmpty())
    <section class="about-tabs-section">
        <div class="about-tabs-container">
            <nav class="tabs-nav">
                <ul class="tabs-list">
                    @foreach ($tabs as $tab)
                        @php $isActive = $tab->index === $activeIndex; @endphp
                        <li>
                            <a class="tab-link {{ $isActive ? 'active-tab' : '' }}" href="#{{ $tab->id }}" data-tab-target="{{ $tab->id }}">
                                {{ $tab->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="tabs-content-wrapper">
            @foreach ($tabs as $tab)
                @php $isActive = $tab->index === $activeIndex; @endphp
                <div id="{{ $tab->id }}" class="tab-content {{ $isActive ? 'active-content' : '' }}">
                    <div class="ck-content">
                        {!! BaseHelper::clean($tab->content) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif

