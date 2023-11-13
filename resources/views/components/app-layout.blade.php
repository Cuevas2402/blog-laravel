<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
      @vite('resources/css/app.css')
      <title>Document</title>
  </head>
  <body>
      <div class="container mx-auto py-10" >
        
        <h1 class="text-3xl font-bold "> My Personal Blog </h1>


        {{ $slot }}

        

      </div>



  </body>
</html>