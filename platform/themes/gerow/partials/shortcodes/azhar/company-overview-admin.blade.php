@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $metrics = data_get($attributes, 'metrics');

    if (! is_array($metrics) || empty($metrics)) {
        $metrics = collect(range(1, 4))
            ->map(function ($index) use ($attributes) {
                $value = data_get($attributes, "metric_value_{$index}");
                $label = data_get($attributes, "metric_label_{$index}");

                if (! $value && ! $label) {
                    return null;
                }

                return [
                    'value' => $value,
                    'label' => $label,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Section title (allow line breaks with <br>)') }}</label>
        <textarea class="form-control" name="title" rows="2">{{ data_get($attributes, 'title') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Link label') }}</label>
        <input class="form-control" name="link_label" value="{{ data_get($attributes, 'link_label') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Link URL') }}</label>
        <input class="form-control" name="link_url" value="{{ data_get($attributes, 'link_url') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Description paragraph 1') }}</label>
        <textarea class="form-control" name="description_1" rows="3">{{ data_get($attributes, 'description_1') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Description paragraph 2') }}</label>
        <textarea class="form-control" name="description_2" rows="3">{{ data_get($attributes, 'description_2') }}</textarea>
    </div>
</div>

<hr>

<div class="azhar-repeater">
    <input type="hidden" name="metrics" data-azhar-repeater-json="metrics" value='@json($metrics)' />
<div data-repeater-list="metrics">
    @forelse ($metrics as $metric)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Metric value') }}</label>
                    <input class="form-control" name="value" value="{{ data_get($metric, 'value') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Metric label') }}</label>
                    <input class="form-control" name="label" value="{{ data_get($metric, 'label') }}" />
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
                    <label class="form-label">{{ __('Metric value') }}</label>
                    <input class="form-control" name="value" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Metric label') }}</label>
                    <input class="form-control" name="label" />
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add metric') }}
    </button>
</div>
</div>










