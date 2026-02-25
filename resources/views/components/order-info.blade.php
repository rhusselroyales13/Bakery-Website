<main>
<div class="order">

    <div class="ordercard">
      <h2>Billing Information</h2>
      {{-- <h2>Billing Information</h2>

      <label>Receiver Name</label>
      <input type="text" placeholder="Enter your full name">

      <label>Email</label>
      <input type="email" placeholder="Enter your email">

      <label>Phone</label>
      <input type="text" placeholder="Enter your phone number">

      <label>Address</label>
      <input type="text" placeholder="Enter your delivery address"> --}}

      <form action="{{ route('customer.orderConfirmation') }}" method="POST">
            @csrf

            <label>Receiver name:
              <input type="text" name="name" placeholder="Enter Receiver name" value="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}">
            </label>

            <label>Enter your phone number:
              <input type="text" name="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
            </label>

            <label>Enter your email:
              <input type="text" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
            </label>

            <label>Enter your delivery address:
              <input type="text" name="address" placeholder="Address" value="{{ Auth::user()->address }}">
            </label>
            
            <div id="hiddenInputs"></div>
            
          <div class="payment-option">
            <label class="radio-option" >
              <i class="fa-solid fa-truck" style="margin-right: 10px;"></i><span>Cash on Delivery</span>
          <input type="radio" value="Cash on Delivery" name="paymentMethod" hidden>
          </label>
          </div>          
                
          </div>
            
            <x-order-summary/>
      </form>
    </div>
</main>
