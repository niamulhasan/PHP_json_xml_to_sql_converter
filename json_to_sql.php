<?php
require_once 'corex/autoload.php';


//CODE FOR JSON TO SQL DUMP
$string = file_get_contents("1.json");
if ($string === false) {
    // deal with error...
}

$json_a = json_decode($string, true);
if ($json_a === null) {
    // deal with error...
}

$i = 0;
foreach ($json_a as $course_key => $course) {
    echo $i . " - ";
    echo $course['title'];
    echo "<br/>";


    $insert = DB::operation()->insert('courses', array(
        'title' => $course['title'],
        'link' => $course['link'],
        'courseFeaturedImage' => $course['courseFeaturedImage'],
        'location' => (int)$course['location'],
        'duration' => (float)$course['duration'],
        'qualification' => $course['qualification'],
        'courseAccess' => $course['courseAccess'],
        'examIncluded' => (int)$course['examIncluded'],
        'compatibility' => $course['compatibility'],
        'courseCategory' => (int)$course['courseCategory'],
        'courseDescription' => $course['courseDescription']

    ));

    $i += 1;
}
// //echo $_GET['url'];