<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = $request->input('q');
        // $articles = Article::where('description', 'LIKE', '%' . $q . '%')->paginate(6);
        
        $articles = Article::where([
            ['description', 'LIKE', '%' . $q . '%'],
            ['checked', '=', '1'],
            ['visible', '=', '1'],            
        ])->paginate(6);





        return view('app/results', compact('articles'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $description = $request->input('description');
        $post = $request->input('post');

        $article = new Article;

        $article->description = $description;
        $article->author = Auth::user()->name;
        $article->approval = "";
        $article->tags = "";
        $article->category = "";
        $article->category_sub = "";
        $article->visible = true;
        $article->checked = false;
        $article->article_file = "";
        $article->backup_file = "";
        $article->attach_file = "";

        $article->save();

        Storage::disk('local')->put('article_' . $article->id . '.html', $post);

        return redirect()->action('ArticleController@show', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {   
        
        

        if (Storage::exists('article_' . $article->id . '.html')) {
            $content = Storage::get('article_' . $article->id . '.html');
        } else {
            $content = null;
        }

        return view('app/show', compact('article','content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Storage::exists('article_' . $article->id . '.html')) {
            $content = Storage::get('article_' . $article->id . '.html');
        } else {
            $content = null;
        }
        return view('app/edit', compact('article','content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $description = $request->input('description');
        $content = $request->input('post');
        $checked = $request->input('checked');

        $article->description = $description;
        // $article->author = Auth::user()->name;
        $article->approval = "";
        $article->tags = "";
        $article->category = "";
        $article->category_sub = "";
        $article->visible = $article->visible;

        if ($checked == "on") {
            $checked = true;
        } else {
            $checked = false;
        }

        $article->checked = $checked;
        $article->article_file = "";
        $article->backup_file = "";
        $article->attach_file = "";

        $article->save();

        Storage::disk('local')->put('article_' . $article->id . '.html', $content);

        return view('app/show', compact('article','content'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        Storage::delete('article_' . $article->id . '.html');
        $article->delete();
        
        return redirect('/dash');

    }

    public function approve()
    {

        $articles = Article::where('checked', '<>', '1')->paginate(6);
        return view('app/approve', compact('articles'));        
        
    }

    public function check(Article $article)
    {

        $article->checked = true;
        $article->save();

        return redirect('/dash');

    }

}

