<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Point;

class GameApiController extends Controller
{
    public function our_games(){
        $games = Game::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get()
            ->map(function ($game) {
                $game->image = asset('storage/' . $game->image);
                return $game;
            });
        return apiResponse(true, 'Our Games', ['games' => $games], 200);
    }

    public function guide(){
        $game_guides = Game::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get()
            ->map(function ($game) {
                return [
                    'name' => $game->name,
                    'image' => asset('storage/' . $game->image),
                    'description' => $game->description
                ];
            });
        return apiResponse(true,'Guides', ['guides' => $game_guides], 200);
    }

    public function leaderboard()
    {
        // Fetch all users who have points
        $users = User::role('User')->with('points')->get();

        $leaderboard = $users->map(function ($user) {
            $totalScore = $user->points->sum('score');
            $gamesPlayed = $user->points->count();
            $averagePercentage = $gamesPlayed > 0 ? round($totalScore / $gamesPlayed, 2) : 0;

            return [
                'user_id' => $user->id,
                'name' => $user->name,
                'total_score' => $totalScore,
                'games_played' => $gamesPlayed,
                'average_percentage' => $averagePercentage,
            ];
        })->sortByDesc('total_score')->values(); // Sort and reindex

        return response()->json([
            'success' => true,
            'message' => 'Leaderboard fetched successfully.',
            'data' => $leaderboard,
        ]);
    }


    public function submit_point(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'game_id' => 'required|exists:games,id',
            'score' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        $point = Point::create([
            'user_id' => $request->user()->id, 
            'game_id' => $request->game_id, 
            'score' => $request->score
        ]);

        return apiResponse(true, 'Point saved successfully.', $point, 200);
    }

    public function get_total_score_by_game(Request $request){
        $validator = Validator::make($request->all(), [
            'game_id' => 'required|exists:games,id',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }
        $total_point = Point::where('user_id',$request->user()->id)->where('game_id',$request->game_id)->sum('score');

        return apiResponse(true, 'Total Score By Game.', ['total_point'=> $total_point], 200);
    }
}