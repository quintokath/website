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
      margin: 0;
      display: flex;
      min-height: 100vh;
      background: linear-gradient(145deg, #f7f3f9, #eae6f1);
      background-size: 400% 400%;
      animation: bodyGradient 15s ease infinite;
      color: #5a4e7c;
    }

    @keyframes bodyGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .sidebar {
      width: 240px;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      color: #5a4e7c;
      border-right: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 0 12px 12px 0;
      animation: floatSidebar 4s ease-in-out infinite alternate;
      background: rgba(217, 212, 231, 0.3);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      box-shadow: inset 0 0 0.5px rgba(255, 255, 255, 0.2);
    }

    @keyframes floatSidebar {
      0% { transform: translateY(0); }
      100% { transform: translateY(-6px); }
    }

    .title-container {
      overflow: hidden;
      white-space: nowrap;
      width: 100%;
      margin-bottom: 20px;
    }

    .title {
      display: inline-block;
      font-size: 36px;
      font-weight: 900;
      letter-spacing: 2px;
      padding-left: 100%;
      background: linear-gradient(270deg, #ff9a9e, #fad0c4, #fbc7b9, #a1c4fd, #c2e9fb);
      background-size: 1200% 1200%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradientMove 12s ease infinite, marqueeMove 10s linear infinite;
      user-select: none;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @keyframes marqueeMove {
      0% { transform: translateX(0%); }
      100% { transform: translateX(-100%); }
    }

    .sidebar a {
      display: block;
      color: #4b3b7a;
      text-decoration: none;
      padding: 12px 16px;
      margin: 8px 0;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.15);
      transition: background 0.3s, color 0.3s;
    }

    .sidebar a:hover {
      background: rgba(255, 255, 255, 0.3);
      color: #312652;
    }

    .logout-form button {
      width: 100%;
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid #f3a9bc;
      padding: 10px;
      border-radius: 8px;
      color: #6d2f46;
      font-weight: 600;
      transition: background 0.3s, color 0.3s;
      cursor: pointer;
    }

    .logout-form button:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    .content {
      flex: 1;
      padding: 40px;
      text-align: center;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      padding: 20px 40px;
      align-items: center;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(121, 109, 158, 0.1);
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .top-bar a, .top-bar button {
      background-color: rgba(174, 161, 217, 0.4);
      color: #3e3260;
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s, color 0.3s;
      cursor: pointer;
    }

    .top-bar a:hover, .top-bar button:hover {
      background-color: rgba(174, 161, 217, 0.7);
    }

    .container {
      margin-top: 20px;
      padding: 40px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      box-shadow: 0 10px 40px rgba(121, 109, 158, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      max-width: 1000px;
      margin-left: auto;
      margin-right: auto;
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .box {
      background: rgba(217, 212, 231, 0.25);
      padding: 20px;
      border-radius: 16px;
      font-size: 18px;
      transition: transform 0.3s ease;
      box-shadow: 0 3px 15px rgba(121, 109, 158, 0.1);
      color: #4b3b7a;
      font-weight: 600;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      position: relative;
      overflow: hidden;
    }

    .box::after {
      content: '';
      position: absolute;
      top: 0;
      left: -75%;
      height: 100%;
      width: 50%;
      background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
      animation: shimmer 2.5s infinite;
    }

    @keyframes shimmer {
      0% { left: -75%; }
      100% { left: 125%; }
    }

    .box:hover {
      transform: translateY(-4px);
      background: rgba(196, 189, 212, 0.4);
    }

    #calendar {
      margin: 0 auto;
      max-width: 900px;
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #4b3b7a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(121, 109, 158, 0.1);
      backdrop-filter: blur(10px);
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
      background-color: rgba(174, 161, 217, 0.5);
      color: #3e3260;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      font-size: 28px;
      text-align: center;
      line-height: 56px;
      box-shadow: 0 4px 10px rgba(134, 123, 174, 0.3);
      cursor: pointer;
      transition: background 0.3s, transform 0.3s;
      text-decoration: none;
      user-select: none;
      font-weight: 700;
      backdrop-filter: blur(10px);
      animation: fabPulse 2.5s infinite;
    }

    @keyframes fabPulse {
      0% { box-shadow: 0 0 0 0 rgba(174, 161, 217, 0.6); }
      70% { box-shadow: 0 0 0 10px rgba(174, 161, 217, 0); }
      100% { box-shadow: 0 0 0 0 rgba(174, 161, 217, 0); }
    }

    .fab:hover {
      background-color: rgba(174, 161, 217, 0.8);
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
