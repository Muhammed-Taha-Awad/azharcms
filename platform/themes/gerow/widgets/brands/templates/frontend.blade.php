<div class="brand-area-seven">
    <div class="container">
        <div class="row brand-active">
            @foreach($items as $item)
                @if(isset($item['logo']))
                    <div class="col-lg-12">
                        <div class="brand-item">
                            {{ RvMedia::image($item['logo'], $item['name']) }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
