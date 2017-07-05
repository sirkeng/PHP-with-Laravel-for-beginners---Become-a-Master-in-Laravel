<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;


class PostsController extends Controller
{
	/*
	*
	* index
	*
	*/
	public function index()
	{
		// return "Its working the number ";

		// $posts = Post::all();

		 $posts = Post::latest();

		// $posts = Post::orderBy('id', 'asc')->get();




		return view('posts.index', compact('posts'));
	}
    
	/*
	*
	* create
	*
	*/
	public function create()
	{
		//return "I am the method that creates stuff :)";

		return view('posts.create');
	}


	/*
	*
	* store
	*
	*/
	public function store(CreatePostRequest $request)
	{


		$input = $request->all();

		if($file = $request->file('file')){


			$name = $file->getClientOriginalName();

			$file->move('images', $name); //move file to folder

			$input['path'] = $name; //save name to database

		}


		Post::create($input);


		// $file =  $request->file('file');

		// echo '<br>';

		// echo $file->getClientOriginalName();

		// echo '<br>';

		// echo $file->getClientSize();







		// //return $request->all();
		// //return $request->get('title');
		// //return $request->title;


		// // $this->validate($request, [

		// // 	// 'title' => 'required|max:50'
		// // 	'title' => 'required|max:4',
		// // 	// 'content'=> 'required'
		// // 	]);




		// Post::create($request->all());


		// return redirect('/posts');

		// // $input = $request->all();

		// // $input['title'] = $request->title;

		// // Post::create($request->all());



		// // $post = new Post;

		// // $post-title = $request->title;

		// // $post->save();

	}


	/*
	*
	* show
	*
	*/
    public function show($id)
    {
    	// return "this is the show method yayyyy ".$id;




    	$post = Post::findOrFail($id);

    	return view('posts.show', compact('post'));
    }


	/*
	*
	* edit
	*
	*/
	public function edit($id)
	{


		$post = Post::findOrFail($id);

		return view('posts.edit', compact('post'));

	}


	/*
	*
	* update
	*
	*/
	public function update(Request $request, $id)
	{
		//return $request->all();

		$post = Post::findOrFail($id);

		$post->update($request->all());

		return redirect('/posts');

	}



	/*
	*
	* destroy
	*
	*/
	public function destroy($id)
	{
		// $post = Post::findOrFail($id);
		// $post->delete();


		$post = Post::whereId($id)->delete();

		return redirect('/posts');


	}


	/*
	*
	* contact
	*
	*/
    public function contact(){


    	//$people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria'];

    	$people = ['dsfdsfds'];


    	return view('contact', compact('people'));

    }

    public function show_post($id, $name, $password){

    	//return view('post')->with('id', $id);


    	return view('post', compact('id', 'name', 'password'));
    }
}
