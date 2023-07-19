@extends('layouts.app')
@section('content')
    <div class="container-fluid d-flex align-items-center">
        <h2 class="text-primary">Add New Category</h2>
    </div>

    <div class="w-md-50 p-md-3 m-auto">
        <form action="{{ route('createCategory') }}" method="get">
            <h4>Create Category</h4>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="main_course" placeholder="" required>
                        <label>Main Course<span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <select class="form-control" name="isActive" required>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <label>Is Active<span class="text-danger">*</span></label>
                    </div>
                </div>
            </div>
    </div>
    <div class="row mx-0 my-3 d-flex flex-row-reverse">
        <button class="btn btn-success w-auto ms-auto" type="submit">Register Category</button>
    </div>
    </form>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
<script>
    /*  function createBranch(){ */
    /*  axios.post(`branches/create`).then(response => {
         const angTubag = response
         console.log(response)
     }); */
    /*     console.log('TEST')
    } */
</script>
