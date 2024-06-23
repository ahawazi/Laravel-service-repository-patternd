<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }
    public function index(): Response
    {
        $posts = $this->postService->getAllPosts();
        return Inertia::render('/Posts/Index', ['posts' => $posts]);
    }

    public function create(): Response
    {
        return Inertia::render('/Posts/Create');
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->createPost($request->validated());
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function show($id): Response
    {
        $post = $this->postService->getPostById($id);
        return Inertia::render('Posts/Show', ['post' => $post]);
    }

    public function edit($id): Response
    {
        $post = $this->postService->getPostById($id);
        return Inertia::render('/Posts/Edit', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $this->postService->updatePostById($request->validated(), $id);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $this->postService->deletePostById($id);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
