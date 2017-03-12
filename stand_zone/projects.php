<!-- begin of projects.php file in the front end-->
<?php
include('inc/header.php');
# description of this page that appears in the meta description tag
$smarty->assign('meta_description', '');
# keywords of this page that appears in the meta keywords tag
$smarty->assign('meta_keywords', '');
# Assign to the 'content_area' the template file that holds contents of this page
$smarty->assign('content_area', 'projects.tpl');
$smarty->assign('page_title', " {$options['website_name']}");
/* PAGE CONTENT
========================================================= */
$title_page="Projects";
$smarty->assign('title_page',$title_page);
################################################################################################
# [1/5]- CHANGE VALUES OF THE FOLLOWING VARIABLE TO FIT YOUR PURPOSE
#============================================================#
# number of results that will be shown in every page
$num_of_results_per_page = 10;
#============================================================#
# [2/5]- CHANGE THE NEXT QUERY TO FIT YOUR PURPOSE
# note that you only need to change the (table name)
# and to put a where clause if your query needs that
#============================================================#
# Query to get total number of records that we are going to fetch
$result = mysql_query("
    SELECT COUNT(*) as num_of_records
    FROM projects
    WHERE display='yes' 
    ORDER by id desc    
");
#============================================================#


if ($result != false) {
    $row = mysql_fetch_array($result);
}
# Use total number of records with the set_pagination() function which is a user-defined function
$pagination = set_pagination($row['num_of_records'], $num_of_results_per_page);


# [3/5]- CHANGE THE NEXT QUERY TO FIT YOUR PURPOSE - ( and DON'T CHANGE THE LIMIT CLAUSE )
# note that you only need to change the (table name) and to put
# a (where clause), (order by clause), ... if your query needs that
#============================================================#
# Query to fetch data that will be shown in the current page
$result = mysql_query("
    SELECT *
    FROM projects
    WHERE display='yes' 
    ORDER by id desc    
    LIMIT {$pagination['start_record']}, {$pagination['num_of_results_per_page']}
");
#============================================================#

if ($result != false) {
    # we may want to use the next counter to give different style to the odd or even results
    $counter = 1;
    while ($row = mysql_fetch_array($result)) {
        # [4/5]- CHANGE THE NEXT CODE TO FIT YOUR PURPOSE
        #============================================================#
         $row['content']=  stripslashes(strip_tags($row['content']));
         $row['title']=  stripslashes(strip_tags($row['title']));
         $articles[]=$row; 
        #============================================================#
        ($counter == 1) ? ($counter = 2) : ($counter = 1); # This related to the $counter variable above
    }
$smarty->assign('projects',$articles);


}
//$query_string = "type={$_GET['type']}&";
$query_string = "";
# include pagination bar
include('inc/pagination_bar_smarty.php');

$smarty->display( 'template.tpl' );
?>




<!-- end of projects.php file in the front end-->



