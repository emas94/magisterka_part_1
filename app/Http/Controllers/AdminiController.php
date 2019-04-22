<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mecz;
use App\Models\Liga;
use App\Models\Druzyna;
use App\Repositories\UserRepositories;
use App\Repositories\MeczeRepositories;
use Illuminate\Support\Facades\Auth;

class AdminiController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Admini(UserRepositories $userRepo)
    {

        $admini = $userRepo->getAllAdmin();

        return view('admini.admini', ["adminiList" => $admini,
            "footerYear" => date("Y"),
            "tytul" => "Admini",
            "active" => "active"]);
    }

    public function Show(UserRepositories $userRepo, $id)
    {

        $admin = $userRepo->find($id);


        return view('admini.show', ["admin" => $admin,
            "footerYear" => date("Y"),
            "tytul" => "Admin",
            "active" => "active"]);
    }

    public function Edit(UserRepositories $userRepo,$id)

    {

        $mecze = Mecz::all();
        $user = $userRepo->find($id);
        $status = $userRepo->getAllStatus();
        $funkcja =$userRepo->getAllFunction();

        return view('admin.editUser',["user"=>$user,
                                    "status"=>$status,
                                    "funkcja"=>$funkcja,
                           "mecze"=>$mecze,
                           "footerYear" => date("Y") ]);
    }

    public function EditIndex()
    {
        $user = User::all();
        return view('admin.edit',[
            "user"=>$user,
            "tytul" => "Wybierz do edycji",
        ]);
    }
    public function editStore(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'login' => 'required|max:25',
            'lastname' => 'required|max:255',
            'email'=> 'required',
            'password'=>'required|min:5',
            'telefon'=>'required',
        ]);
        $user = User::find($request->input('id'));
        $user-> login =$request->input('login');
        $user-> name =$request->input('name');
        $user-> lastname =$request->input('lastname');
        $user-> email =$request->input('email');
        $user-> password = bcrypt($request->input('password'));
        $user-> telefon =$request->input('telefon');
        $user-> status =$request->input('status');
        $user-> funkcja =$request->input('funkcja');

        $user-> save();
        $user->mecze()->sync($request->input('mecze'));
        return view('admin.paneladministratora');
    }

    public function Delete(UserRepositories $userRepo, $id)
    {

        $delete = $userRepo->delete($id);
        return redirect()->action('OrganizatorzyController@Organizatorzy');
    }
    public function CreateMecz(MeczeRepositories $meczRepo)
    {

        $status = $meczRepo->getAllStatusMecz();

        return view('admin.createMecz', ["status"=> $status,
                             "footerYear" => date("Y")]);
    }
    public function Store(Request $request)

    {
        $request->validate([
        'nazwa' => 'required|max:255',
        'data'=>'required',
        'wolnemiejsca'=>'required',
    ]);
        $mecze = new Mecz;
        $mecze->nazwa = $request->input('nazwa');
        $mecze->data = $request->input('data');
        $mecze->wolnemiejsca = $request->input('wolnemiejsca');
        $mecze->status = $request->input('status');
        $mecze->save();

        return redirect()->action('MeczeController@meczeIndex');
    }

    //ligi
    public function CreateLiga()
    {

        return view('admin.createLiga',["footerYear" => date("Y")]);
    }
    public function StoreLiga(Request $request)

    {

        $request->validate([
            'nazwa' => 'required|max:255',
            'kraj'=>'required|max:255',

        ]);
        $ligi = new Liga;
        $ligi-> nazwa =$request->input('nazwa');
        $ligi-> kraj =$request->input('kraj');
        $ligi->timestamps = false;
        $ligi-> save();
        return redirect()->action('LigiController@ligiIndex');
    }
//druzyny
    public function CreateDruzyna()
    {
        return view('admin.createDruzyna',["footerYear" => date("Y")]);
    }
    public function StoreDruzyna(Request $request)

    {

        $request->validate([
            'nazwa' => 'required|max:255',
            'kraj'=>'required|max:255',

        ]);
        $druzyna = new Druzyna;
        $druzyna-> nazwa =$request->input('nazwa');
        $druzyna-> kraj =$request->input('kraj');
        $druzyna->timestamps = false;
        $druzyna-> save();
        return redirect()->action('DruzynyController@druzynyIndex');
    }
    //organizatorzy
    public function CreateOrganizer(UserRepositories $userRepo)
    {


        $status = $userRepo->getAllStatus();
        $mecze = Mecz::all();
        return view('admin.createOrganizator',["footerYear" => date("Y"),
                                                        "mecze"=>$mecze,
                                                        "status"=>$status]);
    }
    public function StoreOrganizer(Request $request)

    {

        $request->validate([
            'name' => 'required|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|min:5',
            'telefon'=>'required',
        ]);
        $organizator = new User;
        $organizator-> login =$request->input('login');
        $organizator-> name =$request->input('name');
        $organizator-> lastname =$request->input('lastname');
        $organizator-> email =$request->input('email');
        $organizator-> password = bcrypt($request->input('password'));
        $organizator-> telefon =$request->input('telefon');
        $organizator-> funkcja =$request->input('funkcja');

        $organizator-> status =$request->input('status');
        $organizator-> save();
        $organizator->mecze()->sync($request->input('mecze'));

        return redirect()->action('OrganizatorzyController@Organizatorzy');
    }



}


