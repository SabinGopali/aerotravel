<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h3 {
            font-size: 20px;
            color: black;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
        }

        .form-group div {
            width: 48%;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .checkbox-group input {
            width: auto;
            margin-right: 10px;
        }

        /* Button */
        button {
            background-color: lightseagreen;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: lightseagreen;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 15px;
            }

            .form-group {
                flex-direction: column;
            }

            .form-group div {
                width: 100%;
                margin-bottom: 10px;
            }
        }

    </style>
    <script>
        function validateForm() {
            const contactNumber = document.getElementById("contact-number");
            const email = document.getElementById("email");

            // Phone number validation pattern (basic, allowing 10-15 digits)
            const phonePattern = /^[0-9]{10,15}$/;
            if (!phonePattern.test(contactNumber.value)) {
                alert("Please enter a valid contact number (10-15 digits).");
                return false;
            }

            // Email validation (basic)
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email.value)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<div class="container">
    <form onsubmit="return validateForm()">
        <h3>TRAVELLERS DETAILS</h3>
        <label for="travel-date">Date of Travel:</label>
        <input type="date" id="travel-date" name="travel-date" required>

        <h3>CONTACT DETAILS</h3>
        <div class="form-group">
            
            <div>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" required minlength="2" maxlength="50">
            </div>
        </div>

        <div class="form-group">
            
            <div>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" required minlength="2" maxlength="50">
            </div>
        </div>

        <div class="form-group">
            <div>
                <label for="contact-number">Contact Number:</label>
                <input type="text" id="contact-number" name="contact-number" required pattern="[0-9]{10,15}">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
        </div>

        <div class="form-group">
            <div>
                <label for="email">No.of Passengers:</label>
                <input type="number" id="email" name="email" required min="1" max="10">

            </div>
        </div>
        <!-- Checkboxes -->
        <div class="checkbox-group">
            <input type="checkbox" id="declaration" name="declaration" required>
            <label for="declaration">I have read and agree to the self declaration.</label>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>