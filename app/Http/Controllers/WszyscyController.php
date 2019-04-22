<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mecz;
use App\Models\KlientMecz;
use App\Models\News;
use App\Repositories\UserRepositories;
use App\Repositories\NewsRepository;
use App\Repositories\MeczeRepositories;
use Illuminate\Support\Facades\Auth;

class WszyscyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Wszyscy(UserRepositories $userRepo)
    {

        $statistic = $userRepo->getOrganizatorStatics();
        $statisticAdmin = $userRepo->getAdminStatics();
        $statisticUser = $userRepo->getUzytkownikStatics();
        $all = $userRepo->getAllByFunction();

        return view('wszyscy.wszyscy', ["wszyscyList" => $all,
            "footerYear" => date("Y"),
            "tytul" => "Wszyscy",
            "active" => "active",
            "statistic" => $statistic,
            "statisticAdmin" =>$statisticAdmin,
            "statisticUser" =>$statisticUser
        ]);
    }

    public function Show(UserRepositories $userRepo, $id)
    {

        $single = $userRepo->find($id);


        return view('wszyscy.show', ["single" => $single,
            "footerYear" => date("Y"),
            "tytul" => "Wszyscy",
            "active" => "active"]);
    }


    public function showMecz()
{
    $mecze = Mecz::all();
    return view('zapisy.zapisy',["mecze"=>$mecze,]);
}
 public  function registerMatch(Request $request)

 {  $request->validate([

     'mecze'=>'required',
 ]);

    $zapis = new KlientMecz;
     $zapis-> user_id =$request->input('user_id');
     $zapis-> mecz_id =$request->input('mecze');
     $zapis->timestamps = false;
     $zapis-> save();

     return redirect('/wyjazdy')->with('status_succes','Gratulacje, zostałeś zapisany na mecz');
 }

 public function metadane1()
 {
     return view('wyjazdy',["metadane"=>"123123122312",
                                    "tytul"=>"asdasda"]);
 }


}
