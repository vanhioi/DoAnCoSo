<?php
function checkuser($user,$pass){
    $conn=new mysqli("localhost", "root", "", "shopgiay");
    $stmt = $conn->prepare("SELECT * FROM user WHERE  diachiemailKH='".$user."' AND pass='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq[1]['role'];
}
?>