@extends('template_backend.home');
@section('sub-judul', "Edit Category");
@section('content')

@if (count($errors) > 0 )
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
    @endforeach
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif
{{--  guna untuk mengirim id sesuai uri di route  --}}
<form action="{{route('category.update', $category->id)}}" method="post">
    @csrf
    {{--  ini berguna jika kita update untuk mengamankan sama dengan put boleh guaakn patch aatu put lebih jelas tekan ctrl+u  --}}
    @method('patch');
    <div class="card-body col-sm-6">
        <div class="form-group">
        <label>Default Input Text</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan Kategori</button>
        </div>
    </div>
</form>
@endsection