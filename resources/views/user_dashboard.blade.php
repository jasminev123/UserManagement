<html class="no-js" lang="en">

@include('head')

<body>

@include('user-header')
<div class="content-wrap">

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">

                        <div class="page-header">

                            <div class="page-title">

                                <h1>Hello, <span>Welcome {{$user->name}}</span></h1>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                    <div class="col-lg-4 p-l-0 title-margin-left">

                        <div class="page-header">

                            <div class="page-title">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                                    <li class="breadcrumb-item active">Home</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                </div>

                <!-- /# row -->

                <section id="main-content">
                 
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-briefcase color-warning" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Designations</div>
                                        <div class="stat-digit">{{$DesiCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-users color-primary" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Users</div>
                                        <div class="stat-digit">{{$userCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-user-circle-o color-success" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Users</div>
                                        <div class="stat-digit">{{$activeUserCount }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-user-times color-danger" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Inactive Users</div>
                                        <div class="stat-digit">{{$inactiveUserCount }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                        <!-- /# column -->
                       
                   
                </section>

            </div>

        </div>

    </div>

   </body>
   </html> 
 @include('footer')