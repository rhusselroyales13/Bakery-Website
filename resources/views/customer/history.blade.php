<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Purchase History</title>
  <link rel="stylesheet" href="{{ asset('css/purchaseHistory.css') }}">
</head>
<body>

  <x-header/>

  <div class="purchase-history-container">
    <h1>Purchase History</h1>

      @foreach ($history as $h)
    
        <div class="purchase-card">
          <div class="purchase-header">
            <span class="product-name">{{ $h->productName }}</span>
            <span class="purchase-date">{{ $h->created_at }}</span>
          </div>
        <div class="purchase-body">
            <p>Quantity: {{ $h->quantity }}</p>
            <p>Category: {{ $h->category }}</p>
            <p>Total Price: ₱{{ $h->price }}</p>
            <p>Rated: <span class="status delivered">{{ $h->rating }}⭐</span></p>
          </div>
        </div>

      @endforeach
    
  </div>

  <x-footer/>

</body>
</html>
