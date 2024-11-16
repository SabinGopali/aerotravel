@extends('client.layout.master')
@section('body')
    <style>
        .tripplan {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal overflow */
        }

        .explorer-container { /* renamed from container */
            background-color: #fff;
            padding: 20px;
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .journey-header { /* renamed from package-header */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .headline-destination { /* renamed from package-header h1 */
            font-size: 24px;
            color:black;
        }

        .vacation-details { /* renamed from package-info */
            margin-top: 10px;
        }

        .info-text { /* renamed from package-info p */
            font-size: 14px;
            color: #333;
        }

        .tariff { /* renamed from price */
            font-size: 24px;
            color: green;
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }

        .visual-section { /* renamed from image-section */
            margin-top: 20px;
            text-align: center;
        }

        .scenic-view { /* renamed from image-section img */
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .help-desk { /* renamed from enquiry */
            margin-top: 20px;
        }

        .help-text { /* renamed from enquiry p */
            font-size: 14px;
            color: #555;
        }

        .inn-section { /* renamed from hotel */
            margin-top: 40px;
        }

        .inn-header { /* renamed from hotel-header */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .inn-title { /* renamed from hotel-header h2 */
            font-size: 20px;
            color: #333;
        }

        .rating-stars { /* renamed from hotel-header .stars */
            font-size: 18px;
            color: gold;
        }

        /* Image section for the hotel */
        .inn-gallery { /* renamed from hotel-image-section */
            margin-top: 20px;
            text-align: center;
        }

        .inn-preview { /* renamed from hotel-image-section img */
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .inn-description { /* renamed from hotel-details */
            margin-top: 10px;
        }

        .description-text { /* renamed from hotel-details p */
            font-size: 14px;
            color: #333;
        }

        .facility-icons { /* renamed from hotel-icons */
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .icon-img { /* renamed from hotel-icons img */
            width: 24px;
            height: 24px;
        }

        /* Book Now Button */
        .booking-area { /* renamed from book-now */
            margin-top: 30px;
            text-align: center;
        }

        .cta-button { /* renamed from book-now button */
            padding: 12px 30px;
            font-size: 16px;
            background-color: lightseagreen;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .cta-button:hover {
            background-color: lightseagreen;
            transform: scale(1.05);
        }

        .cta-button:active {
            transform: scale(1);
        }

        /* Ensure the container height grows based on content */
        html, body {
            height: auto;
        }

    </style>

<div class="tripplan">
<div class="explorer-container"> <!-- renamed from container -->
    <!-- Package Section -->
    <div class="journey-header"> <!-- renamed from package-header -->
        <h1 class="headline-destination">{{ $travellerdetails->tripname }}</h1>
        <!-- <div class="tariff">NPR 16,789.10</div> -->
    </div>
    <div class="vacation-details"> <!-- renamed from package-info -->
        <p class="info-text">{{ $travellerdetails->description }}</p>
    </div>

    <!-- Image Section -->
    <div class="visual-section"> <!-- renamed from image-section -->
        <img class="scenic-view" src="{{ asset('storage/' . $travellerdetails->destinationimage) }}" alt="Pokhara Image"> <!-- renamed from image-section img -->
    </div>

    <!-- Enquiry Section -->
    <div class="help-desk"> <!-- renamed from enquiry -->
        <p class="help-text"><strong>For Quick Enquiry:</strong></p>
        <p class="help-text"><strong>Mobile:</strong> +977 9803160194 / 9860005625</p>
        <p class="help-text"><strong>Reservation No:</strong> 9854425478 | <strong>Email:</strong> aerotravel@gmail.com</p>
    </div>

    <!-- Hotel Section -->
    <div class="inn-section"> <!-- renamed from hotel -->
        <div class="inn-header"> <!-- renamed from hotel-header -->
            <h2 class="inn-title">{{ $travellerdetails->hotelname }}</h2> <!-- renamed from hotel-header h2 -->
            <span class="rating-stars">Rating:{{ $travellerdetails->rating }}</span> <!-- renamed from hotel-header stars -->
        </div>

        <!-- Hotel Image Section -->
        <div class="inn-gallery"> <!-- renamed from hotel-image-section -->
            <img class="inn-preview" src="{{ asset('storage/' . $travellerdetails->hotelimage) }}" alt="Hotel Crown Himalayas"> <!-- renamed from hotel-image-section img -->
        </div>

        <div class="inn-description"> <!-- renamed from hotel-details -->
            <p class="description-text">{{ $travellerdetails->hotellocation }}</p> <!-- renamed from hotel-details p -->
        </div>
        <div class="facility-icons"> <!-- renamed from hotel-icons -->
            <img class="icon-img" src="https://img.icons8.com/ios-filled/50/000000/bath.png" alt="Bath Icon"> <!-- renamed from hotel-icons img -->
            <img class="icon-img" src="https://img.icons8.com/ios-filled/50/000000/wifi.png" alt="WiFi Icon">
            <img class="icon-img" src="https://img.icons8.com/ios-filled/50/000000/air-conditioner.png" alt="AC Icon">
            <img class="icon-img" src="https://img.icons8.com/ios-filled/50/000000/car.png" alt="Car Icon">
            <img class="icon-img" src="https://img.icons8.com/ios-filled/50/000000/parking.png" alt="Parking Icon">
        </div>

        <!-- Book Now Button -->
        <div class="booking-area"> <!-- renamed from book-now -->
            <button class="cta-button"><a href="{{ route('client.travellerdetails', ['id' => $travellerdetails->id] ) }}">Book Now</button></a> <!-- renamed from book-now button -->
        </div>
    </div>
</div>
</div>

@endsection