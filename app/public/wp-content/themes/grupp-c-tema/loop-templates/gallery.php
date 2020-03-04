

<?php
    //ID from post metadata
    $images = acf_photo_gallery('bilder', $post->ID);
    
    if( count($images) ):
        //Loop through and show images
        foreach($images as $image):

            /*
            $id = $image['id'];
            $title = $image['title'];
            $caption= $image['caption'];
            */
            $full_image_url= $image['full_image_url'];
            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); 
            $thumbnail_image_url= $image['thumbnail_image_url']; 
            $url= $image['url']; 
            $target= $image['target']; 
            $alt = get_field('photo_gallery_alt', $id); 
            $class = get_field('photo_gallery_class', $id); 


?>

<div class="col-xs-6 col-md-3">
    <div class="thumbnail">
        <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
            <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
        <?php if( !empty($url) ){ ?></a><?php } ?>
    </div>
</div>

<?php endforeach; endif; ?>