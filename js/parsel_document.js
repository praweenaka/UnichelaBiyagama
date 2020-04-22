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

    document.getElementById('codeText').value = "";
    document.getElementById('pronameText').value = "";
    document.getElementById('typeCombo').value = "";
    document.getElementById('rateText').value = "";
    document.getElementById('unitText').value = "";
    document.getElementById('downPaymentText').value = "";

    getdt();
}

//function print() {
//    var url = "approve_kotEntry.php";
//    url = url + "?Command=" + "save";
//    url = url + "&recipt=" + document.getElementById('grandTot').value;
//    window.open(url, "_blank");
//}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Parsel_Document_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function assign_dt() {
    document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;
}


function getcode(cdata) {


    document.getElementById('ll').value = cdata;
//    document.getElementById('pronameText').value = cdata1;
//    document.getElementById('typeCombo').value = cdata2;
//    document.getElementById('rateText').value = cdata3;
//    document.getElementById('unitText').value = cdata4;
//    document.getElementById('downPaymentText').value = cdata5;


//    if (cdata6 == 'Y') {
//        document.getElementById('active').checked = true;
//    } else {
//        document.getElementById('active').checked = false;
//    }
    window.scrollTo(0, 0);



}

function approveSecurity(cuscode) {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Parsel_Document_data.php";
    url = url + "?Command=" + "update_list";
    url = url + "&code=" + cuscode;

    xmlHttp.onreadystatechange = getcode();
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function view()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
       window.open('Parcel_Transer_Sheet').document.form1.noOfVisitorTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
    //   window.open('ab out:blank').document.body.innerHTML = msg;  
        
        
        self.close();
    }
}



function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('codeText').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('pronameText').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Property Name Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('typeCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Type Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('rateText').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Rate  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('unitText').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Unit Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('downPaymentText').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Down Payment Not Selected</span></div>";
        return false;
    }



    var url = "Parsel_Document_data.php";
    url = url + "?Command=" + "save_item";

//    if (document.getElementById('active').checked == true) {
//        url = url + "&lockitem=Y"; 
//    } else {
//        url = url + "&lockitem=N";
//    }


    url = url + "&code=" + document.getElementById('codeText').value;
    url = url + "&propertyname=" + document.getElementById('pronameText').value;
    url = url + "&type=" + document.getElementById('typeCombo').value;
    url = url + "&rate=" + document.getElementById('rateText').value;
    url = url + "&unit=" + document.getElementById('unitText').value;
    url = url + "&downpayment=" + document.getElementById('downPaymentText').value;


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










