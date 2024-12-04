<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Joueur</title>
</head>
<body>
    <h1>Connexion Joueur</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <label for="username">Username (ex: Player1):</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password :</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Log in</button>
    </form>
</body>
</html>
