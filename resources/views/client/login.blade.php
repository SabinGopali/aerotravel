@extends('client.layout.master')
@section('body')
<style>
        .loginform {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .auth-container {
            display: flex;
            justify-content: space-between;
            width: 60%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .signin-section, .signup-section {
            padding: 30px;
            width: 50%;
            text-align: center;
        }
        .signin-section {
            border-right: 2px solid #ccc; /* Line dividing the boxes */
        }
        .signin-section h2, .signup-section h2 {
            margin-bottom: 20px;
        }
        .signin-section input, .signup-section button {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .signin-section button {
            background-color: lightseagreen;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 85%;
            border-radius: 5px;
        }
        .signup-section button {
            background-color: lightseagreen;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 85%;
            border-radius: 5px;
        }
        .signin-section a {
            display: block;
            margin-top: 10px;
            color: lightseagreen;
            text-decoration: none;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none;
        }
    </style>

<div class="loginform">
<div class="auth-container">
        <div class="signin-section">
            <h2>Login</h2>
            <form id="signinForm" onsubmit="return validateAuth()">
                <input type="email" id="signinEmail" placeholder="Email" required><br>
                <div class="error-msg" id="signinEmailError">Please enter a valid email.</div>
                
                <input type="password" id="signinPassword" placeholder="Password" required><br>
                <div class="error-msg" id="signinPasswordError">Password must contain at least 8 characters and include letters.</div>
                
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="signup-section">
            <h2>Don't Have An Account Yet?</h2>
            <p>Booking flights, managing reservations and explore the world with us</p>
            <button onclick="window.location.href='#'"><a href="{{ route('client.registerDetails') }}">Register</button></a>
        </div>
    </div>

    <script>
        function validateAuth() {
            var signinEmail = document.getElementById("signinEmail").value;
            var signinPassword = document.getElementById("signinPassword").value;
            var signinEmailError = document.getElementById("signinEmailError");
            var signinPasswordError = document.getElementById("signinPasswordError");

            // Reset error messages
            signinEmailError.style.display = "none";
            signinPasswordError.style.display = "none";

            // Validate email
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(signinEmail)) {
                signinEmailError.style.display = "block";
                return false;
            }

            // Validate password (at least 8 characters and contains letters)
            var passwordPattern = /^(?=.*[a-zA-Z]).{8,}$/;
            if (!passwordPattern.test(signinPassword)) {
                signinPasswordError.style.display = "block";
                return false;
            }

            return true; // If all validations pass
        }
    </script>
</div>
@endsection