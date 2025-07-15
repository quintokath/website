<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Booking Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f7f3f9;
      color: #5a4e7c;
      margin: 0;
      display: flex;
      min-height: 100vh;
      background-image: linear-gradient(145deg, #f7f3f9, #eae6f1);
    }
    .sidebar {
      width: 240px;
      background: #d9d4e7;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      color: #5a4e7c;
      border-right: 1px solid #c4bdd4;
      border-radius: 0 12px 12px 0;
    }

    /* Container with overflow hidden for marquee effect */
    .title-container {
      overflow: hidden;
      white-space: nowrap;
      width: 100%;
      margin-bottom: 20px;
    }

    /* The actual moving title */
    .title {
      display: inline-block;
      font-size: 36px;
      font-weight: 900;
      letter-spacing: 2px;
      padding-left: 100%; /* start offscreen right */
      background: linear-gradient(
        270deg,
        #ff9a9e,
        #fad0c4,
        #fbc7b9,
        #a1c4fd,
        #c2e9fb
      );
      background-size: 1200% 1200%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradientMove 12s ease infinite, marqueeMove 10s linear infinite;
      user-select: none;
      font-family: 'Inter', sans-serif;
    }

    /* Gradient background animation */
    @keyframes gradientMove {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    /* Marquee horizontal movement */
    @keyframes marqueeMove {
      0% {
        transform: translateX(0%);
      }
      100% {
        transform: translateX(-100%);
      }
    }

    .sidebar a {
      display: block;
      color: #4b3b7a;
      text-decoration: none;
      padding: 12px 16px;
      margin: 8px 0;
      border-radius: 8px;
      background: #ebe6f2;
      transition: background 0.3s, color 0.3s;
      box-shadow: 0 2px 5px rgba(91, 85, 122, 0.15);
    }
    .sidebar a:hover {
      background: #c4bdd4;
      color: #312652;
    }
    .logout-form button {
      width: 100%;
      background: #f9c7d3;
      border: 1px solid #f3a9bc;
      padding: 10px;
      border-radius: 8px;
      color: #6d2f46;
      font-weight: 600;
      transition: background 0.3s, color 0.3s;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(217, 167, 181, 0.4);
    }
    .logout-form button:hover {
      background: #f3a9bc;
      color: #4b2141;
    }
    .content {
      flex: 1;
      padding: 40px;
      text-align: center;
      color: #4a3c71;
    }
    .top-bar {
      display: flex;
      justify-content: space-between;
      background-color: #c9c1e3;
      padding: 20px 40px;
      align-items: center;
      border-radius: 12px;
      color: #3e3260;
      box-shadow: 0 4px 10px rgba(121, 109, 158, 0.1);
    }
    .top-bar a,
    .top-bar button {
      background-color: #aea1d9;
      color: #3e3260;
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s, color 0.3s;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(134, 123, 174, 0.3);
    }
    .top-bar a:hover,
    .top-bar button:hover {
      background-color: #9c8ed2;
      color: #2f244b;
    }

    .container {
      margin-top: 20px;
      background: #ebe6f2;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(121, 109, 158, 0.15);
      border: 1px solid #c4bdd4;
      max-width: 1000px;
      margin-left: auto;
      margin-right: auto;
      color: #5a4e7c;
    }
    h1 {
      margin-bottom: 20px;
      font-size: 28px;
      color: #3e3260;
    }
    .stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }
    .box {
      background: #d9d4e7;
      padding: 20px;
      border-radius: 16px;
      font-size: 18px;
      border: 1px solid #c4bdd4;
      transition: transform 0.3s ease;
      box-shadow: 0 3px 7px rgba(121, 109, 158, 0.1);
      color: #4b3b7a;
      font-weight: 600;
    }
    .box:hover {
      transform: translateY(-4px);
      background: #c4bdd4;
      color: #312652;
      box-shadow: 0 6px 14px rgba(121, 109, 158, 0.2);
    }
    #calendar {
      margin: 0 auto;
      max-width: 900px;
      background: #ebe6f2;
      border: 1px solid #c4bdd4;
      color: #4b3b7a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(121, 109, 158, 0.1);
    }
    .fc-daygrid-day.booked {
      background-color: #f9c7c7 !important;
      color: #7a4141 !important;
      pointer-events: none;
    }
    .fab {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background-color: #aea1d9;
      color: #3e3260;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      font-size: 28px;
      text-align: center;
      line-height: 56px;
      box-shadow: 0 4px 10px rgba(134, 123, 174, 0.4);
      cursor: pointer;
      transition: background 0.3s, color 0.3s, transform 0.2s;
      text-decoration: none;
      user-select: none;
      font-weight: 700;
    }
    .fab:hover {
      background-color: #9c8ed2;
      color: #2f244b;
      transform: scale(1.1);
    }
  </style>
</head>
<body>

  <aside class="sidebar">
    <div class="title-container">
      <div class="title">Boo-book ka?</div>
    </div>
    <nav>
      <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      <a href="{{ route('bookings.index') }}">📖 View Bookings</a>
      <a href="{{ route('bookings.create') }}">➕ Create Booking</a>
    </nav>
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
      @csrf
      <button type="submit">🚪 Logout</button>
    </form>
  </aside>

  <div class="content">
    <div class="top-bar">
      <h1>Welcome, {{ auth()->user()->name }}</h1>
      <div>
        <a href="{{ route('profile.edit') }}">👤 Edit Profile</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit">🚪 Logout</button>
        </form>
      </div>
    </div>

    <div class="container">
      <div class="stats">
        <div class="box">📅<br><strong>Total Bookings:</strong><br>{{ $totalBookings }}</div>
        <div class="box">👤<br><strong>Total Users:</strong><br>{{ $totalUsers }}</div>
      </div>

      <div id="calendar"></div>
    </div>
  </div>

  <a href="{{ route('bookings.create') }}" class="fab" title="Create New Booking">➕</a>

  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const booked = @json($bookedDates ?? []);

      function formatDate(date) {
        return date.toLocaleDateString('en-CA');
      }

      const calendarEl = document.getElementById('calendar');

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: false,
        dateClick: function(info) {
          const clickedDate = formatDate(new Date(info.date));
          if (booked.includes(clickedDate)) return;
          alert('You clicked ' + clickedDate);
        },
        dayCellDidMount: function(arg) {
          const day = formatDate(arg.date);
          if (booked.includes(day)) {
            arg.el.classList.add('booked');
            arg.el.setAttribute('title', 'Already Booked');
          }
        },
      });

      calendar.render();
    });
  </script>
</body>
</html>
