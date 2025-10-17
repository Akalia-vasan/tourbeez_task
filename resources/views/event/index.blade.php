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

        <form action="" method="GET">
            <input type="text" name="term" >
            <button>SEARCH</button>
        </form>
       <a href="{{route('event.create')}}" class="btn btn-success">ADD NEW</a>
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
<tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->date}}</td>
                    <td>{{$event->price}}</td>
                    <td><a class="btn btn-info" href="{{route('event.edit', $event->id)}}">EDIT</a>
                    <form action="{{route('event.delete', $event->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger" type="submit">DELETE</button>
</form>
            </td>
</tr>
@endforeach
            </tbody>
        </table>
        {{$events->links()}}

    </body>
</html>
