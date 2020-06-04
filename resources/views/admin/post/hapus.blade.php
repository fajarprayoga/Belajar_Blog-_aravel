@extends('template_backend.home');
{{--  memberi judul liat pada home dan cari @yield('sub-judul')  --}}
@section('sub-judul', 'Trash Post');
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif
    
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Post</th>
                    <th>Kategori</th>
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
                    <td>
                        @foreach ($hasil->tags as $tag)
                            <ul>
                                <li>{{$tag->name}}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td><img src="../{{$hasil->gambar}}" class="img-fluid" alt="no image" style="width: 100px; height: 70px;"></td>
                    <td>
                        {{--  pada php route:list kita perlu mengrim email dengan cara seperti ini  --}}
                       <form action="{{route('post.delete_trash', $hasil->id)}}" method="post">
                        <a href="{{route('post.restore', $hasil->id)}}" class="btn btn-info btn-sm">Restore</a> 
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