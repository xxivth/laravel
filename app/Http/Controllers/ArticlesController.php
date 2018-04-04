<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Article;

class ArticlesController extends Controller
{
   // function showArticles(){
   //   $article1 = 'Tutorial';
   //   $article2 = 'Getting started again';
   //   $this->insert();
   //   return view('articles.articles_list', compact('article1', 'article2'));
   // }
   //
   function iftest(){
     $var1 = 3;
     $var2 = 5;
     return view('iftest', compact('var1','var2'));
   }
   //
   // function insert(){
   //   DB::table('articles') -> insert(
   //     ['title'=>'How to be you po', 'content'=>"Yes."]
   //   );
   // }
   //
   // function getArticles(){
   //   $articles = DB::table('articles') -> where('id', 2) get();
   //   return view('articles.articles_list', compact('articles'));
   // }

   function showArticles(Request $request){
     $all_articles = Article::all();
     $preference = $request->session()->get('preference', 'default_preference');
     return view('articles.articles_list', compact('all_articles', 'preference'));
   }

   function show($id){
     $article = Article::find($id);
     return view('articles.articles_show_single_item', compact('article'));
   }

   function create(){
     return view('articles.articles_create');
   }

   function store(Request $request){
     $title = $request->get('title');
     $content = $request->get('content');

     $rules = array(
       'title' => 'required | min:3 | max:10 | alpha_num',
       'content' => 'required'
     );
     $this->validate($request,$rules);

     $article_obj = new Article();
     $article_obj->title = $title;
     $article_obj->content = $content;
     $article_obj->save();

     return redirect("articles")->with('alert', 'New article added');
   }

   function delete($id){
     $article_to_delete = Article::find($id);
     $article_to_delete->delete();

     return redirect("articles")->with('alert', 'Article successfully removed');
   }

   function setPreference(Request $request){
     $preference = $request->get('preference');
     $request->session()->put('preference', $preference);

     return redirect("articles")->with('alert', "Preference set to $preference");
   }

}
