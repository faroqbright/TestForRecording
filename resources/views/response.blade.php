<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card m-3">
        <div class="card-body">
            <h3>{{ $question }}</h3>
            @if ($data)
                <pre>{{ $data }}</pre>
            @endif
        </div>
    </div>
</body>

</html>
