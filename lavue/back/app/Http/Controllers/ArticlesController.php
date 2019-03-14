<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller
{
    public function index() {
        return Article::orderBy('id', 'desc')->get();
    }

    public function store(Request $request) {

        $article = Article::create($request->all());       

        return $article;
    }

    public function show($id) {
        $article = Article::find($id);

        /* if(count($product) > 0) {
            return response()->json($product);
        }
 */
        return response()->json($article);

        //return response()->json(['error' => 'Resource not found!'], 404);
    }

    public function update(Request $request, $id) {
        $article = Article::find($id);

        $article->update($request->all());

        return response()->json($article);
    }

    public function destroy($id) {
        try {
            Article::destroy($id);

            return response([], 204);
        } catch (\Exception $e) {
            return response(['Problem deleting the Article', 500]);
        }
    }
}
