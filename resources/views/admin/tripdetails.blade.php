@extends('admin.layout.master')
@section('body')
    <style>
        .tripdetails {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 12000px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #e1e1e1;
        }

        th {
            background-color: gray;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flexbox;
            gap: 2px;
            /* width: 200px; */
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
            
        }

        .btn-edit {
            background-color: #17a2b8;
        }

        .btn-remove {
            background-color: #e74c3c;
        }

        .btn-view {
            background-color: #2ecc71;
        }

        .btn-schedule {
            float: right;
            padding: 10px 15px;
            background-color: lightseagreen;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-schedule:hover {
            background-color: lightseagreen;
        }
    </style>
<div class="tripdetails">
    <div class="container">
        <h1>Trip Details</h1>
        <button class="btn-schedule"><a href="{{ route('admin.travellerdetails.store') }}">Add Trip Details</button></a>
        <table>
            <thead>
                <tr>
                    
                    <th>Trip Name</th>
                    <th>Package Cost</th> <!-- New column for Package Cost -->
                    
                    <th>Destination Image</th>
                    <th>Hotel Name</th>
                    <th>Hotel Image</th>
                    <th>Hotel Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>Adventure Trip</td>
                    <td>Rs. 4990</td> <!-- Example Package Cost -->
                    <td>Explore the beautiful mountains and valleys.</td>
                    <td><img src="destination_image.png" alt="Destination" width="50"></td>
                    <td>Mountain Resort</td>
                    <td><img src="hotel_image.png" alt="Hotel" width="50"></td>
                    <td>Valley View</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-remove">Remove</button>
                            <button class="btn btn-view">View</button>
                        </div>
                    </td>
                </tr>
                <!-- Additional trip rows can be added here -->
            </tbody>
        </table>
    </div>
</div>
@endsection