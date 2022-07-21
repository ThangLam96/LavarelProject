<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> {{ app()->version() }}
    </div>
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">ThangLam.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" {{asset ('assets/theme/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src=" {{asset ('assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src=" {{asset ('assets/theme/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src=" {{asset ('assets/theme/js/demo.js') }}"></script>