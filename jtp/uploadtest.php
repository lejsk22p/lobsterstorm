<?php if( isset($_POST['submit']) ) {   include('SimpleImage.php'); $image = new SimpleImage(); $image->load($_FILES['uploaded_image']['tmp_name']); $image->resizeToWidth(500); $image->output(); } else { ?>

      <form action='uploadtest.php' method='post' enctype='multipart/form-data'>
      <input type='file' name='uploaded-image' />

      <input type='submit' name='submit' value='upload' />

      </form>

      <?php
      }
      ?>