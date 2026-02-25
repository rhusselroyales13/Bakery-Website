<section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">
          
            
    <table>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Payment Method</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    @foreach ($orders as $order)
        
        <tr>
            <td>{{ $order->userOrderId }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->payment }}</td>
            <td>{{ $order->created_at }}</td>
            <td>

                @if ($order->status == 'preparing') 
                            <span class="preparing">Preparing</span>
                        @elseif ($order->status == 'orderOtw') 
                            <span class="onTheWay">Order is on the way</span>
                        @elseif ($order->status == 'delivered') 
                            <span class="delivered">Delivered</span>
                        @elseif ($order->status == 'customerReceivedConfirm')
                            <i class="fa-solid fa-circle-check fa-lg" style="color: #63E6BE;"></i>
                        @else
                            <span class="pending">Pending</span>  
                @endif

            </td>
            <td>₱{{ $order->total }}</td>
            <td>

                @if ($order->status == 'customerReceivedConfirm')

                    <form action="{{ route('admin.orderDone', $order->id) }}" method="POST">
                        @csrf
                            <p>Costumer Received the Order!</p>
                            <input type="submit" value="Order Done!" name="orderDone">
                    </form>

                    
                @else

                    <form action="{{ route('admin.action', $order->id) }}" method="POST">
                    @csrf

                        <input class="action" type="submit" value="Preparing" name="preparing">
                        <input class="action" type="submit" value="On the way" name="onTheWay">
                        <input class="action" type="submit" value="Delivered" name="delivered">
                    
                </form>
                @endif

                

            </td>
        </tr>

    @endforeach
        
        
    </table>

    {{ $orders->links() }}

          <!-- Simulate long content -->
          <div style="height: 1200px;"></div>
        </div>
</section>


<script src="https://kit.fontawesome.com/2952a674d6.js" crossorigin="anonymous"></script>