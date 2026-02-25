<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/myProfile.css') }}">
</head>
        
<body>
    <x-header/>
    
    
<section class="profile">
    <h1>Profile</h1>

    <div class="profile-field">
        <label>Email</label>
        <input type="text" value="{{ $user->email }}" disabled>
        <a href="{{ route('customer.changeEmail') }}">Change</a>

    </div>

    <div class="profile-field">
        <label>Gender</label>
        <input type="text" value="{{ $user->gender }}" disabled>
    </div>

    <div class="profile-field">
        <label>Address</label>
        <input type="text" value="{{ $user->address }}" disabled>
        <a href="#">Change</a>
    </div>

    <div class="profile-field">
        <label>Phone</label>
        <input type="text" value="{{ $user->phone }}" disabled>
        <a href="#">Change</a>
    </div>
</section>

    
    

    <x-footer/>

</body>
</html>