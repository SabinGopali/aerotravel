@extends('admin.layout.master')
@section('body')
  <style>
    

    body {
      font-family: 'Arial', sans-serif;
      
      color: #333;
    }

    .container {
      width: 70%;
      margin: 0 auto;
      padding: 20px 0;
    }

    h1 {
      font-size: 3rem;
      font-weight: bold;
      color: black;
      margin-bottom: 20px;
    }

    .feedback-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    /* Search bar styling */
    .search-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-container input[type="text"] {
      padding: 10px 15px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      outline: none;
      transition: all 0.3s ease;
    }

    .search-container input[type="text"]:focus {
      border-color: lightseagreen;
      box-shadow: 0 0 8px lightseagreen;
    }

    .search-container button {
      padding: 10px 20px;
      background-color: lightseagreen;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .search-container button:hover {
      background-color: lightseagreen;
    }

    /* Rating card styling */
    .rating-card {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      display: inline-block;
      text-align: center;
      margin-right: 10px;
    }

    .rating-card h2 {
      font-size: 3rem;
      margin-bottom: 5px;
      color: #333;
    }

    .rating-card p {
      font-size: 1rem;
      color: green;
    }

    /* Table styling */
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
      background-color: lightseagreen;
      color: white;
      text-transform: uppercase;
      font-size: 0.875rem;
    }

    td {
      font-size: 0.9rem;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .suggestion-text {
      color: #555;
    }

    /* Responsive design for mobile */
    @media only screen and (max-width: 768px) {
      .container {
        width: 95%;
      }

      .feedback-header {
        flex-direction: column;
        gap: 15px;
      }

      .rating-card {
        margin-bottom: 20px;
        margin-right: 0;
      }

      .search-container input[type="text"] {
        width: 100%;
      }

      table th, table td {
        padding: 10px;
      }
    }
  </style>


  <div class="container">
    <!-- Feedback Section Title -->
    <div class="feedback-header">
      <h1>Feedback</h1>

      <!-- Search Bar -->
      <div class="search-container">
        
        
      </div>

      <!-- Rating Card -->
      {{-- <div class="rating-card">
        <h2>3.7</h2>
        <p>Average Rating</p>
        <p>Positive</p>
      </div> --}}
    </div>

    <!-- Feedback Table -->
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>First Impression</th>
          <th>Come Across</th>
          <th>Suggestion</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        @foreach($feedback as $key => $value)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $value->Impression_Details }}</td>
          <td>{{ $value->hear }}</td>
          <td>{{ $value->Missing_Details }}</td>
          <td>{{ $value->rating }}</td>
        </tr>
        
        @endforeach
      </tbody>
    </table>
  </div>

@endsection