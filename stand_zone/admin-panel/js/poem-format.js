var side, side1, side2, spaceWidth, extendWidth, dif, pType = 0;
pLine = 0, pAlign = "center", pUse = 0;


var let1 = "&#1575;&#1571;&#1573;&#1570;&#1572;&#1569;&#1583;&#1584;&#1585;&#1586;&#1608;&#1577;&#1609;"
var let2 = "&#1575;&#1571;&#1573;&#1570;&#1572;&#1574;&#1576;&#1578;&#1579;&#1580;&#1581;&#1582;&#1583;&#1584;&#1585;&#1586;&#1587;&#1588;&#1589;&#1590;&#1591;&#1592;&#1593;&#1594;&#1601;&#1602;&#1603;&#1604;&#1605;&#1606;&#1607;&#1608;&#1610;&#1577;&#1609;";
var let3 = "&#1614;&#1611;&#1615;&#1612;&#1616;&#1613;&#1618;&#1617;";

//poetry
var fname = "Simplified Arabic", fsize = 14, fbold = false, fitalic = false, fcolor = "black";
var bkcolor = "", bkimage = "";  
var obstyle = "double", obsize=4, obcolor="gray";
var ibsize = 1, ibcolor = "gray", ibchar = "";    

//title
var fname2 = "Simplified Arabic", fsize2 = 14, fbold2 = true, fitalic2 = false, fcolor2 = "black";
var bkcolor2 = "", bkimage2 = "";
var obstyle2 = "double", obsize2=4, obcolor2="gray";

//poet
var fname3 = "Simplified Arabic", fsize3 = 12, fbold3 = true, fitalic3 = false, fcolor3 = "black";
var aAlign = "left";

for (seli = 1; seli <= 50; seli++) { 
    var oOption = document.createElement("OPTION");
    selImg.options.add(oOption);
    oOption.innerText = seli;
    var oOption = document.createElement("OPTION");
    selImg2.options.add(oOption);
    oOption.innerText = seli;
}

function showFormat(i) {    
    tblPoet.style.display = (i==0)?"block":"none";
    tblTitle.style.display = (i==1)?"block":"none";
    tblPoetry.style.display = (i==2)?"block":"none";  
}

function selImages(ob) {           
    var i = ob.selectedIndex, img = "";
    if (i == 0)
        img = "";
    else if (i == 1) {
        img = window.prompt("Enter an image url:", "");
        if (img == null) img = "";
    }
    else
        img = "http://www.alawi.8m.net/poetry/images/" + ob.options(i).text + ".gif";
    return img;  
}

function selectFont(ob) {
    var i = ob.selectedIndex, f = "";
    if (i == ob.length - 1) {
        f = window.prompt("Enter a font name :", "");
        if (f == null) f = "";
    }
    else
        f = ob.options(i).text;
    return f;  
}


function getColor(t, f) {
    var c;
    c = showModalDialog("colors.htm","","help:no; status:no; dialogHeight:290px; dialogWidth:450px");
    if (c == "-1" || (f == 0 && c == "")){
         $('#get_color').val(t);
        return t;
}
    else{
           $('#get_color').val(t);
        return c; 
    }
}



function removespace(t) {
    var i, sp = true, s = "";
    for (i = 0; i < t.length; i++) 
        if (t.charAt(i) == " " || t.charAt(i) == "\n") {
            if (!sp) s += t.charAt(i);        
            sp = true;
        }  
        else {
            s += t.charAt(i);
            sp = false;
        }          
    return s;
}

function trim(t) {
    var i, f=false;
    for (i = 0; i < t.length ; i++)
        if (t.charAt(i) != " ") {
            f=true;
            break;
        }
    if (!f) return "";      
    for (i = 0; t.charAt(i) == " "; i++);
    t = t.substr(i);
    for (i = t.length-1; t.charAt(i) == " "; i--);
    t = t.substr(0, i+1);
    return t;
}

function textWidth(t) {
    getWidth.innerHTML= t.replace(/ /gi, "&nbsp;");
    return ((getWidth.clientWidth - 2) * 0.75);
}

function Replace(t, s1, s2, c) {
    var i = 0, len1 = s1.length;
    len2 = s2.length;
    while (1) {
        i = t.indexOf(s1, i);
        if (i == -1)
            break;
        else {
            t = t.substr(0, i) + s2 + t.substr(i+len1);
            i += len2;
            if (--c == 0) break;
        }        
    }
    return t
}

function space(n) {
    if (n == 1)
        return " ";
    return  " " + space(n-1);
}

