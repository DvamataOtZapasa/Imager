<?php
if(!isset($_SESSION)){
    session_start();
}
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

function isRated($con,$id){
    $result = mysqli_query($con,"SELECT NULL FROM rated WHERE user='$_SESSION[id]' AND image='$id'");
    return mysqli_num_rows($result);
}
function getCurRating($con,$id){
    $result = mysqli_query($con,"SELECT rating FROM rated WHERE user='$_SESSION[id]' AND image='$id'");
    $r = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if($r){
        return $r[0]['rating'];
    }
}

function getNumOfRates($con,$id,$rating){
    $result = mysqli_query($con,"SELECT `$rating` FROM `images` WHERE id = '$id'");
    if($result){
        $r = mysqli_fetch_all($result);
        return $r[0][0];
    }else{
        return 0;
    }
}

function changeRating($con,$id,$torating){
    $crating = getCurRating($con,$id);
    echo "line 40: " . $crating;
    $ratingnum = getNumOfRates($con,$id,$crating) - 1;
    echo "<br>line 42: " . $ratingnum;
    mysqli_query($con,"UPDATE `images` SET `$crating` = $ratingnum  WHERE `id` = $id");

    $ratingnum = getNumOfRates($con,$id,$torating) + 1;
    mysqli_query($con,"UPDATE `images` SET `$torating` = $ratingnum  WHERE `id` = $id");

    mysqli_query($con,"UPDATE `rated` SET `rating` = '$torating'  WHERE `image` = $id AND `user` = $_SESSION[id]");
}

function rate($con,$id,$rating){
    $result = mysqli_query($con,"SELECT `$rating` FROM `images` WHERE id = '$id'");
    $r = mysqli_fetch_all($result);
    $ratingnum = $r[0][0] + 1;
    if(!isRated($con,$id)){
        mysqli_query($con,"UPDATE `images` SET `$rating` = $ratingnum  WHERE `id` = $id");
        mysqli_query($con,"INSERT INTO `rated` (`user`, `image`, `rating`) VALUES ('$_SESSION[id]', '$id', '$rating');");
    }else{
        changeRating($con,$id,$rating);
    }
}