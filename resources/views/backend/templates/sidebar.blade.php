@php
    $permissions = [];
    if(Auth::user() && Auth::user()->id){
        $RolePermission =  Helper::getPermissions(Auth::user()->id);
        if($RolePermission && !empty($RolePermission['permission'])){
            $permissions = $RolePermission['permission'];
        }
    }else{
        $RolePermission = [];
    }

@endphp
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="javascript:void(0);" class="site_title"><i class="fa fa-paw"></i> <span>WellFit360</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{ asset('backend/images/img.jpg') }}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{ (Auth::user()) ? (Auth::user()->name).' '.(Auth::user()->sur_name) : '' }}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li class="{{ (request()->is('dashboard'))? 'active': ''  }}"><a><i class="fa fa-home"></i>@lang('backend/sidebar.home') <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="{{ (request()->is('dashboard'))? 'current-page': ''  }}"><a href="{{ route('dashboard') }}">@lang('backend/sidebar.administrator')</a></li>
              </ul>
            </li>
            {{--  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="form.html">General Form</a></li>
                <li><a href="form_advanced.html">Advanced Components</a></li>
                <li><a href="form_validation.html">Form Validation</a></li>
                <li><a href="form_wizards.html">Form Wizard</a></li>
                <li><a href="form_upload.html">Form Upload</a></li>
                <li><a href="form_buttons.html">Form Buttons</a></li>
              </ul>
            </li>  --}}
            {{--  <li>
                <a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="general_elements.html">General Elements</a></li>
                    <li><a href="media_gallery.html">Media Gallery</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="glyphicons.html">Glyphicons</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                </ul>
            </li>  --}}
            {{--  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tables.html">Tables</a></li>
                <li><a href="tables_dynamic.html">Table Dynamic</a></li>
              </ul>
            </li>  --}}
            {{--  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="chartjs.html">Chart JS</a></li>
                <li><a href="chartjs2.html">Chart JS2</a></li>
                <li><a href="morisjs.html">Moris JS</a></li>
                <li><a href="echarts.html">ECharts</a></li>
                <li><a href="other_charts.html">Other Charts</a></li>
              </ul>
            </li>  --}}
            {{--  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                <li><a href="fixed_footer.html">Fixed Footer</a></li>
              </ul>
            </li>  --}}
          </ul>
                <ul class="nav side-menu">
                    @if(!empty($permissions) && in_array("all_module", $permissions) || in_array("all_rolespermission", $permissions))
                    <li class="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit')))) ||
                                (request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit')) )) ? 'active': ''  }}">
                        <a><i class="fa fa-home"></i>
                            @lang('backend/sidebar.administrator')
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit'))))
                            || (request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit'))))? 'display:block': ''  }}">
                            @if(!empty($permissions) && in_array("all_module", $permissions))
                            <li class="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit')) ))? 'current-page': ''  }}">
                                <a href="{{ route('module.index') }}">@lang('backend/sidebar.modules')</a>
                            </li>
                            @endif
                            @if(!empty($permissions) && in_array("all_rolespermission", $permissions))
                            <li class="{{ (request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit')) ))? 'current-page': ''  }}">
                                <a href="{{ route('rolepermission.index') }}">@lang('backend/sidebar.roles_permission')</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    {{--  Trainner Management  --}}
                    @if(!empty($permissions) && in_array("all_trainer_management", $permissions))
                    <li class="">
                        <a href="{{ route('trainerManagement.index') }}">
                            <i class="fa fa-user"></i>@lang('backend/sidebar.trainner_management')
                        </a>
                    </li>
                    @endif
                    {{--  User Management  --}}
                    @if(!empty($permissions) && in_array("all_user_management", $permissions))
                    <li class="">
                        <a href="{{ route('UserManagement.index') }}">
                            <i class="fa fa-user"></i>@lang('backend/sidebar.user_management')
                        </a>
                    </li>
                    @endif
                    {{--  Category Management  --}}
                    @if(!empty($permissions) && in_array("all_categories_management", $permissions))
                    <li class="">
                        <a href="{{ route('categoriesManagement.index') }}">
                            <i class="fa fa-list-ul"></i>@lang('backend/sidebar.categories_management')
                        </a>
                    </li>
                    @endif

                    {{--  CMS Pages Management  --}}
                    @if(!empty($permissions) && in_array("all_cms_pages", $permissions))
                    <li class="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit')))) ||
                                (request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit')) )) ? 'active': ''  }}">
                        <a><i class="fa fa-file"></i>
                            @lang('backend/sidebar.cms_pages')
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="{{ (request()->is('cms_aboutus')) || (request()->is('cms_contactus')) ? 'display:block': ''  }}">
                            <li class="{{ (request()->is('module')) ? 'current-page': ''  }}">
                                <a href="{{ route('cms_aboutus') }}">@lang('backend/sidebar.about_us')</a>
                            </li>
                            <li class="{{ (request()->is('cms_contactus')) ? 'current-page': ''  }}">
                                <a href="{{ route('cms_contactus') }}">@lang('backend/sidebar.contact_us')</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <li class="">
                        <a href="{{ route('setting') }}">
                            <i class="fa fa-list-ul"></i>@lang('backend/sidebar.setting')
                        </a>
                    </li>
                </ul>
        </div>

        {{--  <div class="menu_section">
          <h3>Live On</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="e_commerce.html">E-commerce</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="project_detail.html">Project Detail</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <li><a href="profile.html">Profile</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="page_403.html">403 Error</a></li>
                <li><a href="page_404.html">404 Error</a></li>
                <li><a href="page_500.html">500 Error</a></li>
                <li><a href="plain_page.html">Plain Page</a></li>
                <li><a href="login.html">Login Page</a></li>
                <li><a href="pricing_tables.html">Pricing Tables</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="#level1_1">Level One</a>
                  <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="level2.html">Level Two</a>
                      </li>
                      <li><a href="#level2_1">Level Two</a>
                      </li>
                      <li><a href="#level2_2">Level Two</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#level1_2">Level One</a>
                  </li>
              </ul>
            </li>
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
          </ul>
        </div>  --}}

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>
