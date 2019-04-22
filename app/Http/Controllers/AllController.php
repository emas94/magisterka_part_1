<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Repositories\NewsRepository;
use App\Models\User;
use App\Repositories\UserRepositories;

class AllController extends Controller
{
    public function getNews(NewsRepository $newsRepo)
    {
        $news = $newsRepo->getAllNews();
        return view('strona_glowna/strona_glowna',["news"=>$news]);
    }

    public function CreateNews()
    {
        return view('organizator.createNews');
    }
    public function StoreNews(Request $request)

    {

        $request->validate([
            'tittle' => 'required|max:255',
            'content'=> 'required',
            'author'=>'required',
        ]);
        $news = new News;

        $news-> tittle =$request->input('tittle');
        $news-> content  =$request->input('content');
        $news-> author =$request->input('author');
        $news-> save();
        $news->news()->sync($request->input('id'));

        return redirect('/')->with('status','Wpis pomyślnie dodany');
    }
    public function Delete(NewsRepository $newsRepo, $id)
    {

        $delete = $newsRepo->delete($id);
        return redirect('/')->with('status','Wpis skasowany');
    }
    public function newsShow(NewsRepository $newsRepo, $id)
    {

        $newsShow = $newsRepo->find($id);

        return view('organizator.newsShow', ["newsShow" => $newsShow,
            "active" => "active"]);
    }

    public function addPoints(NewsRepository $newsRepo,$id)
    {
        $addPoint=$newsRepo->increment($id);

        return redirect('/')->with('status','Artykuł oceniony pozytywnie');
    }

    public function substractPoints(NewsRepository $newsRepo, $id)
    {
        $substractPoint= $newsRepo->decrement($id);
        return redirect('/')->with('status','Artykuł oceniony negatywnie');
    }
}


