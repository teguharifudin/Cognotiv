<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogService
{
    public function create(Request $request) : Blog
    {
        return Blog::forceCreate($this->formatParams($request));
    }

    private function formatParams(Request $request, ?Blog $blog = null) : array
    {
        $formatted = [
            'name'        => $request->name,
            'description' => $request->description,
        ];

        return $formatted;
    }

    public function update(Blog $blog, Request $request) : void
    {
        $blog->forceFill($this->formatParams($request, $blog))->save();
    }

    public function delete(Blog $blog) : void
    {
        $blog->delete();
    }
}
