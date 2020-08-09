<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
      <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui-pro.svg#full"></use>
      </svg>
      <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui-pro.svg#signet"></use>
      </svg>
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
          </svg> Dashboard</a>
        </li>


          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('invoice')}}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
            </svg> Invoices</a></li>

            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                </svg> Customers</a>
              </li>

          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
            </svg> Estimates</a></li>

            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                </svg> Payments Received</a></li>


                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                    <svg class="c-sidebar-nav-icon">
                      <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                    </svg> Expenses</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                        <svg class="c-sidebar-nav-icon">
                          <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                        </svg> Timesheet</a></li>

                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('reports')}}">
                            <svg class="c-sidebar-nav-icon">
                              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                            </svg> Reports</a></li>

                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                                <svg class="c-sidebar-nav-icon">
                                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                                </svg> Payments Received</a></li>
      <li class="c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-dropdown-toggle" href="#">
          <svg class="c-sidebar-nav-icon">
      <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
          </svg>
          Settings</a>
         <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.users')}}"> Users</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.roles')}}"> Roles</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.permissions')}}"> Permissions</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/toastr.html"> etc<span class="badge badge-danger">PRO</span></a></li>
        </ul>
      </li>




    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
  </div>
