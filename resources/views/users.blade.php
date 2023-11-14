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

                                <h1>Users</h1>

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
                        <div class="col-lg-12 mx-auto">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Designation</label>
                                                <select class="form-control" name="designation" id="designationSelect" required>
                                                    <option value="">Select</option>
                                                </select>   
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                                <select class="form-control" name="status" id="statusSelect" >
                                                    <option value="">Select</option>
                                                    <option value="1" >Active</option>
                                                    <option value="0">Inactive</option>                        
                                                </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" onclick="SearchUser()">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive project-list">
                                      <table class="table table-striped table-sm" id="dtExample" class="display">
                                        <thead>
                                          <tr>
                                            <th width="5%">#Sl.</th>
                                            <th width="10%">Name</th>
                                            <th width="10%">Designation</th>
                                            <th width="10%">Email</th>
                                            <th width="10%">Contact Number</th>
                                            <th width="10%">Contact Number1</th>
                                            <th width="10%">Address</th>
                                            <th width="15%">Status</th>   
                                            <th width="15%">Action</th>              
                                          </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                      </table>
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

function SearchUser(){
    $designation= $("#designationSelect").val();
    $status= $("#statusSelect").val();
    $('#statusSelect').on('change', function () {
      $status= $("#statusSelect").val();
    });
    $('#designationSelect').on('change', function () {
      $designation= $("#designationSelect").val();
    });
    $.ajax({
          type: "POST",
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
          url: '/search-user',
          data: { "_token": "{{ csrf_token() }}",
            designation: $designation,
            status: $status,
          },
          success: function(aData) {
            if(aData.success == 1){
              if(aData.data){
                  let Alldata = aData.data;
                  var tableBodyidle = $('#dtExample tbody');
                  tableBodyidle.empty();
                  $.each(aData.data, function (key1, data) {
                    var newkeys = key1 + 1;
                    var status = data.status;

                    if (status == 1) {
                        var newstatus = 'Active'
                    }
                    else{
                        var newstatus = 'Inactive'
                    }
                    var editButton = '<a href="/edit-user-dtls/'+ data.pk_int_user_dtls_id +'"class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit!"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'
                    
                    tableBodyidle.append('<tr><td>'+ newkeys + '</td><td>' +data.Name+ '</td><td>' +data.designation.designation+ '</td><td>' +data.email+ '</td><td>'+ data.contact_number + '</td><td>' +data.contact_number1+ '</td><td>' +data.address+ '</td><td>' +newstatus+ '</td><td>' +editButton+ '</td></tr>');
                  });
                            
                }
                if(aData.designations){
                    $('#designationSelect').find('option').remove().end();

                    $.each(aData.designations, function (i, item) {
                        $('#designationSelect').append($('<option>', {
                            value: item.pk_int_designation_id,
                            text: item.designation
                        }));
                    });
                }
            }
          },
            
        });
    
}

window.onload = function() {
  $.ajax({
    type: "GET",
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
    url: '/get-users',
    data: { "_token": "{{ csrf_token() }}",},
    success: function(aData) {
      if(aData.success == 1){
        if(aData.data){
          let Alldata = aData.data;
          var tableBodyidle = $('#dtExample tbody');
          tableBodyidle.empty();
          $.each(aData.data, function (key1, data) {
            var newkeys = key1 + 1;
            var status = data.user_status;

            if (status == 1) {
                var newstatus = 'Active'
            }
            else{
                var newstatus = 'Inactive'
            }

            var editButton = '<a href="/edit-user-dtls/'+ data.pk_int_user_dtls_id +'"class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit!"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

            tableBodyidle.append('<tr><td>'+ newkeys + '</td><td>' +data.Name+ '</td><td>' +data.designation.designation+ '</td><td>' +data.email+ '</td><td>'+ data.contact_number + '</td><td>' +data.contact_number1+ '</td><td>' +data.address+ '</td><td>' +newstatus+ '</td><td>' +editButton+ '</td></tr>');
          });
                    
        }
        if(aData.designations){
            $('#designationSelect').find('option').remove().end();
            $('#designationSelect').append($('<option>', {
                  value: '',
                  text: 'Select',
              }));
            $.each(aData.designations, function (i, item) {
                $('#designationSelect').append($('<option>', {
                    value: item.pk_int_designation_id,
                    text: item.designation
                }));
            });
        }
        
      }
    },

  });
};
 $(document).ready( function () {
    $('#dtExample').DataTable();
} )
</script>