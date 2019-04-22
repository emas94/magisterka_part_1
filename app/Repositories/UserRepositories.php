<?php
namespace App\Repositories;

use  App\Models\User;
use DB;
class UserRepositories extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllOrganizatorzy()
    {

        return $this->model->where('funkcja', 'Organizator')->orderBy('id', 'asc')->get();
    }

    public function getAllAdmin()
    {

        return $this->model->where('funkcja', 'Admin')->orderBy('id', 'asc')->get();
    }

    public function getAllUżytkownicy()
    {

        return $this->model->where('funkcja', 'Uzytkownik')->orderBy('id', 'asc')->get();
    }


    public function getOrganizatorStatics()
    {
        // pobiera liczbe uzytkownikow pasujacych i ich status gdzie funkcja tyo organizator pogrupowane po funkcji


        return DB::table('users')->select(DB::raw('count(*) as user_count, funkcja'))->where('funkcja', 'Organizator')->groupBy('funkcja')->get();
    }

    public function getAdminStatics()
    {
        // pobiera liczbe uzytkownikow pasujacych i ich status gdzie funkcja tyo organizator pogrupowane po funkcji


        return DB::table('users')->select(DB::raw('count(*) as user_count, funkcja'))->where('funkcja', 'Admin')->groupBy('funkcja')->get();
    }

    public function getUzytkownikStatics()
    {
        // pobiera liczbe uzytkownikow pasujacych i ich status gdzie funkcja tyo organizator pogrupowane po funkcji


        return DB::table('users')->select(DB::raw('count(*) as user_count, funkcja'))->where('funkcja', 'Użytkownik')->groupBy('funkcja')->get();
    }

    public function getAllFunction($columns = array('funkcja'))
    {
        return $this->model->orderBy('id', 'asc')->distinct()->get($columns);
    }
    public function getAllStatus($columns = array('status'))
    {
        return $this->model->orderBy('id', 'asc')->distinct()->get($columns);
    }
}
