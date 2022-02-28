<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateArticleForm;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $articles = Article::where('title', 'LIKE', "%{$search}%")
                ->orWhere('seo_text', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(10);
        } else {
            $articles = Article::latest()->paginate(10);
            $articles->withPath('/dashboard/articles');
        }

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateArticleForm $request)
    {
        $deliveries = Article::create([
            'title'               => $request->title,
            'seo_text'            => $request->seo_text
        ]);

        return redirect('/dashboard/articles')
            ->with('success', 'Новая сео статья была успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateArticleForm $request, Article $article)
    {
        $article->title                 =  $request->title;
        $article->seo_text              =  $request->seo_text;
        $article->save();

        return redirect('dashboard/articles')
            ->with('success', 'Сео статья была успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Фкешсду $article)
    {
        $article->delete();

        return redirect('dashboard/articles')
            ->with('success', 'Сео статья была успешно удалена.');
    }
}
