<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Booking</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
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

    .top-bar .actions a {
      background-color: #aea1d9; /* pastel purple */
      color: #3e3260;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      transition: background-color 0.3s, transform 0.2s;
      box-shadow: 0 2px 6px rgba(134, 123, 174, 0.3);
    }

    .top-bar .actions a:hover {
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

    h2 {
      text-align: center;
      color: #3e3260;
      font-size: 28px;
      margin-bottom: 30px;
      letter-spacing: 0.05em;
    }

    label {
      display: block;
      margin-top: 20px;
      font-weight: 600;
      color: #5a4e7c;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 14px;
      margin-top: 8px;
      border: 1px solid #c4bdd4;
      border-radius: 12px;
      font-size: 15px;
      background-color: #f7f3f9; /* very light lavender */
      color: #4b3b7a;
      box-shadow: inset 0 1px 3px rgba(91, 85, 122, 0.1);
      transition: border-color 0.3s;
    }
    input[type="text"]:focus,
    textarea:focus {
      outline: none;
      border-color: #aea1d9;
      box-shadow: 0 0 6px #aea1d9;
      background-color: #fff;
    }

    textarea {
      resize: vertical;
      min-height: 90px;
    }

    button {
      margin-top: 30px;
      width: 100%;
      background-color: #aea1d9; /* pastel purple */
      color: #3e3260;
      border: none;
      padding: 14px;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
      box-shadow: 0 6px 14px rgba(134, 123, 174, 0.4);
    }

    button:hover {
      background-color: #9c8ed2;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(134, 123, 174, 0.6);
      color: #2f244b;
    }

    .error {
      color: #c75b62;
      background: #f8e5e7;
      border: 1px solid #f0b1b7;
      padding: 12px;
      border-radius: 12px;
      margin-top: 15px;
      font-weight: 600;
      box-shadow: inset 0 0 8px #f0b1b7;
    }

    #calendar-container {
      margin-top: 15px;
      display: flex;
      justify-content: center;
    }

    #selected-date {
      margin-top: 15px;
      font-weight: 700;
      color: #5a4e7c;
      text-align: center;
      letter-spacing: 0.04em;
    }

    /* === CALENDAR CUSTOM STYLING === */
    .flatpickr-calendar {
      font-size: 14px !important;
      width: 100% !important;
      max-width: 500px;
      border-radius: 20px;
      background-color: #ebe6f2 !important; /* pastel lavender */
      color: #5a4e7c !important;
      box-shadow: 0 6px 20px rgba(146, 134, 189, 0.15);
      border: 1px solid #c4bdd4 !important;
    }

    .flatpickr-months {
      background-color: #aea1d9 !important; /* pastel purple */
      color: #3e3260 !important;
      border-bottom: 1px solid #9c8ed2;
      border-radius: 20px 20px 0 0;
      font-weight: 700;
    }

    .flatpickr-current-month {
      color: #3e3260 !important;
      font-size: 16px !important;
      font-weight: 700;
    }

    .flatpickr-weekdays {
      background-color: #d6c9ef !important; /* lighter pastel lavender */
      border-radius: 0 0 12px 12px;
      font-weight: 600;
      border-top: 1px solid #c4bdd4;
    }

    .flatpickr-weekday {
      color: #5a4e7c !important;
      font-weight: 600;
      letter-spacing: 0.05em;
    }

    .flatpickr-day {
      color: #5a4e7c !important;
      border: 1px solid transparent;
      width: 40px;
      height: 40px;
      line-height: 40px;
      margin: 2px;
      border-radius: 12px;
      transition: background-color 0.3s, border-color 0.3s;
    }

    .flatpickr-day:hover {
      background-color: #aea1d9 !important; /* pastel purple highlight */
      border-color: #9c8ed2 !important;
      color: #312652 !important;
      cursor: pointer;
    }

    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange {
      background-color: #9c8ed2 !important;
      color: white !important;
      border-color: #7f79c2 !important;
      box-shadow: 0 0 8px #7f79c2;
    }

    .flatpickr-day.booked {
      background-color: #f9c7c7 !important; /* pastel red */
      color: #7a4141 !important;
      border-color: #f7a6a6 !important;
      cursor: not-allowed;
    }

    .flatpickr-monthDropdown-months,
    .flatpickr-current-month .numInputWrapper,
    .flatpickr-current-month input.cur-year {
      background-color: #d6c9ef !important;
      color: #5a4e7c !important;
      border: 1px solid #c4bdd4 !important;
      border-radius: 6px;
      font-weight: 600;
    }

    .flatpickr-monthDropdown-months option,
    .numInput.cur-year {
      background-color: #ebe6f2 !important;
      color: #5a4e7c !important;
    }

    .flatpickr-prev-month svg,
    .flatpickr-next-month svg {
      fill: #5a4e7c !important;
    }
  </style>
</head>
<body>

<div class="top-bar">
  <div class="title">✏️ Edit Booking</div>
  <div class="actions">
    <a href="{{ route('bookings.index') }}">🔙 Back to Bookings</a>
  </div>
</div>

<div class="container">
  <h2>Update Your Booking</h2>

  @if ($errors->any())
    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $booking->title) }}" required />

    <label for="description">Description</label>
    <textarea name="description" id="description" rows="4">{{ old('description', $booking->description) }}</textarea>

    <label for="booking_date">Booking Date</label>
    <input
      type="text"
      id="booking_date"
      name="booking_date"
      required
      style="position: absolute; left: -9999px;"
      value="{{ old('booking_date', $booking->booking_date) }}"
      readonly
    />
    <div id="calendar-container"></div>
    <p id="selected-date">📅 Selected Date: {{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y') }}</p>

    <button type="submit">✅ Update Booking</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  const bookedDates = @json($bookedDates ?? []);
  const currentDate = "{{ old('booking_date', $booking->booking_date) }}";

  function formatDateToPH(dateObj) {
    const phOffset = 8 * 60;
    const localTime = dateObj.getTime();
    const localOffset = dateObj.getTimezoneOffset();
    const phTime = new Date(localTime + (phOffset + localOffset) * 60000);

    const year = phTime.getFullYear();
    const month = String(phTime.getMonth() + 1).padStart(2, '0');
    const day = String(phTime.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
  }

  flatpickr("#booking_date", {
    inline: true,
    appendTo: document.getElementById('calendar-container'),
    dateFormat: "Y-m-d",
    minDate: "today",
    defaultDate: currentDate,
    disable: bookedDates.filter(date => date !== currentDate),
    onChange: function (selectedDates, dateStr) {
      document.getElementById('selected-date').innerText = "📅 Selected Date: " + dateStr;
    },
    onDayCreate: function (dObj, dStr, fp, dayElem) {
      const formatted = formatDateToPH(dayElem.dateObj);
      if (bookedDates.includes(formatted) && formatted !== currentDate) {
        dayElem.classList.add('booked');
      }
    },
  });
</script>

</body>
</html>
