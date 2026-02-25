
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - Albeths Bakery</title>
  
</head>
<body>

<x-header/>

<x-product-cart/>

<x-footer/>


    
</body>

</html>

<script src="{{ asset('js/script.js') }}" defer></script>





{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
</head>

<style>

    .card {

        box-shadow: 0px 4px 8px black;
        padding-left: 50px;
        padding-top: 50px;
        width: 700px;
        

    }
    
    table, th, td {
        
        border-top: 1px solid black;
        padding: 10px;
    }
    

    table {
        border-collapse: collapse;
    }

    .product-details {
        display: flex;
        gap: 12px;
    }

    .product-details img {
        width: 100px;
        height: 100px;
        padding-right: 20px;
        display: block;
    }

    .product-details .details {
        display: flex;
        flex-direction: column;
        gap: 1px;
    }

    .category {
        color: green;
    }

    .rightContainer {
        display: flex;
        
    }

    .rightCard {
        display: flex;
        box-shadow: 1px 4px 8px black;
        width: 500px;
        height: 500px;
        background-color: beige;
    }

    .info {
        margin-left: 10px;
        text-align: center;
    }

    
    

</style>
<body>
    
    <a href="{{ route('customer.dashboard') }}">Shop</a>

<div class="rightContainer">
    <div class="card">

        <h1>Shopping Cart</h1>

    <table>

        <tr>
            <th>Product Details</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        
        @foreach ($cart as $cartPd)
            
        <tr>
            <td class="product-details">
                <div>

                     

                </div>

                <div class="details">

                    <p>{{ $cartPd->product->name }}</p>
                    <p class="category">{{ $cartPd->product->category }}</p>
                

                </div>
                
            </td>
        
            <td>

                <input type="number" 
               class="quantity" 
               value="1" 
               min="1" 
               data-price="{{ $cartPd->product->price }}" 
               data-product-id="{{ $cartPd->id }}">


            </td>
            <td>${{ $cartPd->product->price }}</td>
            <td class="subtotal">₱0.00</td>
        </tr>


        

        @endforeach
        

    </table>
</div>
    <div class="rightCard">
        <div class="info">

            <h3>Order Summary</h3>

         

        </div>
</div> 
</div>


<script>
    function calculateTotal() {
    let grandTotal = 0;
    let grandQty = 0;
    const hiddenInputsDiv = document.getElementById('hiddenInputs');
    hiddenInputsDiv.innerHTML = ''; 

    document.querySelectorAll('.quantity').forEach(input => {
        const quantity = parseInt(input.value) || 0;
        const price = parseFloat(input.getAttribute('data-price'));
        const productId = input.getAttribute('data-product-id');
        const subtotal = quantity * price;

        
        const row = input.closest('tr');
        const subtotalCell = row.querySelector('.subtotal');
        if (subtotalCell) subtotalCell.textContent = '₱' + subtotal.toFixed(2);

        // Inject 
        hiddenInputsDiv.innerHTML += `
            <input type="hidden" name="products[${productId}][id]" value="${productId}">
            <input type="hidden" name="products[${productId}][quantity]" value="${quantity}">
            <input type="hidden" name="products[${productId}][subtotal]" value="${subtotal.toFixed(2)}">
        `;

        grandTotal += subtotal;
        grandQty += quantity;
    });

    document.getElementById('totalInput').value = grandQty;
    document.getElementById('totalDisplay').value = 'Total: ₱' + grandTotal.toFixed(2);
}

document.querySelectorAll('.quantity').forEach(input => {
    input.addEventListener('input', calculateTotal);
});
calculateTotal();


</script>



</body>
</html>
 --}}
