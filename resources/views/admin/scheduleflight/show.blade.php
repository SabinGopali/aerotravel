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

        input[type="checkbox"][disabled] {
    cursor: not-allowed;
    background-color: #e9ecef;
}
    </style>

<div class="schedulebody">
<div class="main-wrapper">
    <h2 class="heading-title">Schedule a Flight</h2>
    <form class="form-wrapper" method="POST" action="{{ route('admin.scheduleflight.show', $scheduleflight->id) }}">
        @csrf
        <div class="section-group">
            <label class="label-text" for="flight-number">Select Flight Number</label>
            <input class="input-box" type="text" id="flight-number" readonly name="flight_number" value="{{$scheduleflight->flight_number}}" placeholder="Enter Flight Number" required>
        </div>

        <div class="form-group">
            <label for="inputDescription">Choose Flight Class</label>
            <div class="form-check form-check-success">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="class"
                        id="optionsRadios1" value="economy" disabled {{ $scheduleflight->class == 'economy' ? 'checked' : '' }}>
                    Economy
                    <i class="input-helper"></i>
                </label>
            </div>
            <div class="form-check form-check-danger">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="class"
                        id="optionsRadios2" value="business" disabled {{ $scheduleflight->class == 'business' ? 'checked' : '' }}>
                    Business
                    <i class="input-helper"></i>
                </label>
            </div>
        </div>


        {{-- <div class="section-group">
            <label class="label-text" for="economy-seats">Number of Economy Class Seats</label>
            <input class="input-number" type="number" name="nos_economy" readonly  value="{{$scheduleflight->nos_economy}}" id="economy-seats" placeholder="Number of Economy Seats" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="business-seats">Number of Business Class Seats</label>
            <input class="input-number" type="number" name="nos_business" readonly  value="{{$scheduleflight->nos_business}}" id="business-seats" placeholder="Number of Business Seats" required>
        </div> --}}


        <div class="section-group">
            <label class="label-text" for="source">Select Source</label>
            <select class="select-box" id="source" disabled name="select_source" required>
                <option value="">Select Source</option>
                <option value="Kathmandu" {{ old('select_source', $scheduleflight->select_source) == 'Kathmandu' ? 'selected' : '' }}>Kathmandu</option>
                <option value="Everest experience" {{ old('select_source', $scheduleflight->select_source) == 'Everest experience' ? 'selected' : '' }}>Everest experience</option>
                <option value="Annapurna experience" {{ old('select_source', $scheduleflight->select_source) == 'Annapurna experience' ? 'selected' : '' }}>Annapurna experience</option>
                <option value="Bhadrapur (Jhapa)" {{ old('select_source', $scheduleflight->select_source) == 'Bhadrapur (Jhapa)' ? 'selected' : '' }}>Bhadrapur (Jhapa)</option>
                <option value="Bhairahawa" {{ old('select_source', $scheduleflight->select_source) == 'Bhairahawa' ? 'selected' : '' }}>Bhairahawa</option>
                <option value="Bharatpur (Chitwan)" {{ old('select_source', $scheduleflight->select_source) == 'Bharatpur (Chitwan)' ? 'selected' : '' }}>Bharatpur (Chitwan)</option>
                <option value="Biratnagar" {{ old('select_source', $scheduleflight->select_source) == 'Biratnagar' ? 'selected' : '' }}>Biratnagar</option>
                <option value="Dhangadhi" {{ old('select_source', $scheduleflight->select_source) == 'Dhangadhi' ? 'selected' : '' }}>Dhangadhi</option>
                <option value="Janakpur" {{ old('select_source', $scheduleflight->select_source) == 'Janakpur' ? 'selected' : '' }}>Janakpur</option>
                <option value="Nepalgunj" {{ old('select_source', $scheduleflight->select_source) == 'Nepalgunj' ? 'selected' : '' }}>Nepalgunj</option>
                <option value="Pokhara" {{ old('select_source', $scheduleflight->select_source) == 'Pokhara' ? 'selected' : '' }}>Pokhara</option>
                <option value="Rajbiraj" {{ old('select_source', $scheduleflight->select_source) == 'Rajbiraj' ? 'selected' : '' }}>Rajbiraj</option>
                <option value="Simara" {{ old('select_source', $scheduleflight->select_source) == 'Simara' ? 'selected' : '' }}>Simara</option>
                <option value="Surkhet" {{ old('select_source', $scheduleflight->select_source) == 'Surkhet' ? 'selected' : '' }}>Surkhet</option>
                <option value="Tumlingtar" {{ old('select_source', $scheduleflight->select_source) == 'Tumlingtar' ? 'selected' : '' }}>Tumlingtar</option>
                <option value="Varanasi" {{ old('select_source', $scheduleflight->select_source) == 'Varanasi' ? 'selected' : '' }}>Varanasi</option>
            </select>
        </div>

        <div class="section-group">
            <label class="label-text" for="destination">Select Destination</label>
            <select class="select-box" id="destination" disabled name="select_destination" required>
                <option>Select Destination</option>
                <option value="Kathmandu" {{ $scheduleflight->select_destination == 'Kathmandu' ? 'selected' : '' }}>Kathmandu</option>
                <option value="Everest experience" {{ $scheduleflight->select_destination == 'Everest experience' ? 'selected' : '' }}>Everest experience</option>
                <option value="Annapurna experience" {{ $scheduleflight->select_destination == 'Annapurna experience' ? 'selected' : '' }}>Annapurna experience</option>
                <option value="Bhadrapur (Jhapa)" {{ $scheduleflight->select_destination == 'Bhadrapur (Jhapa)' ? 'selected' : '' }}>Bhadrapur (Jhapa)</option>
                <option value="Bhairahawa" {{ $scheduleflight->select_destination == 'Bhairahawa' ? 'selected' : '' }}>Bhairahawa</option>
                <option value="Bharatpur (Chitwan)" {{ $scheduleflight->select_destination == 'Bharatpur (Chitwan)' ? 'selected' : '' }}>Bharatpur (Chitwan)</option>
                <option value="Biratnagar" {{ $scheduleflight->select_destination == 'Biratnagar' ? 'selected' : '' }}>Biratnagar</option>
                <option value="Dhangadhi" {{ $scheduleflight->select_destination == 'Dhangadhi' ? 'selected' : '' }}>Dhangadhi</option>
                <option value="Janakpur" {{ $scheduleflight->select_destination == 'Janakpur' ? 'selected' : '' }}>Janakpur</option>
                <option value="Nepalgunj" {{ $scheduleflight->select_destination == 'Nepalgunj' ? 'selected' : '' }}>Nepalgunj</option>
                <option value="Pokhara" {{ $scheduleflight->select_destination == 'Pokhara' ? 'selected' : '' }}>Pokhara</option>
                <option value="Rajbiraj" {{ $scheduleflight->select_destination == 'Rajbiraj' ? 'selected' : '' }}>Rajbiraj</option>
                <option value="Simara" {{ $scheduleflight->select_destination == 'Simara' ? 'selected' : '' }}>Simara</option>
                <option value="Surkhet" {{ $scheduleflight->select_destination == 'Surkhet' ? 'selected' : '' }}>Surkhet</option>
                <option value="Tumlingtar" {{ $scheduleflight->select_destination == 'Tumlingtar' ? 'selected' : '' }}>Tumlingtar</option>
                <option value="Varanasi" {{ $scheduleflight->select_destination == 'Varanasi' ? 'selected' : '' }}>Varanasi</option>
            </select>
        </div>

        <div class="section-group">
            <label class="label-text" for="departure-time">Departure Date-Time</label>
            <input class="input-date" type="datetime-local" name="depart_date_time"  readonly value="{{$scheduleflight->depart_date_time}}" id="departure-time" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="arrival-time">Arrival Date-Time</label>
            <input class="input-date" type="datetime-local" name="arriv_date_time" readonly value="{{$scheduleflight->arriv_date_time}}" id="arrival-time" required>
        </div>

        {{-- <div class="section-group">
            <label class="label-text" for="economy-cost">Seat Cost for Economy Class</label>
            <input class="input-number" type="number" id="economy-cost" name="sc_economy" readonly value="{{$scheduleflight->sc_economy}}" placeholder="Cost for Economy Class" required>
        </div> --}}


        <div class="section-group">
            <label class="label-text" for="business-cost">class Cost</label>
            <input class="input-number" type="number" id="business-cost" name="class_cost" readonly value="{{$scheduleflight->class_cost}}" placeholder="Cost " required>
        </div>
    </form>
</div>
</div>
@endsection