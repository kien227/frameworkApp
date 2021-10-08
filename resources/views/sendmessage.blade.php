<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Send Message Page</title>
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
                    <h2 class="mt-5">Send Message</h2>
                    <p>Submit your message content to send message</p>
                    <form action="{{route('messages.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                            <label>Sender</label>
                            <input disabled type="text" name="sender" value="{{ Auth::user()->username }}" class="form-control" placeholder="sender">
                        </div>
                        <div class="form-group">
                            <label>Receiver username</label>
                            <input type="text" name="receiver" class="form-control" placeholder="receiver">
                        </div>
                        <div class="form-group">
                            <label>Message Content</label>
                            <textarea class="form-control" style="height:150px" name="content" placeholder="content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="" class="btn btn-secondary ml-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>