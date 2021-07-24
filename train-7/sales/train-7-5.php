<?php
  include '../init.php';
  include '../db.php';

  $fun = trim($_POST['fun']);



  $a ="INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES (NULL, '魔法飛車', 'Maho魔法店', 'A', '0912345678', 'A', '5', '3000', '2018-03-25');";
  $b ="INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES (NULL, '魔法飛車', 'Maho魔法店', 'A', '0912345678', 'A', '5', '3000', '2018-03-26');";
  $c ="INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES (NULL, '魔法飛車', 'Maho魔法店', 'A', '0912345678', 'A', '5', '3000', '2018-03-27');";
  $d ="INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES (NULL, '魔法飛車', 'Maho魔法店', 'A', '0912345678', 'A', '5', '3000', '2018-03-28');";

  $del = "DELETE FROM `order` WHERE store_name='Maho魔法店' AND order_date>='2018-3-25' AND order_date<='2018-3-29'";


  if($fun =="add"){
      if($sql->query($a) === TRUE){
        $sql->query($b);
        $sql->query($c);
        $sql->query($d);
        jump('./train-7-orderlist.php', '神奇的事情發生了');
      } else{
        echo "Error:" . $sql . "<br>" . $conn->error;
      }
  }elseif($fun == "del"){
    if($sql->query($del) === TRUE){
      jump('./train-7-orderlist.php', '神奇的事情發生了');
    } else{
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }

  $conn->close();


?>
