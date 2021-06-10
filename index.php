<?php
require_once 'corex/autoload.php';


$string = file_get_contents("skills_pad_mod.xml");
if ($string === false) {
    // deal with error...
}

$string = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $string);

$i = 0;
$xml = simplexml_load_string($string);
foreach ($xml->course as $course) {

    echo $course->title;
    echo "-";
    // echo "<br/> link:";
    // echo $course->link;
    // echo "<br/> courseFeaturedImage: ";
    // echo $course->courseFeaturedImage;
    // echo "<br/> location: ";
    // echo (int)$course->location;
    // echo "<br/> duration: ";
    // echo (float)$course->duration;
    // echo "<br/> qualification: ";
    // echo $course->qualification;
    // echo "<br/> courseAccess: ";
    // echo $course->courseAccess;
    // echo "<br/> examIncluded: ";
    // echo (int)$course->examIncluded;
    // echo "<br/> compatibility: ";
    // echo $course->compatibility;
    // echo "<br/> courseCategory: ";
    echo $course->CourseCategory;
    echo "<br/>";
    // echo htmlentities($course->CourseDescription);

    $insert = DB::operation()->insert('courses', array(
        'title' => strval($course->title),
        'link' => strval($course->link),
        'courseFeaturedImage' => strval($course->CourseFeaturedImage),
        'location' => intval($course->location),
        'duration' => doubleval($course->duration),
        'qualification' => strval($course->qualification),
        'courseAccess' => strval($course->CourseAccess),
        'examIncluded' => intval($course->ExamIncluded),
        'compatibility' => strval($course->compatibility),
        'courseCategory' => intval($course->CourseCategory),
        'courseDescription' => strval($course->CourseDescription)
    ));




    //echo $insert ? "true" : "false";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "convert-data";

    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $sql = "INSERT INTO courses ( title, link, courseFeaturedImage, locationC, duration, qualification, courseAccess, examIncluded, compatibility, courseCategory, courseDescription ) VALUES (
    //         '$course->title',
    //         $course->link',
    //         $course->CourseFeaturedImage',
    //         $course->location',
    //         $course->duration',
    //         $course->qualification',
    //         $course->CourseAccess',
    //         $course->ExamIncluded',
    //         $course->compatibility',
    //         $course->CourseCategory',
    //         $course->courseDescription'
    //     )";
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    //     echo "New record created successfully";
    // } catch (PDOException $e) {
    //     echo $sql . "<br>" . $e->getMessage();
    // }

    // $conn = null;

    $i += 1;
}






// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "convert-data";

// // Create connection
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "INSERT INTO courses (title, link, courseFeaturedImage, location, duration, qualification, courseAccess, examIncluded, compatibility, courseCategory, courseDescription
//     )
//     VALUES (
//         $course->title,
//         $course->link,
//         $course->courseFeaturedImage,
//         $course->location,
//         $course->duration,
//         $course->qualification,
//         $course->courseAccess,
//         $course->examIncluded,
//         $course->compatibility,
//         $course->courseCategory,
//         $course->courseDescription
//     )";
//     // use exec() because no results are returned
//     $conn->exec($sql);
//     echo "New record created successfully";
//   } catch(PDOException $e) {
//     echo $sql . "<br>" . $e->getMessage();
//   }
  
//   $conn = null;
