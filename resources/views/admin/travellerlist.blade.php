@extends('admin.layout.master')
@section('body')
<style>

.passengers {
    font-family: Arial, sans-serif;
    
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin-left:130px;
}

.data-section {
    width: 1000px;
    margin-top:-150px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.heading-title {
    font-size: 24px;
    font-weight: 600;
    color: #343a40;
    margin-bottom: 20px;
}

.search-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.search-input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    width: 300px;
}

.search-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: lightseagreen;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.dropdown-filter {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    width: 120px;
}

.export-btn {
    padding: 10px 20px;
    font-size: 16px;
    background-color: lightseagreen;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.table-container {
    margin-top: 20px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #dee2e6;
    text-align: left;
}

th {
    background-color: #f1f1f1;
}
</style>

<div class="passengers">

    <div class="data-section">
        <h2 class="heading-title">Travellers</h2>

        <div class="search-bar">
            {{-- <input class="search-input" type="text" placeholder="You can search here">
            <button class="search-button">Search</button>
            <select class="dropdown-filter">
                <option>All Data</option>
            </select> --}}
            <button class="export-btn" onclick="exportToExcel()">EXPORT</button>
        </div>

        <div class="table-container">
            <table id="passengerTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DOB</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>No. of Passengers</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($tdetail as $key => $value)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $value->dob }}</td>
                        <td>{{ $value->fname }}</td>
                        <td>{{ $value->lname }}</td>
                        <td>{{ $value->contact }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->npassengers }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            var table = document.getElementById("passengerTable");
            var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
            XLSX.writeFile(workbook, 'PassengerData.xlsx');
        }
    </script>
</div>
@endsection