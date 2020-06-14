<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atmin</title>        
    <style></style>         
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">                
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">ATMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/simple-form">Simple form</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/ajax-form">Ajax form</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/settings-form">Settings form</a>
                </li>
                
                <li class="nav-item active">
                    <a class="nav-link" href="/table">Table</a>
                </li>          
                <li class="nav-item active">
                    <a class="nav-link" href="/crud-table">CRUD table</a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="/tree">Tree</a>
                </li>  
                <li class="nav-item active">
                    <a class="nav-link" href="/crud-tree">CRUD tree</a>
                </li>                  
            </ul>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>    

</body>
</html>
