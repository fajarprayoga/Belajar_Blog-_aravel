@extends('template_backend.home');
@section('sub-judul', "Tambah Post");
@section('content')

@if (count($errors) > 0 )
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
    @endforeach
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif
<div class="card-body col-sm-6">
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
      
    @csrf
        <div class="form-group">
        <label>Judul Post</label>
        <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="category_id" id="">
                <option value="" holder>Pilih Kategori</option>
                @foreach ($category as $result)
                    <option value="{{$result->id}}">{{$result->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="form-control select2" multiple="" name="tags[]">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="content" class="form-control" id="" ></textarea>
            </div>
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" class="form-control" name="gambar">
            </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan Post</button>
        </div>
    </div>
</form>
@endsection