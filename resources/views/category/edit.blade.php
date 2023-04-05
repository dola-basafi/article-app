@extends('template')
@section('content')
    <form onsubmit="editCategory(event,{{ $id }})">
        <div class="alert alert-danger err" role="alert" id="alert-editcategory">

        </div>
        <div class="mb-3">
            <label for="categoryname" class="form-label">Categoryname</label>
            <input type="text" class="form-control" id="categoryname" name="categoryname" />
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>

    </form>
@endsection

@push('scripts')
    <script>
        editShow({{ $id }})
        isLogin()
    </script>
@endpush
