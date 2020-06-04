@extends('template_backend.home');
@section('sub-judul', "User");
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">{{Session('success')}}</div>
    @endif

    <a href="{{route('user.create')}}" class="btn btn-primary mb-2 btn-large">Tambah User</a>
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama user</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no =1?>
            <tbody>
                @foreach ($user as $result => $hasil)
                <tr>
                    {{--  membuat penomoran  --}}
                    {{--$user->firstitem(). 'xxx  ' . $result --}}
                    
                    <td>{{$result + $user->firstitem()}}</td>
                    <td>{{$hasil->name}}</td>
                    <td>{{$hasil->email}}</td>
                    <td>{{ $hasil->tipe ==0 ? 'penulis' : 'admin' }}</td>
                    <td>
                        {{--  pada php route:list kita perlu mengrim email dengan cara seperti ini  --}}
                       <form action="{{route('user.destroy', $hasil->id)}}" method="post">
                        <a href="{{route('user.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a> 
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$user->links()}}

@endsection