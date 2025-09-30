@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $cards = azhar_decode_shortcode_json_attribute($attributes, 'cards');

    if (! is_array($cards) || empty($cards)) {
        $cards = collect(range(1, 6))
            ->map(function ($index) use ($attributes) {
                $title = data_get($attributes, "card_title_{$index}");
                $description = data_get($attributes, "card_description_{$index}");
                $image = data_get($attributes, "card_image_{$index}");

                if (! $title && ! $description && ! $image) {
                    return null;
                }

                return [
                    'title' => $title,
                    'description' => $description,
                    'image' => $image,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Section description') }}</label>
        <input class="form-control" name="description" value="{{ data_get($attributes, 'description') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('CTA label') }}</label>
        <input class="form-control" name="cta_label" value="{{ data_get($attributes, 'cta_label') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('CTA URL') }}</label>
        <input class="form-control" name="cta_url" value="{{ data_get($attributes, 'cta_url') }}" />
    </div>
</div>

<hr>

<div class="azhar-repeater">
    <input type="hidden" name="cards" data-azhar-repeater-json="cards" value='@json($cards)' />
<div data-repeater-list="cards">
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
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="2">{{ data_get($card, 'description') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Background image') }}</label>
                    {!! Form::mediaImage('image', data_get($card, 'image'), ['value' => data_get($card, 'image')]) !!}
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
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="2"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Background image') }}</label>
                    {!! Form::mediaImage('image', null) !!}
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add sector card') }}
    </button>
</div>
</div>










