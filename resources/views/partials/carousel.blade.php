<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="styles.css">

  <style>
    .c-item {
        height: 100vh;
    }

    .c-img {
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
    }

    .carousel-caption {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        height: 100%;
    }

    .carousel-caption button {
      width: fit-content;
      white-space: nowrap;
    }

    @media screen and (max-width: 768px){
        .carousel-caption {
            align-items: center;
        }
    }
    
  </style>


</head>
<body>
  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>

    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="img/2.jpg" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-4">
          <h2 class="display-1 fw-bolder text-capitalize">Pesona Gunung Andong</h2>
          <p class="mt-5 fs-3">Dengan sunrise merbabu dan merapi</p>
          <a href="/pendaftaran"><button class="btn btn-primary px-4 py-2 fs-5 mt-5">Book Now</button></a>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="img/slide4.png" class="d-block w-100 c-img" alt="Slide 2">
        <div class="carousel-caption top-0 mt-4">
          <p class="text-uppercase fs-3 mt-5"></p>
          <p class="display-1 ">Area camping</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</body>
</html>