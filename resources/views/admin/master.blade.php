<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.page.head')
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
@include('admin.page.navbar')
    <!-- Main content -->
    <section class="content">
      @if ($errors->any())
        <div class="alert bg-danger color-palette">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
          </div>
      @endif
      
      @if(Session::get('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ Session::get('success') }}  
      </div>
      @endif
      <!-- Default box -->
      @yield('content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.page.footer')
</body>
@stack('js')
</html>