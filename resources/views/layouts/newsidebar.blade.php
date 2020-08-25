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
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('home')}}">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
          </svg> Dashboard</a>
        </li>
        @permission('create-report')

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('expenses.expenses')}}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
            </svg> Expenses</a></li>
            @endpermission

            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('reports.reports')}}">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                </svg> Reports</a></li>

{{--
        <li class="c-sidebar-nav-dropdown c-show">
            <a class="c-sidebar-nav-dropdown-toggle" href="{{route('invoice')}}">
            <svg class="c-sidebar-nav-icon">
        <use xlink:href="vendors/@coreui/icons/sprites/free.svg#cil-bell"></use>
            </svg>
            Expenses</a>
           <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('customer')}}"> Customers</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('item')}}"> Items</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#"> Estimates<span class="badge badge-danger">PRO</span></a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('invoice')}}"> Invoices</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#"> Payments Received</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#"">Expenses </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">Timesheet </a></li>

          </ul>
        </li> --}}

        {{-- <li class="c-sidebar-nav-dropdown c-show">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
            </svg>
            Reports</a>
           <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('docsign.sign')}}"> Sign</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('docsign.document')}}"> Documents</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#"> Template</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('docsign.signinform')}}"> SignForms</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#"> Reports</a></li>
          </ul>
        </li> --}}

        @permission('configure-settings')


      <li class="c-sidebar-nav-dropdown c-show">
          <a class="c-sidebar-nav-dropdown-toggle" href="#">
          <svg class="c-sidebar-nav-icon">
      <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
          </svg>
          Settings</a>
         <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.users')}}"> Users</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.roles')}}"> Roles</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.permissions')}}"> Permissions</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.categories')}}"> Categories</a></li>
          {{-- <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.customers')}}"> Customers</a></li> --}}
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.currencies')}}"> Currencies</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.merchants')}}"> Merchants</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.paidthrough')}}"> Paid Through</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.accounttype')}}"> AccountType</a></li>



        </ul>
      </li>

      @endpermission

{{--
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.users')}}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
        </svg> Users</a></li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.roles')}}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
            </svg> Roles</a></li>

            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-management.permissions')}}">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                </svg> Permissions</a></li> --}}




    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
  </div>


  