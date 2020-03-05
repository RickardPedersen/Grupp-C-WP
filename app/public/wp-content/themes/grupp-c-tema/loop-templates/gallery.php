<?php
/*------------------------------------------------------------------------------------------------------------------
Denna fil includas i content-single.php där(i htmlstrukturen) vi vill att fastighetens bilder skall visas
------------------------------------------------------------------------------------------------------------------*/

//Allt nedan skapas i html under "entry-content" eftersom att det är där som denna fil includas i "content-single.php":
?>


  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
  
  <?php 

    $bilder = acf_photo_gallery('bilder', $post->ID); 
    $activeBild = $bilder[1]["full_image_url"];
    $activeBild = acf_photo_gallery_resize_image($activeBild, 262, 160); 
?>
    <div class="carousel-item active">
    <img class="d-block w-100" src="<?php echo $activeBild; ?>" alt="">
    </div>
    
<?php
    
    foreach ($bilder as $bild):
        $full_image_url= $bild['full_image_url'];
        $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); 

        
?>

    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo $full_image_url; ?>" alt="First slide">
    </div>


    <?php endforeach; ?>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>
</div>
