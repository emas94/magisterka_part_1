<?php
namespace App\Repositories;

use  App\Models\Druzyna;

class DruzynyRepositories extends BaseRepository {
    public function __construct(Druzyna $model)
    {
        $this->model = $model;
    }

}
