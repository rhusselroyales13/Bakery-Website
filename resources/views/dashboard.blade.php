<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albeth's - Bakery</title>

</head>
<body>
    <!-- Header Navigation -->
    <x-header/>

    <!-- Main Content -->
    
    <x-products :products="$products" />

    <!-- Login Modal -->

    <x-login-reg/>

    <!-- Product Details -->

    
    <x-product-details :product="$product" />



    <!-- check the user -->

    @if (Auth::guest())
        <script>
            openModal()
        </script>
    @endif

    <!-- Footer -->
    <x-footer/>
</body>
</html>

{{-- <script src="{{ asset('js/script.js') }}"></script> --}}
