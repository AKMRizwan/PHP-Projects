<!DOCTYPE html>
<html lang="en">

<head>
  <title>Events Description</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include 'header.php'; ?>
<?php
      include 'Connection.php';
      
      if (isset($_GET['event_id'])) {
        $id = $_GET['event_id'];

      $sql = "select * from events where event_id=$id;";
      $result = $con->query($sql);
      while ($row = $result->fetch_assoc()) {
        $name = $row['event_name'];
        $image = $row['event_image'];
        $desc = $row['event_desc'];
        $time = $row['timestamp'];
      }
    }
?>
<div class="container-fluid bg-warning rounded p-5">
    <div class="container">
    <h1><?php echo $name; ?></h1>
    <p><?php echo $desc; ?>  </p>
     <button class="btn btn-dark"><a href="#d" class="text-light">Read More</a></button>
    </div>
  </div>
  
  <div class="container-fluid slider">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="pics/1.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item active">
          <img src="pics/4.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item active">
          <img src="pics/hack5.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="pics/2.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="pics/3.jpeg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </div>

  <div class="container" id="d">
  <div class="container-fluid bg-warning rounded">
    <div class="container">
    <h1 class="text-center"><?php echo $name ?></h1>
    <img src="<?php echo $image; ?>" class="img-fluid w-100" alt="">
    <p><?php echo $desc; ?>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quod et optio tempore accusantium culpa magni id in fuga sint nostrum expedita totam dolor nesciunt dolorum consequuntur numquam illo praesentium, qui quo ipsam aliquid! Architecto laudantium eligendi earum hic consectetur, sapiente odio rem recusandae voluptate maxime, provident alias sunt explicabo.
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores amet sint laudantium sapiente labore soluta iusto praesentium quas fugit deleniti nisi cum dolorem a laboriosam iste velit perspiciatis error fugiat tenetur odio numquam, libero ducimus eum? Officiis non iusto placeat natus nisi quae aliquid itaque voluptatem atque. Mollitia aut ex repellat officia eos veniam quasi libero aperiam tempore a, quis reprehenderit dolorem fuga aspernatur ab minima doloribus! Reiciendis totam ex officiis illum laborum aut debitis nisi voluptatem eius? Veritatis odio nesciunt cum. Esse delectus deserunt ab veniam, fugiat doloremque praesentium eum nihil cum aspernatur excepturi cumque incidunt temporibus, molestiae totam rem in numquam labore expedita quaerat assumenda consequatur porro. Nobis vel dicta accusamus quas facilis, quaerat blanditiis cum maxime consectetur minus in, debitis qui vitae a rerum sequi pariatur incidunt ipsa quos at labore! Ratione delectus ipsa dolorem cumque animi, quia perferendis commodi voluptate. Aperiam labore fugiat eius temporibus atque vitae quas? Nihil aspernatur corrupti vel nulla quas? Odit doloremque ex mollitia provident! Quam debitis consequuntur quas suscipit pariatur error cupiditate numquam quos! Laudantium error iure voluptas mollitia et dignissimos quibusdam tempora at impedit nostrum, provident quia pariatur adipisci quos magni placeat dolore doloribus unde eum perferendis tenetur ad reiciendis! Soluta labore ut nisi beatae eos dicta eaque odit. Veritatis rerum itaque aliquam, delectus earum consectetur natus et ab soluta? Dolore nam facere deserunt quos ut nemo, obcaecati consequuntur aliquid quas veniam, cumque ipsum quis voluptatem explicabo veritatis sint laudantium odio. Praesentium officiis vel perspiciatis iste dolores modi, ratione mollitia illo! Autem necessitatibus rem excepturi provident sapiente hic. Deserunt odio nemo esse porro optio molestiae sed corporis totam animi, tenetur alias ullam quod impedit reiciendis ut dolorum est consectetur. Aliquid aperiam iure adipisci dignissimos odit ipsam suscipit omnis nobis, autem quod facilis sit et nemo rerum culpa incidunt id nulla? Et, enim, aliquid neque cum earum eveniet fugiat aperiam dolor beatae, sed dolorem esse. Repellat libero dicta animi. Aliquid enim doloribus cum necessitatibus omnis, deleniti amet dolorum laboriosam quod, perspiciatis beatae voluptas atque unde placeat cumque doloremque at iste! Error nulla velit distinctio, fugit doloremque eum ducimus odio sint? Placeat veniam laborum quibusdam culpa, sit quas inventore dolores eligendi doloribus aut ipsa accusamus, sequi quo eius corporis magnam nemo voluptate cupiditate autem doloremque iure, hic saepe illum fugiat. Perspiciatis sint assumenda repellat omnis voluptas accusantium quis quos exercitationem, sequi provident ab totam quas non nemo consectetur dicta qui, fugit accusamus cupiditate? Optio aliquam nesciunt reiciendis fugiat odio, eaque odit omnis molestias, neque facilis, ut perferendis excepturi perspiciatis. Nisi, harum ipsa esse veritatis ad non blanditiis eaque exercitationem provident, vel voluptate, quidem velit error enim. Ratione quos voluptas, atque reprehenderit iure vitae non nemo ab illum saepe eum ut tempora, ipsa illo, natus odio dolorem debitis? Dolores tenetur dolorem adipisci, impedit ipsam nam repudiandae. Odio aspernatur odit beatae expedita natus veritatis similique facilis corporis officiis earum soluta ut tempore quam ex accusamus, facere tempora voluptatibus provident corrupti laudantium praesentium! Exercitationem voluptate quas aperiam quaerat inventore voluptatum, dicta sed tenetur velit illum.
    </p>
     
    </div>
  </div>
  </div>
  <div class="container-fluid mb-4">
    <h1 class="text-center ">Thank you for your Time </h1>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>