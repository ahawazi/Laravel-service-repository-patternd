<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public function allPosts();
    public function createPoost($data);
    public function findPost($id);
    public function updatePost($data, $id);
    public function deleetePost($id);
}