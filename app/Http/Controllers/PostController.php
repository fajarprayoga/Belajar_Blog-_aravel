<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

//model post
use App\Posts;
use App\Category;
use App\Tags;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(5);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();
        return view('admin.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        //simpan nama gambar dengan nama yang unik dengan cara tambahkan waktu+namagambar
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'slug' => Str::slug($request->judul),
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'user_id' => Auth::id() 
        ]);

        $post->tags()->attach($request->tags);

        //pada fungsi move() jika kita ingin menempatkan file pada folder maka akan dibuat folder baru secara otomatis
        $gambar->move('public/uploads/posts/', $new_gambar);
        return redirect()->back()->with('success', 'postingan anda ditambahkan');
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
    public function edit($id)
    {
        $category = Category::all();
        $tags = Tags::all();
        $post = Posts::findorfail($id);
        return view('admin.post.edit', compact('post', 'tags', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        //ambil data dari model
        $post = Posts::findorfail($id);
        
        //validasi jika ada atau tidak gambar yang di upoad ulang
        if($request->has('gambar')){

            //membuat gambar dengan nama uni dan bisa langsung di akses
            $gambar = $request->gambar;
            //simpan nama gambar dengan nama yang unik dengan cara tambahkan waktu+namagambar
            $new_gambar = time().$gambar->getClientOriginalName();
            //SIMPAN FILE PADA FOLDER
            $gambar->move('public/uploads/posts/', $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul),
                'gambar' => 'public/uploads/posts/'.$new_gambar
            ];
        }else {
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul),
            ];
        }

        //update tags melalui model
        $post->tags()->sync($request->tags);
        //update data pada table post
        $post->update($post_data);

        return redirect('post')->with('success', "data telah terUpdate");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        //untuk mnggunakan softdelete arus migrate colums atau tmbahkan colums 

        return redirect()->back()->with('success', 'Post telah di hapus');
    }

    public function tampil_hapus()
    {
        $post= Posts::onlyTrashed()->paginate(10);
        return view('admin.post.hapus', compact('post'));
    }
   
    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id);
        $post->restore();

        return redirect()->back()->with('success', 'Post telah di Restore(cek pada list post)');
    }

    public function delete_trash($id)
    {
        $post= Posts::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'trash telah dihapus');
    }
}
