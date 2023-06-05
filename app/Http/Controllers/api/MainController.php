<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use ErrorException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Query;

class MainController extends Controller
{
    public function index()
    {
        try {
            $blog = DB::select("SELECT a.id as id, a.title as title, a.content as content, a.status as status, b.name as id_member FROM posts a, users b WHERE a.id_member = b.id AND a.status = 'Published'");
            return response()->json($blog, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
	
	public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            Post::create($request->all());
            $response = [
                'Success' => 'New Blog Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show($id)
    {
        try {
            $blog = Post::findOrFail($id);
			//$blog = DB::select('SELECT a.id as id, a.title as title, a.content as content, a.status as status, b.name as id_member FROM posts a, users b WHERE a.id_member = b.id AND a.id='.$id.'');
            $response = $blog;
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $blog = Post::findOrFail($id);
            //$blog = DB::select('SELECT a.id as id, a.title as title, a.content as content, a.status as status, b.name as id_member FROM posts a, users b WHERE a.id_member = b.id AND a.id='.$id.'');
            $validator = Validator::make($request->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['succeed' => false, 'Message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $blog->update($request->all());
            $response = [
                'Success' => 'Blog Updated'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'no result',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy($id)
    {
        try {
            Post::findOrFail($id)->delete();
            return response()->json(['success' => 'Blog deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}