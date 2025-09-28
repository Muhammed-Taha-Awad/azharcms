<div class="mb-3 mb-3">
    <label class="form-label" for="content">{{ __('Content') }}</label>
    <input type="text" class="form-control" name="content" value="{{ Arr::get($config, 'content')}}">
</div>

<div class="mb-3 mb-3">
    <label class="form-label" for="detail">{{ __('Detail') }}</label>
    <input type="text" class="form-control" name="detail" value="{{ Arr::get($config, 'detail') }}">
</div>

<div class="mb-3 mb-3">
    <label class="form-label">{{ __('Icon') }}</label>
    {!! Form::themeIcon('icon', Arr::get($config, 'icon')) !!}
</div>
