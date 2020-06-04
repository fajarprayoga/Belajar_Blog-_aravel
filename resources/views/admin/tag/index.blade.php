@extends('template_backend.home');
{{--  memberi judul liat pada home dan cari @yield('sub-judul')  --}}
@section('sub-judul', 'Tags');
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif
    <a href="{{route('tag.create')}}" class="btn btn-primary mb-2 btn-large">Tambah Tags</a>
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no =1?>
            <tbody>
                @foreach ($tag as $result => $hasil)
                <tr>
                    {{--  membuat penomoran  --}}
                    {{--$tag->firstitem(). 'xxx  ' . $result --}}
                    
                    <td>{{$result + $tag->firstitem()}}</td>
                    <td>{{$hasil->name}}</td>
                    <td>
                        {{--  pada php route:list kita perlu mengrim email dengan cara seperti ini  --}}
                       <form action="{{route('tag.destroy', $hasil->id)}}" method="post">
                        <a href="{{route('tag.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a> 
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$tag->links()}}
@endsection