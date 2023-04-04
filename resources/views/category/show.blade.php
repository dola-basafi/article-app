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
@endsection



@push('scripts')
    <script >
      showCategory()
      isLogin()
    </script>
@endpush
