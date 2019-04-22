<?php
namespace App\Repositories;

use  App\Models\Stadion;

class StadionyRepositories extends BaseRepository {
    public function __construct(Stadion $model)
    {

        $this->model = $model;
    }

}
