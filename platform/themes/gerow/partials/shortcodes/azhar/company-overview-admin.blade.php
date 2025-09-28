<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">{{ __('Section title (allow line breaks with <br>)') }}</label>
        <textarea class="form-control" name="title" rows="2">{{ data_get($attributes, 'title') }}</textarea>
    </div>
    <div class="col-md-2">
        <label class="form-label">{{ __('Link label') }}</label>
        <input class="form-control" name="link_label" value="{{ data_get($attributes, 'link_label') }}" />
    </div>
    <div class="col-md-2">
        <label class="form-label">{{ __('Link URL') }}</label>
        <input class="form-control" name="link_url" value="{{ data_get($attributes, 'link_url') }}" />
    </div>
    <div class="col-md-12">
        <label class="form-label">{{ __('Description paragraph 1') }}</label>
        <textarea class="form-control" name="description_1" rows="3">{{ data_get($attributes, 'description_1') }}</textarea>
    </div>
    <div class="col-md-12">
        <label class="form-label">{{ __('Description paragraph 2') }}</label>
        <textarea class="form-control" name="description_2" rows="3">{{ data_get($attributes, 'description_2') }}</textarea>
    </div>
</div>

<hr>

@for ($i = 1; $i <= 4; $i++)
    <div class="row g-3 align-items-end mb-2">
        <div class="col-md-4">
            <label class="form-label">{{ __('Metric value :number', ['number' => $i]) }}</label>
            <input class="form-control" name="metric_value_{{ $i }}" value="{{ data_get($attributes, 'metric_value_' . $i) }}" />
        </div>
        <div class="col-md-8">
            <label class="form-label">{{ __('Metric label :number', ['number' => $i]) }}</label>
            <input class="form-control" name="metric_label_{{ $i }}" value="{{ data_get($attributes, 'metric_label_' . $i) }}" />
        </div>
    </div>
@endfor














