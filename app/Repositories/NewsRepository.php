<?php
namespace App\Repositories;

use  App\Models\News;
use DB;
class NewsRepository extends BaseRepository {
    public function __construct(News $model)
    {

        $this->model = $model;
    }

    public function getAllNews($columns = array('*'))
    {
        return $this->model->orderBy('id', 'desc')->get($columns);
    }

    public function increment($id)
    {
        $this->model->where("id", $id)->increment('rating');
        $this->model->update();
    }
    public function decrement($id)
    {
        $this->model->where("id", $id)->decrement('rating');
        $this->model->update();
    }
}
