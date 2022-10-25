<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="/css/app.css" rel="stylesheet">
  <title>Company | Technology inspires</title>
</head>

<body>

  {{-- upscreen arrow --}}
  @include('partials._upscreen')
  

  {{-- navbar --}}
  <x-navbar />
  
  <main class='container'>
    {{$slot}}
  </main>

  {{-- footer --}}
  @include('partials._footer')

  <x-flash-message />
</body>

</html>