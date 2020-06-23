<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
        class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav ">
            @foreach($sidebar_menus as $menu)
                @if(!$menu->children->count())
                    <li class="m-menu__item  {{ $menu->active_class }}" aria-haspopup="true">
                        <a href="{{ route($menu->route) }}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="{{ $menu->icon }}"></i>
                            <span class="m-menu__link-text">{{ $menu->name }}</span>
                        </a>
                    </li>
                @else
                    <li class="m-menu__item  m-menu__item--submenu {{ $menu->active_parent_class }}" aria-haspopup="true" m-menu-submenu-toggle="hover"
                        m-menu-link-redirect="1">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <span class="m-menu__item-here"></span>
                            <i class="{{ $menu->icon }}"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">{{ $menu->name }}</span>
{{--                                    <span class="m-menu__link-badge">--}}
{{--                                        <span class="m-badge m-badge--accent">3</span>--}}
{{--                                    </span>--}}
                                </span>
                            </span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item  m-menu__item--parent {{ $menu->active_parent_class }}" aria-haspopup="true" m-menu-link-redirect="1">
                                    <span class="m-menu__link">
                                        <span class="m-menu__item-here">
                                        </span>
                                        <span class="m-menu__link-title">
                                            <span class="m-menu__link-wrap">
                                                <span class="m-menu__link-text">{{ $menu->name }}</span>
{{--                                                    <span class="m-menu__link-badge">--}}
{{--                                                        <span class="m-badge m-badge--accent">3</span>--}}
{{--                                                    </span>--}}
                                            </span>
                                        </span>
                                    </span>
                                </li>
                                @foreach($menu->children as $child)
                                    @if(!$child->children->count())
                                        <li class="m-menu__item {{ $child->active_class }}" aria-haspopup="true" m-menu-link-redirect="1">
                                            <a href="{{ route($child->route) }}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">{{ $child->name }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="m-menu__item  m-menu__item--submenu {{ $menu->active_parent_class }}" aria-haspopup="true"
                                            m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">{{ $child->name }}</span>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                                <ul class="m-menu__subnav">
                                                    @foreach($child->children as $children)
                                                        <li class="m-menu__item {{ $children->active_class }}" aria-haspopup="true"
                                                            m-menu-link-redirect="1">
                                                            <a href="{{ route($children->route) }}" class="m-menu__link ">
                                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="m-menu__link-text">{{ $children->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>
