<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\ScannedWireframe;

class GameController extends Controller
{
    private $playerPasswords = [
        'Player1' => 'Player1',
        'Player2' => 'Player2',
        'Player3' => 'Player3',
        'Player4' => 'Player4',
        'Player5' => 'Player5',
        'Player6' => 'Player6',
    ];

    public function showLoginForm()
    {
        return view('login');
    }

    // Gérer la connexion
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (array_key_exists($username, $this->playerPasswords) && $this->playerPasswords[$username] === $password) {
            if (session()->has('players') && in_array($username, session('players', []))) {
                return back()->withErrors(['username' => 'Ce joueur est déjà pris.']);
            }

            session()->push('players', $username);
            session(['player_id' => $username]);

            return redirect()->route('game');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function preview()
    {
        $playerId = session('player_id');

        if (!$playerId) {
            return redirect()->route('login.show');
        }

        $scannedWireframes = ScannedWireframe::where('player_id', $playerId)->get();

        return view('game', compact('scannedWireframes'));
    }

    // Gérer le scan d'un QR code
    public function scanQrCode($wireframeId)
    {
        $playerId = session('player_id');

        if (!$playerId) {
            return redirect()->route('login.show');
        }

        // Ajouter le wireframe scanné à la base de données
        ScannedWireframe::firstOrCreate([
            'player_id' => $playerId,
            'wireframe_id' => $wireframeId,
        ]);

        return redirect()->route('game');
    }

    public function logout()
    {
        $playerId = session('player_id');

        if ($playerId) {
            // Supprimer le joueur de la session des joueurs connectés
            $players = session('players', []);
            if (($key = array_search($playerId, $players)) !== false) {
                unset($players[$key]);
            }
            session(['players' => $players]);

            // Supprimer les données de session associées au joueur
            session()->forget('player_id');
        }

        return redirect()->route('login.show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
