<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('/') }}" class="brand-link">
        {{--        <img src="{{asset("logo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">{{ $info->name }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item  {{ in_array(request()->route()->getName(), ['/']) ? 'menu-open' : '' }}">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.Home')
                        </p>
                    </a>
                </li>
                @permission('roles-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['roles.index', 'roles.create', 'roles.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.roles_and_permissions')
                            </p>
                        </a>
                    </li>
                @endpermission

                @permission('users-read')
                    <li
                        class="nav-item has-treeview {{ in_array(request()->route()->getName(), ['admins.index', 'admins.edit', 'admins.create', 'admins.show']) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.Staff')
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($sidebar_roles as $key => $value)
                                <li class="nav-item">
                                    <a href="{{ route('admins.index', $key) }}"
                                        class="nav-link {{ request()->route()->parameter('role') == $key ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $value }}</p>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                @endpermission

                @permission('categories-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['categories.index', 'categories.create', 'categories.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.categories')
                            </p>
                        </a>
                    </li>
                @endpermission

                @permission('doctors-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['doctors.index', 'doctors.create', 'doctors.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('doctors.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.doctors')
                            </p>
                        </a>
                    </li>
                @endpermission

                @permission('offers-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['offers.index', 'offers.create', 'offers.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('offers.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.offers')
                            </p>
                        </a>
                    </li>
                @endpermission
                @permission('subscriptions-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['subscriptions.index', 'subscriptions.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('subscriptions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.subscriptions')
                            </p>
                        </a>
                    </li>
                @endpermission
                @permission('blogs-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['blogs.index', 'blogs.create', 'blogs.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('blogs.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.blogs')
                            </p>
                        </a>
                    </li>
                @endpermission
                @permission('activities-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['activities.index', 'activities.create', 'activities.edit']) ? 'menu-open' : '' }}">
                        <a href="{{ route('activities.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.activities')
                            </p>
                        </a>
                    </li>
                @endpermission


                @permission('contacts-read')
                    <li
                        class="nav-item {{ in_array(request()->route()->getName(), ['contacts.index', 'contacts.show']) ? 'menu-open' : '' }}">
                        <a href="{{ route('contacts.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>@lang('dashboard.contacts')</p>
                        </a>
                    </li>
                @endpermission


                @permission('employment_applications-read')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['employment_applications.index', 'positions.index']) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.employment_applications')
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @permission('positions-read')
                                <li
                                    class="nav-item  {{ in_array(request()->route()->getName(), ['positions.index', 'positions.create', 'positions.edit']) ? 'menu-open' : '' }}">
                                    <a href="{{ route('positions.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>
                                            @lang('dashboard.positions')
                                        </p>
                                    </a>
                                </li>
                            @endpermission
                            @permission('employment_applications-read')
                                <li
                                    class="nav-item {{ in_array(request()->route()->getName(), ['employment_applications.index', 'employment_applications.show']) ? 'menu-open' : '' }}">
                                    <a href="{{ route('employment_applications.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>@lang('dashboard.employment_application')</p>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission


                @permission('settings-update')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(), ['home-content.index', 'faqs-content.index', 'privacy-policy-content.index', 'about-content.index', 'contact-content.index']) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.info_control')
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('site_info.edit') }}"
                                    class="nav-link {{ in_array(request()->route()->getName(), ['site_info.index']) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.site_info')</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sliders.index') }}"
                                    class="nav-link {{ in_array(request()->route()->getName(), ['sliders.index']) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.sliders')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endpermission

                {{-- @permission('structures-update')
                    <li
                        class="nav-item  {{ in_array(request()->route()->getName(),['home-content.index','faqs-content.index','privacy-policy-content.index', 'about-content.index', 'contact-content.index'])? 'menu-open': '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                @lang('dashboard.info_control')
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('home-content.index') }}"
                                    class="nav-link {{ in_array(request()->route()->getName(),['home-content.index'])? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.home_page')</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about-content.index') }}"
                                    class="nav-link {{ in_array(request()->route()->getName(),['about-content.index'])? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.about_page')</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact-content.index') }}"
                                    class="nav-link {{ in_array(request()->route()->getName(),['contact-content.index'])? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.contact_page')</p>
                                </a>
                            </li>
                            <li
                                class="nav-item">
                                <a href="{{ route('faqs-content.index') }}" class="nav-link {{ in_array(request()->route()->getName(),['faqs-content.index'])? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.faqs')</p>
                                </a>
                            </li>
                            <li
                                class="nav-item">
                                <a href="{{ route('privacy-policy-content.index') }}" class="nav-link {{ in_array(request()->route()->getName(),['privacy-policy-content.index'])? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('dashboard.privacyPolicy')</p>
                                </a>
                            </li>
                          </ul>
                @endpermission --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
