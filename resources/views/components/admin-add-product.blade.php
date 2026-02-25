    <section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">

                <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <input type="text" name="bladeName" placeholder="Product Name">

                        <input type="text" name="bladePrice" placeholder="Price">

                        <label>Product Image:</label>
                        <input type="file" name="bladeImage">

                        <textarea name="bladeDescription" placeholder="Description"></textarea>


                        <select name="bladeCategory" value="category" required>
    
                        @foreach ($categories as $category )

                            <option>{{ $category->categoryName }}</option>
    
                        @endforeach
        
                        </select>
        
                        <input type="text" name="bladeStock" placeholder="Stock Quantity">

                        <input type="submit" value="Add Product">

    </form>
          <!-- Simulate long content -->
          <div style="height: 1200px;"></div>
        </div>
</section>

