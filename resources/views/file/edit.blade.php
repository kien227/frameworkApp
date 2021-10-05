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
                    <h2 class="mt-5">Edit File Information</h2>
                    <p>Edit and submit to update file information</p>
                    <form action="{{ route('files.update',$file->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Filename</label>
                            <input type="text" name="name" value="{{ $file->name }}" class="form-control" placeholder="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('files.index')}}" class="btn btn-secondary ml-2">Back</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>