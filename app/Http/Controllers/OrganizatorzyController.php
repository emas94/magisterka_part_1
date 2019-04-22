<?php

namespace App\Http\Controllers;

use App\Models\KlientMecz;
use App\Models\Mecz;
use App\Repositories\MeczeRepositories;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Repositories\UserRepositories;
use Illuminate\Support\Facades\Auth;

class OrganizatorzyController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Organizatorzy(UserRepositories $userRepo)
    {

        $users = $userRepo ->getAllOrganizatorzy();

        return view('Organizatorzy.organizatorzy', ["organizatorzyList" => $users,
            "footerYear" => date("Y"),
            "tytul" => "Organizatorzy",
            "active" => "active"]);
    }
    public function listByOrganizer(UserRepositories $userRepo,$id)
    {

        $users =$userRepo->getMatchOrganizer($id);
        return view('Organizatorzy.organizatorzy', ["organizatorzyList" => $users,
            "footerYear" => date("Y"),
            "tytul" => "Organizatorzy",
            "active" => "active"]);
    }

    public function listByNews(NewsRepository $newsRepo,$id)
    {

        $news =$newsRepo->getMatchNews($id);
        return view('Organizatorzy.show', ["news" => $news,
            "footerYear" => date("Y"),
            "tytul" => "Organizatorzy",
            "active" => "active"]);
    }
    public function Admini(UserRepositories $userRepo)
    {

        $admini = $userRepo ->getAllAdmin();

        return view('Organizatorzy.organizatorzy', ["adminiList" => $admini,
            "footerYear" => date("Y"),
            "tytul" => "Organizatorzy",
            "active" => "active"]);
    }
    public function Show(UserRepositories $userRepo,$id)
    {

        $organizator = $userRepo->find($id);

        return view('Organizatorzy.show', ["organizator" => $organizator,



                "footerYear" => date("Y"),
                "tytul" => "Organizatorzy",
                "active" => "active"]);
        }



    public function Edit(UserRepositories $userRepo,$id)
    {

        $organizator = $userRepo->update(["name"=>"David"],$id);


        return redirect('organizatorzy');
    }
}


