<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        h2 { text-align: center; }
        input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #2e8b57; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
<div class="container">

    <div style="text-align: right; margin-bottom: 15px;">
        <a href="{{ route('dashboard') }}" style="text-decoration: none; background-color: #555; color: white; padding: 8px 15px; border-radius: 5px;">&larr; Back to Dashboard</a>
    </div>
    <h2>Change Password</h2>

    @if(session('status'))
        <p class="success">{{ session('status') }}</p>
    @endif

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('update') }}">
        @csrf

        <label for="current_password">Current Password</label>
        <input type="password" id="current_password" name="current_password" required>

        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" required>

        <label for="new_password_confirmation">Confirm New Password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>

        <button type="submit">Update Password</button>
    </form>
</div>
</body>
</html>

