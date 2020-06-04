@extends('template_backend.home');
{{--  memberi judul liat pada home dan cari @yield('sub-judul')  --}}
@section('sub-judul', 'Post');
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif
    <a href="{{route('post.create')}}" class="btn btn-primary mb-2 btn-large">Tambah Post</a>
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Post</th>
                    <th>Kategori</th>
                    <th>Admin</th>
                    <th>Tags</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no =1?>
            <tbody>
                @foreach ($post as $result => $hasil)
                <tr>
                    {{--  membuat penomoran  --}}
                    {{--$post->firstitem(). 'xxx  ' . $result --}}
                    
                    <td>{{$result + $post->firstitem()}}</td>
                    <td>{{$hasil->judul}}</td>
                    <td>{{$hasil->category->name}}</td>
                    <td>{{$hasil->user->name}}</td>
                    <td>
                        @foreach ($hasil->tags as $tag)
                            <ul>
                                <li><span class="badge badge-info ">{{$tag->name}}</span></li>
                            </ul>
                        @endforeach
                    </td>
                    <td><img src="{{$hasil->gambar}}" class="img-fluid" alt="no image" style="width: 100px; height: 70px;"></td>
                    <td>
                        {{--  pada php route:list kita perlu mengrim email dengan cara seperti ini  --}}
                       <form action="{{route('post.destroy', $hasil->id)}}" method="post">
                        <a href="{{route('post.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a> 
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$post->links()}}
@endsection