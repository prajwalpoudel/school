<!--begin::Item-->
<div class="m-accordion__item">
    <div class="m-accordion__item-head {{ $collapsed }}" role="tab" id="{{ $id }}" data-toggle="collapse" href="{{ '#'.$href }}" aria-expanded="{{$expanded}}">
        @if($icon)
            <span class="m-accordion__item-icon"><i class="{{ $icon }}"></i></span>
        @endif
        <span class="m-accordion__item-title">{{ $title }}</span>
        <span class="m-accordion__item-mode"></span>
    </div>
    <div class="m-accordion__item-body collapse {{$show}}" id="{{ $href }}" role="tabpanel" aria-labelledby="{{ $id }}" data-parent="{{'#'.$parentId}}" style="">
        <div class="m-accordion__item-content">
            {{ $content }}
        </div>
    </div>
</div>
<!--end::Item-->
