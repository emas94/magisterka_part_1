<?php
 namespace App\Repositories;

 use  Illuminate\Database\Eloquent\Model;


 abstract Class BaseRepository
 {
     protected $model;

     public function getAll($columns = array('*'))
     {
         return $this->model->orderBy('id', 'asc')->get($columns);
     }
     public function getAllByFunction($columns = array('*'))
     {
         return $this->model->orderBy('funkcja', 'desc')->get($columns);
     }


     public function create($data)
     {
         return $this->model->create($data);
     }

     public function update($data, $id)
     {
         return $this->model->where("id",'=', $id)->update($data);
     }

     public function delete($id)
     {
         return $this->model->destroy($id);
     }

     public function find($id)
     {
         return $this->model->find($id);
     }
     public function getMatchOrganizer($id)
     {
         //pobierz Organizatorow ktorzy posiadaja mecze takie ze mecze id = id pobranemu w argumencie organizatora
         return $this -> model->where('funkcja','organizator')->whereHas('mecze',
             function($q) use($id){
                 $q->where('mecze.id',$id);
             })->orderBy('name','asc')->orWhere('funkcja','Admin')->whereHas('mecze',
         function($q1) use($id){
             $q1->where('mecze.id',$id);})->get();
         }

     public function getMatchClient($id)
     {
         //pobierz uczestnika wyjazdu ktorzy posiadaja mecze takie ze mecze id = id pobranemu w argumencie organizatora
         return $this -> model->where('funkcja','organizator')->whereHas('mecze',
             function($q) use($id){
                 $q->where('klient.id',$id);
             })->orderBy('name','asc')->orWhere('funkcja','Admin')->whereHas('mecze',
             function($q1) use($id) {
                 $q1->where('klient.id', $id); })->orWhere('funkcja', 'Uzytkownik')->whereHas('mecze',
                     function ($q2) use ($id) {
                     $q2->where('klient.id', $id);})->get();
             }


     public function getMatchNews($id)
     {
         //pobierz uczestnika wyjazdu ktorzy posiadaja mecze takie ze mecze id = id pobranemu w argumencie organizatora
         return $this -> model->whereHas('news',
             function($q) use($id){
                 $q->where('news.id',$id);
             })->orderBy('name','asc')->get();
     }



 }
