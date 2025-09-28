@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('CTA label') }}</label>
        <input class="form-control" name="cta_label" value="{{ Arr::get($attributes, 'cta_label') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('CTA URL') }}</label>
        <input class="form-control" name="cta_url" value="{{ Arr::get($attributes, 'cta_url') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Default item CTA label') }}</label>
        <input class="form-control" name="item_cta_label" value="{{ Arr::get($attributes, 'item_cta_label') }}" placeholder="{{ __('Read more') }}" />
    </div>
</div>

<hr>

@for ($i = 1; $i <= 3; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('News item :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="item_title_{{ $i }}" value="{{ Arr::get($attributes, 'item_title_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Tag / Category') }}</label>
                <input class="form-control" name="item_tag_{{ $i }}" value="{{ Arr::get($attributes, 'item_tag_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Date / Meta') }}</label>
                <input class="form-control" name="item_date_{{ $i }}" value="{{ Arr::get($attributes, 'item_date_' . $i) }}" placeholder="{{ __('e.g. 12 Sept 2025') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Link URL') }}</label>
                <input class="form-control" name="item_url_{{ $i }}" value="{{ Arr::get($attributes, 'item_url_' . $i) }}" />
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Excerpt') }}</label>
                <textarea class="form-control" name="item_excerpt_{{ $i }}" rows="2">{{ Arr::get($attributes, 'item_excerpt_' . $i) }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Image') }}</label>
                {!! Form::mediaImage('item_image_' . $i, Arr::get($attributes, 'item_image_' . $i)) !!}
            </div>
        </div>
    </fieldset>
@endfor













