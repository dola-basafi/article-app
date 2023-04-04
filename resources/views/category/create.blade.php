@extends('template')
@section('content')
<form onsubmit="createCategory(event)">
  <div class="alert alert-danger err" role="alert" id="alert-createcategory">

  </div>
  <div class="mb-3">
      <label for="categoryname" class="form-label">Categoryname</label>
      <input type="text" class="form-control" id="categoryname" 
          name="categoryname" />
  </div> 
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
      </button>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection

@push('scripts')
    <script >      
      isLogin()
    </script>
@endpush