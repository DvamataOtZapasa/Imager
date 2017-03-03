<?php
function getRating($con,$id){
    $result = mysqli_query($con,"SELECT * FROM `images` WHERE id = '$id'");
    $r = mysqli_fetch_row($result);

    $weigthed = ($r['3']+$r['4']+$r['5']+$r['6']+$r['7']);
    if($weigthed == 0){
        $finalrating = 0;
    }else{
        $finalrating = (5*$r['3'] + 4*$r['4'] + 3*$r['5'] + 2*$r['6'] + 1*$r['7']) / $weigthed;
    };

    return number_format((float)$finalrating, 1, '.', '');
}

function rate($con,$id,$rating){
    $result = mysqli_query($con,"SELECT * FROM `images` WHERE id = '$id'");
    $r = mysqli_fetch_row($result);
}