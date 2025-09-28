@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section label') }}</label>
        <input class="form-control" name="label" value="{{ Arr::get($attributes, 'label') }}" placeholder="{{ __('Lorem ipsum') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" placeholder="{{ __('Our Policies') }}" />
    </div>
</div>

<hr>

@for ($i = 1; $i <= 4; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Policy card :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="card_title_{{ $i }}" value="{{ Arr::get($attributes, 'card_title_' . $i) }}" placeholder="{{ __('Employees') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Link URL (optional)') }}</label>
                <input class="form-control" name="card_url_{{ $i }}" value="{{ Arr::get($attributes, 'card_url_' . $i) }}" placeholder="https://example.com" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Image') }}</label>
                {!! Form::mediaImage('card_image_' . $i, Arr::get($attributes, 'card_image_' . $i)) !!}
            </div>
        </div>
    </fieldset>
@endfor













