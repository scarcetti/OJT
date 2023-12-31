@extends('layouts.app')
@section('content')
<div>
    <div class="card p-3">
        <h3>Cateogries</h3>
    </div>
    
    <div class="card p-3">
        <div class="card justify-content-center" style="width: 100%">
            <div class="card-body justify-content-center">
                <a href="{{route('addCategory') }}" class="btn btn-success">Add Category</a>
            </div>
        </div>
        
        <table class="table table-striped">
            <thead id="mainBG" style="color: black">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Active</th>
                    <th scope="col">Created At</th>                
                    <th scope="col" colspan="2"><center>Actions</center></th>                
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td scope="row">{{ $category->id }}</td>
                    <td scope="row">{{ $category->main_course }}</td>
                    <td scope="row">{{ $category->isActive }}</td>
                    <td scope="row">{{ Carbon\Carbon::parse($category->created_at)->format('F d, Y g:i A') }}</td>
                    <td scope="row" style="width: 4%">
                        <form action="{{ route('editCategory', ['id' => $category->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                    </td>
                    <td scope="row" style="width: 4%">
                        <form method="POST" action="{{ route('deleteCategory',['id' => $category->id]) }}"  style="display: inline">
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
</div>
@endsection