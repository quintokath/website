<x-guest-layout>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f7f3f9;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(145deg, #f7f3f9, #eae6f1);
            color: #5a4e7c;
        }

        .login-header {
            background: linear-gradient(145deg, #d9d4e7, #c4bdd4);
            color: #3e3260;
            padding: 30px 40px;
            text-align: center;
            font-size: 30px;
            font-weight: 900;
            letter-spacing: 1px;
            border-bottom: 1px solid #c4bdd4;
            box-shadow: 0 4px 10px rgba(121, 109, 158, 0.1);
        }

        .login-container {
            max-width: 500px;
            margin: 50px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(121, 109, 158, 0.15);
            border: 1px solid #dcd6e7;
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 20px;
            margin-bottom: 6px;
            color: #4b3b7a;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            border: 1px solid #d1cbe0;
            border-radius: 10px;
            background-color: #f9f7fc;
            font-size: 15px;
            color: #4b3b7a;
            transition: box-shadow 0.2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 0 3px rgba(174, 161, 217, 0.3);
            outline: none;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 4px;
        }

        .remember {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .remember label {
            font-weight: normal;
            margin-left: 8px;
            font-size: 14px;
            color: #6b6495;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .actions a {
            font-size: 14px;
            color: #6b6495;
            text-decoration: none;
        }

        .actions a:hover {
            color: #4a3c71;
            text-decoration: underline;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .primary-button,
        .register-button {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(134, 123, 174, 0.3);
            cursor: pointer;
        }

        .primary-button {
            background-color: #aea1d9;
            color: #3e3260;
        }

        .primary-button:hover {
            background-color: #9c8ed2;
            color: #2f244b;
            transform: scale(1.05);
        }

        .register-button {
            background-color: #f9c7d3;
            color: #6d2f46;
        }

        .register-button:hover {
            background-color: #f3a9bc;
            color: #4b2141;
            transform: scale(1.05);
        }

        .status-message {
            background-color: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>

    <div class="login-header">🔐 Log In</div>

    <div class="login-container">
        <!-- Session Status -->
        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Remember Me -->
            <div class="remember">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember Me</label>
            </div>

            <div class="actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif

                <div class="button-group">
                    <button type="submit" class="primary-button">Log In</button>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register-button">Register</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
