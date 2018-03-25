<?php

namespace App\Http\Controllers;

use App\Afrika\Album;
use App\Afrika\Music;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function admin() : View{
        $album = Album::all();
        $music = Music::all();
        return view('afrikaAdmin.index', compact('album', 'music'));
    }

    public function deleteAblum(Request $request) : Response{

    }

    public function deleteMusic(Request $request) : Response{

    }
}
