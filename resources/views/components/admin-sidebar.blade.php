{{-- <aside class="sidebar">

            <div class="sidebar-top">
                <h3><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></h3>
                    <nav>
                        <a href="{{ route('admin.addProduct') }}">Add Product</a>
                        <a href="{{ route('admin.addCategory') }}">Add Category</a>
                        <a href="{{ route('admin.manageProduct') }}">View Product</a>
                        <a href="{{ route('admin.sales') }}">Sales</a>
                        <a href="{{ route('admin.orders') }}">Manage Orders</a>
                    </nav>
            </div>

            <div class="sidebar-bottom">

                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                            <button type="submit" class="logout">🚪 Logout</button>
                    </form>
                @endif
                
            </div>
        </aside> --}}


<aside class="sidebar">
    <h2 class="logo">Admin Panel</h2>
      <nav>
        <ul>
          <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
          <li><a href="{{ route('admin.addProduct') }}">Add Product</a></li>
          <li><a href="{{ route('admin.addCategory') }}">Add Category</a></li>
          <li><a href="{{ route('admin.manageProduct') }}">Manage Product</a></li>
          <li><a href="{{ route('admin.sales') }}">Sales</a></li>
          <li><a href="{{ route('admin.orders') }}">Manage Orders</a></li>
        </ul>
      </nav>

      <div class="logout">
        @if (Auth::check())
                    <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
                @endif
      </div>

</aside>