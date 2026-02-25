<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/adminMain.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminSidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminContentArea.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/editProduct.css') }}">
</head>
<body>
    
    <div class="dashboard-container">
        <!-- Sidebar -->

    <x-admin-sidebar/>

        <!-- Main Content -->
    <main class="main-content">
      <!-- Top Navbar -->

        <x-admin-navbar/>

        <section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">
          <form action="{{ route('admin.editProductConfirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <input type="text" name="bladeName" value="{{ $product->name }}" placeholder="Product Name" required>
                        <input type="text" name="bladePrice" value="{{ $product->price }}" placeholder="Price" required>
                        <img src="{{ asset('productImages/'.$product->image) }}" alt="{{ $product->name }}" width="100px" height="100px">
                        <input type="file" name="bladeImage">
                        <input type="hidden" name="currentImage" value="{{ $product->image }}" >
                        <textarea name="bladeDescription" placeholder="Description" required>{{ $product->description }}</textarea>
                        
                        <select name="bladeCategory" required>

                    @foreach ($category as $cat)

                        <option value="{{ $cat->categoryName }}" {{ $cat->categoryName == $product->category ? 'selected' : '' }}>{{ $cat->categoryName }}</option>
            
                    @endforeach

                        </select>

                        <input type="number" name="bladeStock" placeholder="Stock" value="{{ $product->stock }}" required>

                        <input type="submit">

                    </form>
          <!-- Simulate long content -->
          <div style="height: 1200px;"></div>
        </div>
</section>

      <!-- Page Content -->
      
    </main>
  </div>


</body>
</html>