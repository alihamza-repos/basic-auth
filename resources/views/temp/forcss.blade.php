<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>TailWind CSS</title>
</head>
<body>
    <div class=" bg-blue-500 py-4 px-10">
        <nav class=" text-white flex justify-between">
            <div class="logo">
                <a href="#" class="w-100">
                    <img class="w-20 animate-ping" src="public/storage/images/logo.png" alt="Logo">

                </a>
            </div>
            <ul class="flex justify-end space-x-10 font-semibold">
                <li class=" cursor-pointer"><a href="#">Home</a></li>
                <li class=" cursor-pointer"><a href="#">About</a></li>
                <li class=" cursor-pointer"><a href="#">Services</a></li>
                <li class=" cursor-pointer"><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="grid md:flex max-w-full">
        <div class="mx-auto px-4 py-20">
            <h1 class="text-4xl font-bold mb-8">Welcome to our Website</h1>
            <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus, turpis non consectetur feugiat, lectus arcu dignissim risus, a eleifend velit velit at ipsum. Nulla facilisi. Sed et felis vel ligula consectetur laoreet.</p>
            <div class="grid grid-cols-2 sm:flex items-center">
            <button class=" hover:bg-green-500 p-3 rounded-md font-black bg-clip-text text-transparent bg-gradient-to-br from-purple-700 to-rose-700 text-5xl">Call Now</button>
            <a href="#" class=" bg-blue-300 hover:bg-blue-500 p-3 rounded-md">Anchor button</a>
            </div>
            <div class="flex space-x-3 pt-5 pl-5">
                <div><a class="btn btn-primary" href="">Learn More</a></div>
                <div><a class="btn btn-secondary text-white" href="">Contact Us</a></div>
            </div>
        </div>
        <div>
            <img src="public/storage/images/image.jpg" alt="">
        </div>
    </div>
    <div class="flex flex-wrap justify-between  bg-primary py-12 px-10 gap-4">
        <div class="rounded-lg w-full sm:w-auto bg-white p-5">some text</div>
        <div class="rounded-lg w-full sm:w-auto bg-white p-5">some text</div>
        <div class="rounded-lg w-full sm:w-auto bg-white p-5">some text</div>
        <div class="rounded-lg w-full sm:w-auto bg-white p-5">some text</div>
    </div>
</body> md:w-auto
</html>
