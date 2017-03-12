<!-- begin of projects file in the front end templates-->

<div class="page"  >
    <div class="container ">
        <h3 class="page_title" 
        style="border-left: solid 6px #e9c531; text-align: left; margin-top: 18px; padding-left: 14px;">{$title_page}
        </h3>

            <p>{$projects|@count} </p>

         <div class="page_c" style="background-image: url(img/bg_final.jpg); height: 709px; ">
            
            {if (($projects|@count) <=2 )}
hi if
            {foreach $projects as $data}
            inside foreach
                <div class="col-lg-4 pull-right data_new  data_new_p animated3 bounceIn wow">
                    <div class="marg_p">
                        
                        <img src="uploads/projects/medium/{$data.image_name}" class="pull-right news_img"/>
                        
                        <h3>{$data.title}</h3>
                        
                        <div class="details details_news">{brief_text($data.content,10)}</div>
                        <div>

                                <a href="project_details.php?id={$data.id}" 
                                   style="hover{
                                                opacity: 2;
                                                } ">
                                <img src="img/button.png" alt="back"  >
                                </a>

                       </div>

                        <!-- <a href="project_details.php?id={$data.id}" class='news_more'><span>More</span></a> -->
            <p class="clear"> </p>
                    </div>
                </div>
            {/foreach}

            {else}
           <!--  {for $foo=1 to 3} -->
                 inside else
                 <h3>{$projects[1].title}</h3>
                
                        
                        <div class="details details_news">{brief_text($projects[1].content,10)}</div>
                        content
                        {$projects[1].content}

                        <div>

                                <a href="project_details.php?id={$projects[1].id}" 
                                   style="hover{
                                                opacity: 2;
                                                } ">
                                <img src="img/button.png" alt="back"  >
                                </a>

                       </div>
                       <!-- {/for} -->


            {/if}
            <p class="clear"> </p>
        </div>
        <br/>
        {include file='pagination_bar.tpl'}
        <br/>    
    </div>
</div>

<!-- end of projects file in the front end templates-->
