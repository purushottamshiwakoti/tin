<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 1:29 PM
 */

namespace App\Data\Repositories\Contracts;


interface PostInterface
{

    public function getArchives();
    public function getArchivePosts($date);
    public function getByTag($tag);
    public function getData();
    public function GetRecentlyUploaded();
    public function getByScope(array $scopes);
    public function getAllPosts();
    public function searchBlog($attributes,$query,$operator = 'like',$type='or');
    public function getNepalPosts($title);

}