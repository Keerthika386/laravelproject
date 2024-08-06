  @include('header')

<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employess Details</h1>
          </div>
         
        </div>
         <a class="btn btn-primary btn-sm" href="{{ url('/addemployee') }}">
                              <i class="fas fa-folder">
                              </i>
                              Add New Employee
                          </a>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div> -->
             

            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Email ID</th>
                    <th>Date Of Birth</th>
                    <th>Qualification</th>
                    <th>Experience</th>
                    <th>CTC</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @forelse($employee_details as $data)
                     <tr>
                      <td>{{ $i}}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->dob }}</td>
                      <td>{{ $data->qualification }}</td>
                      <td>{{ $data->experience }}</td>
                      <td>{{ $data->ctc }}</td>

                      <td class="project-actions text-right">
                           
                          <a class="btn btn-info btn-sm" href="{{ url('/employee-edit'.'/'.Crypt::encrypt($data->id)) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ url('/employeedelete'.'/'.Crypt::encrypt($data->id)) }}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </td>
                    </tr>
                    <?php $i++;?>
                    @empty
                    <tr>No Records found</tr>
                    @endforelse
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @include('footer')

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
</script>

