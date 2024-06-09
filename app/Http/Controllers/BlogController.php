<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Services\BlogListService;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, BlogListService $service)
    {
        return $service->paginate($request);
    }

    public function store(BlogRequest $request, BlogService $service)
    {
        $blog = $service->create($request);

        return $this->success([
            'message' => 'Blog created.',
            'blog' => new BlogResource($blog)
        ]);
    }

    public function show(Blog $blog) : BlogResource
    {
        return new BlogResource($blog);
    }

    public function update(BlogRequest $request, Blog $blog, BlogService $service)
    {
        $service->update($blog, $request);

        return $this->success(['message' => 'Blog updated.']);
    }

    public function destroy(Blog $blog, BlogService $service)
    {
        $service->delete($blog);

        return $this->success(['message' => 'Blog deleted.']);
    }
}
