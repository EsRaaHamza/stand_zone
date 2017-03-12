<!-- begin of index.php file in the front end-->
<?php

include('inc/header.php');

# Include the necessary files and javascript code that (audio player) needs to work properly

# And we do this to prevent loading this code in the other pages that don't need it, and that is to reduce loading time

# title of the current page

$smarty->assign('page_title',"main page |{$options["website_name"]}");

$smarty->assign('meta_description', "");

$smarty->assign('meta_keywords', "");

$smarty->assign('content_area', 'index.tpl');

//
$slider = array();
$result = mysql_query("
    SELECT *
    FROM slider
    WHERE display = 'yes'
    order by id desc
    LIMIT 10
");
if ($result != false) {
//    echo"NOT FALSE";
    while ($row = mysql_fetch_array($result)) {
        $row['title'] = $row['title'];
        $row['content'] = $row['content'];
        $slider[] = $row;
    }
    $smarty->assign('sliders', $slider);
}
//var_dump($slider);
//---------------------------------------------------
//$arr_result = array();
//
//if($result){
//    while ($data = mysql_fetch_assoc($result) )
//    
//    {
//                     $arr_result[] = $data;
//   
//    }
//
//}
////var_dump($arr_result);
//$smarty->assign('slider',$arr_result);







//else
//{
//    echo "ERROR!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
//}

//

$result = mysql_query("

    SELECT *

    FROM clients

    where image_name!=''

    order by id desc

");

if ($result != false) {

    while ($row = mysql_fetch_array($result)) {

        

        $row['title'] = stripslashes($row['title']);

//        $row['content'] = stripslashes(strip_tags($row['content']));

        $clients[] = $row;

    }

    $clients['num']= mysql_num_rows($result);

//    $clients['rounda']=round($num/8);

    $smarty->assign('clients', $clients);

}


$result = mysql_query("

    SELECT *

    FROM news

    order by id desc

    LIMIT 3

");

if ($result != false) {

    while ($row = mysql_fetch_array($result)) {

        $row['title'] = stripslashes($row['title']);

        $row['content'] = stripslashes(strip_tags($row['content']));

        $news[] = $row;

    }

    $smarty->assign('news', $news);

}





$result = mysql_query("

    SELECT *

    FROM projects

    order by id desc

    LIMIT 3

");

if ($result != false) {

    while ($row = mysql_fetch_array($result)) {

        $row['title'] = stripslashes($row['title']);

        $row['content'] = stripslashes(strip_tags($row['content']));

        $projects[] = $row;

    }

    $smarty->assign('projects_data', $projects);

}



$result = mysql_query("

    SELECT *

    FROM pages

    WHERE id    = 2

    AND display = 'yes'

");

if ($result != false) {

    $row = mysql_fetch_array($result);

    $row['title']   = stripslashes($row['title']);

    $row['content'] = stripslashes(strip_tags($row['content']));

    # title of the current page

    $smarty->assign('page', $row);

}









$smarty->display('template.tpl');

?>
<!-- end of index.php file in the front end-->
