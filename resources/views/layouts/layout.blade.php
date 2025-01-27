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

        <div class="container">
        <h1>Laravel:Formulários e Validações</h1>
        @if(Session::has("message"))
            <div id="alert" class="alert alert-success alert-dismissable">
                {{Session::get("message")}}
                <button type="button" id="btn-close" class="close btn btn-success" onclick="closeBtn()" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif
        @yield("content")
        </div>


<script type="text/javascript" src={{asset("js/app.js")}}></script>
<script>
    // document.getElementById("btn-close").onclick = function() {
    //     document.getElementById("alert").style.display = "none";
    // }
    function closeBtn() {
        document.getElementById("alert").style.display = "none";
    }
    document.addEventListener("DOMContentLoaded", function() {
    var parents = document.querySelectorAll(".form-group");
    parents.forEach(function(parent){
        if (parent.querySelector(".help-block")){
            parent.querySelector(".form-control").classList.add("is-invalid")
        }
        });
    })
</script>
</body>
</html>
