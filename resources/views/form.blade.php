<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atmin</title>        
        <style></style>            
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">                
    </head>
    <body>
        
                
        <div id="app">
            <div class="container">
                <atmin-form :fields="fields" :values="values"></atmin-form>
            </div>    
        </div>
        
           
        
    </body>
</html>
