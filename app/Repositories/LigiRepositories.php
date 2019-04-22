<?php
namespace App\Repositories;

use  App\Models\Liga;

class LigiRepositories extends BaseRepository {
    public function __construct(Liga $model)
    {
        $this->model = $model;
    }

}
