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
            margin-top: 50px;
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
                    <a href="{{ route('admin.scheduleflight.create') }}" style="text-decoration: none; color: white; ">✈ Schedule Flight</a>
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
                    <th>DDT</th>
                    <th>ADT</th>
                    <th>Make Changes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scheduleflight as $sf)
                <tr>
                    <td>{{ $sf->flight_number }}</td>
                    <td>{{ $sf->select_source }}</td>
                    <td>{{ $sf->select_destination }}</td>
                    <td>{{ $sf->depart_date_time }}</td>
                    <td>{{ $sf->arriv_date_time }}</td>
                    <td>
                        <!-- Action buttons for Edit, Remove, and View -->
                        <a href="{{ route('admin.scheduleflight.edit', $sf->id) }}"><button class="modify-button aircraft-edit-button">Edit</button></a>
                        <a href="{{ route('admin.scheduleflight.destroy', $sf->id) }}" class="deleteLINK"><button class="modify-button aircraft-remove-button">Remove</button></a>
                        <a href="{{ route('admin.scheduleflight.show', $sf->id) }}"><button class="modify-button aircraft-view-button">View</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.deleteLink').click(function(e) {
                e.preventDefault(); // Prevent the default action (navigating to the link)

                var deleteLink = $(this);

                // Send AJAX request to the delete route
                if (confirm('Are you sure you want to delete?')) {
                    $.ajax({
                        url: deleteLink.attr('href'), // Get the href attribute of the clicked link
                        type: 'POST', // Or 'DELETE' depending on your route configuration
                        data: {
                            _token: '{{ csrf_token() }}', // Add CSRF token if required
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            // Handle success response
                            toastr.success("Delete successfully.");
                            // Hide the table row
                            deleteLink.closest('tr').hide();
                        },
                        error: function(xhr) {
                            // Handle error response
                            toastr.error("Error deleting item.");
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
