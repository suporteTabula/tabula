<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\BlogPost;
use App\BlogCategory;
use Storage;
use Auth;

class AdminBlogController extends Controller
{
	//Funcções Categorias do Blog
    public function indexCategBlog()
    {
    	$categBlog = BlogCategory::get();
    	return view('admin.blog.index')->with('categBlog', $categBlog);
    }

    public function createCategBlog(Request $request)
    {
    	return view('admin.blog.create');
    }

    public function storeCategBlog(Request $request)
    {
    	$this->validate($request, [
            'name' 				=> 'required|unique:blog_categories',	
            'meta_title' 		=> 'required',
        ]);

        $categBlog = new BlogCategory;

        $categBlog->name 				= $request->name;
        $categBlog->meta_title 			= $request->meta_title;
        $categBlog->meta_description 	= $request->meta_description;
        $categBlog->keyword 			= $request->keyword;
        $categBlog->save();
        return redirect(route('blog.edit', ['id'=> $categBlog->id]))
        ->with('success', 'Categoria do blog criada com sucesso');
    }
    public function editCategBlog($id)
    {
    	$categBlog = BlogCategory::find($id);
    	return view('admin.blog.edit')->with('categBlog', $categBlog);
    }

    public function updateCategBlog(Request $request)
    {
    	$this->validate($request, [
            'name'        => [
                'required',
                Rule::unique('blog_categories')->ignore($request->id)
            ],	
            'meta_title'  => 'required',
               
        ]);

        $categBlog = BlogCategory::find($request->id);

        $categBlog->name 				= $request->name;
        $categBlog->meta_title 			= $request->meta_title;
        $categBlog->meta_description 	= $request->meta_description;
        $categBlog->keyword 			= $request->keyword;
        $categBlog->save();
        return redirect()->back()
        ->with('success', 'Categoria do blog Editada com sucesso');
    }

    public function deleteCategBlog($id)
    {
    	$categBlog = BlogCategory::find($id);
    	$categBlog->delete();
    	return redirect()->back()->with('info', 'Removida com sucesso');
    }

    //Fim Funções Categorias do Blog

