@extends('client.layout.master')
@section('body')
<style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .payment-party { /* renamed from payment-container */
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: black;
        }
        .tap-dancers { /* renamed from tabs */
            display: flex;
            margin-bottom: 20px;
        }
        .tiny-tap { /* renamed from tab */
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            border-bottom: 3px solid #ddd;
        }
        .tiny-tap.active { /* renamed from tab.active */
            border-bottom: 3px solid lightseagreen;
            color: lightseagreen;
        }
        .sneaky-tab-content { /* renamed from tab-content */
            display: none;
        }
        .sneaky-tab-content.active { /* renamed from tab-content.active */
            display: block;
        }
        .silly-group { /* renamed from form-group */
            margin-bottom: 15px;
        }
        .silly-group label { /* renamed from form-group label */
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .silly-group input { /* renamed from form-group input */
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .silly-group input:focus { /* renamed from form-group input:focus */
            border-color: lightseagreen;
        }
        .big-bang-button { /* renamed from submit-btn */
            width: 100%;
            padding: 12px;
            background-color: lightseagreen;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .big-bang-button:hover { /* renamed from submit-btn:hover */
            background-color: darkseagreen;
        }
        .money-talks { /* renamed from total-fare */
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
            color:black;
        }
        .money-talks span { /* renamed from total-fare span */
            color: green;
        }
        .oopsies { /* renamed from error */
            color: red;
            font-size: 14px;
        }

        /* Background Overlay */
        .spooky-overlay { /* renamed from overlay */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* 50% opacity */
            z-index: 999;
            display: none;
        }

        /* Success Modal Styles */
        .victory-bubble { /* renamed from modal */
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 350px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
        }
        .victory-bubble h1 { /* renamed from modal h1 */
            font-size: 22px;
            margin-bottom: 20px;
        }
        .celebration-circle { /* renamed from checkmark-circle */
            width: 100px;
            height: 100px;
            background-color: #4CAF50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .check-doodle { /* renamed from checkmark */
            color: white;
            font-size: 48px;
        }
        .cheery-words { /* renamed from success-message */
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }
        .hocus-pocus-btn { /* renamed from close-btn */
            background-color: #9b0059;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .hocus-pocus-btn:hover { /* renamed from close-btn:hover */
            background-color: #780046;
        }
    </style>

<div class="payment">
<div class="payment-party">
    <h2>Payment Method</h2>

    <div class="tap-dancers">
        <div class="tiny-tap active" data-target="card-payment">Credit/Debit Card Payment</div>
    </div>

    <div class="money-talks">
        Total Fare: <span>NPR 2006</span>
    </div>

    <div id="card-payment" class="sneaky-tab-content active">
        <div class="silly-group">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" placeholder="Enter card number" maxlength="16">
            <div class="oopsies" id="card-number-error"></div>
        </div>
        <div class="silly-group">
            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label for="expiry-month">Expiry Month (MM)</label>
                    <input type="text" id="expiry-month" placeholder="MM" maxlength="2">
                    <div class="oopsies" id="expiry-month-error"></div>
                </div>
                <div style="flex: 1;">
                    <label for="expiry-year">Expiry Year (YYYY)</label>
                    <input type="text" id="expiry-year" placeholder="YYYY" maxlength="4">
                    <div class="oopsies" id="expiry-year-error"></div>
                </div>
            </div>
        </div>
        <div class="silly-group">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" placeholder="Enter CVV" maxlength="3">
            <div class="oopsies" id="cvv-error"></div>
        </div>
        <button class="big-bang-button" onclick="validateCard()">Pay with Card</button>
    </div>
</div>

<!-- Background Overlay -->
<div class="spooky-overlay" id="overlay"></div>

<!-- Success Modal -->
<div class="victory-bubble" id="successModal">
    <h1>Payment Successful</h1>
    <div class="celebration-circle">
        <span class="check-doodle">✔</span>
    </div>
    <p class="cheery-words">Thank you for your payment!</p>
    <button class="hocus-pocus-btn" onclick="closeModal()"><a href="{{ route('client.boardingpass',) }}">OK</button></a>
</div>
</div>

<script>
    function validateCard() {
        document.getElementById('card-number-error').innerText = '';
        document.getElementById('expiry-month-error').innerText = '';
        document.getElementById('expiry-year-error').innerText = '';
        document.getElementById('cvv-error').innerText = '';

        const cardNumber = document.getElementById('card-number').value;
        const expiryMonth = document.getElementById('expiry-month').value;
        const expiryYear = document.getElementById('expiry-year').value;
        const cvv = document.getElementById('cvv').value;
        let isValid = true;

        if (!/^\d{16}$/.test(cardNumber)) {
            document.getElementById('card-number-error').innerText = 'Invalid card number. Must be 16 digits.';
            isValid = false;
        }

        if (!/^(0[1-9]|1[0-2])$/.test(expiryMonth)) {
            document.getElementById('expiry-month-error').innerText = 'Invalid month. Must be MM (01-12).';
            isValid = false;
        }

        if (!/^\d{4}$/.test(expiryYear)) {
            document.getElementById('expiry-year-error').innerText = 'Invalid year. Must be YYYY.';
            isValid = false;
        }

        if (!/^\d{3}$/.test(cvv)) {
            document.getElementById('cvv-error').innerText = 'Invalid CVV. Must be 3 digits.';
            isValid = false;
        }

        if (isValid) {
            showModal();
        }
    }

    function showModal() {
        document.getElementById('successModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>
@endsection

