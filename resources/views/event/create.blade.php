<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <h1>Events</h1>
        <form action="{{route('event.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <lable>Title</lable>
                    <input type="text" name="title" value="">

</div>
<div class="col-md-6">
     <lable>Date</lable>
                    <input type="date" name="date" value="">
                    
</div>
<div class="col-md-6">
     <lable>Venue</lable>
                    <input type="text" name="venue" value="">
                    
</div>

<div class="col-md-6">
     <lable>Price</lable>
                    <input type="number" name="price" value="">
                    
</div>

<div class="col-md-12">
                    <button type="submit">CREATE</button>
                    
</div>

</div>
        </form>

        

    </body>
</html>
