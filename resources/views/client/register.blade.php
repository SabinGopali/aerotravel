@extends('client.layout.master')
@section('body')
<style>
        .registerform {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-wrapper {
            width: 70%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .input-group {
            display: flex;
            justify-content: space-between;
        }
        .input-item {
            width: 48%;
        }
        .text-input, .dropdown-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .action-button {
            width: 48%;
            padding: 10px;
            margin-top: 20px;
            background-color: lightseagreen;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .alert-message {
            color: red;
            font-size: 14px;
            display: none;
        }
        </style>
<div class="registerform">
<div class="form-wrapper">
    <h2 class="form-header">REGISTER</h2>
    <form id="userRegisterForm" onsubmit="return runValidation()">
        <div class="input-group">
         
            <div class="input-item">
                <label for="userFirstName">User Name</label>
                <input type="text" id="userFirstName" class="text-input" placeholder="First Name" required pattern="[A-Za-z]+" title="Please enter only letters">
                <div class="alert-message" id="userFirstNameError">Please enter a valid first name (letters only).</div>
            </div>
        </div>
      
            <div class="input-item">
                <label for="userEmail">Email</label>
                <input type="email" id="userEmail" class="text-input" placeholder="Email" required>
                <div class="alert-message" id="userEmailError">Please enter a valid email.</div>
            </div>
        </div>

            <div class="input-item">
                <label for="userPassword">Password</label>
                <input type="password" id="userPassword" class="text-input" placeholder="Password" required minlength="8">
                <div class="alert-message" id="userPasswordError">Password must be at least 8 characters long.</div>
            </div>
        </div>

        <div class="input-group">
            <div class="input-item">
                <label for="confirmUserPassword">Confirm Password</label>
                <input type="password" id="confirmUserPassword" class="text-input" placeholder="Confirm Password" required>
                <div class="alert-message" id="confirmUserPasswordError">Passwords do not match.</div>
            </div>
        </div>

        <div class="input-group">
            <button type="button" class="action-button" onclick="window.history.back()">Back</button>
            <button type="submit" class="action-button">Register</button>
        </div>
    </form>
</div>

<script>
    function runValidation() {
        var firstName = document.getElementById("userFirstName").value;
        var lastName = document.getElementById("userLastName").value;
        var email = document.getElementById("userEmail").value;
        var mobile = document.getElementById("userMobile").value;
        var password = document.getElementById("userPassword").value;
        var confirmPassword = document.getElementById("confirmUserPassword").value;

        var firstNameError = document.getElementById("userFirstNameError");
        var lastNameError = document.getElementById("userLastNameError");
        var emailError = document.getElementById("userEmailError");
        var mobileError = document.getElementById("userMobileError");
        var passwordError = document.getElementById("userPasswordError");
        var confirmPasswordError = document.getElementById("confirmUserPasswordError");

        // Reset error messages
        firstNameError.style.display = "none";
        lastNameError.style.display = "none";
        emailError.style.display = "none";
        mobileError.style.display = "none";
        passwordError.style.display = "none";
        confirmPasswordError.style.display = "none";

        // Validate first name (letters only)
        var namePattern = /^[A-Za-z]+$/;
        if (!namePattern.test(firstName)) {
            firstNameError.style.display = "block";
            return false;
        }

        // Validate last name (letters only)
        if (!namePattern.test(lastName)) {
            lastNameError.style.display = "block";
            return false;
        }

        // Validate email
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            emailError.style.display = "block";
            return false;
        }

        // Validate mobile number (numeric, 10 digits)
        var mobilePattern = /^\d{10}$/;
        if (!mobilePattern.test(mobile)) {
            mobileError.style.display = "block";
            return false;
        }

        // Validate password (at least 8 characters)
        if (password.length < 8) {
            passwordError.style.display = "block";
            return false;
        }

        // Validate confirm password
        if (password !== confirmPassword) {
            confirmPasswordError.style.display = "block";
            return false;
        }

        return true; // If all validations pass
    }
</script>
</div>
@endsection

