<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 1:29 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Post;
use App\Data\Repositories\Contracts\PostInterface;
use App\Data\Repositories\Repository;
use Carbon\Carbon;
use Exception;

class PostRepository extends Repository implements PostInterface
{

    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getData()
    {
        return $this->model->where('publish',1)->orderBy('created_at','desc')->get();
    }
    public function GetRecentlyUploaded()
    {
        return $this->model->where('publish',1)->orderBy('created_at','desc')->take(2)->get();
    }

      public function getAllPosts()
    {
        return $this->model->where('publish',1)->orderBy('created_at','desc')->paginate(10);
    }
    

    public function getArchives()
    {
        return $this->model->select('created_at')->groupBy('created_at')->orderBy('created_at','desc')->get();
    }

    public function getArchivePosts($date)
    {
        try{
        $dateStart = new Carbon($date);
        $dateEnd = new Carbon($date);
        $dateEnd->addMonth(1);
        $posts = $this->model->whereBetween('created_at',[$dateStart,$dateEnd])->published()->latest()->get();
        return $posts;
        } catch(Exception $e){
            throw (new Exception());
        }
    }

    public function getByTag($tag)
    {
        $text = str_replace('-',' ',$tag);

        $posts = $this->model->where('tags','like','%'.$text.'%')->published()->latest()->get();
        return $posts;
    }

    public function searchBlog($attributes, $q, $filters = [], $operator = 'like', $type = 'or')
    {

        $query = $this->model->select('*');
        $method = 'where';

        if (strtoupper($type) === 'OR') {
            $method = 'orWhere';
        }
        if (strtolower($operator) == 'like') {
            $q = '%' . $q . '%';
        }

        $query->where(function ($qs) use ($attributes, $q, $method, $operator) {
            foreach ($attributes as $key => $value) {
                $explodeAttr = explode('.', $value);
                if (count($explodeAttr) == 2) {
                    $att = $explodeAttr[1];
                    $qs->orWhereHas($explodeAttr[0], function ($qe) use ($att, $q) {
                        return $qe->where($att, 'like', $q);
                    });
                } else {
                    $qs->$method($value, $operator, $q);
                }
            }
        });
       
     
        $result = $query->published()->paginate(10);
     
        return $result;
    }

    public function getNepalPosts($title='nepal')
    {
        return $this->model->whereHas('category',  function ($q)  use ($title) {
            $q->where('title', '=', $title);
        })->get();
    }


}