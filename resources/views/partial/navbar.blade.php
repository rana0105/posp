 <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        Pos System
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li class="dropdown {{ Request::is('procategoies*') ? 'active' : '' }}">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category Type
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  @can('view_procategories')
                                  <li><a href="{{ URL::route('procategoies.index') }}">Categories</a></li>
                                  @endcan
                                  @can('view_brands')
                                  <li><a href="{{ URL::route('brands.index') }}">Brands</a></li>
                                  @endcan
                                </ul>
                              </li>
                          
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peoples
                              <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              @can('view_customertypes')
                                <li><a href="{{ URL::route('customertypes.index') }}">Customers Type</a></li>
                              @endcan
                              @can('view_customers')
                                <li><a href="{{ URL::route('customers.index') }}">Customers</a></li>
                              @endcan
                              @can('view_suppliers')
                                <li><a href="{{ URL::route('suppliers.index') }}"> Suppliers</a></li>
                              @endcan
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
                              <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              @can('view_products')
                                <li><a href="{{ URL::route('products.index') }}">Products</a></li>
                              @endcan
                                <li><a href="{{url('barcode') }}">Barcode</a></li>
                              @can('view_purchases')
                                <li><a href="{{ URL::route('purchases.index') }}">Purchases</a></li>
                              @endcan
                              <li><a href="{{ URL::route('backproducts.create') }}">Back Product</a></li>
                              {{-- @can('view_sales') --}}
                                <li><a href="{{ URL::route('packages.index')}}">Packages</a></li>
                              {{-- @endcan --}}
                              @can('view_sales')
                                <li><a href="{{ URL::route('psales.create') }}">Product Sale</a></li>
                              @endcan
                              @can('view_stocks')
                                <li><a href="{{url('stocks') }}">Stock</a></li>
                              @endcan
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Expense
                              <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              @can('view_excategories')
                                <li><a href="{{ URL::route('excategories.index') }}">Expense Category</a></li>
                              @endcan
                              @can('view_expenses')
                                <li><a href="{{ URL::route('expenses.index') }}">Expenses</a></li>
                              @endcan
                              </ul>
                            </li>
                             <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
                              <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              @can('view_users')
                                <li class="">
                                    <a href="{{ route('users.index') }}">
                                         Users
                                    </a>
                                </li>
                              @endcan
                              @can('view_roles')
                                <li class="">
                                    <a href="{{ route('roles.index') }}">
                                        Roles
                                    </a>
                                </li>
                              @endcan
                              @can('view_permissions')
                                <li class="">
                                    <a href="{{ route('permissions.index') }}">
                                        Permission
                                    </a>
                                </li>
                              @endcan
                              @can('view_settings')
                                <li><a href="{{ URL::route('settings.index') }}">System Setting</a></li>
                              @endcan
                              @can('view_paymethods')
                                <li><a href="{{ URL::route('paymethods.index') }}">Payment Methods</a></li>
                              @endcan
                              {{-- @can('view_paymethods') --}}
                                <li><a href="{{ URL::route('outlets.index') }}">Outlets</a></li>
                              {{-- @endcan --}}
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Report
                              <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              @can('view_brands')
                                <li><a href="{{url('purchasereport') }}">Purchase Report</a></li>
                              @endcan
                              @can('view_brands')
                                <li><a href="{{url('salereport') }}">Sales Reprot</a></li>
                              @endcan
                              {{-- @can('view_brands')
                                <li><a href="{{url('discountreport') }}">Discount Reprot</a></li>
                              @endcan --}}
                              @can('view_brands')
                                <li><a href="{{url('expensereport') }}">Expense Reprot</a></li>
                              @endcan
                              </ul>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                       {{--  Authentication Links --}}
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <span class="label label-success">{{ Auth::user()->roles->pluck('name')->first() }}</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-log-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>