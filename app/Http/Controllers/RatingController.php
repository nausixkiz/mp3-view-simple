<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return view('content.rating.index');
    }

    public function showJson()
    {
        $ratings = Rating::all();

        foreach($ratings as $item)
        {
            $data[] = [
                'rating' => $item->rating,
                'user' => $item->user->name,
                'userEmail' => $item->user->email,
                'music' => $item->music->name,
                'created_at' => $item->created_at,
            ];
        }

        return response()->json($data);
    }
}
