function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";

}

function newent() {

    document.getElementById('codeTxt').value = "";
    document.getElementById('brandCombo').value = "";
    document.getElementById('descriptionTxt').value = "";
    document.getElementById('priceTxt').value = "";
    document.getElementById('manuYearTxt').value = "";
    document.getElementById('colorTxt').value = "";
    document.getElementById('wrntyTxt').value = "";
    document.getElementById('serialTxt').value = "";
    document.getElementById('invTxt').value = "";
    document.getElementById('fileTxt').value = "";
    document.getElementById('morterNoTxt').value = "";
    document.getElementById('plantNoTxt').value = "";
    document.getElementById('supplierCombo').value = "";
    document.getElementById('conTxt').value = "";
    document.getElementById('departCombo').value = "";



    getdt();

}
function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "item_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function assign_dt() {

    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
    document.form1.codeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

}
function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('codeTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('brandCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Description Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('descriptionTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Value Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('priceTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('manuYearTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Description Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('colorTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Value Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('wrntyTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('serialTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Serial Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('invTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Value Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('fileTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('morterNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Morter Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('plantNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plant Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('supplierCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('conTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Description Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('departCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Value Not Enterd</span></div>";
        return false;
    }



    var url = "item_data.php";
    url = url + "?Command=" + "save_item";


    url = url + "&code=" + document.getElementById('codeTxt').value;
    url = url + "&brand=" + document.getElementById('brandCombo').value;
    url = url + "&descri=" + document.getElementById('descriptionTxt').value;
    url = url + "&price=" + document.getElementById('priceTxt').value;
    url = url + "&manuyear=" + document.getElementById('manuYearTxt').value;
    url = url + "&color=" + document.getElementById('colorTxt').value;
    url = url + "&wranty=" + document.getElementById('wrntyTxt').value;
    url = url + "&serial=" + document.getElementById('serialTxt').value;
    url = url + "&inv=" + document.getElementById('invTxt').value;
    url = url + "&file=" + document.getElementById('fileTxt').value;
    url = url + "&morter=" + document.getElementById('morterNoTxt').value;
    url = url + "&plant=" + document.getElementById('plantNoTxt').value;
    url = url + "&supplier=" + document.getElementById('supplierCombo').value;
    url = url + "&con=" + document.getElementById('conTxt').value;
    url = url + "&depart=" + document.getElementById('departCombo').value;



    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

//
//function getbycode(cdata) {
//
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//
//    var url = "item_data.php";
//    url = url + "?Command=" + "getdt";
//
//    url = url + "&ls=" + cdata;
//
//    url = url + "&txt_code=" + document.getElementById('txt_code').value;
//    url = url + "&txt_dep=" + document.getElementById('txt_dep').value;
//
//    xmlHttp.onreadystatechange = assign_dt;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//
//}







