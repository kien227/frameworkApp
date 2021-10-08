<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Receive Message Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<div class="mb-3 clearfix col-12" style="margin: 0 -15px;">
    <h2 class="pull-left">Messages Info</h2>
</div>

<table class="table table-bordered">

    <tr>
        <th>From</th>
        <th>Content</th>
        <th width="180px">Time</th>
    </tr>
    @foreach ($messages as $message)
    <tr>
        <td>{{ $message->sender }}</td>
        <td>{{ $message->content }}</td>
        <td>{{ $message->created_at }}</td>
    </tr>
    @endforeach

</table>
</div>