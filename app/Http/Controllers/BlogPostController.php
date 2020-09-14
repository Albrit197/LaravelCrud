<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
   
    public function index(){
        // return view('blogposts', ['posts' => $this->blogPosts]);
        return view('blogposts', ['posts' => \App\Blogpost::all()]);
    }

    public function show($id){
        return \App\Blogpost::find($id);
    }
    public function store(Request $request){
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas
               'title' => 'required|unique:blogposts,title|max:5',
               'text' => 'required',
        ]);   
        $pb = new \App\Blogpost();
        $pb->title = $request['title'];
        $pb->text = $request['text'];

        if($pb->title == NULL or $pb->text == NULL)
            return redirect('LaravelCrud/posts')->with('status_error', 'Post was not created!');

        
        return ($pb->save() !== 1) ? 
            redirect('/LaravelCrud/posts')->with('status_success', 'Post created!') : 
            redirect('/LaravelCrud/posts')->with('status_error', 'Post was not created!');

    }
    public function destroy($id){
        \App\Blogpost::destroy($id);
        return redirect('/LaravelCrud/posts')->with('status_success', 'Post deleted!');
    }

}
