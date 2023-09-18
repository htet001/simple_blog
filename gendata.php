<?php
require_once "sysgem/postgenerator.php";
$data = file_get_contents("assests/gendata.json");
$posts = json_decode($data, true);
$types = [1, 2];
$i = 0;
$writers = ["htet", "shine", "linn", "thu"];
$imagelinks = ["taylor-franz-91172.jpg", "sign_up.png", "lukas-blazek-320606.jpg", "helloquence-61189.jpg"];
$subjects = [1, 2, 3, 4];
foreach ($posts as $post) {
    $i++;
    $title = $post["title"];
    $content = $post["content"];
    $type = $types[$i % 2];
    $writer = $writers[$i % 4];
    $imglink = $imagelinks[$i % 4];
    $subject = $subjects[$i % 4];
    insertPost($title, $type, $writer, $content, $imglink, $subject);
}
