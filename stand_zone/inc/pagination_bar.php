<!-- Pagination Bar Begins Here "includes front end" -->

<div id="pagination">

    <?php if ( $pagination['current_page'] == 1 ) { ?>

              <p class='page_no' style='color: #aaa; padding: 6px; font: 12px/16px tahoma, arial;'>&laquo;&nbsp;previous</p>

    <?php } else {  ?>

              <p class='page_no' style='font: 12px/16px tahoma, arial;'><a class='previous_next' href="<?php echo $pagination['current_page_name'] . "?{$query_string}page=" . $pagination['previous_page']; ?>">&laquo;&nbsp;previous</a></p>

    <?php } ?>

          <?php $page_counter = 1; ?>

          <?php for ($page_num = ( $pagination['current_page'] < 10 ? 1 : $pagination['current_page'] - 4 ); $page_counter <= 10 && $page_num < $pagination['last_page']; $page_num++) { ?>

                    <p class='page_no'>

                        <a href="<?php echo $pagination['current_page_name'] . "?{$query_string}page=" . $page_num; ?>" class="page_link <?php if($page_num == $pagination['current_page']){echo 'selected_page_link';} ?>">

                            <?php echo $page_num; ?>

                        </a>

                    </p>

                    <?php $page_counter++; ?>

          <?php } ?>

          <p class='page_no' style='border: none; padding: 5px 1px 0 1px; background: transparent;'>...</p>

          <p class='page_no'>

              <a href="<?php echo $pagination['current_page_name'] . "?{$query_string}page=" . $pagination['last_page']; ?>" class="page_link <?php if($page_num == $pagination['current_page']){echo 'selected_page_link';} ?>">

                  <?php echo $pagination['last_page']; ?>

              </a>

          </p>

          <?php if (($pagination['current_page'] == $pagination['last_page']) || (mysql_num_rows($result) == 0)) { ?>

              <p class='page_no' style='color: #aaa; padding: 6px; font: 12px/16px tahoma, arial;'>Next&nbsp;&raquo;</p>

          <?php } else { ?>

              <p class='page_no' style='font: 12px/16px tahoma, arial;'>

                  <a href="<?php echo $pagination['current_page_name'] . "?{$query_string}page=" . $pagination['next_page']; ?>" class='previous_next'>Next&nbsp;&raquo;</a>

              </p>

          <?php } ?>

</div>

<p class='page_no' style='text-align: center; margin-bottom: 40px;'>&laquo;&nbsp;

    <a href="<?php echo $pagination['current_page_name'] . "?{$query_string}page=" . $pagination['first_page']; ?>" class='small_link'>page 1</a> &nbsp; | &nbsp;

    <a href="<?php echo $pagination['current_page_name'] . "?{$query_string}page=" . $pagination['last_page']; ?>"  class='small_link'>last page</a> &nbsp;&raquo;

</p>

<!-- Pagination Bar Ends Here "includes front end"-->

