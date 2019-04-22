<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StadionyRepositories;
use Illuminate\Support\Facades\Auth;

class stadionyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stadionyIndex(StadionyRepositories $stadionRepo)
        {

            $stadiony = $stadionRepo->getAll();

            return view('stadiony.stadionyList', ["stadiony" => $stadiony,
                "footerYear" => date("Y"),
                "tytul" => "Stadion",
                "active" => "active"]);
        }


}
