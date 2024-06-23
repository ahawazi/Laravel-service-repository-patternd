<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->allPosts();
    }

    public function createPost($data)
    {
        return $this->postRepository->storePost($data);
    }
    public function getPostById($id)
    {
        return $this->postRepository->findPost($id);
    }
    public function updatePostById($data, $id)
    {
        return $this->postRepository->updatePost($data, $id);
    }
    public function deletePostById($id)
    {
        return $this->postRepository->destroyPost($id);
    }
}