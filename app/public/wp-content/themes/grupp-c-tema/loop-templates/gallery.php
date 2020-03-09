<?php
/*------------------------------------------------------------------------------------------------------------------
Denna fil includas i content-single.php där(i htmlstrukturen) vi vill att fastighetens bilder skall visas
------------------------------------------------------------------------------------------------------------------*/

//Allt nedan skapas i html under "entry-content" eftersom att det är där som denna fil includas i "content-single.php":
?>

<div class="carouselContainer">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  

<?php 
$bildArray = acf_photo_gallery('bilder', $post->ID); 
?>

<ol class="carousel-indicators">

<?php 

for ($i = 0; $i < count($bildArray); $i++) {

  if ($i === 0 ) {
    
    ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
   <?php

  } else {

  ?>
   <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
  <?php
  }

};

?>

</ol>
<div class="carousel-inner">
<?php
for ($i = 0; $i < count($bildArray); $i++) {
  
    
  if($i === 0) {
    
    $bildUrl = $bildArray[0]['full_image_url'];
    $bildUrl = acf_photo_gallery_resize_image($bildUrl, 640, 426);

    ?>
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo $bildUrl; ?>" alt="">
    </div>
    <?php
  } else {

    $bildUrl = $bildArray[$i]['full_image_url'];
    $bildUrl = acf_photo_gallery_resize_image($bildUrl, 640, 426);

    ?>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo $bildUrl; ?>" alt="">
    </div>
    <?php
  }
};

?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
<div class="container">
<div class="row">

<?php for ($i = 0; $i < count($bildArray); $i++) {

?>

    <div class="col-sm">
      <button class ="thumBtn">
            <img src="<?php echo $bildArray[$i]['thumbnail_image_url']; ?>" data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>">
      </button>
    </div>


<?php };?>

</div>
</div>