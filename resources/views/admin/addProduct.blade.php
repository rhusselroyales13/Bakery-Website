

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/adminMain.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminSidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminContentArea.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/addProduct.css') }}">
</head>
<body>
    
    <div class="dashboard-container">
        <!-- Sidebar -->

            <x-admin-sidebar/>

        <!-- Main Content -->

        <main class="main-content">

        <!-- Top Navbar -->

            <x-admin-navbar/>

        <!-- Page Content -->
            
            <x-admin-add-product/>

        </main>
  </div>


</body>
</html>