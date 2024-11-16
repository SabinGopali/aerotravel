@extends('admin.layout.master')
@section('body')
<style>
        /* Container for the flight details */
        .falcon-flight-container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Header with the schedule button */
        .falcon-flight-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Styling the flight schedule button */
        .flight-plan-button {
            background-color: lightseagreen;
            color: black;
            padding: 10px 20px;
            border-radius: 4px;
            text-align: center;
            /* display: inline-block; */
            width:150px;
            margin-left: 1000px;
        }

        /* Table for flight data */
        .hawkflight-table {
            width: 100%;
            border-collapse: collapse; /* Ensures the border does not have gaps */
            border: 1px solid #ddd;
        }

        /* Table cell and header styling */
        .hawkflight-table th, .hawkflight-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd; /* Adds borders to table cells */
        }

        /* Styling for the table header */
        .hawkflight-table th {
            background-color: #f1f1f1;
        }

        /* Styling for action buttons (edit, remove, view) */
        .modify-button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }

        /* Edit button specific style */
        .aircraft-edit-button {
            background-color: #17a2b8;
        }

        /* Remove button specific style */
        .aircraft-remove-button {
            background-color: #dc3545;
        }

        /* View button specific style */
        .aircraft-view-button {
            background-color: #28a745;
        }
    </style>

<div class="falcon-flight-container">
        <!-- Header section with the Schedule Flight button -->
        <div class="falcon-flight-header">
            <div>
                <button class="flight-plan-button">
                    <a href="{{ route('admin.schedule') }}">✈ Schedule Flight</a>
                </button>
            </div>
        </div>

        <!-- Flight details table -->
        <table class="hawkflight-table">
            <thead>
                <tr>
                    <th>Flight No</th>
                    <th>SRC</th>
                    <th>DEST</th>
                    <th>ADT</th>
                    <th>DDT</th>
                    <th>CEC</th>
                    <th>CBC</th>
                    <th>CFC</th>
                    <th>Make Changes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>102</td>
                    <td>NSK</td>
                    <td>BOM</td>
                    <td>2024-05-22 23:30:00</td>
                    <td>2024-05-23 01:25:00</td>
                    <td>1002</td>
                    <td>8002</td>
                    <td>5002</td>
                    <td>
                        <!-- Action buttons for Edit, Remove, and View -->
                        <button class="modify-button aircraft-edit-button">Edit</button>
                        <button class="modify-button aircraft-remove-button">Remove</button>
                        <button class="modify-button aircraft-view-button">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
