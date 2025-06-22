<div class="container-fluid">
<?php
        $pages_dir='.';
        if(!empty ($_GET['p'])){
          $pages=scandir($pages_dir,0);
          unset($pages[0], $pages[1]);
          $p=$_GET['p'];
          if(in_array($p.".php", $pages)){
            include($pages_dir.'/'.$p.'.php');
          }else{
            echo "Halaman tidak ditemukan";
          }
        }
      ?>
</div>

