<?php
 /* Connection */

    $servername='58.71.15.10';
    $username='anton';
    $password='nyangnyang';
    $dbname='wmsugcc';

  




/* Connection */

  /* Dont Touch the Codes Below */

    try {
      
    if ($con =mysqli_connect($servername, $username, $password,$dbname)){}
    else{
        $con = '';
        unset($_SESSION['superadminId']);
        $_SESSION['errorconnection']=3;
      
         ?>
        <script type="text/javascript">
            
            window.location.href="<?php  echo $protocol.$_SERVER['SERVER_NAME'].'/wmsugcc/configuration/' ?>";      
                  
        </script>
        <?php
        }
    }
    catch (exception $e) {
       
    }
    


   
  

?>
