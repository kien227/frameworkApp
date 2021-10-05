<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">User Details</h2>

                    <div class="form-control">
                        <strong>Username</strong>
                        {{ $user->username }}

                    </div>
                    <div class="form-control">
                        <strong>Fullname</strong>
                        {{ $user->fullname }}

                    </div>
                    <div class="form-control">
                        <strong>Email</strong>
                        {{ $user->email }}

                    </div>
                    <div class="form-control">
                        <strong>Phonenum</strong>
                        {{ $user->phonenumber }}
                    </div>
                    <div class="form-control">
                        <strong for="get_role">Role:</strong>
                        {{ $user->role }}
                    </div>
                    <a href="{{auth()->user()->role == 'teacher' ? route('users.index1') : route('users.index2')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>