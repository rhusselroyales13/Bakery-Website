<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/products.css') }}">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
<link rel="stylesheet" href="{{ asset('js/script.js') }}">
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://kit.fontawesome.com/2952a674d6.js" crossorigin="anonymous"></script>
