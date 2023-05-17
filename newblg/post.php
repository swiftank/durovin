<?php include './constant.php'; ?>


<img src="../assets/Screenshot.png" alt="">
<?php if(isset($_GET['post'])){?>
<?php 
  foreach($urls as $url){
   if( $url == $_GET['post'] ){
      include './posts/'.$url.'.htm';
   }
  }
?>
<?php }?>