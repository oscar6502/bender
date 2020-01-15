<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // SELECT author, COUNT(*) FROM articles GROUP BY author HAVING COUNT(*) > 1


        $tops = DB::table('articles')
                     ->select(DB::raw('author, count(*) as posts'))
                     ->groupBy('author')
                     ->havingRaw('count(*) > 1')
                     ->limit(3)
                     ->orderBy('posts', 'desc')
                     ->get();

        $not_checked = Article::where('checked', 0)->get()->count();
        // $last_articles = Article::all()->sortByDesc('id')->take(3);

        $last_articles = Article::where([
            ['checked', 1],
            ['visible',1] ])->get()->sortByDesc('id')->take(3);

        return view('app/index', compact('not_checked','last_articles','tops'));

    }

}
