<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $articles = Article::paginate(2);
        return view('author.article', [
            'page_title' => 'Articles',
            'categories' => $categories,
            'articles' => $articles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $model)
    {
        // dd($request->all());
        /**
         * Validation
         */
        Validator::make($request->all(), [
            'title'         => 'required',
            'category_id'   => 'required',
            'excerpt'       => 'required',
            'body'          => 'required',
        ])->validate();

        /**
         * Function Create
         */
        if (Article::where('slug', '=', Str::slug($request->title))->exists()) {
            return redirect()->back()->with('error', "Title '$request->title' sudah ada");
        }

        $model->create([
            'author_id'     => Auth::user()->id,
            'category_id'   => $request->category_id,
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'excerpt'       => $request->excerpt,
            'body'          => $request->body,
            'is_publish'    => $request->is_publish,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Article $model)
    {
        return response()->json($model->find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $model)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'title'         => 'required',
            'category_id'   => 'required',
            'excerpt'       => 'required',
            'body'          => 'required',
        ])->validate();

        if (Article::where('slug', '=', Str::slug($request->title))->exists()) {
            return redirect()->back()->with('error', "Title '$request->title' sudah ada");
        }

        $model->find($request->id)->update([
            'author_id'     => Auth::user()->id,
            'category_id'   => $request->category_id,
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'excerpt'       => $request->excerpt,
            'body'          => $request->body,
            'is_publish'    => $request->is_publish,
        ]);

        return redirect()->back()->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Article $model)
    {
        $model->find($id)->delete();
        return redirect()->url('author/article')->with('success', 'Data berhasil di hapus');
    }
}
