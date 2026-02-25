<!-- Top Navbar -->

{{-- @if ($_SERVER["REQUEST_URI"] === "/adminDashboard")
    <header class="top-navbar">
        <h1>Dashboard Overview</h1>
    </header>
@elseif ($_SERVER["REQUEST_URI"] === "/addProduct")
    <header class="top-navbar">
        <h1>Add Product</h1>
    </header>
@elseif ($_SERVER["REQUEST_URI"] === "/addCategory")
    <header class="top-navbar">
        <h1>Add Category</h1>
    </header>
@elseif ($_SERVER["REQUEST_URI"] === "/manageProduct")
    <header class="top-navbar">
        <h1>Manage Product</h1>
    </header>
@elseif ($_SERVER["REQUEST_URI"] === "/sales")
    <header class="top-navbar">
        <h1>Sales</h1>
    </header>
@elseif ($_SERVER["REQUEST_URI"] === "/orders")
    <header class="top-navbar">
        <h1>Manage Orders</h1>
    </header>
@endif --}}

@php
    $routeName = Route::currentRouteName();
    $title = config('admin.titles') [$routeName] ?? 'Admin Panel';
@endphp

<header class="top-navbar">
        <h1>{{ $title }}</h1>
</header>
