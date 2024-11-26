<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <a href="{{route('create')}}"> Add New Entry</a>


    <ul>
        @foreach ($hellotemp as $item)
            <li><b>Name:</b> {{ $item->name }} <b>Email:</b> {{$item->email}}</li>
        @endforeach
    </ul>

</body>
</html>
