<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
{{--        @include('particles._user_box')--}}
        <!-- User box bitdi-->


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">@lang('navigation')</li>
                <li>
                    <a href="{{ route('manager.home') }}">
                        <i data-feather="airplay"></i>
                        <span> @lang('dashboard') </span>
                    </a>
                </li>
                <li class="menu-title">@lang('content_management')</li>









                <li class="menu-title mt-2">@lang('settings')</li>
{{--                <li class="{{ menu_active('manager.language.*') }}">--}}
{{--                    <a href="">--}}
{{--                        <i data-feather="globe"></i>--}}
{{--                        <span> @lang('languages') </span>--}}
{{--                    </a>--}}
{{--                </li>--}}


                <li class="{{ menu_active('manager.user.*', 'manager.role.*') }}">
                    <a href="#sidebarUsers" data-toggle="collapse" class aria-expanded="true">
                        <i data-feather="users"></i>
                        <span> @lang('users') </span>
                    </a>
                    <div class="collapse {{ (menu_active('manager.user.*', 'manager.role.*')) == 'menuitem-active' ? 'show' : '' }}" id="sidebarUsers">
                        <ul class="nav-second-level">
                            <li class="{{ menu_active('manager.user.*') }}">
                                <a href="{{ route('manager.user.index') }}">@lang('users')</a>
                            </li>
                            <li class="{{ menu_active('manager.role.*') }}">
                                <a href="{{ route('manager.role.index') }}">@lang('roles')</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="{{ menu_active('manager.setting.*') }}">
                    <a href="#sidebarSetting" data-toggle="collapse" class aria-expanded="true">
                        <i data-feather="settings"></i>
                        <span class="badge badge-info float-right">Hot</span>
                        <span> @lang('settings') </span>
                    </a>
                    <div class="collapse {{ (menu_active('manager.setting.*','manager.sip.*')) == 'menuitem-active' ? 'show' : '' }}" id="sidebarSetting">
                        <ul class="nav-second-level">

                            <li class="{{ menu_active('manager.setting.general') }}">
                                <a href="{{ route('manager.setting.general') }}">@lang('general_settings')</a>
                            </li>
                            <li class="{{ menu_active('manager.setting.visual') }}">
                                <a href="{{ route('manager.setting.visual') }}">@lang('visual_settings')</a>
                            </li>
{{--                            <li class="{{ menu_active('manager.sip.*') }}">--}}
{{--                                <a href="#">@lang('cm.sip')</a>--}}
{{--                            </li>--}}

                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
