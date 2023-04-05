@extends('template')
@section('content')
    <form onsubmit="createCategory(event)">
        <div class="alert alert-danger err" role="alert" id="alert-createcategory">

        </div>
        <div class="mb-3">
            <label for="categoryname" class="form-label">Categoryname</label>
            <input type="text" class="form-control" id="categoryname" name="categoryname" />
        </div>


        <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection

@push('scripts')
    <script>
      $("#alert-createcategory").hide();
        isLogin()
    </script>
@endpush
