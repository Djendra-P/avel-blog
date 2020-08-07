<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{

    /**
     * Show the main view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles           = Article::all();
        $articles_index     = Article::paginate(3);
        $categories         = Category::all();
        $groupBy            = $articles->sortByDesc('created_at')->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('F Y');
        });
        // dd($groupBy);
        return view('index', [
            'articles'              => $articles,
            'categories'            => $categories,
            'latest_articles'       => $articles->last(),
            'groupBy'               => $groupBy,
            'articles_index'        => $articles_index,
        ]);
    }
}
