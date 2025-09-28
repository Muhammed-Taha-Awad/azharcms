<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Active tab (number)') }}</label>
        <input class="form-control" type="number" name="active_tab" min="1" value="{{ data_get($attributes, 'active_tab', 1) }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Custom tab IDs (optional, comma separated)') }}</label>
        <input class="form-control" name="custom_tab_ids" value="{{ data_get($attributes, 'custom_tab_ids') }}" placeholder="overview,mission,leadership" />
        <small class="form-text text-muted">{{ __('If provided, the IDs will be assigned in order to match anchor links.') }}</small>
    </div>
</div>

<hr>

@php
    $customIds = collect(explode(',', data_get($attributes, 'custom_tab_ids', '')))
        ->map(fn ($value) => trim($value))
        ->filter()
        ->values();
@endphp

@for ($i = 1; $i <= 6; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Tab :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="tab_title_{{ $i }}" value="{{ data_get($attributes, 'tab_title_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Custom ID') }}</label>
                @php
                    $defaultId = $customIds->get($i - 1);
                @endphp
                <input class="form-control" name="tab_id_{{ $i }}" value="{{ data_get($attributes, 'tab_id_' . $i, $defaultId) }}" placeholder="tab-{{ $i }}" />
            </div>
            <div class="col-12">
                <label class="form-label">{{ __('Content (HTML allowed)') }}</label>
                <textarea class="form-control" name="tab_content_{{ $i }}" rows="6">{{ data_get($attributes, 'tab_content_' . $i) }}</textarea>
                <small class="form-text text-muted">{{ __('You can include other shortcodes here if needed.') }}</small>
            </div>
        </div>
    </fieldset>
@endfor














