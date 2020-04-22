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

    document.getElementById('itemcodeTxt').value = "";
    document.getElementById('menuCombospecialType').value = "Breakfast";
    document.getElementById('menudescriptionTxt').value = "";
//    document.getElementById('menuComboflag').value = "Special";
    document.getElementById('priceTxt').value = "";

    document.getElementById('itemdetails').innerHTML = "";


    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMasterSpecial_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";


    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function assign_dt() {


    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.form1.itemcodeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
    }
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


function add_tmp() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMasterSpecial_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp";
    url = url + "&tmpno=" + document.getElementById('itemcodeTxt').value;
    url = url + "&menudesc=" + document.getElementById('menudescriptionTxt').value;
    url = url + "&mealname=" + document.getElementById('mealnameTxt').value;
    url = url + "&menudate=" + document.getElementById('menuCombospecialdate').value;
    url = url + "&type=" + document.getElementById('typecombo').value;



    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function del_item(cdate) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMasterSpecial_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "del_item";
    url = url + "&mealname=" + cdate;
    url = url + "&invno=" + document.getElementById('itemcodeTxt').value;
    url = url + "&tmpno=" + document.getElementById('itemcodeTxt').value;

    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function showarmyresultdel() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
        document.getElementById('item_count').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('mealnameTxt').value = "";



    }
}



function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('itemcodeTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('menuCombospecialType').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Menu Name Not Selected</span></div>";
        return false;
    }
    

    if (document.getElementById('priceTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Price Not Enterd</span></div>";
        return false;
    }




    var url = "food_MenuMasterSpecial_data.php";
    url = url + "?Command=" + "save_item";

//    if (document.getElementById('active').checked == true) {
//        url = url + "&lockitem=Y"; 
//    } else {
//        url = url + "&lockitem=N";
//    }

    url = url + "&itemcode=" + document.getElementById('itemcodeTxt').value;
    url = url + "&mealtype=" + document.getElementById('menuCombospecialType').value;
    url = url + "&price=" + document.getElementById('priceTxt').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;
    url = url + "&tmpno=" + document.getElementById('itemcodeTxt').value;
    url = url + "&price=" + document.getElementById('priceTxt').value;
//    url = url + "&menuComboflag=" + document.getElementById('menuComboflag').value;
    url = url + "&type=" + document.getElementById('typecombo').value;

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



function double() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMasterSpecial_data.php";
    url = url + "?Command=" + "doubledata";
    url = url + "&tmpno=" + document.getElementById('itemcodeTxt').value;
    url = url + "&itemcode=" + document.getElementById('itemcodeTxt').value;

//    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}




