<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section label') }}</label>
        <input class="form-control" name="label" value="{{ data_get($attributes, 'label') }}" placeholder="{{ __('Our ESG Strategy') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" placeholder="{{ __('Describe the headline for this section') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Description (one paragraph per line)') }}</label>
        <textarea class="form-control" name="description" rows="6" placeholder="{{ __('Enter each paragraph on a new line') }}">{{ data_get($attributes, 'description') }}</textarea>
        <small class="form-text text-muted">{{ __('Line breaks will be converted into individual paragraphs on the frontend.') }}</small>
    </div>
</div>














