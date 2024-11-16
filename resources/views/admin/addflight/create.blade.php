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
<form action="{{ route('admin.addflight.store') }}" method="POST">
    @csrf
    <div class="addflight">

        <div class="form-box">
            <div class="header-section">
                <h2 class="title-heading">Add a Flight</h2>
                <button class="secondary-action">✈ View Flight(s)</button>
            </div>

            <div class="input-section">
                <label class="input-label" for="flight-no">Enter Flight Number</label>
                <!-- Make Flight Number required and with a maximum length of 255 characters -->
                <input class="text-field" type="text" id="flight-no" name="Flight_No" placeholder="Enter flight number" required maxlength="255">
            </div>

            <div class="input-section">
                <label class="input-label">Flight Has</label>
                <div class="options-grid">
                    <!-- Economy and Business checkboxes (optional, so no "required") -->
                    <label>
                        <input class="checkbox-option" type="checkbox" name="is_economy_available" value="1"> Economy Class
                    </label>
                    <label>
                        <input class="checkbox-option" type="checkbox" name="is_business_available" value="1"> Business Class
                    </label>
                </div>
            </div>

            <div class="input-section">
                <label class="input-label" for="economy-seats">Enter Number of Economy Class Seats</label>
                <!-- Make Economy Seats required, must be an integer and at least 0 -->
                <input class="number-field" type="number" name="NOS_Economy" id="economy-seats" placeholder="0" required min="0">
            </div>

            <div class="input-section">
                <label class="input-label" for="business-seats">Enter Number of Business Class Seats</label>
                <!-- Make Business Seats required, must be an integer and at least 0 -->
                <input class="number-field" type="number" name="NOS_Business" id="business-seats" placeholder="0" required min="0">
            </div>

            <div class="input-section">
                <label class="input-label" for="total-seats">Total Number of Seats</label>
                <!-- Total seats field is read-only, dynamically updated via JavaScript -->
                <input class="number-field read-only-input" name="NOS_Total" type="number" id="total-seats" value="0" readonly>
            </div>

            <div class="action-buttons">
                <button type="submit" class="action-btn primary-submit">Submit</button>
                <button type="reset" class="action-btn primary-reset">Reset</button>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const economySeatsInput = document.getElementById('economy-seats');
        const businessSeatsInput = document.getElementById('business-seats');
        const totalSeatsInput = document.getElementById('total-seats');

        function updateTotalSeats() {
            const economySeats = parseInt(economySeatsInput.value) || 0;
            const businessSeats = parseInt(businessSeatsInput.value) || 0;
            const totalSeats = economySeats + businessSeats;
            totalSeatsInput.value = totalSeats;
        }

        // Update total when the input values change
        economySeatsInput.addEventListener('input', updateTotalSeats);
        businessSeatsInput.addEventListener('input', updateTotalSeats);
    });
</script>
@endsection