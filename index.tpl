<!-- begin of index file in the front end templates-->

<div style="min-height: 29px;"></div>

<div class="slider_off"> </div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		if(!device.mobile() && !device.tablet()){
			liteModeSwitcher = false;
		}else{
			liteModeSwitcher = true;
		}
		if($.browser.msie && parseInt($.browser.version) < 9){
	         liteModeSwitcher = true;
	    }

			jQuery('#parallax-slider-55e34d885f2eb').parallaxSlider({
				parallaxEffect: "parallax_effect_normal"
			,	parallaxInvert: false			,	animateLayout: "simple-fade-eff"
			,	duration: 1500			,	autoSwitcher: true			,	autoSwitcherDelay: 10000			,	scrolling_description: false			,	slider_navs: true			,	slider_pagination: "none_pagination"
			,	liteMode :liteModeSwitcher
			});

	});
</script>
<div id="parallax-slider-55e34d885f2eb" class="parallax-slider">
    <ul class="baseList">
        
                {foreach $sliders as $hi}
        <li data-preview="uploads/slider/{$hi.image_name}" data-thumb-url="uploads/slider/{$hi.image_name}" data-ulr-link="">
            <div class="slider_caption">
                <strong>{$hi.title}</strong> 
                
                  {$hi.content}
                
            </div>
        </li>
        {/foreach}

    </ul>
</div>







<!-- end of index file in the front end templates-->
