<html class="no-js" lang="en">

@include('head')

<body>

<div class="content-wrap">

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">

                        <div class="page-header">

                            <div class="page-title" style="text-align: center;">

                                <h2>Register Here!</h2>

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
                                        <form action="{{ route('save-new-users') }}" method="post" enctype="multipart/form-data">   
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label>

                                                    <input type="text" class="form-control" name="name" id="name" required>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>

                                                    <input type="email" class="form-control" name="email" id="email" required>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number</label>

                                                    <input type="text" class="form-control" name="contact_number" id="contact_number" required>

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

                                                    <select class="form-control" name="designation" id="designationSelect" >
                                                        <option value="" >Select</option>
                                                    @foreach($designations as $value)
                                                        <option value="{{ $value->pk_int_designation_id }}">{{$value->designation}}</option>
                                                    @endforeach
                                                    </select>

                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Role</label>

                                                    <select class="form-control" name="role" id="roleSelect" >
                                                      <option value="1" >Admin</option>
                                                      <option value="0">User</option>                        
                                                    </select>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <input class="ma-2 btn btn-default" type="button" value="CANCEL" onclick="history.back()">
                                        </div>
                                        </form>
                                        

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
@if(session()->has('message'))
    Swal.fire({
        icon: 'success',
        title: "You are Registered Successfully!",
        text: "Use your Email as Username and Contact number as Password",
        showCancelButton: true,
        confirmButtonText: 'Ok',
        confirmButtonColor: 'green',
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
    })
    .then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/";
        }
    });
    
@endif

</script>