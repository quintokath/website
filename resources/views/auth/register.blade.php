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

        .register-header {
            background: linear-gradient(145deg, #d9d4e7, #c4bdd4);
            color: #3e3260;
            padding: 30px 40px;
            text-align: center;
            font-size: 30px;
            font-weight: 900;
            border-bottom: 1px solid #c4bdd4;
            letter-spacing: 1px;
            box-shadow: 0 4px 10px rgba(121, 109, 158, 0.1);
        }

        .register-container {
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

        input[type="text"],
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

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 0 3px rgba(174, 161, 217, 0.3);
            outline: none;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
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

        .primary-button {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            background-color: #aea1d9;
            color: #3e3260;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(134, 123, 174, 0.4);
            cursor: pointer;
        }

        .primary-button:hover {
            background-color: #9c8ed2;
            color: #2f244b;
            transform: scale(1.05);
        }
    </style>

    <div class="register-header">
        📝 Create New Account
    </div>

    <div class="register-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Email -->
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Confirm Password -->
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="actions">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit" class="primary-button">Register</button>
            </div>
        </form>
    </div>
</x-guest-layout>
