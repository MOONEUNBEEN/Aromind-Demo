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

        /* $article = Article::create($request->all());

        return $article; */

        $exploded = explode(',', $request->image);

        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg')) {
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }

        $fileName = str_random().'.'.$extension;

        $path = public_path().'/'.$fileName;

        file_put_contents($path, $decoded);

        $article = Article::create($request->except('image') +
        ['user_id' => '1',
         'image' => $fileName
        ]);

        return $request->all();
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
