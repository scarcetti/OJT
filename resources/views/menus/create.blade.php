@extends('layouts.app')
@section('content')
    <div class="container-fluid d-flex align-items-center">
        <h2 class="text-primary">Add New Menu</h2>
    </div>

    <div class="w-md-50 p-md-3 m-auto">
        <form action="{{ isset($menu) ? route('updateMenu', ['id' => $menu->id]) : route('createMenu') }}" method="post">
            @csrf
            @if (isset($menu))
                @method('post')
            @endif
            <h4>Create Menu</h4>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" value="{{ isset($menu) ? $menu->name : '' }}" placeholder="" required>
                        <label>Menu Name<span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="price" value="{{ isset($menu) ? $menu->price : '' }}" placeholder="" required>
                        <label>Price<span class="text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="desc" value="{{ isset($menu) ? $menu->desc : '' }}" placeholder="" required>
                        <label>Description<span class="text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <select class="form-control" name="categoryID" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (isset($menu) && $menu['category']['id'] === $category->id)
                                            selected
                                        @endif
                                    >
                                        {{ $category->main_course }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label>Category<span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <select class="form-control" name="isActive" required>
                                <option value="Yes" {{ (isset($menu) && $menu->isActive == 'Yes') ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ (isset($menu) && $menu->isActive == 'No') ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <label>Is Active<span class="text-danger">*</span></label>
                    </div>
                </div>
            </div>
            
            <div class="row mx-0 my-3 d-flex flex-row-reverse">
                <button class="btn btn-success w-auto ms-auto" type="submit">{{ isset($menu) ? 'Update' : 'Add' }} Menu</button>
                {{-- <button class="btn btn-success w-auto ms-auto" type="submit">Add Menu</button> --}}
            </div>
        </form>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
