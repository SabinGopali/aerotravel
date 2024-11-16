@extends('admin.layout.master')
@section('body')
    <style>

        .addtripdetails {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .wanderlust-wrapper {
            width: 950px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-left:150px;
        }

        h1, h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        label {
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            padding: 0;
        }

        .serenity-submit-btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: lightseagreen;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .serenity-submit-btn:hover {
            background-color: lightseagreen;
        }

        .starlight-rating-system {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            font-size: 1.5rem;
        }

        .starlight-rating-system input {
            display: none;
        }

        .star {
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
        }

        input:checked ~ label.star {
            color: gold;
        }

        input:hover ~ label.star,
        label.star:hover {
            color: gold;
        }

        .error {
            color: red;
            font-size: 0.85rem;
            display: none;
        }
    </style>
<div class="addtripdetails">
    <div class="wanderlust-wrapper">
        <h1>Trip Details</h1>
        <form id="tripForm" onsubmit="return validateForm()"  method="POST" action="{{ route('admin.travellerdetails.store') }}" 
        enctype="multipart/form-data">
        @csrf
            <table>
                <tr>
                    <td><label for="tripName">Trip Name:</label></td>
                    <td>
                        <input type="text" id="tripName" name="tripname" placeholder="Enter trip name" 
                        pattern="[A-Za-z\s]+" title="Trip Name should not contain numbers" required>
                        <span class="error" id="tripNameError"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="packageCost">Package Cost:</label></td>
                    <td>
                        <input type="text" id="packageCost" name="packagecost" placeholder="Enter package cost" 
                        min="0" step="0.01" required>
                        <span class="error" id="packageCostError"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td>
                        <textarea id="description" name="description" rows="4" placeholder="Enter description" 
                        pattern="[A-Za-z\s]+" title="Description should not contain numbers" required></textarea>
                        <span class="error" id="descriptionError"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="destinationImage">Destination Image:</label></td>
                    <td>
                        <input type="file" id="destinationimage" name="destinationImage" accept="image/*" required>
                        <span class="error" id="destinationImageError"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Hotel Details</h3></td>
                </tr>
                <tr>
                    <td><label for="hotelName">Hotel Name:</label></td>
                    <td>
                        <input type="text" id="hotelName" name="hotelname" placeholder="Enter hotel name" 
                        pattern="[A-Za-z\s]+" title="Hotel Name should not contain numbers" required>
                        <span class="error" id="hotelNameError"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="rating">Rating:</label></td>
                    <td>
                        <div class="starlight-rating-system">
                            <input type="radio" id="5-stars" name="rating" value="5" required />
                            <label for="5-stars" class="star">&#9733;</label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="star">&#9733;</label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="star">&#9733;</label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="star">&#9733;</label>
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="star">&#9733;</label>
                        </div>
                        <span class="error" id="ratingError"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="hotelImage">Hotel Image:</label></td>
                    <td>
                        <input type="file" id="hotelImage" name="hotelimage" accept="image/*" required>
                        <span class="error" id="hotelImageError"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="hotelLocation">Hotel Location:</label></td>
                    <td>
                        <input type="text" id="hotelLocation" name="hotellocation" placeholder="Enter hotel location" required>
                        <span class="error" id="hotelLocationError"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" class="serenity-submit-btn">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

    <script>
        function validateForm() {
            let isValid = true;

            // Clear all previous error messages
            document.querySelectorAll('.error').forEach(el => el.style.display = 'none');

            // Validate package cost
            let packageCost = document.getElementById('packageCost').value;
            if (packageCost <= 0) {
                document.getElementById('packageCostError').innerText = "Please enter a valid positive cost.";
                document.getElementById('packageCostError').style.display = 'block';
                isValid = false;
            }

            // Regex for preventing numbers in text fields
            let namePattern = /^[A-Za-z\s]+$/;

            // Validate trip name
            let tripName = document.getElementById('tripName').value;
            if (!namePattern.test(tripName)) {
                document.getElementById('tripNameError').innerText = "Trip Name should not contain numbers.";
                document.getElementById('tripNameError').style.display = 'block';
                isValid = false;
            }

            // Validate description
            let description = document.getElementById('description').value;
            if (!namePattern.test(description)) {
                document.getElementById('descriptionError').innerText = "Description should not contain numbers.";
                document.getElementById('descriptionError').style.display = 'block';
                isValid = false;
            }

            // Validate destination image
            let destinationImage = document.getElementById('destinationImage').value;
            if (destinationImage === "") {
                document.getElementById('destinationImageError').innerText = "Please upload a destination image.";
                document.getElementById('destinationImageError').style.display = 'block';
                isValid = false;
            }

            // Validate hotel name
            let hotelName = document.getElementById('hotelName').value;
            if (!namePattern.test(hotelName)) {
                document.getElementById('hotelNameError').innerText = "Hotel Name should not contain numbers.";
                document.getElementById('hotelNameError').style.display = 'block';
                isValid = false;
            }

            // Validate rating
            let rating = document.querySelector('input[name="rating"]:checked');
            if (rating === null) {
                document.getElementById('ratingError').innerText = "Please select a hotel rating.";
                document.getElementById('ratingError').style.display = 'block';
                isValid = false;
            }

            // Validate hotel image
            let hotelImage = document.getElementById('hotelImage').value;
            if (hotelImage === "") {
                document.getElementById('hotelImageError').innerText = "Please upload a hotel image.";
                document.getElementById('hotelImageError').style.display = 'block';
                isValid = false;
            }

            // Validate hotel location
            let hotelLocation = document.getElementById('hotelLocation').value;
            if (hotelLocation === "") {
                document.getElementById('hotelLocationError').innerText = "Hotel Location is required.";
                document.getElementById('hotelLocationError').style.display = 'block';
                isValid = false;
            }

            return isValid;
        }
    </script>
@endsection