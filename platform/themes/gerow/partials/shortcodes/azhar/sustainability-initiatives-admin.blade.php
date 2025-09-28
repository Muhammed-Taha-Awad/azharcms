@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section label') }}</label>
        <input class="form-control" name="label" value="{{ Arr::get($attributes, 'label') }}" placeholder="{{ __('Our initiatives') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" placeholder="{{ __('Sustainability in action') }}" />
    </div>
</div>

<hr>

@for ($i = 1; $i <= 6; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Initiative :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Category') }}</label>
                <input class="form-control" name="card_category_{{ $i }}" value="{{ Arr::get($attributes, 'card_category_' . $i) }}" placeholder="{{ __('Industry') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="card_title_{{ $i }}" value="{{ Arr::get($attributes, 'card_title_' . $i) }}" placeholder="{{ __('Initiative title') }}" />
            </div>
            <div class="col-12">
                <label class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" name="card_description_{{ $i }}" rows="3" placeholder="{{ __('Brief description') }}">{{ Arr::get($attributes, 'card_description_' . $i) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Image') }}</label>
                {!! Form::mediaImage('card_image_' . $i, Arr::get($attributes, 'card_image_' . $i)) !!}
            </div>
        </div>
    </fieldset>
@endfor













