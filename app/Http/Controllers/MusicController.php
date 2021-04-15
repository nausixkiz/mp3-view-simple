<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMusicRequest;
use App\Music;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function create()
    {
        return view('content.create-music');
    }
    public function store(StoreMusicRequest $request)
    {
        $file = $request->file('music');

        if($file){
            $data['filename'] = $file->getClientOriginalName();
            $data['filesize'] = $file->getSize();
            $data['extension'] = $file->getClientOriginalExtension();
            $data['file_title'] = time().'.' . $data['extension'];

            $data['filePath'] = Storage::putFileAs(
                '/musics', $request->file('music'), $data['file_title']
            );

            Music::create([
                'title' => $data['file_title'],
                'name' =>  $data['filename'],
                'size' =>  $data['filesize'],
                'extension' =>  $data['extension'],
            ]);

        }

        toastr()->success('Create new music successfully. ');

        return redirect()->back();
    }

    public function download($id)
    {
        $music = Music::findOrFail($id);

        $pathToFile = public_path('storage/musics/'. $music->title);

        if(!file_exists($pathToFile)) {
            return back();
        }

        return response()->download($pathToFile);
    }

    public function rating($id, Request $request)
    {
        $user = Auth::user();
        $music = Music::findOrFail($id);

        Rating::create([
            'rating' => $request->rating,
            'user_id' =>  $user->id,
            'music_id' =>  $music->id,
        ]);

        return response()->json('OK');
    }
}
