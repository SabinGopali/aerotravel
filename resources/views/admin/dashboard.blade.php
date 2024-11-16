
  @extends('admin.layout.master')
  @section('body')
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      display: flex;
      min-height: 100vh;
      background-color: #f4f4f4;
    }

    .sidebar {
      width: 250px;
      background-color: #2c2f33;
      color: #fff;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar .profile {
      text-align: center;
      margin-bottom: 40px;
    }

    .profile h2 {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .sidebar ul {
      list-style-type: none;
    }

    .sidebar ul li {
      padding: 15px;
      cursor: pointer;
      display: flex;
      align-items: center;
      transition: background 0.3s ease;
    }

    .sidebar ul li:hover, .sidebar ul .active {
      background-color: lightseagreen;
      border-radius: 5px;
    }

    .sidebar ul li i {
      margin-right: 15px;
      font-size: 1.2rem;
    }

    .sidebar ul li:hover i {
      transform: scale(1.1);
    }

    .sidebar ul li:hover, .sidebar ul .active i {
      color: #fff;
    }

    .sidebar .account-pages {
      margin-top: auto;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px;
      background-color: #fff;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header h1 {
      color: lightseagreen;
    }

    .actions button {
      margin-left: 10px;
      padding: 10px 20px;
      background-color: lightseagreen;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .actions button:hover {
      background-color: lightseagreen;
    }

    .cards {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .card {
      background-color: #f8f9fa;
      width: 24%;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card p {
      color: #6c757d;
    }

    .card h2 {
      color: #343a40;
      margin: 10px 0;
    }

    .charts {
      display: flex;
      justify-content: space-between;
      margin-top: 40px;
    }

    .chart {
      width: 48%;
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .chart h3 {
      margin-bottom: 20px;
      color: #343a40;
    }

    /* Add transition and icon styling */
    .sidebar ul li i {
      transition: transform 0.2s ease, color 0.2s ease;
    }
    
  </style>
 

  <div class="main-content">
    <div class="header">
      <div class="title">
        <h1>AeroTravel</h1>
      </div>
      {{-- <div class="actions">
        <button>Add New Flight</button>
      </div> --}}
    </div>

    <div class="cards">
      {{-- <div class="card">
        <p>Available Airlines</p>
        <h2>4</h2>
        <p>AirIndia lastly added</p>
      </div> --}}
      <div class="card">
        <p>Available Flights</p>
        <h2>8</h2>
        {{-- <p>Flight No: 108 lastly added</p> --}}
      </div>
      <div class="card">
        <p>Total Bookings</p>
        <h2>38</h2>
        {{-- <p>From 19 Registrations</p> --}}
      </div>
      <div class="card">
        <p>Total Earnings</p>
        <h2>RS 234962</h2>
        {{-- <p>Today's Earnings INR 16004</p> --}}
      </div>
    </div>

    <div class="charts">
      <div class="chart">
        <h3>Flights Status</h3>
        <!-- Bar chart content can go here -->
      </div>
      <div class="chart">
        <h3>Number of Flights </h3>
        <!-- Pie chart content can go here -->
      </div>
    </div>
  </div>
@endsection