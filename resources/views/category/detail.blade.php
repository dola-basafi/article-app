@extends('template')
@section('content')
    <div id="detail-category">
      
    </div>
@endsection

@push('scripts')
    <script >      
      isLogin()
      detailCategory({{$id}})
    </script>
@endpush