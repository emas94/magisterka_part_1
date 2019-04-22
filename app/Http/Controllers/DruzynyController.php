<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DruzynyRepositories;
use Illuminate\Support\Facades\Auth;
class DruzynyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function druzynyIndex(DruzynyRepositories $druzynyRepo)
    {

        $druzyny = $druzynyRepo->getAll();

        return view('druzyny.druzynyList', ["druzyny" => $druzyny,
            "footerYear" => date("Y"),
            "tytul" => "druzyny",
            "active" => "active"]);
    }
}
