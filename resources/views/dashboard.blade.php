<x-app-layout>
    <x-slot name="header">
        <div class="header-flex">
            <h2 class="page-title">Dashboard</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Log Out</button>
            </form>
        </div>
    </x-slot>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(-45deg, #a18cd1, #fbc2eb, #d0bfff, #cbb4f3);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            margin: 0;
            padding: 0;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .dashboard-container {
            display: flex;
            padding: 40px;
            gap: 30px;
        }

        .sidebar {
            width: 240px;
            padding: 25px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: floatSidebar 5s ease-in-out infinite alternate;
        }

        @keyframes floatSidebar {
            0% { transform: translateY(0); }
            100% { transform: translateY(-6px); }
        }

        .sidebar h3 {
            color: #fff;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 20px;
        }

        .sidebar a {
            display: block;
            margin-bottom: 12px;
            padding: 12px 18px;
            border-radius: 12px;
            text-decoration: none;
            color: #ffffff;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background: linear-gradient(90deg, #b388eb, #cdb2f8, #aa8df2);
            background-size: 200% auto;
            animation: linkGlow 3s ease infinite;
            color: #fff;
        }

        @keyframes linkGlow {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
        }

        .box {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 25px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .box::after {
            content: '';
            position: absolute;
            top: 0; left: -60%;
            height: 100%; width: 50%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -60%; }
            100% { left: 110%; }
        }

        .box h4 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .box p {
            font-size: 16px;
            opacity: 0.9;
        }

        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #b388eb, #d0aaff);
            color: white;
            border: none;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            font-size: 26px;
            cursor: pointer;
            box-shadow: 0 4px 30px rgba(0,0,0,0.2);
            animation: pulseGlow 2.5s infinite;
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 0 0 rgba(179, 136, 235, 0.7);
            }
            70% {
                box-shadow: 0 0 0 14px rgba(179, 136, 235, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(179, 136, 235, 0);
            }
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(31, 41, 55, 0.8);
            padding: 24px 40px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .page-title {
            color: white;
            font-size: 28px;
            font-weight: 700;
            text-shadow: 0 1px 4px rgba(0,0,0,0.3);
        }

        .logout-btn {
            background: rgba(255,255,255,0.15);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.25);
        }
    </style>

    <div class="dashboard-container">
        <div class="sidebar">
            <h3>Navigation</h3>
            <a href="#">Home</a>
            <a href="#">Bookings</a>
            <a href="#">Settings</a>
        </div>

        <div class="main-content">
            <div class="box">
                <h4>Welcome Back!</h4>
                <p>You have 3 new bookings today.</p>
            </div>
            <div class="box">
                <h4>Upcoming</h4>
                <p>Meeting scheduled at 2:00 PM.</p>
            </div>
            <div class="box">
                <h4>Reminders</h4>
                <p>Don’t forget to check client emails.</p>
            </div>
        </div>
    </div>

    <button class="fab">+</button>
</x-app-layout>
