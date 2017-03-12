
tinyMCE.init({
    /*** General options ***/
    height:"400px",
    width:"100%",
    //mode : "textareas",
    mode: "specific_textareas", // for more info: http://www.tinymce.com/wiki.php/Configuration:mode
    editor_selector : "mceEditor", // for more info: http://www.tinymce.com/wiki.php/Configuration:editor_selector
    theme : "advanced",
    directionality : "rtl",
    //plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
    plugins : "autolink,lists,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,preview,media,print,contextmenu,directionality,advlist,autosave,visualblocks,wordcount,paste",

    /*** Theme options ***/
    //theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    //theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    //theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
    theme_advanced_buttons1 : "fontselect,fontsizeselect,|,forecolor,backcolor,|,bullist,numlist,|,justifyfull,justifyleft,justifycenter,justifyright,|,strikethrough,underline,italic,bold,|,ltr,rtl",
    theme_advanced_buttons2 : "print,preview,removeformat,pastetext,|,tablecontrols,|,emotions,iespell,media,|,link,unlink,image",
    theme_advanced_buttons3 : "",
    theme_advanced_buttons4 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "center",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    theme_advanced_fonts : "Tahoma=tahoma,Arial=arial,helvetica,sans-serif,Courier New=courier new,courier,monospace", // if you want more fonts just remove this line and it will display the default fonts // Tahoma=tahoma,Arial=arial,helvetica,sans-serif,Courier New=courier new,courier,monospace
    theme_advanced_font_sizes : "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px,26px,27px,28px,29px,30px",
    font_size_style_values :    "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px,26px,27px,28px,29px,30px",

    relative_urls : false,      // [1-3] to force TinyMCE to use absolute urls instead of relative urls    for more info see http://stackoverflow.com/questions/3796942/get-tinymce-to-use-full-image-url-instead-of-relative-one     and     http://www.tinymce.com/wiki.php/TinyMCE_FAQ
    remove_script_host : false, // [2-3] to force TinyMCE to use absolute urls instead of relative urls
    convert_urls : false,       // [3-3] to force TinyMCE to use absolute urls instead of relative urls

    /*
    forced_root_block : false, // [1-3] to force TinyMCE to produce <br> elements instead of <p></p> elements on enter   for more info: http://www.tinymce.com/wiki.php/TinyMCE_FAQ#TinyMCE_produce_P_elements_on_enter.2Freturn_instead_of_BR_elements.3F
    force_br_newlines : true,  // [2-3] to force TinyMCE to produce <br> elements instead of <p></p> elements on enter
    force_p_newlines : false,  // [3-3] to force TinyMCE to produce <br> elements instead of <p></p> elements on enter
    */
   
    // Example content CSS (should be your site CSS)
    content_css : "../css/tiny_mce.css", // for more info: http://www.tinymce.com/wiki.php/Configuration:content_css

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",

    // Style formats
    style_formats : [
        {title : 'Bold text', inline : 'b'},
        {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
        {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
        {title : 'Example 1', inline : 'span', classes : 'example1'},
        {title : 'Example 2', inline : 'span', classes : 'example2'},
        {title : 'Table styles'},
        {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ],

    // Replace values for the template plugin
    template_replace_values : {
        username : "Some User",
        staffid : "991234"
    }
});