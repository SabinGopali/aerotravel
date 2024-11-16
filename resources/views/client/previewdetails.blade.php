@extends('client.layout.master');
@section('body')
    <style>
        .flight {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container4 {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .header4 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .flight-info4 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }
        .flight-info4 div {
            text-align: left;
        }
        .flight-info4 div p {
            margin: 5px 0;
            font-size: 18px;
        }
        .airline4 {
            font-weight: bold;
            color: #333;
        }
        .flight-time4 {
            text-align: center;
        }
        .flight-time4 .arrow {
            color: green;
            margin: 0 10px;
        }
        .cost-info4 {
            padding: 20px;
            background-color: #f7f7f7;
            margin-top: 20px;
            border-radius: 10px;
        }
        .cost-info4 p {
            margin: 10px 0;
            font-size: 18px;
        }
        .buttons4 {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .button4 {
            background-color: lightseagreen;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button4:hover {
            background-color: lightseagreen;
        }
        .button14 {
            /* background-color:  #cccccc;
            color: white; */
            background-color: #cccccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button14:hover {
            background-color:   #999999;
        }

         /* Timeline Section */
         .timelin4 {
            position: relative;
            width: 100px;
            height: 2px;
            background-color: #00b167;
            margin: 0 20px;
        }

        .timeline4:before {
            content: '';
            position: absolute;
            top: -6px;
            left: 0;
            width: 12px;
            height: 12px;
            background-color: #00b167;
            border-radius: 50%;
        }

        .timeline4:after {
            content: '\2708'; /* Plane Icon */
            position: absolute;
            top: -15px;
            right: -12px;
            font-size: 22px;
            color: #00b167;
        }
    </style>

<div class="flight">
    @foreach($scheduleflight as $flight)
<div class="container4">
    <div class="header4">Preview</div>
    <div class="flight-info4">
        <div>
            <p><strong>{{ $flight->select_source }}</strong></p>
            <p>Departed</p>
            <p><strong>{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('H:i') }}</strong></p>
            <p>{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('D, d M') }}</p>
        </div>

            <!-- <p><span class="arrow" >✈</span></p> -->
            <div class="timeline4"></div>

        <div>
            <p><strong>{{ $flight->select_destination }}</strong></p>
            <p>Arrived</p>
            <p><strong>{{ \Carbon\Carbon::parse($flight->arriv_date_time)->format('H:i') }}</strong></p>
            <p>{{ \Carbon\Carbon::parse($flight->arriv_date_time)->format('D, d M') }}</p>
        </div>
    </div>

    <div class="cost-info4">
        <p>Total Passenger(s): 1</p>
        <p>Cost Per Seat: RS 1003</p>
        {{-- <p><strong>Total Cost: INR 2006</strong></p> --}}
    </div>

    <div class="buttons4">
        <button class="button14">Back</button>
        <button class="button4"><a href="{{ route('client.paymentDetails') }}">Proceed</button></a>
    </div>
    @endforeach
</div>
</div>

@endsection