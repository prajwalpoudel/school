<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
{{--            <h3 class="m-subheader__title m-subheader__title--separator">{{ $loop->first  }}</h3>--}}
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
            @foreach($breadcrumbs  as $breadcrumb)
                @if(!$loop->first)
                        <li class="m-nav__separator">/</li>
                    @else
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ $breadcrumb->url }}" class="m-nav__link m-nav__link--icon">
                                <i class="{{ $breadcrumb->icon ?? '' }}"></i>
                            </a>
                        </li>
                    @endif
                    @if(!$loop->last)
                        @if(!$loop->first)
                            <li class="m-nav__item">
                                <a href="{{ $breadcrumb->url }}" class="m-nav__link">
                                    <span class="m-nav__link-text">{{ $breadcrumb->title }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        @if(!$loop->first)
                        <li class="m-nav__item">
                            <span class="m-nav__link-text">{{ $breadcrumb->title }}</span>
                        </li>
                            @endif
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
