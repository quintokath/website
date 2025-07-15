<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>📅 View Bookings</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f2f8; /* very light lavender */
      margin: 0;
      padding: 0;
      color: #5a4e7c; /* muted purple text */
    }

    .top-bar {
      background-color: #d6c9ef; /* pastel lavender */
      color: #3e3260;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 10px rgba(146, 134, 189, 0.3);
      border-radius: 0 0 16px 16px;
    }

    .top-bar .title {
      font-size: 20px;
      font-weight: 600;
      letter-spacing: 0.05em;
    }

    .top-bar .nav-links a {
      background-color: #aea1d9; /* pastel purple */
      color: #3e3260;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      transition: background-color 0.3s, transform 0.2s;
      box-shadow: 0 2px 6px rgba(134, 123, 174, 0.3);
      margin-left: 12px;
      display: inline-block;
    }

    .top-bar .nav-links a:hover {
      background-color: #9c8ed2;
      transform: scale(1.05);
      color: #2f244b;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      background: #ebe6f2; /* pastel lavender background */
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(146, 134, 189, 0.12);
      color: #4b3b7a;
    }

    h1 {
      text-align: center;
      color: #3e3260;
      font-size: 28px;
      margin-bottom: 30px;
      letter-spacing: 0.05em;
      font-weight: 700;
    }

    .notification {
      background-color: #d6c9ef; /* pastel lavender */
      color: #3e3260;
      padding: 15px;
      border-radius: 12px;
      margin-bottom: 20px;
      text-align: center;
      font-weight: 600;
      box-shadow: 0 2px 8px rgba(146, 134, 189, 0.15);
      border: 1px solid #aea1d9;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
      background: transparent;
      margin-top: 10px;
    }

    th, td {
      padding: 14px 20px;
      text-align: left;
      color: #5a4e7c;
      font-weight: 500;
    }

    th {
      font-weight: 600;
      letter-spacing: 0.04em;
      color: #3e3260;
      border-bottom: 2px solid #aea1d9;
    }

    tbody tr {
      background-color: #ebe6f2;
      border-radius: 16px;
      box-shadow: 0 2px 10px rgba(146, 134, 189, 0.12);
      transition: background-color 0.3s;
    }

    tbody tr:hover {
      background-color: #d6c9ef;
    }

    tbody tr td {
      border-bottom: none;
    }

    .no-bookings {
      text-align: center;
      background: #ebe6f2;
      padding: 20px;
      border-radius: 12px;
      font-weight: 600;
      color: #5a4e7c;
      box-shadow: 0 2px 6px rgba(146, 134, 189, 0.3);
      margin-top: 20px;
    }

    .action-buttons {
      display: flex;
      gap: 12px;
    }

    .edit-btn, .delete-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 10px 18px;
      border: none;
      border-radius: 12px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      color: #3e3260;
      text-decoration: none;
      background-color: #aea1d9; /* pastel purple */
      box-shadow: 0 2px 6px rgba(134, 123, 174, 0.3);
      transition: background-color 0.3s, transform 0.2s;
      user-select: none;
    }

    .edit-btn:hover {
      background-color: #9c8ed2;
      transform: scale(1.05);
      color: #2f244b;
    }

    .delete-btn {
      background-color: #d6c9ef; /* lighter pastel purple */
    }

    .delete-btn:hover {
      background-color: #c4bde8;
      transform: scale(1.05);
      color: #2f244b;
    }

    form {
      margin: 0;
    }

    @media (max-width: 768px) {
      .action-buttons {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <div class="top-bar">
    <div class="title">📅 View Bookings</div>
    <div class="nav-links">
      <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      <a href="{{ route('bookings.create') }}">➕ New Booking</a>
    </div>
  </div>

  <div class="container">

    @if (session('success'))
      <div class="notification">
        {{ session('success') }}
      </div>
    @endif

    <h1>Your Bookings</h1>

    @if($bookings->isEmpty())
      <div class="no-bookings">You don't have any bookings yet.</div>
    @else
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Booking Date</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($bookings as $booking)
            <tr>
              <td>{{ $booking->title }}</td>
              <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y') }}</td>
              <td>{{ $booking->description }}</td>
              <td>
                <div class="action-buttons">
                  <a href="{{ route('bookings.edit', $booking->id) }}" class="edit-btn" title="Edit Booking">✏️ Edit</a>
                  <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" title="Delete Booking">🗑️ Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

  </div>

</body>
</html>
