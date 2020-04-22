
/* global xmlHttp */

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


    document.getElementById('ref').value = "";
    document.getElementById('date').value = "";
    document.getElementById('user').value = "";
    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescTxt').value = "";
    document.getElementById('qty').value = "";
    document.getElementById('itemd').innerHTML = "";

//    getdt();
}

function save_inv() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Ref No Not Entered</span></div>";
        return false;
    }
    if (document.getElementById('date').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('user').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>User Not Entered</span></div>";
        return false;
    }
    if (document.getElementById('itemd').innerHTML == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Select Items</span></div>";
        return false;
    }



    var url = "bom_data.php";
    url = url + "?Command=" + "save_item";



    url = url + "&ref=" + document.getElementById('ref').value;
    url = url + "&user=" + document.getElementById('user').value;
    url = url + "&date=" + document.getElementById('date').value;
    url = url + "&tempno=" + document.getElementById('ref').value;

    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
//            setTimeout(function () {
//                window.location.reload(1);
//            }, 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function cust(custno)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "bom_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + custno;
    xmlHttp.onreadystatechange = passcusresult_quot;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}


function passcusresult_quot()
{
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("code");
        opener.document.form1.itemCodeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("des");
        opener.document.form1.itemDescTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sug");
//        opener.document.form1.sugar.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("fat");
//        opener.document.form1.fat.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
//        opener.document.getElementById('itemd').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;




        self.close();
    }
}


function add_tmp() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "bom_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp";
    url = url + "&tmpno=" + document.getElementById('ref').value;
    url = url + "&itemCode=" + document.getElementById('itemCodeTxt').value;
    url = url + "&itemDesc=" + document.getElementById('itemDescTxt').value;
    url = url + "&qty=" + document.getElementById('qty').value;
    url = url + "&unit=" + document.getElementById('unit').value;

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

    var url = "bom_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "del_item";
    url = url + "&itemCode=" + cdate;
    url = url + "&tmpno=" + document.getElementById('ref').value;

    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function showarmyresultdel() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemd').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;


        document.getElementById('itemCodeTxt').value = "";
        document.getElementById('itemDescTxt').value = "";
        document.getElementById('qty').value = "";

        document.getElementById('itemDescTxt').focus();

    }
}

function print_pro() {

    var url = "repo_bom_approve.php";
    url = url + "?Command=" + "rep";
    url = url + "&dtfrom=" + document.getElementById('dateFrom').value;
    url = url + "&dtto=" + document.getElementById('dateTo').value;
    url = url + "&lvl=" + document.getElementById('lvlFormCombo').value;
    
    window.open(url, "_blank");

}

function print123() {

    var url = "repo_bom_approve.php";
    url = url + "?Command=" + "app";
    url = url + "&lvl=" + document.getElementById('lvlFormCombo').value;
    
   
    url = url + "&dtfrom=" + document.getElementById('dateFrom').value;
    url = url + "&dtto=" + document.getElementById('dateTo').value;
    window.open(url, "_blank");

}

function printM() {

    var url = "print_merge.php";
    url = url + "?Command=" + "rep";
    url = url + "&tmpno=" + document.getElementById('ref').value;
    url = url + "&date=" + document.getElementById('date').value;
    url = url + "&units=" + document.getElementById('units').value;
    window.open(url, "_blank");

}

function custno(custno)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "production_repo_data.php";
    url = url + "?Command=" + "pass";
    url = url + "&custno=" + custno;
    xmlHttp.onreadystatechange = passcusresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function passcusresult() {

    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("name");
        opener.document.form1.cusTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("code");
        opener.document.form1.cusCodeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sug");
//        opener.document.form1.user.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
//        opener.document.getElementById('itemd').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;




        self.close();
    }

}