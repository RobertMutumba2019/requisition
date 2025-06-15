<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Centenary Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Fonts + Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f2f5f7;
        }

        .sidebar {
            width: 240px;
            background-color: #004b87;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #0077cc;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: white;
            padding: 15px 25px;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h1 {
            font-size: 20px;
            color: #004b87;
        }

        .btn-logout {
            background-color: #dc3545;
            border: none;
            padding: 8px 14px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .main {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin-bottom: 15px;
            color: #004b87;
        }

        .card p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .link-button {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 18px;
            background-color: #004b87;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }

        .link-button:hover {
            background-color: #0077cc;
        }

        .submenu a {
    padding-left: 35px;
    font-size: 14px;
    color: #ddd;
}
.submenu a:hover {
    background-color: #0062b5;
}
        
    </style>
</head>
<body>

    <div class="sidebar">
        <h2><i class="fas fa-university"></i> Cente Store</h2>
        <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
       
        {{-- <a href="#"><i class="fas fa-file-alt"></i> My Requisitions</a> --}}

       <a href="javascript:void(0);" onclick="toggleDropdown()" class="dropdown-toggle">
       <i class="fas fa-file-alt"></i> My Requisitions <i class="fas fa-caret-down" style="float: right;"></i>
       </a>
       <div id="requisition-submenu" class="submenu">
       <a href="new">New Requisitions</a>
       <a href="approved">Approved</a>
       <a href="draft">Draft</a>
       <a href="pending">Pending</a>
       <a href="rejected">Rejected</a>
       </div>
       
        <a href="{{ route('change') }}" style="color:red;"><i class="fas fa-cog"></i> <strong>User Account</strong></a>
        

        <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
            @csrf
            <button class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <div class="content">
        <div class="topbar">
            <h1>Welcome, {{ $user->first_name }}!</h1>
        </div>

        <div class="main">
            <div class="card">
                <h2>Account Details</h2>
                <p><strong>Username:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>

                <a href="#" class="link-button"><i class="fas fa-folder-open"></i> Manage Requisitions</a>
            </div>
        </div>
    </div>
  
    <script>
    function toggleDropdown() {
        const submenu = document.getElementById('requisition-submenu');
        submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
    }
    </script>
    

</body>
</html>
