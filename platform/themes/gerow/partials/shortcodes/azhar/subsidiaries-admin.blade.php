@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" />
    </div>
</div>

<hr>

@for ($i = 1; $i <= 3; $i++)
    <div class="row g-3 mb-2">
        <div class="col-md-6">
            <label class="form-label">{{ __('Header link :number label', ['number' => $i]) }}</label>
            <input class="form-control" name="header_link_label_{{ $i }}" value="{{ Arr::get($attributes, 'header_link_label_' . $i) }}" />
        </div>
        <div class="col-md-6">
            <label class="form-label">{{ __('Header link :number URL', ['number' => $i]) }}</label>
            <input class="form-control" name="header_link_url_{{ $i }}" value="{{ Arr::get($attributes, 'header_link_url_' . $i) }}" />
        </div>
    </div>
@endfor

<hr>

@for ($i = 1; $i <= 6; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Subsidiary :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Category / label') }}</label>
                <input class="form-control" name="item_category_{{ $i }}" value="{{ Arr::get($attributes, 'item_category_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Logo image') }}</label>
                {!! Form::mediaImage('item_image_' . $i, Arr::get($attributes, 'item_image_' . $i)) !!}
            </div>
        </div>
    </fieldset>
@endfor













