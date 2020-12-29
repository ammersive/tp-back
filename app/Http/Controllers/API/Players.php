<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Http\Resources\API\PlayerResource;

class Players extends Controller
{
    // Returns a list of all players in the players table
    public function index()
    {
        return PlayerResource::collection(Player::all());
    }

    // Saves new players to the database. Accepts a list of player objects, each with a name and play_count property
    public function store(Request $request) { 

        $data = $request->all();

        foreach ($data as $listItem) { 
            $player = new Player($listItem);
            $player->save();
        } 
    } 

    // Accepts a list of integers representing player ids, and increments play_counts of all specified players by 1.
    public function update(Request $request)
    {
        $data = $request->all();

        foreach ($data as $playerId) { 
            $player = Player::find($playerId);
            $player->incrementPlayCount();
            $player->save(); 
        }
    }

    // Deletes player with id specified the in url string
    public function destroy(Player $player)
    {
        $player->delete();
        return response(null, 204);
    }
}
