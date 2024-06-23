<?php

namespace App\Services\Interfaces;

interface PostServiceInterface
{
    public function getAllPosts();
    public function createPost($data);
    public function getPostById($id);
    public function updatePostById($data, $id);
    public function deletePostById($id);
}