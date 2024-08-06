  @include('header')


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Employee</h3>

              <!-- div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div> -->
            </div>
            <form action="{{ url('/employeestore') }}" method="post" id="employeeForm" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Employee Name</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>

              <div class="form-group">
                <label for="inputProjectLeader">Email ID</label>
                <input type="text" id="inputEmail" class="form-control" name="email">
              </div>

              <div class="form-group">
                <label for="inputDescription">Date Of Birth</label>
                <input type="date" id="inputDOB" class="form-control" name="dob">
              </div>
              
              <div class="form-group">
                <label for="inputClientCompany">Qualification</label>
                <input type="text" id="inputQualification" class="form-control" name="qualification">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Experience</label>
                <input type="text" id="inputExperience" class="form-control" name="experience">
              </div>

              <div class="form-group">
                <label for="inputProjectLeader">CTC</label>
                <input type="text" id="inputCTC" class="form-control" name="ctc">
              </div>

              <div class="form-group">
                <label for="inputProjectLeader">Experience certificate</label>
                <input type="file" id="inputExperienceCertiicate" class="form-control" name="experience_certificate">
              </div>

              <div class="form-group">
                <label for="inputProjectLeader">Educational qualification</label>
                <input type="file" id="inputEducationQualification" class="form-control" name="education_qualification">
              </div>

              <div class="col-6">
                <!-- <a href="#" class="btn btn-secondary">Cancel</a> -->
                <input type="submit" value="Create new Employee" class="btn btn-success float-right">
              </div>
            </div>

            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      
    </section>
    <!-- /.content -->
  </div>
   @include('footer')

   <!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

 <script>
    $(document).ready(function() {
        $("#employeeForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                dob: {
                    required: true,
                    date: true
                },
                qualification: {
                    required: true
                },
                experience: {
                    required: true,
                    number: true
                },
                ctc: {
                    required: true,
                    number: true
                },
                experience_certificate: {
                    required: true,
                    extension: "pdf|doc|docx"
                },
                education_qualification: {
                    required: true,
                    extension: "pdf|doc|docx"
                }
            },
            messages: {
                name: {
                    required: "Please enter the employee's name",
                    minlength: "Name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter the employee's email",
                    email: "Please enter a valid email address"
                },
                dob: {
                    required: "Please enter the employee's date of birth",
                    date: "Please enter a valid date"
                },
                qualification: {
                    required: "Please enter the employee's qualification"
                },
                experience: {
                    required: "Please enter the employee's experience",
                    number: "Experience must be a number"
                },
                ctc: {
                    required: "Please enter the employee's CTC",
                    number: "CTC must be a number"
                },
                experience_certificate: {
                    required: "Please upload the experience certificate",
                    extension: "Only PDF, DOC, or DOCX files are allowed"
                },
                education_qualification: {
                    required: "Please upload the educational qualification certificate",
                    extension: "Only PDF, DOC, or DOCX files are allowed"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });

        $("#employeeForm").on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            if ($("#employeeForm").valid()) {
                this.submit(); // If the form is valid, submit it
            } else {
                //alert("Please fix all errors before submitting.");
            }
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