function createExtend(t) {
    var s = "";
    var befor = "", ch = "";
    t = t.replace(/الله/gi,"@");
    for (i = 0; i < t.length; i++) {
        ch = t.charAt(i);
        if (let2.search(ch.charCodeAt(0)) != -1 || ch.charCodeAt(0) == 1569) {        
            if (befor != "")
                if (let1.search(befor.charCodeAt(0)) == -1 && let2.search(ch.charCodeAt(0)) != -1 && (befor.charCodeAt(0) != 1604 || "&#1575;&#1571;&#1573;&#1570;".search(ch.charCodeAt(0)) == -1))
                    s += "^";
            befor = ch;
            s += ch;
        }
        else {
            s += ch;
            if (let3.search(ch.charCodeAt(0)) == -1)
                befor = "";
        }        
    }
    s = s.replace(/@/gi,"الله");
    return s;
}

function extend(n) {
    if (n == 1)
        return "ـ";
    return  "_;" + extend(n-1);
} 

function justifyBYextend(t, w) {
    var sp = 0, i, d;
    t = createExtend(t);    
    for (i = 0; i < t.length; i++)
        sp += (t.charAt(i) == "^");
    if (sp == 0) return t;
    d = Math.floor((w - textWidth(t.replace(/\^/gi,""))) / extendWidth);
    n = Math.floor(d / sp);
    if (n > 0)
        t = t.replace(/\^/gi, extend(n)+"^");
    if (d % sp > 0)
        t = Replace(t, "^", extend(1), d % sp);
    t = t.replace(/\^/gi, ""); 
    return t;
}

function justifyBYspace(t, w) {
    var sp = 0, i, d, tw;
    for (i = 0; i < t.length; i++)
        sp += (t.charAt(i) == " ");
    if (sp == 0) return justifyBYextend(t, w);
    d = Math.floor((w - textWidth(t)) / spaceWidth);
    n = Math.floor(d / sp);
    if (n > 0)
        t = t.replace(/ /gi, space(n + 1));
    if (d % sp > 0)
        t = Replace(t, space(n + 1), space(n + 2), d % sp);
    tw = w - textWidth(t);
    if (tw - dif > 0) {
        i = t.lastIndexOf(" ");
        if (i != 0)
            t = t.substr(0, i+1) + "<span^style='font-size:1pt;letter-spacing:" +
            tw + "pt;visibility:hidden;'>ii</span>" + t.substr(i+1);
    }
    return t; 
}

function justify(t, w) {
    if (pUse) t = justifyBYextend(t, w);    
    return justifyBYspace(t, w);  
}

function doJustify() {
    var L, R, MTW, i, j, cr, txt = poetry.value.replace(/\^/gi,"").replace(/@/gi,"");
    getWidth.parentElement.style.font = (fitalic?"italic":"normal")+" normal "+(fbold?"bold ":"normal ")+fsize+"pt "+fname;        
    getWidth.innerHTML = "<span style='font-size:1pt;letter-spacing:normal'>ii</span>";
    dif = (getWidth.clientWidth) * 0.75;
    extendWidth = textWidth("&#1575;" + "&#1600;&#1600;" + "&#1575;");
    extendWidth -= textWidth("&#1575;" + "&#1600;" + "&#1575;");
    spaceWidth = textWidth("&#1575;" + "&nbsp;&nbsp;" + "&#1575;");
    spaceWidth -= textWidth("&#1575;" + "&nbsp;" + "&#1575;");
    txt += "\r";
    cr = 0;
    j = 0;    
    MTW = 0;
    while (1) {
        cr = txt.indexOf("\r", cr);
        if (cr == -1) break;
        i = txt.indexOf("=", j);
        if (i == -1 || i > cr) i = cr;
        L = removespace(trim(txt.substring(j, i)));
        if (textWidth(L) > MTW) MTW = textWidth(L);
        R = removespace(trim(txt.substring(i+1, cr)));
        if (textWidth(R) > MTW) MTW = textWidth(R);
        cr += 2
        j = cr;      
    }

    side1 = "";
    side2 = "";
    side = "";
    cr = 0;
    j = 0;
    var br = ((pLine == 0)?"":"<br>");
    while (1) {
        cr = txt.indexOf("\r", cr);
        if (cr == -1) break;
        if (trim(txt.substring(j, cr)) != "") {
            i = txt.indexOf("=", j);        
            if (i == -1 || i > cr) i = cr;
            L = removespace(trim(txt.substring(j, i)));
            R = removespace(trim(txt.substring(i+1, cr)));
            if (justifyYN.status && L != "") 
                L = justify(L, MTW);          
            L = L.replace(/ /gi, "&nbsp;");
            L = L.replace(/\^/gi, " ");

            if (justifyYN.status && R != "") 
                R = justify(R, MTW);
            R = R.replace(/ /gi, "&nbsp;");
            R = R.replace(/\^/gi, " ");

            if (pType == 0) {
                side1 += L + "<br>" + br;
                side2 += R + "<br>" + br;
                side += ibchar + "<br>" + br;
            }         
            else if (pType == 1) {
                side1 += "<div style='margin-left:"+Math.round(MTW)+"pt'>" + L + "</div>" + br;
                side1 += "<div style='margin-right:"+Math.round(MTW)+"pt'>" + R + "</div>" + br;
            }
            else if (pType == 2) {
                side1 += "<div style='margin-left:"+Math.floor(MTW/1.5)+"pt'>" + L + "</div>" + br;
                side1 += "<div style='margin-right:"+Math.floor(MTW/1.5)+"pt'>" + R + "</div>" + br;
            }
            else if (pType == 3) {
                side1 += L + br + "<br>" + "<bt>" + R + "<br>" + "<br>" ;
            }
            else {          
                if (R != "\r") {
                    side1 += "<tr><td width='0' align='right' valign='top' nowrap>" + L  + "</td>";
                    side1 += "<td width='10px' align='center' nowrap>" + ibchar + "</td>";             
                    side1 += "<td width='0' align='left' valign='top' nowrap>" + R + "</td></tr>";
                }  
                else
                    side1 += "<tr><td align='center' colspan='3' nowrap>" + L + "</td></tr>";
            }
        }
        else {
            side1 += "<br>";
            side2 += "<br>";
            side += "<br>";
        }
        cr += 2;
        j = cr;      
    }
    if (pType == 0 || pType == 3) {
        side1 = side1.substr(0, side1.lastIndexOf("<br>"+br));
        side2 = side2.substr(0, side2.lastIndexOf("<br>"+br));
        side = side.substr(0, side.lastIndexOf("<br>"+br));
    } else if (pLine != 0 && ptype != 4) {
        side1 = side1.substr(0, side1.lastIndexOf(br));
        side2 = side2.substr(0, side2.lastIndexOf(br));
        side = side.substr(0, side.lastIndexOf(br));
    }
    ToHTML();
}

