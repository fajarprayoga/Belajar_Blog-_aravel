@extends('template_backend.home');
@section('sub-judul', "Edit User");
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
<form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div>
            <label>Email User</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
        </div>
        <div class="form-group">
            <label>Tipe</label>
            <select class="form-control" name="tipe" id="">
                <option value="" holder>Pilih Type</option>
                <option value="1" @if ($user->tipe == 1)
                    selected
                @endif>Admin</option>
                <option value="0" @if ($user->tipe == 0)
                    selected
                @endif>Penulis</option>
            </select>
        </div>
        <div>
            <label>Password User</label>
            <input type="password" class="form-control" name="password" value="">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan User</button>
        </div>
    </div>
</form>
@endsection