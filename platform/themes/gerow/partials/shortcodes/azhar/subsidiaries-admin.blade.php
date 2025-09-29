@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $headerLinks = data_get($attributes, 'header_links');

    if (! is_array($headerLinks) || empty($headerLinks)) {
        $headerLinks = collect(range(1, 3))
            ->map(function ($index) use ($attributes) {
                $label = data_get($attributes, "header_link_label_{$index}");
                $url = data_get($attributes, "header_link_url_{$index}");

                if (! $label && ! $url) {
                    return null;
                }

                return [
                    'label' => $label,
                    'url' => $url,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }

    $items = data_get($attributes, 'items');

    if (! is_array($items) || empty($items)) {
        $items = collect(range(1, 6))
            ->map(function ($index) use ($attributes) {
                $category = data_get($attributes, "item_category_{$index}");
                $image = data_get($attributes, "item_image_{$index}");

                if (! $category && ! $image) {
                    return null;
                }

                return [
                    'category' => $category,
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
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" />
    </div>
</div>

<hr>

<h5>{{ __('Header links') }}</h5>
<div class="azhar-repeater">
    <input type="hidden" name="header_links" data-azhar-repeater-json="header_links" value='@json($headerLinks)' />
<div data-repeater-list="header_links">
    @forelse ($headerLinks as $link)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Label') }}</label>
                    <input class="form-control" name="label" value="{{ data_get($link, 'label') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('URL') }}</label>
                    <input class="form-control" name="url" value="{{ data_get($link, 'url') }}" />
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
                    <label class="form-label">{{ __('URL') }}</label>
                    <input class="form-control" name="url" />
                </div>
            </div>
        </div>
    @endforelse
</div>
<div class="mt-3 mb-4">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add header link') }}
    </button>
</div>

<hr>

<h5>{{ __('Subsidiary items') }}</h5>
<div data-repeater-list="items">
    @forelse ($items as $item)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Category / label') }}</label>
                    <input class="form-control" name="category" value="{{ data_get($item, 'category') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Logo image') }}</label>
                    {!! Form::mediaImage('image', data_get($item, 'image'), ['value' => data_get($item, 'image')]) !!}
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
                    <label class="form-label">{{ __('Category / label') }}</label>
                    <input class="form-control" name="category" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Logo image') }}</label>
                    {!! Form::mediaImage('image', null) !!}
                </div>
            </div>
        </div>
    @endforelse
</div>
<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add subsidiary') }}
    </button>
</div>
</div>














