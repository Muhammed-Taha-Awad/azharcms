@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $items = azhar_decode_shortcode_json_attribute($attributes, 'items');

    if (! is_array($items) || empty($items)) {
        $items = collect(range(1, 4))
            ->map(function ($index) use ($attributes) {
                $title = data_get($attributes, "card_title_{$index}");
                $description = data_get($attributes, "card_description_{$index}");
                $icon = data_get($attributes, "card_icon_{$index}");

                if (! $title && ! $description && ! $icon) {
                    return null;
                }

                return [
                    'title' => $title,
                    'description' => $description,
                    'icon' => $icon,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Section label') }}</label>
        <input class="form-control" name="label" value="{{ data_get($attributes, 'label') }}" placeholder="{{ __('Policies') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" placeholder="{{ __('Our sustainability policies') }}" />
    </div>
</div>

<hr>

<div class="azhar-repeater">
    <input type="hidden" name="items" data-azhar-repeater-json="items" value='@json($items)' />
<div data-repeater-list="items">
    @forelse ($items as $item)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Icon') }}</label>
                    <input class="form-control" name="icon" value="{{ data_get($item, 'icon') }}" placeholder="ti ti-leaf" />
                    <small class="form-text text-muted">{{ __('Use a Tabler icon class name.') }}</small>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($item, 'title') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="2">{{ data_get($item, 'description') }}</textarea>
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
                    <label class="form-label">{{ __('Icon') }}</label>
                    <input class="form-control" name="icon" placeholder="ti ti-leaf" />
                    <small class="form-text text-muted">{{ __('Use a Tabler icon class name.') }}</small>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="2"></textarea>
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add policy') }}
    </button>
</div>
</div>










