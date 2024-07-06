<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Simaksi | {{ $title }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <style>
      body {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
      }

      .form-signin {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 40px 30px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        width: 100%;
        max-width: 400px;
      }

      .form-signin h1 {
        color: #fff;
        margin-bottom: 20px;
      }

      .form-floating {
        margin-bottom: 15px;
      }

      .form-floating label {
        color: black;
      }

      .form-floating input {
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
      }

      .form-floating input:focus {
        background: rgba(255, 255, 255, 0.7);
        color: #000;
      }

      .btn-primary {
        background-color: #ffffffb3; /* Slightly more opaque white */
        border: none;
        color: #4a68fc; /* Darker blue */
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #ffffffcc; /* More opaque white on hover */
        color: #364fc7; /* Darker shade of blue on hover */
      }

      .invalid-feedback {
        color: #ff6b6b;
      }

      .d-block a {
        color: #fff;
      }

      .d-block a:hover {
        color: #a777e3;
        text-decoration: underline;
      }

      .alert {
        border-radius: 10px;
        margin-bottom: 20px;
      }

      .btn-close {
        background: none;
        border: none;
        color: #fff;
      }

      .btn-close:hover {
        color: #a777e3;
      }

      .alert {
        width: 400px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 mx-auto">
          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <main class="form-signin text-center">
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
            <form action="/login" method="POST">
              @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
          </main>
        </div>
      </div>
    </div>
  </body>
</html>
