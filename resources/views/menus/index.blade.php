@extends('layouts.app')
@section('content')
<div class="card p-3">
    <h3>Menus</h3>
</div>

<div class="card p-3">
    <div class="card justify-content-center" style="width: 100%">
        <div class="card-body justify-content-center">
            <a href="{{ route('addMenu') }}" class="btn btn-success">Add Menu</a>
        </div>
    </div>
    
    <table class="table table-striped">
        <thead id="mainBG" style="color: black">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Active</th>
                <th scope="col">Created At</th>
                <th scope="col" colspan="2"><center>Actions</center></th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ $menus }} --}}
            {{-- {{ $categories }} --}}
            @foreach($menus as $menu)
            <tr>
                <td scope="row">{{ $menu->id }}</td>
                <td scope="row">{{ $menu->name }}</td>
                <td scope="row">{{ $menu->desc }}</td>
                <td scope="row">{{ $menu->price }}</td>
                <td scope="row">{{ $menu['category']['main_course'] }}</td>
                <td scope="row">{{ $menu->isActive }}</td>
                <td scope="row">{{ Carbon\Carbon::parse($menu->created_at)->format('F d, Y g:i A') }}</td>
                 <td scope="row" style="width: 4%">
                        <form action="{{ route('editMenu', ['id' => $menu->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                    </td>
                    <td scope="row" style="width: 4%">
                        <form method="POST" action="{{ route('deleteMenu',['id' => $menu->id]) }}"  style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection