@extends('admin.layout.master')
@section('body')
<style>
    

    .addflight {
        font-family: Arial, sans-serif;
        margin-left:150px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-box {
        width: 100%;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .title-heading {
        font-size: 24px;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 20px;
        text-align: center;
    }

    .input-section {
        display: grid;
        grid-template-columns: 1fr 2fr;
        align-items: center;
        margin-bottom: 20px;
    }

    .input-label {
        font-size: 16px;
        color: #343a40;
        padding-right: 20px;
        text-align: right;
    }

    .text-field,
    .number-field,
    .dropdown {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .checkbox-option {
        margin-right: 8px;
    }

    .options-grid {
        display: flex;
        gap: 20px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .action-btn {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        width: 150px;
    }

    .primary-submit {
        background-color: lightseagreen;
        color: white;
    }

    .primary-reset {
        background-color: lightseagreen;
        color: white;
    }

    .secondary-action {
        background-color: lightseagreen;
        color: black;
        float: right;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .read-only-input {
        background-color: #f8f9fa;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-section .secondary-action {
        margin-right: 20px;
    }
</style>
<div class="addflight">

    <div class="form-box">
        <div class="header-section">
            <h2 class="title-heading">Add a Flight</h2>
            <button class="secondary-action">✈ View Flight(s)</button>
        </div>

        <!-- <div class="input-section">
            <label class="input-label" for="airline">Select Airline</label>
            <select class="dropdown" id="airline">
                <option>Select Airline</option>
                <option>Emirates</option>
                <option>IndiGo</option>
                <option>Qatar Airways</option>
            </select>
        </div> -->

        <div class="input-section">
            <label class="input-label" for="flight-no">Enter Flight Number</label>
            <input class="text-field" type="text" id="flight-no" placeholder="Enter flight number">
        </div>

        <div class="input-section">
            <label class="input-label">Flight Has</label>
            <div class="options-grid">
                <label><input class="checkbox-option" type="checkbox" checked> Economy Class</label>
                <label><input class="checkbox-option" type="checkbox" checked> Business Class</label>
                <!-- <label><input class="checkbox-option" type="checkbox" checked> First Class</label> -->
            </div>
        </div>

        <div class="input-section">
            <label class="input-label" for="economy-seats">Enter Number of Economy Class Seats</label>
            <input class="number-field" type="number" id="economy-seats" placeholder="0">
        </div>

        <div class="input-section">
            <label class="input-label" for="business-seats">Enter Number of Business Class Seats</label>
            <input class="number-field" type="number" id="business-seats" placeholder="0">
        </div>

        <!-- <div class="input-section">
            <label class="input-label" for="first-class-seats">Enter Number of First Class Seats</label>
            <input class="number-field" type="number" id="first-class-seats" placeholder="0">
        </div> -->

        <div class="input-section">
            <label class="input-label" for="total-seats">Total Number of Seats</label>
            <input class="number-field read-only-input" type="number" id="total-seats" value="0" readonly>
        </div>

        <div class="action-buttons">
            <button class="action-btn primary-submit">Submit</button>
            <button class="action-btn primary-reset">Reset</button>
        </div>
    </div>
</div>
@endsection