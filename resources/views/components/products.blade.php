<link rel="stylesheet" href="{{ asset('css/products.css') }}">

<main class="main-content">
        <!-- Products Section -->
        <section class="products-section">
            <h2 class="section-title">Our Products</h2>

        
            
            <!-- Carousel Container -->
            <div class="carousel-wrapper">
                <div class="carousel">
                    <!-- Product Card 1 -->

                    @foreach ($products as $product)

                        <div class="product-card">
                            <div class="product-image">
                                <img src="/productImages/{{ $product->image }}" alt="Product Image" style="object-position: left;">
                            </div>
                            <div class="product-info">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->category }}</p>
                                <p>₱{{ $product->price }}</p>
                                
                                @if ($product->stock == 0)
                                <div class="btn-group">
                                    <button class="out-of-stock-btn">Out of Stock</button>
                                    <button class="details-btn" onclick="openModalDetails('modal-{{ $product->id }}')">Product Details</button>
                                </div>
                                @elseif ($product->stock >= 1)
                                    <div class="btn-group">
                                        <form action="{{ route('customer.addToCart', $product->id) }}" method="POST">
                                            @csrf
                                                <button class="add-to-cart-btn" type="submit"><i class="fa-solid fa-cart-plus"></i></button> 
                                        </form>
                                            <button class="details-btn" onclick="openModalDetails('modal-{{ $product->id }}')">Product Details</button>

                                    </div>    
                                 @endif

                            </div>
                        </div>
                        
                    @endforeach

                </div>
            </div>
        </section>
    </main>

    <link rel="stylesheet" href="{{ asset('js/script.js') }}">