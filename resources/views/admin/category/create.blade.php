@extends('template_backend.home');
@section('sub-judul', "Tambah Category");
@section('content')

@if (count($errors) > 0 )
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
    @endforeach
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif
<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="card-body col-sm-6">
        <div class="form-group">
        <label>Default Input Text</label>
        <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan Kategori</button>
        </div>
    </div>
</form>
@endsection