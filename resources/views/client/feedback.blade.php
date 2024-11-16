@extends('client.layout.master')
@section('body')
    <style>
        .second {
            
            ont-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .feedback-container22 {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 30px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .form-group22 {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
        }

        textarea, .select22 {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            resize: vertical;
            box-sizing: border-box;
        }

        .select22 {
            cursor: pointer;
            border: 1px solid black;
            border-radius: 8px;
            
            
        }

        .rating22 {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
        }

        .rating22 input {
            display: none;
        }

        .rating22 label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }

        .rating22 input:checked ~ label,
        .rating22 input:hover ~ label {
            color: #f39c12;
        }

        .rating22 input:checked ~ label:hover {
            color: #e67e22;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: lightseagreen;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: lightseagreen;
        }

        /* Add media query for responsiveness */
        @media (max-width: 768px) {
            .feedback-container {
                width: 90%;
            }
        }

    
    </style>

<div class="second">
    <div class="feedback-container22">
        <h2>Feedback Form</h2>
        <form  method="POST" action="{{ route('client.feedbackDetails.store') }}">
            @csrf
            <div class="form-group22">
                <label for="impression">What was your first impression when you entered the website?</label>
                <textarea id="impression" rows="4" name="impression" placeholder="Enter your feedback here"></textarea>
            </div>

            <div class="form-group22">
                <label for="hear">How did you first hear about us?</label>
                <select class="select22" id="hear" name="hear" required>
                    <option selected disabled>Select an option</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Friend/Family">Friend/Family</option>
                    <option value="Advertisement">Advertisement</option>
                </select>
            </div>

            <div class="form-group22">
                <label for="missing">Is there anything missing on this page?</label>
                <textarea id="missing" rows="4" class="missing" name="missing" placeholder="Let us know"></textarea>
            </div>

            <div class="form-group22">
                <label>Rate this page:</label>
                <div class="rating22">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">★</label>

                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">★</label>

                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">★</label>

                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">★</label>

                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">★</label>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    </div>

    <script>
        function validateForm(event) {
            event.preventDefault();
            
            // Get form values
            const impression = document.getElementById('impression').value;
            const hearAbout = document.getElementById('hear-about').value;
            const missing = document.getElementById('missing').value;
            const rating = document.querySelector('input[name="rating"]:checked');

            // Form validation logic
            if (!impression) {
                alert('Please provide your first impression.');
                return;
            }

            if (!hearAbout) {
                alert('Please select how you first heard about us.');
                return;
            }

            if (!missing) {
                alert('Please let us know if anything is missing.');
                return;
            }

            if (!rating) {
                alert('Please rate this page.');
                return;
            }

            // Simulate form submission (replace with actual form submission code)
            alert('Thank you for your feedback!');
        }
    </script>

@endsection