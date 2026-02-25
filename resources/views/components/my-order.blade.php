

<main>
   <h1>My Purchase</h1>
    <div class="total">Total: ₱{{ $order->sum('total') }}</div>


    <div class="order-header">
        <div>Details</div>
        <div>Product Name</div>
        <div>Receiver name</div>
        <div>Address</div>
        <div>Status</div>
    </div>

    @foreach ($order as $myOrder)
        
    <div class="order-row">
        <div class="product">
            <img src="{{ asset('productImages/' . $myOrder->product->image) }}" alt="{{ $myOrder->product->name }}">
        </div>

        <div class="product-details">
            <h3>{{ $myOrder->product->name }}</h3>
            <div class="qty">{{ $myOrder->quantity }}</div>
            <div class="price">₱{{ $myOrder->total }}</div>
        </div>

        <div>{{ $myOrder->name }}</div>
        <div>{{ $myOrder->address }}</div>

        <div class="status">
            
            @if ($myOrder->status == 'preparing') 
                        <span class="preparing">Preparing</span>
                    @elseif ($myOrder->status == 'orderOtw') 
                            <span class="onTheWay">Delivering</span>
                        @elseif ($myOrder->status == 'delivered')

                                <form action="{{ route('customer.receivedConfirm', $myOrder->id) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="Confirm Received" class="customerReceived" name="confirm">
                                </form>


                                    @elseif ($myOrder->status == 'customerReceivedConfirm')
                                        <div class="div-receivedConfirm">
                                            <span class="customerReceivedConfirm">Order Received<i class="fa-solid fa-circle-check fa-lg"></i></span>
                                            
                                        </div>
                                              
                                        @php
                                            $rating = $myOrder->product->ratings->where('user_id', Auth::id())->first();
                                        @endphp
                                        
                                        @if ($rating)
                                        <span class="product-review">Product Review
                                            <i class="fa-solid fa-circle-check fa-lg"></i>
                                        </span>
                                        @else
                                            {{-- <form action="{{ route('customer.review', $myOrder->product->id) }}" method="POST">
                                                @csrf
                                                    <button class="delivered">Review Product</button>
                                            </form> --}}
                                            <button type="button" class="delivered" data-product-id="{{ $myOrder->product->id }}" onclick="openReviewModal(this)">Review Product</button>
                                        @endif
                                        
                                        
                                        

                                    @else 
                                        <div class="pending-cancel">
                                            <span class="pending">Pending</span>
                                            <a class="cancel" onclick="confirmation(event)" href="{{ route('customer.cancelOrder', $myOrder->id) }}">Cancel</a>
                                        </div>
                                        
                                    @endif

        </div>
    </div>

    @endforeach
  
   @foreach ($order as $myOrder)
       <x-review-modal :product="$myOrder->product"/>
   @endforeach
    


</main>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

