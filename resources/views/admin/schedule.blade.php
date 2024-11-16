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
    <form class="form-wrapper">
        <div class="section-group">
            <label class="label-text" for="flight-number">Select Flight Number</label>
            <input class="input-box" type="text" id="flight-number" placeholder="Enter Flight Number" required>
        </div>

        <div class="section-group">
            <label class="label-text">Flight Has</label>
            <div class="option-group">
                <label><input type="checkbox" checked> Economy Class</label>
                <label><input type="checkbox" checked> Business Class</label>
            </div>
        </div>

        <div class="section-group">
            <label class="label-text" for="economy-seats">Number of Economy Class Seats</label>
            <input class="input-number" type="number" id="economy-seats" placeholder="Number of Economy Seats" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="business-seats">Number of Business Class Seats</label>
            <input class="input-number" type="number" id="business-seats" placeholder="Number of Business Seats" required>
        </div>


        <div class="section-group">
            <label class="label-text" for="source">Select Source</label>
            <select class="select-box" id="source" required>
                <option>Select Source</option>
                <option>City A</option>
                <option>City B</option>
            </select>
        </div>

        <div class="section-group">
            <label class="label-text" for="destination">Select Destination</label>
            <select class="select-box" id="destination" required>
                <option>Select Destination</option>
                <option>City X</option>
                <option>City Y</option>
            </select>
        </div>

        <div class="section-group">
            <label class="label-text" for="departure-time">Departure Date-Time</label>
            <input class="input-date" type="datetime-local" id="departure-time" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="arrival-time">Arrival Date-Time</label>
            <input class="input-date" type="datetime-local" id="arrival-time" required>
        </div>

        <div class="section-group">
            <label class="label-text" for="economy-cost">Seat Cost for Economy Class</label>
            <input class="input-number" type="number" id="economy-cost" placeholder="Cost for Economy Class" required>
        </div>


        <div class="section-group">
            <label class="label-text" for="business-cost">Seat Cost for Business Class</label>
            <input class="input-number" type="number" id="business-cost" placeholder="Cost for Business Class" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="action-button submit-button">Submit</button>
            <button type="reset" class="action-button reset-button">Reset</button>
        </div>
    </form>
</div>
</div>
@endsection