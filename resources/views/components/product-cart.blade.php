{{-- <main>
  <h1>Your Cart</h1>

  <div class="cart-container">
    @foreach ($cart as $cartPd)

        <div class="cart-item">
            <img src="{{ asset('productImages/' . $cartPd->product->image) }}" alt="{{ $cartPd->product->name }}">
        <div class="cart-details">
            <h3>{{ $cartPd->product->name }}</h3>
            <p>₱{{ $cartPd->product->price }}</p>
            <p>{{ $cartPd->product->category }}</p>
        <div class="cart-qty">
            <button type="button" class="decrement">-</button>
            <input style="width: 8%; text-align: center;" type="text" class="quantity" value="1" min="1" data-price="{{ $cartPd->product->price }}" data-product-id="{{ $cartPd->id }}">
            <button type="button" class="increment">+</button>
        </div>
            <form action="{{ route('customer.removeCart', $cartPd->id) }}" method="POST">
                    @csrf
                    <button class="remove-btn" type="submit">Remove</button>
            </form>
        </div>
    </div> --}}

<link rel="stylesheet" href="{{ asset('css/cart.css') }}">

<main>
  <h1>Your Cart</h1>
  
    <div class="cart-order-container">
        <div class="cart-container">
            @foreach ($cart as $cartPd)

                <div class="cart-item">
                    <img src="{{ asset('productImages/' . $cartPd->product->image) }}" alt="{{ $cartPd->product->name }}">
                <div class="cart-details">
                    <h3>{{ $cartPd->product->name }}</h3>
                    <p>₱{{ $cartPd->product->price }}</p>
                    <p>{{ $cartPd->product->category }}</p>
                <div class="cart-qty">
                    <button type="button" class="decrement">-</button>
                    <input style="width: 8%; text-align: center;" type="text" class="quantity" value="0" data-product-id="{{ $cartPd->product->id }}" data-price="{{ $cartPd->product->price }}" data-name="{{ $cartPd->product->name }}">
                    <button type="button" class="increment">+</button>
                </div>
                    <form action="{{ route('customer.removeCart', $cartPd->id) }}" method="POST">
                        @csrf
                            <button class="remove-btn" type="submit">Remove</button>
                    </form>
                </div>
                </div>

            @endforeach

        </div>
    </div>
</main>

    
    
    <x-order-info/>

