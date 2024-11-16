@extends('client.layout.master')
@section('body')
    <style>
        .boardingpass {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            flex-direction: column;
        }

        .sky-portal {
            display: flex;
            justify-content: space-between;
            background-color: white;
            width: 900px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .windward-side {
            padding: 30px;
            width: 70%;
        }

        .leeward-side {
            background-color: lightseagreen;
            color: white;
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .bird-emblem {
            width: 150px;
            margin-bottom: 20px;
        }

        .air-tier {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .sky-details {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            margin-bottom: 15px;
            grid-gap: 15px;
            align-items: center;
        }

        .sky-info {
            display: flex;
            flex-direction: column;
        }

        .sky-tag {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        .sky-highlight {
            font-size: 16px;
            font-weight: bold;
            color: black;
        }

        .cloud-banner {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .gate-reminder {
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }

        .flight-emblem {
            width: 80px;
            margin-top: 20px;
        }

        /* Button Styling */
        .ticket-press {
            padding: 10px 20px;
            font-size: 16px;
            background-color: lightseagreen;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .ticket-press:hover {
            background-color: lightseagreen;
        }

        /* Hide elements that should not be printed */
        @media print {
            body * {
                visibility: hidden;
            }

            .boardingpass, .boardingpass * {
                visibility: visible;
            }

            .boardingpass {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: auto;
            }

            .ticket-press {
                display: none;
            }
        }
    </style>

    <div class="boardingpass">
        {{-- @foreach($scheduleflight as $flight) --}}
        <div class="sky-portal">
            <!-- Left Section -->
            <div class="windward-side">
                <img src="{{ asset('frontend/img/logo/smalllogo.png') }}" alt="Logo" class="bird-emblem">
                <div class="sky-details">
                    {{-- <div class="sky-info">
                        <span class="sky-tag">Airline</span>
                        <div class="sky-highlight">AeroTravel</div>
                    </div> --}}
                    {{-- <div class="sky-info">
                        <span class="sky-tag">From</span>
                        <div class="sky-highlight">{{ $flight->select_source }}</div>
                    </div>
                    <div class="sky-info">
                        <span class="sky-tag">To</span>
                        <div class="sky-highlight">{{ $flight->select_destination }}</div>
                    </div> --}}
                    {{-- <div class="sky-info">
                        <span class="sky-tag">Board Time</span>
                        <div class="sky-highlight">{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('H:i') }}</div>
                    </div> --}}
                    <div class="sky-info">
                        <span class="sky-tag">Passenger</span>
                        <div class="sky-highlight">Mr. Kalpesh Mali</div>
                    </div>
                    <div class="sky-info">
                        <span class="sky-tag">Departure</span>
                        <div class="sky-highlight">{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('D, d M') }}</div>
                    </div>
                    {{-- <div class="sky-info">
                        <span class="sky-tag">Arrival</span>
                        <div class="sky-highlight">{{ \Carbon\Carbon::parse($flight->arriv_date_time)->format('D, d M') }}</div>
                    </div> --}}
                    {{-- <div class="sky-info">
                        <span class="sky-tag">Flight</span>
                        <div class="sky-highlight">{{ $flight->flight_number }}</div>
                    </div> --}}
                    {{-- <div class="sky-info">
                        <span class="sky-tag">PRN No</span>
                        <div class="sky-highlight">220520240042</div>
                    </div> --}}
                    <div class="sky-info">
                        <span class="sky-tag">No. of Passengers</span>
                        <div class="sky-highlight">{{ \Carbon\Carbon::parse($flight->depart_date_time)->format('H:i') }}</div>
                    </div>
                    {{-- <div class="sky-info">
                        <span class="sky-tag">Arrival Time</span>
                        <div class="sky-highlight">{{ \Carbon\Carbon::parse($flight->arriv_date_time)->format('H:i') }}</div>
                    </div> --}}
                </div>
            </div>

            <!-- Right Section -->
            <div class="leeward-side">
                <h3 class="cloud-banner">AeroTravel</h3>
                <p style="color: black">Thank you for choosing us.</p>
                <p class="gate-reminder" style="color: black">Please be at the gate at boarding time</p>
                <img src="{{ asset('frontend/img/logo/white-logo.png') }}" alt="Plane Icon" class="flight-emblem">
            </div>
        </div>
        @endforeach

        <!-- Print Button -->
        <button class="ticket-press" id="printButton">Print Boarding Pass</button>
    </div>

    <script>
        // Print and redirect after printing
        document.getElementById('printButton').addEventListener('click', function () {
            window.print();
        });

        // Redirect after printing is finished
        // window.onafterprint = function() {
        //     window.location.href = 'https://example.com/thank-you'; // Replace with your desired URL
        // };
    </script>
@endsection