    //Funções Criação dos Posts
	public function indexPostBlog()
	{
		$postBlog = BlogPost::get();
    	return view('admin.blog.post.index')->with('postBlog', $postBlog);
	}
	public function createPostBlog()
	{
		$categories = BlogCategory::all();
		if ($categories->count() > 0) {
			return view('admin.blog.post.create')->with('categories', $categories);
		}
		return redirect()->back()->with('info', 'Criar ao mínimo uma categoria.');
	}
	public function storePostBlog(Request $request)
	{
		$this->validate($request, [
            'name' 				=> 'required|unique:blog_posts',		
            'meta_title' 		=> 'required',
            'category_id'		=> 'required',
            'content'			=> 'required',
        ]);
		$post = new BlogPost;

		$post->name 			= $request->name;
		$post->meta_title 		= $request->meta_title;
		$post->meta_description = $request->meta_description;
		$post->keywords			= $request->keywords;
		$post->content 			= $request->content;
		$post->user_id 			= Auth::user()->id;
		$post->category_id 		= $request->category_id;
		$post->save();
		return redirect(route('blog.post.edit', ['id'=> $post->id]))
        ->with('success', 'Post do blog criado com sucesso');
	}
	public function editPostBlog($id)
	{
		$post = BlogPost::find($id);
    	return view('admin.blog.post.edit')->with('post', $post)->with('categories', BlogCategory::all());
	}
	public function updatePostBlog(Request $request)
	{
		$this->validate($request, [
            
            'name'        	=> [
                'required',
                Rule::unique('blog_posts')->ignore($request->id)
            ],	
            'meta_title' 	=> 'required',
            'category_id'	=> 'required',
            'content'		=> 'required',
        ]);
		$post = BlogPost::find($request->id);

		$post->name 			= $request->name;
		$post->meta_title 		= $request->meta_title;
		$post->meta_description = $request->meta_description;
		$post->keywords			= $request->keywords;
		$post->content 			= $request->content;
		$post->user_id 			= Auth::user()->id;
		$post->category_id 		= $request->category_id;
		$post->save();
		return redirect()->back()
        ->with('success', 'Post do blog editado com sucesso');
	}
	public function deletePostBlog($id)
	{
		$post = BlogPost::find($id);
    	$post->delete();
    	return redirect()->back()->with('info', 'Removid com sucesso');
	}





	
    public function cresate(Request $request)
    {
    	$status = 1;

        $file = basename($request->file('icon')->getClientOriginalName());
        
        $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));

        if ($request->file('icon')->getClientSize() > 2000000) {
            $alert = "O tamanho do ícone enviado é muito grande. Por favor, tente novamente.";
            $status = 0;
        }

        if($type != "jpg" && $type != "png" && $type != "jpeg") {
            $alert = "Formato de ícone inválido. Por favor, tente novamente.";
            $status = 0;
        }

        if ($status == 1) {
            $fileName = Storage::disk('public')->put('icons', $request->file('icon'));
            if (!$fileName) {
                $alert = 'Ocorreu um erro ao salvar o ícone. Por favor, tente novamente.';
                $status = 0;
            }
        }

        if($status == 0){
            return redirect( url('admin/pages/new') . '?type-alert=danger&alert=' . $alert)->withInput();
        } else {

            $page = Page::create([
                'order' => $request['order'],
                'title' => $request['title'],
                'icon' => basename($fileName),
            ])->id;

            $i = 0;

            foreach ($request['title_content'] as $title) {
                PageContent::create([
                    'order' => $request['order_content'][$i],
                    'page' => $page,
                    'title' => $title,
                    'content' => $request['content'][$i],
                    'effect' => $request['effect'][$i]
                ]);

                $i++;
            }


            return redirect( url('admin/pages') . '?type-alert=success&alert=Página cadastrada com sucesso.');
        }
    }

    public function edit($id)
    {
    	$page = Page::where('id', $id)->first();

        $contents = PageContent::orderBy('order', 'asc')->where('page', $id)->get();

        return view('admin.pages.edit_page', ['page' => $page, 'contents' => $contents]);
    }

    public function update(Request $request)
    {
        if( $request->hasFile('icon') ){

            $status = 1;

            $file = basename($request->file('icon')->getClientOriginalName());
            
            $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));

            if ($request->file('icon')->getClientSize() > 2000000) {
                $alert = "O tamanho do ícone enviado é muito grande. Por favor, tente novamente.";
                $status = 0;
            }

            if($type != "jpg" && $type != "png" && $type != "jpeg") {
                $alert = "Formato de ícone inválido. Por favor, tente novamente.";
                $status = 0;
            }

            if ($status == 1) {
                $fileName = Storage::disk('public')->put('icons', $request->file('icon'));
                if (!$fileName) {
                    $alert = 'Ocorreu um erro ao salvar o ícone. Por favor, tente novamente.';
                    $status = 0;
                }
            }

            if($status == 0){
                return redirect( url('admin/pages/edit') . '/' . $request['id'] .  '?type-alert=danger&alert=' . $alert);
            } else {

                $page = Page::where('id', $request['id'])->update([
                    'order' => $request['order'],
                    'title' => $request['title'],
                    'icon' => basename($fileName)
                ]);

                PageContent::where('page', $request['id'])->delete();

                $i = 0;

                foreach ($request['title_content'] as $title) {
                    PageContent::create([
                        'order' => $request['order_content'][$i],
                        'page' => $request['id'],
                        'title' => $title,
                        'content' => $request['content'][$i],
                        'effect' => $request['effect'][$i]
                    ]);

                    $i++;
                }

                return redirect( url('admin/pages/edit') . '/' . $request['id'] . '?type-alert=success&alert=Página atualizada com sucesso.');
            }
        } else {
            $page = Page::where('id', $request['id'])->update([
                'order' => $request['order'],
                'title' => $request['title']
            ]);

            PageContent::where('page', $request['id'])->delete();

            $i = 0;

            foreach ($request['title_content'] as $title) {
                PageContent::create([
                    'order' => $request['order_content'][$i],
                    'page' => $request['id'],
                    'title' => $title,
                    'content' => $request['content'][$i],
                    'effect' => $request['effect'][$i]
                ]);

                $i++;
            }

            return redirect( url('admin/pages/edit') . '/' . $request['id'] . '?type-alert=success&alert=Página atualizada com sucesso.');
        }
        
    }

    public function delete($id)
    {
        Page::where('id', $id)->delete();
        return redirect( url('admin/pages') . '?type-alert=success&alert=Página deletada com sucesso.');

    }
}