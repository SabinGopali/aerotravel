@extends('admin.layout.master')
@section('body')
<style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        } */

        .container {
            width: 80%;
            margin: 40px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: relative; /* Set container to relative */
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #343a40;
        }

        .search-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-section input {
            width: 60%;
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-section .search-btn {
            background-color: lightseagreen;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-section p {
            font-size: 12px;
            color: #6c757d;
        }

        .flight-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .flight-table th,
        .flight-table td {
            padding: 12px 16px;
            border: 1px solid #dee2e6;
            text-align: left;
            color: #495057;
        }

        .flight-table th {
            background-color: #f1f3f5;
            color: #343a40;
            font-weight: 600;
        }

        .flight-table td button {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 4px;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #17a2b8;
            color: white;
        }

        .schedule-btn {
            background-color: #28a745;
            color: white;
        }

        .remove-btn {
            background-color: #dc3545;
            color: white;
        }

        .add-btn {
            background-color: lightseagreen;
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            position: absolute; /* Position the button absolutely */
            top: 20px; /* Adjust the vertical position */
            right: 20px;
            color: white; /* Adjust the horizontal position */
        }
</style>

<div class="container">
        <h1>Flight Details</h1>
        
        <button class="add-btn"><a href="{{ route('admin.adminaddflight') }}">Add New Flight</button></a> 
        
        <div class="search-section">
            <input type="text" placeholder="You can search here">
            <button class="search-btn">Search</button>
            <p>(You can search flight details using flight no)</p>
        </div>
        
        <table class="flight-table">
            <thead>
                <tr>
                    
                    <th>Flight No</th>
                    <th>NOE</th>
                    <th>NOF</th>
                    <th>NOB</th>
                    <th>TNOS</th>
                    <th>Make Changes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>101</td>
                    <td>22</td>
                    <td>0</td>
                    <td>18</td>
                    <td>40</td>
                    <td>
                        <button class="edit-btn"><a href="{{ route('admin.adminaddflight') }}">Edit</button></a>
                        <button class="schedule-btn">Schedule</button>
                        <button class="remove-btn">Remove</button>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

@endsection