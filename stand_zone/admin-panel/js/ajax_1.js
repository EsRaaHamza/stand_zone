function show_sub_category(str, column, id_of_content_area) {
    if (str.length == 0) {
        //document.getElementById("sub_category_content").innerHTML = "";
        return;
    } else {
        var xmlhttp;
        
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id_of_content_area).innerHTML = xmlhttp.responseText;
            }
        }

        //xmlhttp.open("GET", "get_sub_categories.php?q=" + str + "&column=" + column, true);
        //xmlhttp.send();
        
        xmlhttp.open("POST", "get_sub_categories.php", true);
        // To POST data like an HTML form, add an HTTP header with setRequestHeader(). Specify the data you want to send in the send() method:
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("q=" + str + "&column=" + column);
    }
}



function show_sub_category_2(str, column, id_of_content_area) {
    if (str.length == 0) {
        //document.getElementById("sub_category_content").innerHTML = "";
        return;
    } else {
        var xmlhttp;
        
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id_of_content_area).innerHTML = xmlhttp.responseText;
            }
        }

        //xmlhttp.open("GET", "get_sub_categories_2.php?q=" + str + "&column=" + column, true);
        //xmlhttp.send();

        xmlhttp.open("POST", "get_sub_categories_2.php", true);
        // To POST data like an HTML form, add an HTTP header with setRequestHeader(). Specify the data you want to send in the send() method:
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("q=" + str + "&column=" + column);
    }
}
///sub categories three


function show_sub_category_3(str, column, id_of_content_area) {
    if (str.length == 0) {
        //document.getElementById("sub_category_content").innerHTML = "";
        return;
    } else {
        var xmlhttp;
        
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id_of_content_area).innerHTML = xmlhttp.responseText;
            }
        }

        //xmlhttp.open("GET", "get_sub_categories_2.php?q=" + str + "&column=" + column, true);
        //xmlhttp.send();

        xmlhttp.open("POST", "get_sub_categories_3.php", true);
        // To POST data like an HTML form, add an HTTP header with setRequestHeader(). Specify the data you want to send in the send() method:
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("q=" + str + "&column=" + column);
    }
}


///sub categories four


function show_sub_category_4(str, column, id_of_content_area) {
    if (str.length == 0) {
        //document.getElementById("sub_category_content").innerHTML = "";
        return;
    } else {
        var xmlhttp;
        
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id_of_content_area).innerHTML = xmlhttp.responseText;
            }
        }

        //xmlhttp.open("GET", "get_sub_categories_2.php?q=" + str + "&column=" + column, true);
        //xmlhttp.send();

        xmlhttp.open("POST", "get_sub_categories_4.php", true);
        // To POST data like an HTML form, add an HTTP header with setRequestHeader(). Specify the data you want to send in the send() method:
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("q=" + str + "&column=" + column);
    }
}




function show_loader (id_of_element_to_show_loader_at) {
    document.getElementById(id_of_element_to_show_loader_at).innerHTML = document.getElementById(id_of_element_to_show_loader_at).innerHTML + "<img src='img/loader.gif' style='float: left; margin: 8px 0 0 0'>"
}