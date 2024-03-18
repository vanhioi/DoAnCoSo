<?php
session_start();

if (isset($_GET['ind']) && $_GET['ind'] >= 0) {
    $indexToRemove = $_GET['ind'];

    if (isset($_SESSION['cart'][$indexToRemove])) {
        unset($_SESSION['cart'][$indexToRemove]);

        // Debug: In ra thông tin để kiểm tra
        echo 'Index to remove: ' . $indexToRemove . '<br>';
        echo 'Updated cart: ';
        print_r($_SESSION['cart']);
    }

    // Sắp xếp lại mảng
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header('Location: index.php?pid=4');
}

  
  if(isset($_GET['pg'])){
    switch($_GET['pg']){
      case 'giam':
        if($_GET['pg']=='giam'){
          $id= $_GET['id'];
          session_start();
          foreach ($_SESSION['cart'] as &$item) {
            if ($id == $item['masp']) { 
                $item['soluong']--;
            }
            if($item['soluong']==0){
              array_splice($_SESSION['cart'],$_GET['ind'],1);
            }
        }
        }
        header('Location:index.php?pid=4');

        break;
        //tang san pham
        case 'tang':
          if($_GET['pg']=='tang'){
            $id= $_GET['id'];
            session_start();
            foreach ($_SESSION['cart'] as &$item) {
              if ($id == $item['masp']) {
                  $item['soluong']++;
              }
          }
          }
          header('Location:index.php?pid=4');
    }
  }
?>
