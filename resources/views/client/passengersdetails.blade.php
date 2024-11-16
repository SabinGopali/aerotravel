@extends('client.layout.master')
@section('body')
<style>
    .bodyp {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .form-container3 {
        width: 80%;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .form-title3 {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .passenger-section3 {
        margin-bottom: 30px;
        padding: 20px;
        border-radius: 8px;
        background-color: #f7fafc;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .passenger-section3 h3 {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: bold;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    .row3 {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .form-group3 {
        flex: 1;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .form-group3:last-child {
        margin-right: 0;
    }

    .form-group3 label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    .form-group3 input,
    .form-group3 select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        color: #555;
        transition: border-color 0.3s ease;
    }

    .form-group3 input[type="date"] {
        padding: 8px;
    }

    .form-group3 input:focus,
    .form-group3 select:focus {
        border-color: #b34d81;
    }

    .form-group3 .icon-calendar {
        position: absolute;
        right: 10px;
        top: 34px;
        color: #888;
    }

    /* Buttons Section */
    .buttons3 {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .buttons3 button {
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .back-btn3 {
        background-color: #cccccc;
        color: #333;
    }

    .back-btn3:hover {
        background-color: #999999;
    }

    .submit-btn3 {
        background-color: lightseagreen;
        color: #fff;
    }

    .submit-btn3:hover {
        background-color: lightseagreen;
    }

    .error3 {
        color: red;
        font-size: 13px;
    }
</style>

<div class="bodyp">
<div class="form-container3">
    <div class="form-title3">Personal Information</div>

    <form id="passengerForm3" method="POST" action="{{  route('client.passengersdetails.store') }}">
        @csrf

        <!-- Passenger 1 -->
        <div class="passenger-section3">
            <h3>Passenger</h3>
            <div class="row3">
                <input type="hidden" name="schedule_flights">

                <div class="form-group3">
                    <label for="firstName1">First Name</label>
                    <input type="text" id="firstName1" name="fname" placeholder="First Name" required>
                    <span class="error3" id="firstName1Error"></span>
                </div>
                <div class="form-group3">
                    <label for="lastName1">Last Name</label>
                    <input type="text" id="lastName1" name="lname" placeholder="Last Name" required>
                    <span class="error3" id="lastName1Error"></span>
                </div>
                <div class="form-group3">
                    <label for="mobile1">Mobile Number</label>
                    <input type="text3" id="mobile1" name="contact" placeholder="Mobile Number" required
                        pattern="^[0-9]{10}$">
                    <span class="error3" id="mobile1Error"></span>
                </div>
            </div>
            <div class="row3">

                <div class="form-group3">
                    <label for="dob1">Date of Birth</label>
                    <input type="date" id="dob1" name="dob" required>
                    <span class="error3" id="dob1Error"></span>
                </div>
                
                <div class="form-group3">
                    <label for="dob1">No. of Passengers</label>
                    <input type="number" id="dob1" name="npassengers" required>
                    <span class="error3" id="dob1Error"></span>
                </div>

            </div>
        </div>
        <!-- Buttons Section -->

    
    <div class="buttons3">
        <button type="button" class="back-btn3">Back</button>
        <button type="submit" class="submit-btn3">Submit</button>
    </div>
</form>
</div>
</div>
@endsection