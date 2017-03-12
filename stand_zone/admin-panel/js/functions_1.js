// prevent the browser (especially IE) from displaying the same previous result
    var counter_img = 1;
$.ajaxSetup ({
    cache: false
});


// This function used for printing incoming messages
function printMessage(pagePath,messageId){
    fullPath = pagePath + "?id=" + messageId;
    msg = window.open(fullPath, 'Print_Message', 'scrollbars=yes, resizable=yes, width=800, height=600');
    msg.print();
}
//var limits = 10;
function addInput(divName,num){
    if(counter_img == 10){
        alert("You have reached the limit of adding " + counter_img + " inputs");

    }else{
        $('#' + divName).append("<br/> الصورة"+counter_img + "<input type='file' name='image_name[]' class='textbox' style='width: 223px;' />")
        //     if (counter_img == num)  {
        //          alert("You have reached the limit of adding " + counter_img + " inputs");
        //     }
        //     else {
        //          var newdiv = document.createElement('div');
        //          newdiv.innerHTML = "الصوره" + (counter_img + 1) + " <br><input type='file' name='image[]' class='textbox' style='width: 223px;' />";
        //          document.getElementById(divName).appendChild(newdiv);
        //          counter_img++;
        //     }
        counter_img =counter_img+1;
    }
}

function open_popup_window(path_of_page_to_open, name_of_window, width_of_window, height_of_window){
    window.open(path_of_page_to_open, name_of_window, "scrollbars=yes, resizable=yes, width=" + width_of_window + ", height=" + height_of_window + "");
}
// this function display a pop up message before redirecting to anoth page
function confirm_redirect(confirmation_msg, path_of_page_to_redirect_to) {
    var answer = confirm (confirmation_msg)
    if (answer) {
        document.location.href = path_of_page_to_redirect_to;
    } else {
        // do nothing
    }
}


//// this function will populate a specific "select" tag with data, depending on the change in another specific "select" tag
function populate_selectbox(id_of_form_to_submit, path_of_file_that_holds_processing_code, id_of_element_that_will_display_the_result) {
    $.ajax({
        type   : 'POST', 
        url    : path_of_file_that_holds_processing_code, 
        enctype: 'multipart/form-data',
        data   : $('#' + id_of_form_to_submit).serialize(), // more info --> http://www.jstiles.com/Blog/How-To-Submit-a-Form-with-jQuery-and-AJAX
        success: function(response){
            $('#' + id_of_element_that_will_display_the_result).html(response);
        }
    });
}



function add_new_category(id_of_element_to_populate, name_of_new_textbox) {
    $("#"+id_of_element_to_populate).html("<input type='text' name='" + name_of_new_textbox + "'  />");
}



function add_new_cars(id_of_element_to_populate, name_of_new_textbox) {
    $("#"+id_of_element_to_populate).html("<input type='text' name='" + name_of_new_textbox + "' />");
}


function add_new_country(id_of_element_to_populate, name_of_new_textbox) {
    $("#"+id_of_element_to_populate).html("<input type='text' name='" + name_of_new_textbox + "' />");
}



// This function checks to see if there is any required data missing
// and it works with text_boxes and password_boxed only
function check_required_data(form_id, names_of_required_text_fields, names_of_required_password_fields, id_of_element_that_will_display_the_result, bg_color, border_color){
    // set a variable to indicate that there is a required data missing
    var missing_data = false;
    // get number of elements of "names_of_required_text_fields" array
    var num_of_required_text_fields = names_of_required_text_fields.length;
    // get number of elements of "names_of_required_password_fields" array
    var num_of_required_password_fields = names_of_required_password_fields.length;
    // if the user did not determine an element in which we will display the rusult then we will use the element with the id "ajax_result"
    id_of_element_that_will_display_the_result = typeof id_of_element_that_will_display_the_result !== 'undefined' ? id_of_element_that_will_display_the_result : 'ajax_result'
    // "bg_color" and "border_color" is the color that the empty field will turn to
    bg_color = typeof bg_color !== 'undefined' ? bg_color : '#FAE4E5';
    border_color = typeof border_color !== 'undefined' ? border_color : '#FF92A7';
    

    // check to see if the requried text fields is empty
    for (i = 0; i < num_of_required_text_fields; i++) {
        if (typeof names_of_required_text_fields[i] !== 'undefined') {
            var text_field_to_check = "#" + form_id + " :text[name='" + names_of_required_text_fields[i] + "']";

            if ($(text_field_to_check).val() == '') {
                missing_data = true;
                $(text_field_to_check).css({'background-color':bg_color, 'border-color':border_color});
            }
        }
    }
    
    // check to see if the requried password fields is empty
    for (i = 0; i < num_of_required_password_fields; i++) {
        if (typeof names_of_required_password_fields[i] !== 'undefined') {
            var password_field_to_check = "#" + form_id + " :password[name='" + names_of_required_password_fields[i] + "']";

            if ($(password_field_to_check).val() == '') {
                missing_data = true;
                $(password_field_to_check).css({'background-color':bg_color, 'border-color':border_color});
            }
        }
    }
    
    // if there was any missing data
    if (missing_data == true) {
        // display the message that refer to that
        $("#" + id_of_element_that_will_display_the_result).html("<p class='info_message'>هناك بيانات مطلوبة</p>");
        // go to top of the page
        //$('html, body').animate({scrollTop: 0}, 'slow'); // we can use milliseconds instead of 'slow' .. like this $('html, body').animate({ scrollTop: 0 }, 1000); .. where 1000 = 1 seconds 
        $('html, body').animate({scrollTop: $("#"+id_of_element_that_will_display_the_result).offset().top}, 'slow'); // we can use milliseconds instead of 'slow' .. like this $('html, body').animate({ scrollTop: 0 }, 1000); .. where 1000 = 1 seconds 

        return false; 
    } else {
        return true;
    }
}



