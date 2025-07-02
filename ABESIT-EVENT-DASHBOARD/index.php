<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABESIT Event DashBoard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include 'header.php';   ?>
  <div class="container-fluid slider mb-5">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="pics/1.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="pics/2.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="pics/3.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="pics/4.jpeg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h1 class="text-center pb-2 he" id="about">About Us</h1>
    <div class="row">
      <div class="col-md-4">
        <img src="pics/hack5.jpg" alt="" class="w-100">
      </div>
      <div class="col-md-8 px-5 jsttxt">
        <p class="jsttxt">Hacknovate 5.0 will gather brightest programmers, engineers, developers, and business visionaries. Our goal is to create a space where the brightest Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis assumenda velit quod tenetur? Enim iusto atque sequi unde, corrupti molestiae nesciunt ducimus ipsum rerum exercitationem aperiam eius similique eum minus officiis cumque? Amet rem doloremque eveniet nulla, aut at quod soluta rerum fuga consequatur qui blanditiis totam atque. Quos magni blanditiis voluptas amet voluptate nisi debitis doloribus quisquam molestiae non quam quidem neque tenetur labore, itaque deserunt quasi vel vero tempore eius. Suscipit, quos? Tenetur enim, repellendus omnis, incidunt sit explicabo voluptate consectetur accusantium officiis molestiae quidem quibusdam voluptas sunt id, dolore non reprehenderit. Consectetur ex aspernatur earum facilis deleniti, minus sapiente tempora sed quo laudantium nemo ad est officiis saepe ut, magni qui at, fugit doloribus iusto maiores ab consequatur? Similique voluptate totam corporis atque ducimus commodi nostrum distinctio, repudiandae fuga architecto illum dolore repellendus libero iure fugit, velit doloribus sunt ratione eaque obcaecati possimus earum mollitia officia blanditiis! Nemo, architecto maiores?</p>
      </div>
    </div>
    <hr class="border border-dark border-2 opacity-50">
  </div>

  <div class="container mt-5">
    <h1 class="text-center pb-2 he" id="events">Events</h1>
    <div class="row">
      <?php
      include 'Connection.php';

      $sql = "select * from events";
      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) {
        $id = $row['event_id'];
        $name = $row['event_name'];
        $desc = $row['event_desc'];
        $image = $row['event_image'];
        $time = $row['timestamp'];

        echo '
            <div class="col-md-4 mb-5">
            <div class="card" style="width: 18rem;">
              <img src="' . $image . '" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">' . $name . '</h5>
                <p class="card-text">' . substr($desc, 0, 50) . '........</p>
                <a href="events.php?event_id=' . $id . '" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        ';
      }
      ?>
    </div>
    <hr class="border border-dark border-2 opacity-50">
  </div>

  <div class="container">
    <h1 class="text-center pb-2 he" id="contact">Contact Us</h1>
    <p class="jsttxt">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.8715650334752!2d77.44511047550083!3d28.63361117566426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cee3d4e3485ed%3A0xe0fe1689b57c7d2e!2sABESIT%20GROUP%20OF%20INSTITUTIONS!5e0!3m2!1sen!2sin!4v1716218044328!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </p>
    <hr class="border border-dark border-2 opacity-50">
  </div>
  <?php include  'footer.php'; ?>

</body>

</html>