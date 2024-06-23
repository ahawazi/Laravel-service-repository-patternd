<?php

namespace App\Services\Interfaces;

interface PostServiceInterface
{
    public function getPosts();
    public function createPost($data);
    public function getPostById($id);
    public function updatePost($id, $data);
    public function deletePostById($id);
}