<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal" id="authModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        
        <div id="loginForm">
            <h2>Login</h2>
                <form action="{{ route('customer.accLogin') }}" method="POST">
                    @csrf
                        <br>
                            <input type="email" name="email" required placeholder="Email">
                            <input type="password" name="password" required placeholder="password">
                            <button type="submit">Login</button>
                </form>
            <p class="switch-text">
                Don’t have an account?
            <span onclick="showRegister()">Register</span>
            </p>
        </div>

        
        <div id="registerForm" style="display:none;">
            <h2>Register</h2>

                <form action="{{ route('customer.accRegister') }}" method="POST" >
                    @csrf

                        <input type="text" name="firstname" placeholder="First Name" required>

                        <input type="text" name="lastname" placeholder="Last Name" required>

                    <div class="form-group">
                            <div class="genderRow">
                                <label>(Optional)</label>
                                <label class="genderOption">Female<input type="radio" name="gender" value="female"></label><br>
                                <label class="genderOption">Male<input type="radio" name="gender" value="male"></label>
                            </div>
                        </div>

                        <input type="email" name="email" placeholder="Email"  required>

                        <input type="text" name="address" placeholder="Address"  required>

                        <input type="text" name="phone" placeholder="Phone Number"  required>

                        <input type="password" name="password" placeholder="Password" required>
                        
                        <button type="submit">Register</button>

                </form>

            <p class="switch-text">
                Already have an account?
                <span onclick="showLogin()">Login</span>
            </p>
        </div>

    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>