<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previewing Wireframes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        ul {
            padding: 0;
            list-style-type: none;
        }
        li {
            background: #eee;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 4px;
        }
        img {
            width: 200px;
            height: auto;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
    <div class="container">
        <h1>Previewing Wireframes</h1>
        <p>Player connected : <strong>{{ session('player_id') }}</strong></p>

        <h2>Scanned wireframes :</h2>
        <div>
            @forelse ($scannedWireframes as $wireframe)
                <img src="{{ asset('images/wireframes/' . $wireframe->wireframe_id . '.png') }}" alt="Wireframe {{ $wireframe->wireframe_id }}">
            @empty
                <p>No wireframes scanned yet.</p>
            @endforelse
        </div>

        <!-- Formulaire pour se déconnecter -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Log out</button>
        </form>
    </div>
</body>
</html>
