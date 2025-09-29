@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $filters = data_get($attributes, 'filters');

    if (! is_array($filters) || empty($filters)) {
        $filters = collect(range(1, 4))
            ->map(function ($index) use ($attributes) {
                $label = data_get($attributes, "filter_label_{$index}");
                $value = data_get($attributes, "filter_value_{$index}");

                if (! $label && ! $value) {
                    return null;
                }

                return [
                    'label' => $label,
                    'value' => $value,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }

    $cards = data_get($attributes, 'cards');

    if (! is_array($cards) || empty($cards)) {
        $cards = collect(range(1, 4))
            ->map(function ($index) use ($attributes) {
                $category = data_get($attributes, "card_category_{$index}");
                $title = data_get($attributes, "card_title_{$index}");
                $description = data_get($attributes, "card_description_{$index}");
                $linkLabel = data_get($attributes, "card_link_label_{$index}");
                $linkUrl = data_get($attributes, "card_link_url_{$index}");
                $image = data_get($attributes, "card_image_{$index}");

                if (! $category && ! $title && ! $description && ! $linkLabel && ! $linkUrl && ! $image) {
                    return null;
                }

                return [
                    'category' => $category,
                    'title' => $title,
                    'description' => $description,
                    'link_label' => $linkLabel,
                    'link_url' => $linkUrl,
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
        <label class="form-label">{{ __('Default filter label') }}</label>
        <input class="form-control" name="filter_default_label" value="{{ data_get($attributes, 'filter_default_label', __('ALL INDUSTRIES')) }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Background image') }}</label>
        {!! Form::mediaImage('background_image', data_get($attributes, 'background_image')) !!}
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Button label') }}</label>
        <input class="form-control" name="button_label" value="{{ data_get($attributes, 'button_label') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Button URL') }}</label>
        <input class="form-control" name="button_url" value="{{ data_get($attributes, 'button_url') }}" />
    </div>
</div>

<hr>

<h5>{{ __('Filters') }}</h5>
<div class="azhar-repeater">
    <input type="hidden" name="filters" data-azhar-repeater-json="filters" value='@json($filters)' />
<div data-repeater-list="filters">
    @forelse ($filters as $filter)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Label') }}</label>
                    <input class="form-control" name="label" value="{{ data_get($filter, 'label') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Value (optional)') }}</label>
                    <input class="form-control" name="value" value="{{ data_get($filter, 'value') }}" placeholder="industrial" />
                    <small class="form-text text-muted">{{ __('Used for filtering logic if needed.') }}</small>
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
                    <label class="form-label">{{ __('Label') }}</label>
                    <input class="form-control" name="label" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Value (optional)') }}</label>
                    <input class="form-control" name="value" placeholder="industrial" />
                </div>
            </div>
        </div>
    @endforelse
</div>
<div class="mt-3 mb-4">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add filter') }}
    </button>
</div>

<hr>

<h5>{{ __('Portfolio cards') }}</h5>
<div data-repeater-list="cards">
    @forelse ($cards as $index => $card)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="fw-medium">{{ __('Card #:number', ['number' => $index + 1]) }}</span>
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Category') }}</label>
                    <input class="form-control" name="category" value="{{ data_get($card, 'category') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($card, 'title') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="3">{{ data_get($card, 'description') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Link label') }}</label>
                    <input class="form-control" name="link_label" value="{{ data_get($card, 'link_label') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Link URL') }}</label>
                    <input class="form-control" name="link_url" value="{{ data_get($card, 'link_url') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Image') }}</label>
                    {!! Form::mediaImage('image', data_get($card, 'image'), ['value' => data_get($card, 'image')]) !!}
                </div>
            </div>
            @if ($index === 0)
                <p class="text-muted small mt-2">{{ __('The first card is displayed as the featured item with image on the right and CTA button.') }}</p>
            @endif
        </div>
    @empty
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="fw-medium">{{ __('Card #1') }}</span>
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Category') }}</label>
                    <input class="form-control" name="category" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Link label') }}</label>
                    <input class="form-control" name="link_label" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Link URL') }}</label>
                    <input class="form-control" name="link_url" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Image') }}</label>
                    {!! Form::mediaImage('image', null) !!}
                </div>
            </div>
            <p class="text-muted small mt-2">{{ __('The first card is displayed as the featured item with image on the right and CTA button.') }}</p>
        </div>
    @endforelse
</div>
<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add portfolio card') }}
    </button>
</div>
</div>














