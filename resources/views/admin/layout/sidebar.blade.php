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

  .sidebar ul li a {
      text-decoration: none; /* Removes underline from links */
      color: inherit; /* Keeps link color same as text color */
      display: flex;
      align-items: center;
  }

  .sidebar ul li i {
      margin-right: 15px;
      font-size: 1.2rem;
      transition: transform 0.2s ease, color 0.2s ease;
  }

  .sidebar ul li:hover i {
      transform: scale(1.1);
  }

  .account-pages {
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
</style>

<div class="sidebar">
  <div class="profile">
      <h2>AeroTravel</h2>
  </div>
  <ul>
      <li class="active">
          <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      </li>
      <li class="active1">
          <a href="{{ route('admin.travellerdetails.index') }}"><i class="fas fa-calendar-alt"></i> Trips Management</a>
      </li>
      <li>
          <a href="{{ route('admin.scheduleflight.index') }}"><i class="fas fa-calendar-plus"></i> Schedule Flight</a>
      </li>
      <li>
          <a href="{{ route('admin.adminpassengerlist') }}"><i class="fas fa-users"></i> Passenger Lists</a>
      </li>
      <li>
          <a href="{{ route('admin.admintravellerlist') }}"><i class="fas fa-users"></i> Traveller Lists</a>
      </li>
      <li>
          <a href="{{ route('admin.feedback') }}" style="text-decoration: none;"><i class="fas fa-comments"></i> Feedback</a>
      </li>
  </ul>

  <div class="account-pages">
      <ul>
          <li>
              <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>
      </ul>
  </div>
</div>
