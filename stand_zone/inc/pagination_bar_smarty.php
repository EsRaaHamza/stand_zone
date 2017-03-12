<!-- begin of pagination_bar_smarty.php file in the front end includes-->
<?php

############## Pagination Bar Begins Here #############

 $page_number='';

# if current page is the first page

if ( $pagination['current_page'] == 1 ) {

    # then "previous" link will be disabled because there is no previous pages then

    $smarty->assign('prev_link', "<p class='page_no' style='color: #888; padding: 6px; font: 12px/16px tahoma, arial;'>&laquo;&nbsp;previous</p>");

# if current page is NOT the first page

} else {

    # then "previous" link will be enabled to enable users to go back to the previous page

    $smarty->assign('prev_link', "<p class='page_no' style='font: 12px/16px tahoma, arial;'><a class='previous_next' href='{$pagination['current_page_name']}?{$query_string}page={$pagination['previous_page']}'>&laquo;&nbsp;previous</a></p>");

}



$page_counter = 1;

$page_num = ($pagination['current_page'] < 6) ? 1 : ($pagination['current_page'] - 3);



for ($page_num; $page_counter <= 6 && $page_num < $pagination['last_page']; $page_num++) {

    $active_page_link = ($page_num == $pagination['current_page']) ? 'selected_page_link' : '';

    $page_number[] = "<p class='page_no'><a href='{$pagination['current_page_name']}?{$query_string}page={$page_num}' class='page_link {$active_page_link}'>$page_num</a></p>";

    $page_counter++;

}

$smarty->assign('page_number', $page_number);



$active_page_link = ($page_num == $pagination['current_page']) ? 'selected_page_link' : '';

$smarty->assign('last_page', "<p class='page_no' style='border: none; padding: 5px 1px 0 1px; background: transparent;'>...</p><p class='page_no'><a href='{$pagination['current_page_name']}?{$query_string}page={$pagination['last_page']}' class='page_link {$active_page_link}'>{$pagination['last_page']}</a></p>");



# if current page is the last page

if (($pagination['current_page'] == $pagination['last_page']) || (mysql_num_rows($result) == 0)) {

    # then "next" link will be disabled because there is no next pages then

    $smarty->assign('next_link', "<p class='page_no' style='color: #888; padding: 6px; font: 12px/16px tahoma, arial;'>Next&nbsp;&raquo;</p>");

# if current page is NOT the last page

} else {

    $smarty->assign('next_link', "<p class='page_no' style='font: 12px/16px tahoma, arial;'><a href='{$pagination['current_page_name']}?{$query_string}page={$pagination['next_page']}' class='previous_next'>Next&nbsp;&raquo;</a></p>");

}



$smarty->assign('first_last', "&laquo; <a href='{$pagination['current_page_name']}?{$query_string}page={$pagination['first_page']}' class='small_link'>page 1</a> &nbsp; | &nbsp;<a href='{$pagination['current_page_name']}?{$query_string}page={$pagination['last_page']}'  class='small_link'>last page</a> &raquo;");



############## Pagination Bar Begins Here #############

?>

<!-- end of pagination_bar_smarty.php file in the front end includes-->