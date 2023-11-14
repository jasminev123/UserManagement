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
                                @if(empty($data))
                                <h1>Create Users</h1>
                                @else
                                <h1>Update Users</h1>
                                @endif
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 p-l-0 title-margin-left">

                        <div class="page-header">

                            <div class="page-title">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>

                                    <li class="breadcrumb-item active">Create Users</li>

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
                                                    <label>Name</label>

                                                    <input type="text" class="form-control" name="name" id="name" >

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>

                                                    <input type="email" class="form-control" name="email" id="email" >

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number</label>

                                                    <input type="text" class="form-control" name="contact_number" id="contact_number" >

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number 2</label>

                                                    <input type="text" class="form-control" name="contact_numberr" id="contact_numberr" >

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>

                                                    <textarea class="form-control" id="address" name="address" rows="4" cols="50"></textarea>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Designation</label>

                                                    <select class="form-control" name="designation" id="designationSelect" required>
                                                        <option value="" >Select</option>
                                                    @foreach($designations as $value)
                                                        <option value="{{ $value->pk_int_designation_id }}">{{$value->designation}}</option>
                                                    @endforeach
                                                    </select>

                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Status</label>

                                                    <select class="form-control" name="status" id="statusSelect" >
                                                      <option value="1" >Active</option>
                                                      <option value="0">Inactive</option>                        
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" onclick="SaveUsers()">Save</button>
                                        <input class="btn btn-default" type="button" value="CANCEL" onclick="history.back()">

                                        @else    
                                            <input type="hidden" name="user_id" id="user_id" value="{{$data->pk_int_user_dtls_id}}" >

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Designation Name</label>

                                                        <input type="text" class="form-control" name="name" id="name" value="{{$data->Name}}">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>

                                                        <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}">

                                                    </div>
                                                </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number</label>

                                                    <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{$data->contact_number}}">

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number 2</label>

                                                    <input type="text" class="form-control" name="contact_numberr" id="contact_numberr" value="{{$data->contact_number1}}">

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>

                                                    <textarea class="form-control" id="address" name="address" rows="4" cols="50">{{$data->address}}</textarea>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Designation</label>

                                                    <select class="form-control" name="designation" id="designationSelect" required>
                                                        <option value="" >Select</option>
                                                    @foreach($designations as $value)
                                                    <option value="{{ $value->pk_int_designation_id }}" {{ $data->fk_int_designation_id = "$value->pk_int_designation_id" ? 'selected' : '' }}>{{$value->designation}}</option>
                                                    @endforeach
                                                    </select>

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
                                            <button type="submit" class="btn btn-primary" onclick="SaveUsers()">Update</button>
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
function SaveUsers(){
    $user_id= $("#user_id").val();
    $name= $("#name").val();
    $email= $("#email").val();
    $contact_number= $("#contact_number").val();
    $contact_numberr= $("#contact_numberr").val();
    $address= $("#address").val();
    $status= $("#statusSelect").val();
    $designation= $("#designationSelect").val();
    $('#statusSelect').on('change', function () {
      $status= $("#statusSelect").val();
    });
    $('#designationSelect').on('change', function () {
      $designation= $("#designationSelect").val();
    });
    $.ajax({
        type: "POST",
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        url: '/save-users',
        data: { "_token": "{{ csrf_token() }}",
            designation: $designation,
            status: $status,
            user_id: $user_id,
            name: $name,
            email: $email,
            contact_number: $contact_number,
            contact_numberr: $contact_numberr,
            address: $address,
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
                window.location.href = "{{route('users-list')}}"; 
              }, 1000);
            }
          },
            
        });
    
}
</script>