// This function is for submitting data to the apropriate processing file and get the result back
function submit_ajax_data(id_of_form_to_submit, path_of_file_that_holds_processing_code, do_you_use_tinyMCE_editor, id_of_element_that_will_display_the_result){
    // set a loader image to appear while executing the code
    var loader_image = "<img src='img/loader.gif' width='40' alt='loading...' style='margin-bottom: 30px;' />";

    
    // if the user did not determine an element in which we will display the rusult then we will use the element with the id "ajax_result"
    id_of_element_that_will_display_the_result = typeof id_of_element_that_will_display_the_result !== 'undefined' ? id_of_element_that_will_display_the_result : 'ajax_result';
    
    // display the loader image while executing the code
    $("#" + id_of_element_that_will_display_the_result).html(loader_image);

    // For a standard form submission , it's handled by TinyMCE . For an Ajax form submission, you have to do it manually, by calling tinyMCE.triggerSave();
    // the next line is very important for submitting data with ajax, in order to submit content of tinyMCE editor correctly (more info here http://maestric.com/doc/javascript/tinymce_jquery_ajax_form)
    do_you_use_tinyMCE_editor = typeof do_you_use_tinyMCE_editor !== 'undefined' ? do_you_use_tinyMCE_editor : false; // do_you_use_mce_editor shoult hold true of false
    if (do_you_use_tinyMCE_editor == true) {
        tinyMCE.triggerSave(); 
    }

    $.ajax({
        type   : 'POST', 
        url    : path_of_file_that_holds_processing_code, 
        enctype: 'multipart/form-data',
        data   : $('#' + id_of_form_to_submit).serialize(), // more info --> http://www.jstiles.com/Blog/How-To-Submit-a-Form-with-jQuery-and-AJAX
        success: function(response){
            $('#' + id_of_element_that_will_display_the_result).html(response);
        }
    });
    
    // go to top of the page to see the result message
    //$('html, body').animate({scrollTop: 0}, 'slow'); // we can use milliseconds instead of 'slow' .. like this $('html, body').animate({ scrollTop: 0 }, 1000); .. where 1000 = 1 seconds
    $('html, body').animate({scrollTop: $("#"+id_of_element_that_will_display_the_result).offset().top}, 'slow'); // we can use milliseconds instead of 'slow' .. like this $('html, body').animate({ scrollTop: 0 }, 1000); .. where 1000 = 1 seconds 
}

// This function is used for verifying that the user has entered data in a required ( 5 ) fields of a form in order to submitting it
// and we can add more required fields if it was more than 5 as shown in the function
function verify_required_data( id_of_form_to_submit, id_of_error_to_display, id_of_required_field_1, id_of_required_field_2, id_of_required_field_3, id_of_required_field_4, id_of_required_field_5 ) {
    var missing_data = false;
    if ( typeof id_of_required_field_1 != 'undefined' && document.getElementById( id_of_required_field_1 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_1 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_1 ).style.borderColor = '#FF92A7';
    }
    if ( typeof id_of_required_field_2 != 'undefined' && document.getElementById( id_of_required_field_2 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_2 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_2 ).style.borderColor = '#FF92A7';
    }
    if ( typeof id_of_required_field_3 != 'undefined' && document.getElementById( id_of_required_field_3 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_3 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_3 ).style.borderColor = '#FF92A7';
    }
    if ( typeof id_of_required_field_4 != 'undefined' && document.getElementById( id_of_required_field_4 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_4 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_4 ).style.borderColor = '#FF92A7';
    }
    if ( typeof id_of_required_field_5 != 'undefined' && document.getElementById( id_of_required_field_5 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_5 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_5 ).style.borderColor = '#FF92A7';
    }

    if ( missing_data == false ) {
        document.getElementById( id_of_form_to_submit ).submit();
    } else {
        document.getElementById( id_of_error_to_display ).style.visibility = 'visible';
    }
}

function show_reply_section(id_of_section_to_show, id_of_section_to_hide) {
    document.getElementById(id_of_section_to_hide).style.display='none';
    document.getElementById(id_of_section_to_show).style.display='block';
}
