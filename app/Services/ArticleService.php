<?php

namespace App\Services;

use App\Models\Article;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ArticleService.
 */
class ArticleService
{
    public static function getAllArticles()
    {
        return Article::all();
    }

    public static function getArticleById($id)
    {
        return Article::findOrFail($id);
    }

    public static function store($name)
    {
        return Article::create([
            'name' => $name,
        ]);
    }

    public static function update($id, $name)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'name' => $name,
        ]);

        return $article;
    }

    public static function delete($id)
    {
        $article = Article::findOrFail($id);

        if ($article->products()->exists()) {
            throw new HttpException(400, 'Tidak bisa menghapus tipe yang memiliki produk');
        }

        $article->delete();
    }

    public static function getDataTable()
    {
        $query = Article::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('product_count', function ($query) {
                return $query->products()->count() . " Produk";
            })
            ->addColumn('action', function ($query) {
                return view('pages.admin.Article.menu', compact('query'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
