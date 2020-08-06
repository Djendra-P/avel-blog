<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Str;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $model)
    {

        return view('author.category', [
            'page_title' => 'Category',
            'categories' =>  $model->paginate(5),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $model)
    {
        Validator::make($request->all(), [
            'title' => 'required',
        ])->validate();

        $model->create([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $model)
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
    public function update(Request $request, Category $model)
    {
        Validator::make($request->all(), [
            'id'    => 'required',
            'title' => 'required',
        ])->validate();

        $model->find($request->id)->update([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
        ]);
        return redirect()->back()->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Category $model)
    {
        $model->find($id)->delete();
        return redirect()->to('author/category')->with('success', 'Data berhasil di hapus');
    }
}
