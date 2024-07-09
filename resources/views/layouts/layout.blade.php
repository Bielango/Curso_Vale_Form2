<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href={{asset("css/app.css")}}>

    <title>título</title>
</head>
<body>
    <div class="row">
        <div class="container">
        <h1>Laravel:Formulários e Validações</h1>
        @if(Session::has("message"))
        <div class="alert alert-success alert-dismissable">
            {{Session::get("message")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @yield("content")
        </div>
    </div>

<script type="text/javascript" src={{asset("js/app.js")}}></script>

</body>
</html>
