<?php

namespace App\Http\Controllers;
use App\Repositories\MeczeRepositories;
use Illuminate\Http\Request;
use App\Models\Mecz;
use Illuminate\Support\Facades\Auth;
class MeczeController extends Controller

{
    public function __construct()
{
    $this->middleware('auth');
}


    public function meczeIndex(MeczeRepositories $meczeRepo)
    {

        $mecze = $meczeRepo->getAll();

        return view('mecze.meczeList', ["mecze" => $mecze,
            "footerYear" => date("Y"),
            "tytul" => "mecze",
            "active" => "active"]);
    }

    public function Show(MeczeRepositories $meczeRepo, $id)
    {

        $dane = $meczeRepo->find($id);


        return view('mecze.show', ["dane" => $dane,
            "footerYear" => date("Y"),
            "tytul" => "dane",
            "active" => "active"]);
    }

    public function listByOrganizer(MeczeRepositories $meczeRepo, $id)
    {

        $users = $meczeRepo->getMatchOrganizer($id);
        return view('Organizatorzy.organizatorzy', ["organizatorzyList" => $users,
            "footerYear" => date("Y"),
            "tytul" => "Organizatorzy",
            "active" => "active"]);
    }
    public function wyjazdyIndex(MeczeRepositories $meczeRepo)
    {


        $mecze = $meczeRepo->getAll();

        return view('mecze.wyjazdy', ["mecze" => $mecze,
            "footerYear" => date("Y"),
            "tytul" => "mecze",
            "active" => "active"]);
    }

    public function listByClient(MeczeRepositories $meczeRepo, $id)
    {

        $wyjazdy = $meczeRepo->getMatchClient($id);
        return view('mecze.wyjazdy', ["wyjazdy" => $wyjazdy,
            "footerYear" => date("Y"),
            "tytul" => "Wyjazdy",
            "active" => "active"]);
    }
    public function listByClient1(MeczeRepositories $meczeRepo, $id)
    {

        $wyjazdy1 = $meczeRepo->getMatchClient($id);
        return view('Organizatorzy.show', ["wyjazdy1" => $wyjazdy1,
            "footerYear" => date("Y"),
            "tytul" => "Wyjazdy",
            "active" => "active"]);
    }
}
