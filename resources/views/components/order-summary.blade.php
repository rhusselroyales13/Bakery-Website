
    
    <main>

        <div class="ordercard1">
          <h2>Order Summary</h2>

      @foreach ($cart as $summaryCart)

        <div class="summaryitem" data-product-id="{{ $summaryCart->product->id }}">
          <p class="name">{{ $summaryCart->product->name }}</p>
          <p class="price">₱{{ number_format($summaryCart->product->price, 2) }}</p>
        </div>

      @endforeach
      
        <div class="summaryitemTotal">
          <input type="hidden" id="totalInput" name="qty">
          <input style="border-style: none; background-color: white;" type="text" id="totalDisplay" name="total" value="Total: ₱0.00" disabled>
        </div>

      

        <button class="placeorderbtn">Place Order</button>
      
      
    </div>
        
    </main>