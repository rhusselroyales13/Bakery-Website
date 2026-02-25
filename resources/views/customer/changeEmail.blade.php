<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/changeEmail.css') }}">
</head>
        
<body>
    <x-header/>
    
    
<section class="profile">
    <h1>Change Email</h1>

    <div class="profile-field">
        <label>Current Email</label>
        <input type="text" value="{{ $user->email }}" disabled>
        
    </div>

    <form action="{{ route('customer.newEmail') }}" method="post">
        @csrf   
            <div class="profile-field">
                <label>New Email</label>
                <input type="email" name="newEmail">
            </div>

        <input class="input-submit" type="submit" value="Submit">
    </form>
    

</section>

    <x-footer/>

</body>
</html>