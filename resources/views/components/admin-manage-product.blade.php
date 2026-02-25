    <section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">
            
            
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
            @foreach ($product as $prd)
                    <tr>
                        <td>{{ $prd->name }}</td>
                        <td>₱{{ $prd->price }}</td>
                        <td><img src="{{ asset('productImages/'.$prd->image) }}" alt="{{ $prd->name }}" width="100px" height="100px"></td>
                        <td>{!!Str::words($prd->description, 10)!!}</td>
                        <td>{{ $prd->category }}</td>
                        <td>{{ $prd->stock }}</td>
                        <td><a href="{{ route('admin.editProduct', $prd->id) }}">Edit</a></td>
                        <td><a href="{{ route('admin.deleteProduct', $prd->id) }}">Delete</a></td>
                    </tr>
            @endforeach
                </table>
                
                {{ $product->links() }}

          <!-- Simulate long content -->
          <div style="height: 1200px;"></div>
        </div>
</section>




    