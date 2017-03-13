<!-- begin of projects file in the front end templates-->

<style type="text/css">
.img_adjust{
    height: 34% ;
    width: 22%;
    display: inline-block;
/*    overflow:hidden;*/
    float: right;
    
}
.marg_p{
    height: auto;
    margin-right: 171px;
    margin-top: 96px;

/*    overflow: hidden;
*/}.titleimg{
   height: auto;
}
</style>

<div class="page"  >
    <div class="container ">
        <h3 class="page_title" 
        style="border-left: solid 6px #e9c531; text-align: left; margin-top: 18px; padding-left: 14px;">{$title_page}
        </h3>

<!--             <p>{$projects|@count} </p> -->

        <div class="page_c" style="background-image: url(img/bg_final.jpg); height: 660px; width: 1440px;">
            
            {if (($projects|@count) <=2 )}
<!-- hi if -->
            {foreach $projects as $data}
            <!-- inside foreach -->
                <div class="col-lg-4 pull-right data_new  data_new_p animated3 bounceIn wow">
                    <div class="marg_p">
                        
                      
                        <img src="uploads/projects/medium/{$data.image_name}" class="pull-right news_img img_adjust" />
                        
                       <div> <h3>{$data.title}</h3>
                        </div>
                        
                        <div class="details details_news" style="text-align: right;">{brief_text($data.content,10)}</div>
                        
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
                    
                
               <!--  exit foreach -->
            {/foreach}

            {else}
           
                 inside else
 <img src="uploads/projects/medium/{$projects[0].image_name}" class="pull-right news_img img_adjust"/>

                 <h3>{$projects[0].title}</h3>
                
                        
                        <div class="details details_news">{$projects[0].content}</div>
                    
                       

                        <div>

                                <a href="project_details.php?id={$projects[0].id}" 
                                   style="hover{
                                                opacity: 2;
                                                } ">
                                <img src="img/button.png" alt="back"  >
                                </a>

                       </div>



                <img src="uploads/projects/medium/{$projects[1].image_name}" class="pull-right news_img img_adjust"/>

                 <h3>{$projects[1].title}</h3>
                
                        
                        <div class="details details_news">{$projects[1].content}</div>
                    
                       

                        <div>

                                <a href="project_details.php?id={$projects[1].id}" 
                                   style="hover{
                                                opacity: 2;
                                                } ">
                                <img src="img/button.png" alt="back"  >
                                </a>

                       </div>
                       

             exit else
            {/if}
            </div>
            <p class="clear"> </p>
        </div>
        <br/>
        {include file='pagination_bar.tpl'}
        <br/>    
    </div>
</div>
</div>

<!-- end of projects file in the front end templates-->
