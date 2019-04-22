<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LigiRepositories;
use Illuminate\Support\Facades\Auth;
class LigiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ligiIndex(LigiRepositories $ligiRepo)
    {
        $ligi = $ligiRepo->getAll();

        return view('ligi.ligiList', ["ligi" => $ligi,
            "footerYear" => date("Y"),
            "tytul" => "Ligi",
            "active" => "active"]);
    }
}
