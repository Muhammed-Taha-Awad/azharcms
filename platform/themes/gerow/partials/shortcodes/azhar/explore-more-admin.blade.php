<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section subtitle') }}</label>
        <input class="form-control" name="subtitle" value="{{ data_get($attributes, 'subtitle') }}" placeholder="{{ __('About Azhar') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" placeholder="{{ __('Explore More') }}" />
    </div>
</div>

<hr>
<div data-repeater-list="explore_cards">
    @foreach (data_get($attributes, 'explore_cards', []) as $index => $card)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($card, 'title') }}" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('URL') }}</label>
                    <input class="form-control" name="url" value="{{ data_get($card, 'url') }}" placeholder="#" />
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add card') }}
    </button>
</div>














