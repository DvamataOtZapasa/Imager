<?php
function getRating($con,$id){
    $result = mysqli_query($con,"SELECT * FROM `images` WHERE id = '$id'");
    $r = mysqli_fetch_row($result);
    print_r($r);
    //$finalrating = 5*$r['5star'] + 4*$r['4star'] + 3*$r['3star'] + 2*$r['2star'] + 1*$r['1star'];
    //return $finalrating;
}