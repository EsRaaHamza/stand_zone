var counter_img=0
function see_poll_result() {
    if ( document.getElementById('normal_poll').style.display == 'block' ) {
        document.getElementById('normal_poll').style.display = 'none';
        document.getElementById('see_poll_result').style.display = 'block';
    } else {
        document.getElementById('see_poll_result').style.display = 'none';
        document.getElementById('normal_poll').style.display = 'block';
    }
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

// // this will redirect to anothe page to prevent inserting data in the database again if the user refresh the page
// or whatever
function redirect_to(path_of_page_to_redirect_to, millisecond_to_redirect_after) {
    setTimeout("document.location.href = '" + path_of_page_to_redirect_to + "';", millisecond_to_redirect_after);
}


function add_new_category(id_of_element_to_populate, name_of_new_textbox) {
    $("#"+id_of_element_to_populate).html("<input type='text' name='" + name_of_new_textbox + "' />");
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




// This function used for printing incoming messages
function printMessage(pagePath,messageId){
    fullPath = pagePath + "?id=" + messageId;
    msg = window.open(fullPath, 'Print_Message', 'scrollbars=yes, resizable=yes, width=800, height=600');
    msg.print();
}




// This function is used for adding a new item to a drop-down-list if the user doesn't find what he wants within the list
function add_new_dropdown_item(dropdown_to_hide, textbox_to_display, value_that_will_hide_dropdown) {
    var element = document.getElementById(dropdown_to_hide);
    if(element.value == value_that_will_hide_dropdown){
        element.style.display='none';
        document.getElementById(textbox_to_display).style.display='inline';
        document.getElementById(textbox_to_display).focus();
    }
}







// This function checks to see if the entered email is valid email or not
function validate_email(id_of_email_textbox, msg_when_email_empty, msg_when_email_invalid) {
//function validate_email(name_of_form, name_of_email_textbox, msg_when_email_empty, msg_when_email_invalid) {
    //var x = document.forms[name_of_form][name_of_email_textbox].value;
    var x = document.getElementById(id_of_email_textbox).value;
    var atpos  = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (x == '') {
        alert(msg_when_email_empty);
        return false;
    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        alert(msg_when_email_invalid);
        return false;
    } else {
        return true;
    }
}


// This function checks to see if the entered email is valid email or not
function check_email(id_of_email_textbox) {
    var x = document.getElementById(id_of_email_textbox).value;
    var atpos  = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        return false;
    } else {
        return true;
    }
}




// This function displays an alert message if value length of a field is smaller than a specific value
function check_length(field_id ,required_length, msg_to_display) {
    if (document.getElementById(field_id).value.length < required_length) {
        alert(msg_to_display);
    }
}




function open_popup_window(path_of_page_to_open, name_of_window, width_of_window, height_of_window){
    window.open(path_of_page_to_open, name_of_window, "scrollbars=yes, resizable=yes, width=" + width_of_window + ", height=" + height_of_window + "");
}





// Content Generator
function add_content(iNumOfPhrases, sPhrase) {
    iNumOfPhrases = (iNumOfPhrases == undefined) ? (2) : (iNumOfPhrases);
    sPhrase = (sPhrase == undefined) ? ('<p>محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، محتوى مناسب  هنا، </p><br />') : (sPhrase);
    for (var i = 0; i < iNumOfPhrases; i++) {
        document.write(sPhrase);
    }
}




// This function is used for verifying that the user has entered data in a required ( 5 ) fields of a form in order to submitting it
// and we can add more required fields if it was more than 5 as shown in the function
function verify_required_data( id_of_form_to_submit, id_of_error_to_display, id_of_required_field_1, id_of_required_field_2, id_of_required_field_3, id_of_required_field_4, id_of_required_field_5, id_of_required_field_6, id_of_required_field_7, id_of_required_field_8) {
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
    if ( typeof id_of_required_field_6 != 'undefined' && document.getElementById( id_of_required_field_6 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_6 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_6 ).style.borderColor = '#FF92A7';
    }
    if ( typeof id_of_required_field_7 != 'undefined' && document.getElementById( id_of_required_field_7 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_7 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_7 ).style.borderColor = '#FF92A7';
    }
    if ( typeof id_of_required_field_8 != 'undefined' && document.getElementById( id_of_required_field_8 ).value == '' ) {
        missing_data = true;
        document.getElementById( id_of_required_field_8 ).style.backgroundColor = '#FAE4E5';
        document.getElementById( id_of_required_field_8 ).style.borderColor = '#FF92A7';
    }

    if ( missing_data == false ) {
        document.getElementById( id_of_form_to_submit ).submit();
    } else {
        document.getElementById( id_of_error_to_display ).style.visibility = 'visible';
    }
}
// this function is for this (theknowledgepedia.com) website in particular
function hide_ad_1(ad_1_id) {
    var x = document.getElementById(ad_1_id);
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}




// This function displays the content that belongs to a specific tab when we click it
function show_tab_content(id_of_selected_tab, id_of_content_to_show, num_of_tabs) {
    for (i = 1; i <= num_of_tabs; i++) {
        document.getElementById('tab_' + i ).style.background = 'url(img/tab-bkg.png) repeat-x left center';
        document.getElementById('tab_' + i ).style.color = '#fff';
        document.getElementById('content_' + i ).style.display = 'none';
    }
    document.getElementById(id_of_selected_tab).style.background = '#fff';
    document.getElementById(id_of_selected_tab).style.color = '#000';
    document.getElementById(id_of_content_to_show).style.display = 'block';
}
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

