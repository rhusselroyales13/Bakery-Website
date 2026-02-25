

<section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">
           

                <form action="{{ route('admin.addCategory') }}" method="POST">
                    @csrf

                        <input type="text" name="bladeCategory" placeholder="Category Name">

                        <input type="submit" value="Add Category">

                </form>

                <table>
                        <tr>
                                <th>Categories</th>
                                <th>Action</th>
                        </tr>
                        @foreach ($categories as $c)
                            
                        <tr>
                                <td>{{ $c->categoryName }}</td>
                                <td>
                                        <form action="{{ route('admin.deleteCategory', $c->id) }}" method="post">
                                           @csrf
                                                <button>Delete</button>
                                        </form>
                                </td>
                        </tr>

                        @endforeach
                </table>
          <!-- Simulate long content -->
          <div style="height: 1200px;"></div>
        </div>
</section>