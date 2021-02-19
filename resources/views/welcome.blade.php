<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="w-full h-screen flex">
        <img src="https://images.unsplash.com/photo-1540569876033-6e5d046a1d77?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="background" class="object-cover object-center h-screen w-7/12">
        <div class="bg-white flex flex-col justify-center items-center w-5/12 shadow-lg">
          <h1 class="text-3xl font-bold text-yellow-500 mb-2">LOGIN</h1>
          <div class="w-1/2 text-center">
            <form method="POST" action="/login">
                @csrf
                <input type="text" name="email" placeholder="email" autocomplete="off"
                    class="shadow-md border w-full h-10 px-3 py-2 text-orange-500 focus:outline-none focus:border-orange-500 mb-3 rounded">
                    @error('email')    
                    <div class="text-sm text-red-700">{{$message}}</div>
                    @enderror  
                <input type="password" name="password" placeholder="password" autocomplete="off"
                    class="shadow-md border w-full h-10 px-3 py-2 text-orange-500 focus:outline-none focus:border-orange-500 mb-3 rounded">
                    @error('password')    
                    <div class="text-sm text-red-700">{{$message}}</div>
                    @enderror      
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-lg focus:outline-none shadow">Sign In</button>
            </form>
        </div>
        </div>
      </div>
   </body>
</html>
