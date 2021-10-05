<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>
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
                    <h2 class="mt-5">Edit User Information</h2>
                    <p>Edit and submit to update user information</p>
                    <form action="{{ route('users.update2',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Username</label>
                            <input disabled type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" value="{{ $user->password }}" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input disabled type="text" name="fullname" value="{{ $user->fullname }}" class="form-control" placeholder="Fullname">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Phonenumber</label>
                            <input type="text" name="phonenumber" value="{{ $user->phonenumber }}" class="form-control" placeholder="Phonenumber">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="role" value="{{ $user->role }}" class="form-control" placeholder="Role">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('users.index2')}}" class="btn btn-secondary ml-2">Back</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>