function ToHTML() {
    var poetstyle, titlestyle, poetrystyle, middlestyle="";

    poetstyle = "font:"+(fitalic3?"italic":"normal") + " normal " + (fbold3?"bold ":"normal ") + fsize3 + "pt " + fname3;
    poetstyle += "; color:" + fcolor3;

    titlestyle = "; font:"+(fitalic2?"italic":"normal") + " normal " + (fbold2?"bold ":"normal ") + fsize2 + "pt " + fname2;
    titlestyle += "; color:" + fcolor2;
    titlestyle += "; background-image:url(" + bkimage2 + "); background-color:" + bkcolor2;
    titlestyle += "; border:"+ obsize2 +" " + obstyle2 +" " + obcolor2;

    poetrystyle = "font:"+(fitalic?"italic":"normal") + " normal " + (fbold?"bold ":"normal ") + fsize + "pt " + fname;
    poetrystyle += "; color:" + fcolor;
    poetrystyle += "; background-image:url(" + bkimage + "); background-color:" + bkcolor;
    poetrystyle += "; border:" + obsize +" " + obstyle +" " + obcolor;

    if (trim(ibchar)=="")
        middlestyle = "border:" + ibsize + "; border-right-style: solid; border-right-color:" + ibcolor;
    else
        middlestyle = "color:" + ibcolor;

    HTML = "<table cellspacing='20' cellpadding='0' dir='rtl' border='0' width='0' style='" + poetrystyle + "'>";
    if (trim(subject.value) != "") {      
        HTML += "<tr><td align='center' colspan='3' style='" + titlestyle + "' nowrap>" + subject.value.replace(/\r/gi,"<br>");
        if (trim(poet.value) != "")
            HTML += "<div align='" + aAlign + "' style='" + poetstyle + "'>&nbsp;" + poet.value + "&nbsp;</div>";
        HTML += "</td></tr>";
    }
    if (pType == 4)
        HTML += side1 + "</table>";
    else {  
        HTML += "<tr><td width='0' align='" + ((pType!=0)?"center":"right") +"' valign='top' nowrap>" + side1 + "</td>";    
        if (pType == 0 && poetry.value.search("=") != -1) {
            HTML += "<td width='4' align='center' valign='top' style='" + middlestyle + "' nowrap>" + side + "</td>";
            HTML += "<td width='0' align='left' valign='top' nowrap>" + side2 + "</td>";
        }
        HTML += "</tr></table>";
    }  
    hear.align = pAlign;
    hear.innerHTML = HTML;
    poetryHTML.value = "<div align='" + pAlign + "'>" + HTML + "</div>";
}
