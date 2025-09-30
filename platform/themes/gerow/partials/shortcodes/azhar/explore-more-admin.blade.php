@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $cards = azhar_decode_shortcode_json_attribute($attributes, 'explore_cards');

    if (! is_array($cards) || empty($cards)) {
        $cards = collect(range(1, 6))
            ->map(function ($index) use ($attributes) {
                $title = data_get($attributes, "card_title_{$index}");
                $url = data_get($attributes, "card_url_{$index}");

                if (! $title && ! $url) {
                    return null;
                }

                return [
                    'title' => $title,
                    'url' => $url,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Section subtitle') }}</label>
        <input class="form-control" name="subtitle" value="{{ data_get($attributes, 'subtitle') }}" placeholder="{{ __('About Azhar') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" placeholder="{{ __('Explore More') }}" />
    </div>
</div>

<hr>
<div class="azhar-repeater">
    <input type="hidden" name="explore_cards" data-azhar-repeater-json="explore_cards" value='@json($cards)' />
<div data-repeater-list="explore_cards">
    @forelse ($cards as $card)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($card, 'title') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('URL') }}</label>
                    <input class="form-control" name="url" value="{{ data_get($card, 'url') }}" placeholder="#" />
                </div>
            </div>
        </div>
    @empty
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('URL') }}</label>
                    <input class="form-control" name="url" placeholder="#" />
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add card') }}
    </button>
</div>
</div>











