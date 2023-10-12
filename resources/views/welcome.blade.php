<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <title>Chatgpt</title>
</head>

<body>
    <div class="card w-25 m-5 p-0">
        <div class="card-header">
            <h2>Search Using Chatgpt:</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" id="question" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-dark" id="btn" onclick="search()">Search</button>
        </div>
    </div>


    <div class="form-group" id="response">
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
    <script>
        function search() {
            let question = $('#question').val()
            $('#question').val('')
            $('#btn').text('loading...')
            $.ajax({
                url: '/chat',
                method: 'post',
                data: {
                    question: question,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    $('#response').append(res)
                    $('#btn').text('Search')
                }
            })
        }
    </script>
</body>

</html>
