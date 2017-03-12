<!-- begin of aboutus.tpl file in the front end template-->
<!--
<img src="bu.png" style="width:25px;height:40px; position: relative; left: -135px; top: -13px ;" >
<div style=" position: relative; left: 150px ; top:-70px; ">


<h4 style="color:#606060">  About STAND ZONE  </h4>
      
     <div id="pgrey">
      <p ><tt> It is a long established fact that a reader will be distracted by a readable content
      of a page when looking at its layout. The point of using Lorem lpsum that it has a-more- or less normal distrbution of letters , as opposed to using 'content here,content here' making it look like readable English . Many desktop publishing packagers and web pages editors now use Lorem lpsum
       <br>
       <b> Where does it come from</b>
       <br>
       Contrary to popular belief, Lorem lpsum isn't simply random text. It has roots in a piece of classical Latin Literature 45 BC, making it over 2000 years old. Richard McClientock.

      </tt></p>
    <button onclick="myFunction()"  class="button"> <h7 style="color: yellow;"> More>> </h7> </button>
   
<p id="seemore"></p>

<script>
function myFunction() 
{
    document.getElementById("seemore").innerHTML = "Hello World";
}
</script>
   
   </div>
    
</div>
-->

<title> About </title>
<div class="page">
    <div class="container">
<!--        <h3 class="page_title">{$page.title}</h3>-->
        <h3 style="border-left: solid 6px #e9c531; text-align: left; margin-top: 18px; padding-left: 14px;"> About STAND ZONE </h3>
<!--
        //i tried to add a class called bullet_c fo the previous inline style but it didn't work 
        find the hashed class in the index_style.css
-->
<!--
        <div class="page_c">
            {$page.content}
            <br/>

        </div>       
-->
        
         <div >
            <ul>
            {foreach from=$content item=hi}
             <li>{$hi.content}</li>
              {/foreach}
             </ul>
<!--                {$words}-->
            <br/>

        </div>
    </div>
</div>


<!-- end of aboutus.tpl file in the front end templates-->
