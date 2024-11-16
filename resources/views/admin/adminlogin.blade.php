<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            width: 400px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        .login-container .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            padding-left: 40px;
            border: none;
            border-bottom: 2px solid #d1d1d1;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        .login-container input:focus {
            border-bottom-color: lightseagreen;
            outline: none;
        }

        .login-container label {
            position: absolute;
            top: 14px;
            left: 40px;
            font-size: 14px;
            color: lightseagreen;
        }

        .login-container .input-group .icon {
            position: absolute;
            top: 14px;
            left: 10px;
            font-size: 18px;
            color: lightseagreen;
        }

        .login-container .submit-btn {
            background-color: lightseagreen;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        .login-container .submit-btn:hover {
            background-color:lightseagreen;
        }

        .login-container .submit-btn:focus {
            outline: none;
        }

        /* Adding a smooth shadow effect */
        .login-container {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Responsive Design */
        @media screen and (max-width: 768px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }

            .login-container input, .login-container .submit-btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form>
            <div class="input-group">
                <span class="icon">👤</span>
                <input type="email" id="email" placeholder="Email" value="ganarm2003@gmail.com" required>
            </div>
            <div class="input-group">
                <span class="icon">🔒</span>
                <input type="password" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>