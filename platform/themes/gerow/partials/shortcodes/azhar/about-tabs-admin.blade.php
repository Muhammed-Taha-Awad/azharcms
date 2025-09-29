@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $tabs = data_get($attributes, 'tabs');

    if (! is_array($tabs) || empty($tabs)) {
        $customIds = collect(explode(',', data_get($attributes, 'custom_tab_ids', '')))
            ->map(fn ($value) => trim($value))
            ->filter()
            ->values();

        $tabs = collect(range(1, 6))
            ->map(function ($index) use ($attributes, $customIds) {
                $title = data_get($attributes, "tab_title_{$index}");
                $content = data_get($attributes, "tab_content_{$index}");

                if (! $title && ! $content) {
                    return null;
                }

                return [
                    'title' => $title,
                    'id' => data_get($attributes, "tab_id_{$index}") ?: $customIds->get($index - 1),
                    'content' => $content,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Active tab (number)') }}</label>
        <input class="form-control" type="number" name="active_tab" min="1" value="{{ data_get($attributes, 'active_tab', 1) }}" />
        <small class="form-text text-muted">{{ __('The tab index (starting from 1) that should be active by default.') }}</small>
    </div>
</div>

<hr>

<div class="azhar-repeater">
    <input type="hidden" name="tabs" data-azhar-repeater-json="tabs" value='@json($tabs)' />
<div data-repeater-list="tabs">
    @forelse ($tabs as $tab)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($tab, 'title') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Custom ID') }}</label>
                    <input class="form-control" name="id" value="{{ data_get($tab, 'id') }}" placeholder="tab-slug" />
                    <small class="form-text text-muted">{{ __('Optional. If left blank it will be generated from the title.') }}</small>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Content (HTML allowed)') }}</label>
                    <textarea class="form-control" name="content" rows="6">{{ data_get($tab, 'content') }}</textarea>
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
                    <label class="form-label">{{ __('Custom ID') }}</label>
                    <input class="form-control" name="id" placeholder="tab-slug" />
                    <small class="form-text text-muted">{{ __('Optional. If left blank it will be generated from the title.') }}</small>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Content (HTML allowed)') }}</label>
                    <textarea class="form-control" name="content" rows="6"></textarea>
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add tab') }}
    </button>
</div>
</div>












