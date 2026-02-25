<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/adminMain.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminSidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminContentArea.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sales.css') }}">
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

      <section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">
        
        <table>

          <tr>
            <th>Name</th>
            <th>Product</th>
            <th>category</th>
            <th>quantity</th>
            <th>price</th>
            <th>rating</th>
          </tr>
@foreach ($sales as $s)
          <tr>
            <td>{{ $s->name }}</td>
            <td>{{ $s->productName }}</td>
            <td>{{ $s->category }}</td>
            <td>{{ $s->quantity }}</td>
            <td>{{ $s->price }}</td>
            <td>{{ $s->rating }}</td>
          </tr>
@endforeach
        </table>

      {{ $sales->links() }}
        

      <div style="height: 1200px;"></div>
  </div>
</section>

</main>
</div>
  

</body>
</html>