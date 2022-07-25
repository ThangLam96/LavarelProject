@extends('admin.master')
@section('module','User')
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
    <th>Avatar</th>
    <th>Email</th>
    <th>Full Name</th>
    <th>Phone</th>
    <th>Level</th>
    <th>Created</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
  <tr>
    <td>{{ $loop->iteration }}</td>
    @php
        
        $avatar = !empty($user->avatar) ? $user->avatar : 'user2-160x160.jpg';
  
    @endphp
    <td><img src="{{ asset('assets/theme/img/users/'.$avatar) }}"></td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->fullname }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ $user->level == 2 ? 'Member' : 'Adminstrator' }}</td>
    <td>{{ date('d/m/Y - H:i:s', strtotime($user->created_at)) }}</td>
    <td><a href=" {{ route('admin.users.edit', ['id' => $user->id]) }} ">Edit</a></td>
    <td><a href=" {{ route('admin.users.destroy', ['id' => $user->id]) }} ">Delete</a></td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection