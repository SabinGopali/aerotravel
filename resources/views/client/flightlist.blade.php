@extends('client.layout.master')

@section('body')
    <style>
        .flight{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh;
        }

        .flight-container2 {
            display: flex;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            width:90%;
        }

        /* Flight Info Section */
        .flight-info2 {
            display: flex;
            padding: 20px;
            align-items: center;
            flex-grow: 1;
            border-right: 1px solid #eaeaea;
            background-color: #f7fafc;
            position: relative;
        }

        .location2 {
            text-align: center;
            margin: 0 20px;
            width:40%;
        }

        .location2 h3 {
            font-size: 26px;
            color: #333;
        }

        .location2 .time {
            font-size: 36px;
            font-weight: bold;
            color: #2b2b2b;
            margin-bottom: 5px;
        }

        .location2 .status {
            font-size: 14px;
            color: #777;
        }

        /* Timeline Section */
        .timeline2 {
            position: relative;
            width: 100px;
            height: 2px;
            background-color: #00b167;
            margin: 0 20px;
        }

        .timeline2:before {
            content: '';
            position: absolute;
            top: -6px;
            left: 0;
            width: 12px;
            height: 12px;
            background-color: #00b167;
            border-radius: 50%;
        }

        .timeline2:after {
            content: '\2708'; /* Plane Icon */
            position: absolute;
            top: -15px;
            right: -12px;
            font-size: 22px;
            color: #00b167;
        }

        /* Fare Options Section */
        .fare-options2 {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
        }

        .fare-box2 {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-left: 20px;
        }

        .fare-box2:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .fare-box2 h4 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .fare-box2 p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .fare-box2 button {
            padding: 10px 20px;
            background-color: lightseagreen;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
        }

        .fare-box2 button:hover {
            background-color: lightseagreen;
        }
    </style>

<div class="flight-list">
    @if($recommendedFlights && count($recommendedFlights) > 0)
        @foreach($recommendedFlights as $flight)
            <div class="flight">
                <div class="flight-container2">
                    <!-- Flight Info -->
                    <div class="flight-info2">
                        <div class="location2">
                            <h3>{{ $flight->select_source }}</h3>
                            <div class="time2">{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('H:i') }}</div>
                            <div class="status2">Departed<br>{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('D, d M') }}</div>
                        </div>
                        <div class="timeline2"></div>
                        <div class="location2">
                            <h3>{{ $flight->select_destination }}</h3>
                            <div class="time2">{{ \Carbon\Carbon::parse($flight->arriv_date_time)->format('H:i') }}</div>
                            <div class="status2">Arrived<br>{{ \Carbon\Carbon::parse($flight->arriv_date_time)->format('D, d M') }}</div>
                        </div>
                    </div>

                    <!-- Fare Options -->
                    <div class="fare-options2">
                    @if($flight->class)
                            <div class="fare-box2">
                                <h4>{{ ($flight->class) }}</h4>
                                    <p>RS {{ number_format($flight->class_cost) }}</p>
                                    {{-- <p>Seats Available: {{ $flight->nos_economy }}</p> --}}
                                    <a href="{{ route('client.passengersDetails', ['id' => $flight->id]) }}"><button>Select</button></a>
                            </div>
                    @endif
                    {{-- @if($flight->sc_business && $flight->nos_business)
                        <div class="fare-box2">
                            <h4>Business</h4>
                            <p>RS {{ number_format($flight->class_cost) }}</p> --}}
                            {{-- <p>Seats Available: {{ $flight->nos_business }}</p> --}}
                            {{-- <a href="{{ route('client.passengersDetails') }}"><button>Select</button></a>
                        </div>
                    @endif     --}}
                    </div>
                </div>
            </div>
    </div>
        @endforeach
    @else
        <p>No flights found based on your search.</p>
    @endif
</div>




@endsection