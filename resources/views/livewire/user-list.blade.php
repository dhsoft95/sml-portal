<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Registered Users</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                <li class="breadcrumb-item active">Registered Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
{{--                        <div class="card-header">--}}
{{--                            <h4 class="card-title">All Registered Users</h4>--}}
{{--                        </div>--}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="myDataTable" style="width:100%">
                                    <thead>
                                    <tr class="table-header">
                                        <!-- <th>ID</th> -->
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th>Gender</th>
                                        <!-- <th>Birth Date</th> -->
                                        <th>Status</th>
                                        <!-- <th>Joined At</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <!-- <td>{{ $user->id }}</td> -->
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <!-- <td>{{ $user->birth_date }}</td> -->
                                            <td>{{ $user->status }}</td>
                                            <!-- <td>{{ $user->created_at }}</td> -->
                                            <!-- Add more columns as needed -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->
