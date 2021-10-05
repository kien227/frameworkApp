<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-info sticky-top bg-dark flex-md-nowrap p-10">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="" style="color: #ffffff;"><b>Home</b></a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('signout') }}"> Log out</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="height: 100vh">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column" style="color: #ffffff;">

                        <h6>Manage</h6>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.index1')}}">
                                <span data-feather="users"></span>
                                Users
                            </a>
                        </li>

                        <h6>Game</h6>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span data-feather="users"></span>
                                Quiz
                            </a>
                        </li>

                        <h6>Assignments</h6>
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php">
                                <span data-feather="users"></span>
                                View
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="table-responsive">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="mb-3 clearfix col-12" style="margin: 0 -15px;">
                                <h2 class="pull-left">Assignment Info</h2>
                                <div style="display: flex;justify-content: space-between;">
                                    <div>
                                        <a class="btn btn-success" href="{{ route('files.create') }}">ADD</a>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                            <div style="display: flex; justify-content: space-between;" class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif


                            <table class="table table-bordered">

                                <tr>
                                    <th>No</th>
                                    <th>Filename</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($files as $file)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $file->name }}</td>
                                    <td>
                                        <form action="{{ route('files.destroy',$file->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('files.edit',$file->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {

            var form = $(this).closest("form");

            var name = $(this).data("name");

            event.preventDefault();

            swal({

                    title: `Are you sure you want to delete this record?`,

                    text: "If you delete this, it will be gone forever.",

                    icon: "warning",

                    buttons: true,

                    dangerMode: true,

                })

                .then((willDelete) => {

                    if (willDelete) {

                        form.submit();

                    }

                });

        });
    </script>

</html>