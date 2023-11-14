<html class="no-js" lang="en">

@include('head')

<body>

@include('header')
<div class="content-wrap">

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">

                        <div class="page-header">

                            <div class="page-title">

                                <h1>Create Designations</h1>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 p-l-0 title-margin-left">

                        <div class="page-header">

                            <div class="page-title">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>

                                    <li class="breadcrumb-item active">Create Designations</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- /# row -->

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="basic-form">
                                        @if(empty($data))

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Designation Name</label>

                                                    <input type="text" class="form-control" name="designation_name" id="designation_name" required>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Status</label>

                                                    <select class="form-control" name="status" id="statusSelect" required>
                                                      <option value="1" >Active</option>
                                                      <option value="0">Inactive</option>                        
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" onclick="SaveDesignation()">Save</button>
                                        <input class="btn btn-default" type="button" value="CANCEL" onclick="history.back()">

                                        @else    
                                            <input type="hidden" name="designation_id" id="designation_id" value="{{$data->pk_int_designation_id}}" >

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Designation Name</label>

                                                        <input type="text" class="form-control" name="designation_name" id="designation_name" value="{{$data->designation}}">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status" id="statusSelect">
                                                        <option>Select</option>
                                                        <option value="1" {{ $data->status = 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ $data->status = 0 ? 'selected' : '' }}>Inactive</option>                       
                                                    </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" onclick="SaveDesignation()">Update</button>
                                            <input class="btn btn-default" type="button" value="CANCEL" onclick="history.back()">

                                        @endif

                                            

                                    </div>



                                </div>



                            </div>



                        </div>
                      
                    </div>
                     
                </section>

            </div>

        </div>

    </div>

   </body>
   </html> 
@include('footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
function SaveDesignation(){
    $designation_id = $("#designation_id").val();
    $designation= $("#designation_name").val();
    $status= $("#statusSelect").val();
    $('#statusSelect').on('change', function () {
      $status= $("#statusSelect").val();
    });
    if (!$designation) {
      Swal.fire({

          title: "Designation name is Empty",

          text: "Please Update !",

          icon: "info",

      });
    }
    
    else{
        $.ajax({
          type: "POST",
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
          url: '/save-designations',
          data: { "_token": "{{ csrf_token() }}",
            designation_id: $designation_id,
            designation: $designation,
            status: $status,
          },
          success: function(aData) {
            if(aData.success == 1){
              Swal.fire({
                icon: 'success',
                title: aData.message,
                showConfirmButton: false,
                timer: 2500
              })
              setTimeout(function () {
                window.location.href = "{{route('designation-list')}}"; 
              }, 1000);
            }
          },
            
        });
    }
}
</script>