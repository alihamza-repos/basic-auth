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
    <form action="{{route('create')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter Name">
        <input type="email" name="email" placeholder="Enter Email">
        <input type="submit" value="Submit">
    </form>

    {{-- <ul>
        @foreach ($hellotemp as $item)
            <li><b>Name:</b> {{ $item->name }} <b>Email:</b> {{$item->email}}</li>
        @endforeach
    </ul> --}}

</body>
</html>
