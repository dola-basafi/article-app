@extends('template')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="category-data">
                 
  </tbody>
</table>
<a href="{{route('categorycreate')}}">
  <button class="btn btn-primary" onclick="">Add Category</button>
</a>
@endsection



@push('scripts')
    <script >
      showCategory()
      isLogin()
    </script>
@endpush
