<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Centenary Bank | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #00703c, #007c89);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            background: #fff;
            border-radius: 12px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .login-box h2 {
            font-weight: 700;
            color: #00703c;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #00703c;
            border: none;
        }

        .btn-primary:hover {
            background-color: #005f30;
        }

        .form-control:focus {
            border-color: #007c89;
            box-shadow: 0 0 0 0.2rem rgba(0,124,137,.25);
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2 class="text-center">Centenary Bank Login</h2>

    @if(session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input 
                type="text" 
                id="username" 
                name="username" 
                class="form-control" 
                value="{{ old('username') }}" 
                required 
                autofocus
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control" 
                required
            >
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="text-center mt-3">
            <small class="text-muted">Forgot password? Contact IT support.</small>
        </div>
    </form>
</div>

</body>
</html>
