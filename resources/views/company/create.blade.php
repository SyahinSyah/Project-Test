<!DOCTYPE html>
<html lang="es">
   <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Update Form</title>
   </head>
   <body class="w-screen h-screen flex justify-center items-center bg-gray-50">
      <div class="wrapper px-2 w-full">
         <form action="/createCompany/store" method="POST" enctype="multipart/form-data" class="max-w-sm bg-gray-100 px-3 py-5 rounded shadow-lg my-10 m-auto">
            @csrf
            <div class="flex flex-col space-y-3">
                <div class="flex items-center bg-white border border-gray-100 rounded px-2">
                  <svg
                     fill="currentColor"
                     viewBox="0 0 20 20"
                     class="h-6 text-gray-500 m-0 mr-1"
                  >
                     <path
                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                     ></path>
                     <path
                        d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                     ></path>
                  </svg>
                  <input
                     type="text"
                     placeholder="Name of Company"
                     class="w-full py-2 px-1 placeholder-indigo-400 outline-none placeholder-opacity-50"
                     autocomplete="off" id="name" name="name"
                  />
               </div>
               <div class="text-red-600">
               @error('name')     
                  {{$message}}              
               @enderror
               </div>
               <div
               class="flex items-center bg-white border border-gray-100 rounded px-2"
            >
               <svg
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  class="h-6 text-gray-500 m-0 mr-1"
               >
                  <path
                     d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                  ></path>
                  <path
                     d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                  ></path>
               </svg>
               <input
                  type="email"
                  placeholder="Email of Company"
                  class="w-full py-2 px-1 placeholder-indigo-400 outline-none placeholder-opacity-50"
                  autocomplete="off" id="email" name="email"
               />
            </div>
            <div class="text-red-600">@error('email')     
               {{$message}}              
            @enderror
            </div>
            <div class="flex items-center bg-white border border-gray-100 rounded px-2">
               <input
                  type="file"
                  class="w-full py-2 px-1 placeholder-indigo-400 outline-none placeholder-opacity-50"
                  autocomplete="off" id="logo" name="logo"
               />
            </div>
            <div class="text-red-600">
            @error('logo')     
               {{$message}}              
            @enderror
            </div>
               <button
                  type="submit"
                  class="text-white bg-indigo-500 px-4 py-2 rounded"
               >
                  Create
               </button>
                <a
                 href="/company"
                class="text-gray-800 text-center bg-gray-200 px-4 py-2 rounded"
                >
                Back
              </a>
            </div>
         </form>
      </div>
   </body>
</html>