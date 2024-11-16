@extends('client.layout.master')
@section('body')
<style>
        .travellerdetail {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .haunted-container { /* renamed from container */
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .cursed-heading { /* renamed from h3 */
            font-size: 20px;
            color: black;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .dark-label { /* renamed from label */
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        .ghost-input, .phantom-select { /* renamed from input, select */
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .dreadful-form-group { /* renamed from form-group */
            display: flex;
            justify-content: space-between;
        }

        .sinister-field { /* renamed from form-group div */
            width: 48%;
        }

        .ghastly-checkbox-group { /* renamed from checkbox-group */
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .spooky-checkbox { /* renamed from checkbox-group input */
            width: auto;
            margin-right: 10px;
        }

        /* Button */
        .bewitched-button { /* renamed from button */
            background-color: darkred;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .bewitched-button:hover {
            background-color: crimson;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .haunted-container { /* renamed from container */
                width: 100%;
                padding: 15px;
            }

            .dreadful-form-group { /* renamed from form-group */
                flex-direction: column;
            }

            .sinister-field { /* renamed from form-group div */
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
<div class="travellerdetail">
<div class="haunted-container">
    <form method="POST" action="{{ route('client.travellerdetails.tstore', $travellerDetailId) }}">
        @csrf
        <input type="hidden" name="traveller_detail" value=" {{ $travellerDetailId }}">
        <h3 class="cursed-heading">TRAVELLERS DETAILS</h3>
        <label class="dark-label" for="travel-date">Date of Travel:</label>
        <input class="ghost-input" type="date" id="travel-date" name="dob" required>

        <h3 class="cursed-heading">CONTACT DETAILS</h3>
        <div class="dreadful-form-group">
            <div class="sinister-field">
                <label class="dark-label" for="fname">First Name:</label>
                <input class="ghost-input" type="text" id="fname" name="fname" required minlength="2" maxlength="50">
            </div>
    
            
            <div class="sinister-field">
                <label class="dark-label" for="lname">Last Name:</label>
                <input class="ghost-input" type="text" id="lname" name="lname" required minlength="2" maxlength="50">
            </div>
        </div>

        <div class="dreadful-form-group">
            <div class="sinister-field">
                <label class="dark-label" for="contact-number">Contact Number:</label>
                <input class="ghost-input" type="text" id="contact" name="contact" required pattern="[0-9]{10,15}">
            </div>
            <div class="sinister-field">
                <label class="dark-label" for="email">Email:</label>
                <input class="ghost-input" type="email" id="email" name="email" required>
            </div>
        </div>

        <div class="dreadful-form-group">
            <div class="sinister-field">
                <label class="dark-label" for="passengers">No. of Passengers:</label>
                <input class="ghost-input" type="number" id="passengers" name="npassengers" required min="1" max="10">
            </div>
        </div>
        <!-- Checkboxes -->
        <div class="ghastly-checkbox-group">
            <input class="spooky-checkbox" type="checkbox" id="declaration" name="declaration" required>
            <label class="dark-label" for="declaration">I have read and agree to the self declaration.</label>
        </div>

        <input type="submit" class="bewitched-button" value="submit">
        {{-- <button class="bewitched-button" type="submit">Submit</button> --}}
    </form>
</div>
</div>
@endsection