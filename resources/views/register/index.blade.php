<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Simaksi | {{ $title }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
 

    <style>
      body {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
      }

      .form-registration {
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

      .form-registration h1 {
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
        color: black;
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
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <main class="form-registration text-center mx-auto">
            <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
            <form action="/register" method="POST">
              @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login!</a></small>
          </main>
        </div>
      </div>
    </div>
  </body>
</html>
