<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Simaksi | {{ $title }}</title>

  <style>
    .card {
      background: rgba(255, 164, 249, 0.3);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10.2px);
      -webkit-backdrop-filter: blur(10.2px);
      border: 1px solid rgba(255, 164, 249, 0.3);

    }
  </style>
</head>
<body>
  
@include('partials.navbar')

@include('partials.carousel')

<div class="wrapper mx-5 mt-n1">
  <div class="col-md-12">
    <div class="card">
      <div class="total-pendaki text-center mt-4">
        <h1 class="display-1 fw-bolder">{{ \App\Models\Pendaki::count() }}</h1>
        <p>Jumlah Pendaki</p>
      </div>
      <div class="divider"></div>
    
      <section>
        @livewire('contents')
      </section>

    </div>
    
  </div>
  
</div>

@include('partials.footer')

</body>
</html>
