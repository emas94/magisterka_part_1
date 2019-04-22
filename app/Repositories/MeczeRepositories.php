<?php
namespace App\Repositories;

use  App\Models\Mecz;

class MeczeRepositories extends BaseRepository {
    public function __construct(Mecz $model)
    {
        $this->model = $model;
    }

    public function getAllStatusMecz($columns = array('status'))
    {
        return $this->model->orderBy('id', 'asc')->distinct()->get($columns);
    }
}
