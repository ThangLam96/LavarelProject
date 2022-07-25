@extends('admin.master')
@section('module','Product')
@section('action','List')

@push('css')

<link rel="stylesheet" href="{{ asset('assets/theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/theme/css/styles.css') }}">
@endpush

@push('js')

<script src="{{ asset('assets/theme/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('assets/theme/dist/js/adminlte.min.js') }}?v=3.2.0"></script>

<script src="{{ asset('assets/theme/dist/js/demo.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

@endpush

@section('content')
<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Status</th>
    <th>Created</th>
    <th>User</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
  <tr>
    <td>{{ $loop->iteration }}</td>
    @php
        
        $image = !empty($product->image) ? $product->image : 'user2-160x160.jpg';
  
    @endphp
    <td><img src="{{ asset('assets/theme/img/products/'.$image) }}"></td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }} VNĐ</td>
    <td>{{ $product->category_name }}</td>
    <td>{{ $product->status == 1 ? 'Show' : 'Hide' }}</td>
    <td>{{ date('d/m/Y - H:i:s', strtotime($product->created_at)) }}</td>
    <td>{{ $product->user_fullname }}</td>
    <td><a href=" {{ route('admin.products.edit', ['id' => $product->id]) }} ">Edit</a></td>
    <td><a href=" {{ route('admin.products.destroy', ['id' => $product->id]) }} ">Delete</a></td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection