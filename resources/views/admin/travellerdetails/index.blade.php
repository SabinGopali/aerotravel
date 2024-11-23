@extends('admin.layout.master')
@section('body')
    <style>
        .tripdetails {
            font-family: Arial, sans-serif;
            /* background-color: #f0f4f8; */
            margin: 0;
            padding: 20px;
            /* display: flex; */
            margin-left: 130px;
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
            margin-bottom: 15px;
            transition: background-color 0.3s;
        }

        .btn-schedule:hover {
            background-color: lightseagreen;
        }
    </style>
<div class="tripdetails">
    <div class="container">
        <h1>Trip Details</h1>
        <button class="btn-schedule"><a href="{{ route('admin.travellerdetails.create') }}" style="text-decoration: none; color: white; ">Add Trip Details</button></a>
        <table>
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Trip Name</th>
                    <th>Package Cost</th> <!-- New column for Package Cost -->
                    <th>Hotel Name</th>
                    <th>Hotel Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($travellerdetails as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->tripname }}</td> <!-- Example Package Cost -->
                    <td>{{ $value->packagecost }}</td>
                    <td>{{ $value->hotelname }}</td>
                    <td>{{ $value->hotellocation }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.travellerdetails.edit', $value->id) }}"><button class="btn btn-edit">Edit</button></a>
                            <a href="{{ route('admin.travellerdetails.destroy', $value->id) }}"  class="deleteLink"><button class="btn btn-remove">Remove</button></a>
                            <button class="btn btn-view">View</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                <!-- Additional trip rows can be added here -->
            </tbody>
        </table>
    </div>
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
