@extends('admin.layout.master')
@section('body')
<style>
        .schedulebody {
            font-family: Arial, sans-serif;
            
            margin: 0;
            padding: 20px;
        }

        .main-wrapper {
            width:1200px;
            
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .heading-title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-wrapper {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .section-group {
            display: flex;
            flex-direction: column;
        }

        .label-text {
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .input-box,
        .input-number,
        .input-date,
        .select-box {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            transition: border 0.3s;
        }

        .input-box:focus,
        .input-number:focus,
        .input-date:focus,
        .select-box:focus {
            border-color: #007bff;
            outline: none;
        }

        .option-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 20px;
        }

        .action-button {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button {
            background-color: lightseagreen;
            color: white;
        }

        .submit-button:hover {
            background-color: lightseagreen;
        }

        .reset-button {
            background-color: #dc3545;
            color: white;
        }

        .reset-button:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .main-wrapper {
                width: 95%;
            }
        }
    </style>

<div class="schedulebody">
<div class="main-wrapper">
    <h2 class="heading-title">Schedule a Flight</h2>
    <form class="form-wrapper" method="POST" action="{{ route('admin.scheduleflight.store') }}">
        @csrf
        <div class="section-group">
            <label class="label-text" for="flight-number">Select Flight Number</label>
            <input class="input-box" type="text" id="flight-number" name="flight_number" placeholder="Enter Flight Number" required>
        </div>

        <div class="form-group">
            <label for="inputDescription">Choose Flight Class</label>
            <div class="form-check form-check-success">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="class"
                        id="optionsRadios1" value="Economy" checked="">
                    Economy
                    <i class="input-helper"></i></label>
            </div>
            <div class="form-check form-check-danger">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="class"
                        id="optionsRadios2" value="Business">
                    Business
                    <i class="input-helper"></i></label>
            </div>
        </div>

        {{-- <div class="section-group">
            <label class="label-text" for="economy-seats">Number of Economy Class Seats</label>
            <input class="input-number" type="number" name="nos_economy" id="economy-seats" placeholder="Number of Economy Seats" >
        </div>

        <div class="section-group">
            <label class="label-text" for="business-seats">Number of Business Class Seats</label>
            <input class="input-number" type="number" name="nos_business" id="business-seats" placeholder="Number of Business Seats" >
        </div> --}}


        <div class="section-group">
            <label class="label-text" for="source">Select Source</label>
            <select class="select-box" id="source" name="select_source" required>
                <option>Select Source</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Everest experience">Everest experience</option>
                <option value="Annapurna experience">Annapurna experience</option>
                <option value="Bhadrapur (jhapa)">Bhadrapur (jhapa)</option>
                <option value="Bhairahawa">Bhairahawa</option>
                <option value="Bharatpur (chitwan)">Bharatpur (chitwan)</option>
                <option value="Biratnagar">Biratnagar</option>
                <option value="Dhangadhi">Dhangadhi</option>
                <option value="Janakpur">Janakpur</option>
                <option value="Nepalgunj">Nepalgunj</option>
                <option value="Pokhara">Pokhara</option>
                <option value="Rajbiraj">Rajbiraj</option>
                <option value="Simara">Simara</option>
                <option value="Surkhet">Surkhet</option>
                <option value="Tumlingtar">Tumlingtar</option>
                <option value="Varanasi">Varanasi</option>
            </select>
        </div>

        <div class="section-group">
            <label class="label-text" for="destination">Select Destination</label>
            <select class="select-box" id="destination" name="select_destination" required>
                <option>Select Destination</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Everest experience">Everest experience</option>
                <option value="Annapurna experience">Annapurna experience</option>
                <option value="Bhadrapur (jhapa)">Bhadrapur (jhapa)</option>
                <option value="Bhairahawa">Bhairahawa</option>
                <option value="Bharatpur (chitwan)">Bharatpur (chitwan)</option>
                <option value="Biratnagar">Biratnagar</option>
                <option value="Dhangadhi">Dhangadhi</option>
                <option value="Janakpur">Janakpur</option>
                <option value="Nepalgunj">Nepalgunj</option>
                <option value="Pokhara">Pokhara</option>
                <option value="Rajbiraj">Rajbiraj</option>
                <option value="Simara">Simara</option>
                <option value="Surkhet">Surkhet</option>
                <option value="Tumlingtar">Tumlingtar</option>
                <option value="Varanasi">Varanasi</option>
            </select>
        </div>

        <div class="section-group">
            <label class="label-text" for="departure-time">Departure Date-Time</label>
            <input class="input-date" type="datetime-local" name="depart_date_time" id="departure-time" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="arrival-time">Arrival Date-Time</label>
            <input class="input-date" type="datetime-local" name="arriv_date_time" id="arrival-time" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="economy-cost">Class Cost</label>
            <input class="input-number" type="number" id="economy-cost" name="class_cost" placeholder="Seat Cost" >
        </div>


        {{-- <div class="section-group">
            <label class="label-text" for="business-cost">Seat Cost for Business Class</label>
            <input class="input-number" type="number" id="business-cost" name="sc_business" placeholder="Cost for Business Class" >
        </div> --}}

        <div class="form-actions">
            <button type="submit" class="action-button submit-button">Submit</button>
        </div>
    </form>
</div>
</div>
@endsection