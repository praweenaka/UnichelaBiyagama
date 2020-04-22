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
    document.getElementById('serialTxt').value = "";
    document.getElementById('styleTxt').value = "";
    document.getElementById('itemNameTxt').value = "";
    document.getElementById('colorCombo').value = "";
    document.getElementById('catCombo').value = "";
    document.getElementById('sizeCombo').value = "";
    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Item_Master_data.php";
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


function getcode(cdata, cdata1, cdata2, cdata3, cdata4, cdata5) {


    document.getElementById('codeText').value = cdata;
    document.getElementById('pronameText').value = cdata1;
    document.getElementById('typeCombo').value = cdata2;
    document.getElementById('rateText').value = cdata3;
    document.getElementById('unitText').value = cdata4;
    document.getElementById('downPaymentText').value = cdata5;


    if (cdata6 == 'Y') {
        document.getElementById('active').checked = true;
    } else {
        document.getElementById('active').checked = false;
    }
    window.scrollTo(0, 0);



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
    if (document.getElementById('serialTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Serial No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('styleTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Style No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('itemNameTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Name Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('colorCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Color Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('catCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Categoery  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('sizeCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Size Not Enterd</span></div>";
        return false;
    }
    



    var url = "Item_Master_data.php";
    url = url + "?Command=" + "save_item";

//    if (document.getElementById('active').checked == true) {
//        url = url + "&lockitem=Y"; 
//    } else {
//        url = url + "&lockitem=N";
//    }

    url = url + "&code=" + document.getElementById('codeTxt').value;
    url = url + "&serialno=" + document.getElementById('serialTxt').value;
    url = url + "&styleno=" + document.getElementById('styleTxt').value;
    url = url + "&itemname=" + document.getElementById('itemNameTxt').value;
    url = url + "&color=" + document.getElementById('colorCombo').value;
    url = url + "&cat=" + document.getElementById('catCombo').value;
    url = url + "&size=" + document.getElementById('sizeCombo').value;

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




