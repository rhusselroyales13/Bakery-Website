<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

@props(['product'])

@foreach ($product as $prd)
    <div class="modal-detail" id="modal-{{ $prd->id }}">
    <div class="modal-product-detail">
        
            <div class="product-modal-content">
                <div class="product-modal-image">
                    <img src="/productImages/{{ $prd->image }}" alt="{{ $prd->name }}">
                </div>
                <div class="product-info">
                    <h2>{{ $prd->name }}</h2>
                    <p class="description">Description: {{ $prd->description }}</p>
                    <p class="price">₱{{ number_format($prd->price, 2) }}</p>
                    <p class="price">Stock: {{ $prd->stock }}</p>
                    <br>
                    <div class="btn-group">
                        @if ($prd->stock == 0)
                            <button class="out-of-stock-btn">Out of Stock</button>
                        @else
                        <form action="{{ route('customer.addToCart', $prd->id) }}" method="POST">
                            @csrf
                                <button class="add-to-cart-btn-modal" type="submit"><i class="fa-solid fa-cart-plus"></i></button> 
                        </form>
                        <form action="{{ route('customer.buyNow', $prd->id) }}" method="POST">
                            @csrf
                                <button class="buy-now-btn-modal" type="submit">Buy Now</button>
                    </form>
                        @endif
                    </div>
                    
                </div>
            </div>
        <hr>
        <div style="font-weight: bold; text-align: center; font-size: 25px;" >
            Reviews
        </div>
        {{-- <div class="reviewSection">
            <h2>{{ $product->name }}</h2>

    <h3>Reviews:</h3>
    @if($product->reviews->isEmpty())
        <p>No reviews yet.</p>
    @else
        <ul>
            @foreach($product->reviews as $review)
                <li>
                    <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
                    rated {{ $review->rating }}/5
                    <p>{{ $review->review }}</p>
                </li>
            @endforeach
        </ul>
    @endif

        </div> --}}
    </div>
</div>
@endforeach


<script src="{{ asset('js/script.js') }}"></script>

