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

                                <h1>Designations</h1>

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
                                    <div class="table-responsive project-list">
                                      <table class="table table-striped table-sm" id="dtExample" class="display">
                                        <thead>
                                          <tr>
                                            <th width="5%">#Sl.</th>
                                            <th width="10%">Designation</th>
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
function editRow(id){
    
}
window.onload = function() {
  $.ajax({
    type: "GET",
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
    url: '/get-designation',
    data: { "_token": "{{ csrf_token() }}",},
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

            var editButton = '<a href="/edit-designation/'+ data.pk_int_designation_id  +'"class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit!"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

            tableBodyidle.append('<tr><td>'+ newkeys + '</td><td>' +data.designation+ '</td><td>' +newstatus+ '</td><td>' +editButton+ '</td></tr>');
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