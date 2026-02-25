<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header class="header">
        <div class="header-container">
            <div class="logo">
                
                <a href="{{ route('customer.dashboard') }}"><img src="{{ asset('bakery-logo.png') }}" alt=""></a>
            </div>
        @if (Auth::check())
            <nav class="nav-menu">

                    <a href="{{ route('shop.history') }}" class="{{ setActive('shop.history') }}">History</a>
                    
                </nav>
            
                <div class="nav-menu-cart">
                    
                    <a href="{{ route('customer.myOrders') }}"><i class="fa-regular fa-money-bill-1 fa-lg"></i>
                        Purchase
                    </a>
                    
                    <a href="{{ route('customer.cart') }}"><i class="fa-solid fa-cart-shopping"></i> 
                        {{ $count }}
                    </a>
                    
                </div>

            <div class="dropdown">
                <button class="dropbtn">My Profile<i class="fa-solid fa-caret-down fa-xl"></i></button>
                    <div class="dropdown-content">
                        
                        <a href="{{ route('customer.profile') }}"><i class="fa-solid fa-circle-user"></i>
                            {{ Auth::user()->firstname }}
                        </a>
                        <a href="{{ route('customer.history') }}"><i class="fa-solid fa-clock-rotate-left"></i>
                            Purchase History
                        </a>
                        <a href="{{ route('logout') }}" class="logout-btn"><i class="fa-solid fa-arrow-right-from-bracket"></i> 
                            Logout
                        </a>
                </div>
            </div>
                
                
            
            
        @else

            <nav class="nav-menu">
                <a href="{{ route('shop.history') }}" class="{{ request()->routeIs('shop.history') ? 'active' : '' }}">History</a>
            </nav>

                <button class="login-btn" onclick="openModal()">Login</button>

        @endif
                
        </div>
    </header>

<script src="https://kit.fontawesome.com/2952a674d6.js" crossorigin="anonymous"></script>
