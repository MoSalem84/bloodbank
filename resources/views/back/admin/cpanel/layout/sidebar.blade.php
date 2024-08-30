  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.cpanel.home') }}" class="brand-link">
          <img src="{{ asset('admin') }}/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">بنك الدم المصري</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin') }}/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">


                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              لوحة تحكم الموقع
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>

                      {{-- المحافظات --}}
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-university"></i>
                          <p>
                              المحافظات
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cpanel.governorates.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>كل المحافظات</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cpanel.governorates.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>اضافه المحافظات</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- نهايه المحافظات --}}

                  {{-- المدن --}}
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-city"></i>
                          <p>
                              المدن <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cpanel.cities.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>كل المدن</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cpanel.cities.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>اضافه المدن</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  {{-- نهايه المدن --}}

                      {{--  اقسام المقالات --}}
                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                اقسام المقالات 
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href={{ route('admin.cpanel.categories.index') }} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل الاقسام</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.cpanel.categories.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>اضافه قسم جديد</p>
                                </a>
                            </li>
  
                        </ul>
                    </li>
  
                    {{-- نهايه اقسام المقالات  --}}


                  {{-- المقالات --}}
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              المقالات
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href={{ route('admin.cpanel.posts.index') }} class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>كل المقالات</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cpanel.posts.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>اضافه مقال جديد</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- نهايه المقالات --}}



 {{-- طلبات التبرع  --}}
 <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            طلبات التبرع 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href={{ route('admin.cpanel.donation-requests.index') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>كل طلبات التبرع </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.cpanel.posts.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>اضافه طلب جديد</p>
            </a>
        </li>

    </ul>
</li>

{{-- نهايه طلبات التبرع --}}
















                  {{-- لوحة تحكم المديرين --}}
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              لوحة تحكم المديرين
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>

                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                المديرين
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.cpanel.admins.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل المديرين</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.cpanel.admins.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>اضافه مديرين</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.cpanel.roles.index') }}" class="nav-link">                                    <i class="far fa-circle nav-icon"></i>
                                    <p> رتب مديرين</p>
                                </a>
                            </li>


                        </ul>
                    </li>

                        {{-- نهايه قائمة المديرين --}}

                            {{-- المستخدمين --}}


                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        المستخدمين
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.cpanel.admins.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>كل المستخدمين</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> اضافه مستخدم جديد</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        {{-- نهايه قائمة المستخدمين --}}


              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                      <i class="fa fa-cog"></i>
                      <p>
                          اعدادات الموقع
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('admin.cpanel.site-settings') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>
                                  الاعدادات
                              </p>
                          </a>
                      </li>


                  </ul>
              </li>


              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>

      <!-- /.sidebar -->
  </aside>
