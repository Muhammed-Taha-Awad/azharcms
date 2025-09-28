@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section label') }}</label>
        <input class="form-control" name="label" value="{{ Arr::get($attributes, 'label') }}" placeholder="{{ __('Our approach') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Quote') }}</label>
        <textarea class="form-control" name="quote" rows="5" placeholder="{{ __('Enter the highlighted quote') }}">{{ Arr::get($attributes, 'quote') }}</textarea>
        <small class="form-text text-muted">{{ __('Use line breaks for multiple paragraphs inside the quote.') }}</small>
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Author name') }}</label>
        <input class="form-control" name="author_name" value="{{ Arr::get($attributes, 'author_name') }}" placeholder="{{ __('Author name') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Author position') }}</label>
        <input class="form-control" name="author_position" value="{{ Arr::get($attributes, 'author_position') }}" placeholder="{{ __('Position or title') }}" />
    </div>
</div>













