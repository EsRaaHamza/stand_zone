<?php include('inc/header.php') ?>
<h2 class='page_title'>Add a new page </h2>
<?php
if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
    # instructions to insert data for the first time
    $error_msg  = '';
    $error_msg .= empty($_POST['title']) ? '<span>Page name is required </span><br />' : ''; # if the user did not enter a title
    if (!empty($error_msg)) {
        die("<p class='info_message'>$error_msg<br /><a href='aboutus.php' class='normal_link'>Back to add the page again</a></p>");
    }
    $page = array();



    foreach ($_POST as $key => $value) {



        $page["$key"] = mysql_real_escape_string($value);



    }







    $result = mysql_query("



        INSERT INTO aboutus (title,last_modified ,content)



        VALUES ('{$page['title']}', '{$page['last_modified']}', '{$page['content']}')



    ");



    if (mysql_affected_rows() == 1) {



        echo "<p class='success_message'>Data has been saved successfully <br /><br /><a href='aboutus.php' class='normal_link'>Add new page</a></p>";



    } else {



        echo "<p class='info_message'>An error occured. please try again </p>";



        $element = array(



            'action'        => 'aboutus.php',



            'title'         => $_POST['title'],



            'content'       => $_POST['content'],



            'last_modified' => $_POST['last_modified'],



            'submit_value'  => 'save',



            'cancel_url'    => 'aboutus.php',



            'cancel_caption'=> 'back',



        );



        include('inc/aboutus_form.php');



    }



} else { # If the user did not press the (add) button



    # instructions to display the form through which we add new pages



    $element = array(



        'action'        => 'aboutus.php',



        'title'         => '',



        'content'       => '',



        'last_modified' => date('Y-m-d'),



        'submit_value'  => 'save',



        'cancel_url'    => 'aboutus.php',



        'cancel_caption'=> 'back',



    );



    include('inc/aboutus_form.php');



}



?>







<a name="archive"></a>



<br /><br /><br /><br />







<h2 class='page_title'> Archive</h2>



<table>



    <tr>



        <th style="width: 30px;"></th>



        <th>page name</th>



        <th style="width: 150px;">last date modified</th>



        <th style="width: 150px;"> Edit | Delete</th>



    </tr>



<?php



$result = mysql_query("



    SELECT *



    FROM aboutus



    ORDER BY id desc



");



if ($result != false) {



    $counter = 1;



    while ($row = mysql_fetch_array($result)) {



        $td_class = ($counter % 2 == 0) ? 'even_row' : 'odd_row';



?>



            <tr>



            <td class="<?php echo $td_class ?>" style="padding: 0;"><?php echo $counter ?></td>



            <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo $row['title'] ?></td>



            <td class="<?php echo $td_class ?>" style="text-align: center; direction: ltr;"><?php echo $row['last_modified'] ?></td>



            <td class="<?php echo $td_class ?>"><a href="edit-aboutus.php?id=<?php echo $row['id'] ?>" class="normal_link">Edit</a> <?php if($row['id']!=1&&$row['id']!=2&&$row['id']!=3&&$row['id']!=4&&$row['id']!=5&&$row['id']!=6&&$row['id']!=7&&$row['id']!=8&&$row['id']!=9&&$row['id']!=10&&$row['id']!=11&&$row['id']!=12){?>| <a href="javascript:confirm_redirect(' Are you sure you want to delete this page?', 'delete-aboutus.php?id=<?php echo $row['id'] ?>');" class="normal_link">Delete</a><?Php }?></td>



        </tr>



       <?php 



        $counter++;



    }



}



?>



</table>



<br /><br /><br />







<?php include('inc/footer.php') ?>
