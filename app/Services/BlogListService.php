<?php

namespace App\Services;

use App\Http\Resources\BlogCollection;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogListService
{

    public function paginate(Request $request) : BlogCollection
    {
        return new BlogCollection(Blog::query()
            ->orderBy('created_at', 'desc')
            ->paginate(20, ['*'], 'current_page'));
    }
}
