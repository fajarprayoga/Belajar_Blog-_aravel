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
<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
      
    @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label>Type</label>
            <select name="tipe" id="" class="form-control">
                <option value="">Pilih Tipe User</option>
                <option value="0">Penulis</option>
                <option value="1">Admin</option>
            </select>
        </div>
        {{--  <div class="form-group">
            <label>Picture</label>
            <input type="file" class="form-control" name="gambar">
        </div>  --}}
        <div class="form-group">
            <button class="btn btn-primary">Simpan User</button>
        </div>
    </div>
</form>
@endsection