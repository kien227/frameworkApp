<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Add user</h2>
                    <p>Please fill this form and submit to add user to the database.</p>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Phonenum</label>
                            <input type="text" name="phonenumber" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" name="role" required="">
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="{{route('users.index1')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
