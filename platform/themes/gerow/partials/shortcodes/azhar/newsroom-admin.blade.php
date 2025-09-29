@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $items = data_get($attributes, 'items');

    if (! is_array($items) || empty($items)) {
        $items = collect(range(1, 3))
            ->map(function ($index) use ($attributes) {
                $title = data_get($attributes, "item_title_{$index}");
                $tag = data_get($attributes, "item_tag_{$index}");
                $date = data_get($attributes, "item_date_{$index}");
                $url = data_get($attributes, "item_url_{$index}");
                $excerpt = data_get($attributes, "item_excerpt_{$index}");
                $image = data_get($attributes, "item_image_{$index}");

                if (! $title && ! $tag && ! $date && ! $url && ! $excerpt && ! $image) {
                    return null;
                }

                return [
                    'title' => $title,
                    'tag' => $tag,
                    'date' => $date,
                    'url' => $url,
                    'excerpt' => $excerpt,
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
        <label class="form-label">{{ __('CTA label') }}</label>
        <input class="form-control" name="cta_label" value="{{ data_get($attributes, 'cta_label') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('CTA URL') }}</label>
        <input class="form-control" name="cta_url" value="{{ data_get($attributes, 'cta_url') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Default item CTA label') }}</label>
        <input class="form-control" name="item_cta_label" value="{{ data_get($attributes, 'item_cta_label', __('Read more')) }}" />
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
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($item, 'title') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Tag / Category') }}</label>
                    <input class="form-control" name="tag" value="{{ data_get($item, 'tag') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Date / Meta') }}</label>
                    <input class="form-control" name="date" value="{{ data_get($item, 'date') }}" placeholder="{{ __('e.g. 12 Sept 2025') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Link URL') }}</label>
                    <input class="form-control" name="url" value="{{ data_get($item, 'url') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Excerpt') }}</label>
                    <textarea class="form-control" name="excerpt" rows="2">{{ data_get($item, 'excerpt') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Image') }}</label>
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
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Tag / Category') }}</label>
                    <input class="form-control" name="tag" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Date / Meta') }}</label>
                    <input class="form-control" name="date" placeholder="{{ __('e.g. 12 Sept 2025') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Link URL') }}</label>
                    <input class="form-control" name="url" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Excerpt') }}</label>
                    <textarea class="form-control" name="excerpt" rows="2"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Image') }}</label>
                    {!! Form::mediaImage('image', null) !!}
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add news item') }}
    </button>
</div>
</div>










