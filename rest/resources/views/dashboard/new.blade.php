<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Requisition | Cente Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f5f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #004b87;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #004b87;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0077cc;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h2><i class="fas fa-file-alt"></i> New Requisition Form</h2>

    {{-- Display success or error messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="">
        @csrf

        <label for="item_name">Item Name</label>
        <input type="text" id="item_name" name="item_name" value="{{ old('item_name') }}" required>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" min="1" required>

        <label for="unit">Unit of Measure</label>
        <select id="unit" name="unit" required>
            <option value="">Select unit</option>
            <option value="Pieces">Pieces</option>
            <option value="Litres">Litres</option>
            <option value="Kilograms">Kilograms</option>
            <option value="Boxes">Boxes</option>
        </select>

        <label for="justification">Justification / Purpose</label>
        <textarea id="justification" name="justification" rows="4" required>{{ old('justification') }}</textarea>

        <button type="submit">Submit Requisition</button>
    </form>
</div>

</body>
</html>
