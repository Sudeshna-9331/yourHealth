<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  <style>
    .carousel_h5 {
      font-size: 20px;
      text-shadow: 2px 2px 5px gray;
      letter-spacing: 3px;
      font-family: sans-serif;
      margin-bottom: 34px;
    }

    .carousel_p {
      text-shadow: 2px 2px 5px gray;
    }

    .carousel_img {

      height: 600px;
      width: 100%;

    }

    .carousel_h4 {
      font-size: 40px;
      padding: 8rem 3rem;
      letter-spacing: 3px;
      font-family: sans-serif;
      margin-bottom: 3rem;
      background: rgba(0, 0, 0, 0.6);
     

    }

    @media only screen and (max-width: 768px) {

      .carousel-item {
        height: 300px;
      }
    }
  </style>
</head>

<body>
  <?php

    echo '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="partials/images/1.jpeg" class="carousel_img d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h4 class="carousel_h4">
        Making better health easier is what we are all about.
        </h4>
      
            <h5 class="carousel_h5">Be healthy. Stay informed.</h5>
            <p class="carousel_p"></p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="partials/images/2.jpeg" class="carousel_img d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h4 class="carousel_h4">
        Making better health easier is what we are all about.
        </h4>
            <h5 class="carousel_h5">Be healthy. Stay informed.</h5>
            <p class="carousel_p"></p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="partials/images/3.jpeg" class="carousel_img d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h4 class="carousel_h4">
        Making better health easier is what we are all about.
        </h4>
        <h5 class="carousel_h5">Be healthy. Stay informed.</h5>
        <p class="carousel_p"></p>
      </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>';
?>
</body>

</html>