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

//    document.getElementById('nameTxt').value = "";
    document.getElementById('emailTxt').value = "";
    document.getElementById('departmentcombo').value = "";

    getdt();
}

function deleteproduct() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "approve_by_data.php";
    url = url + "?Command=" + "delete";


    url = url + "&nameTxt=" + document.getElementById('nameTxt').value;

    xmlHttp.onreadystatechange = dele;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}



function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "approve_by_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function assign_dt() {
    document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {



    }
}




function getcode(cdata, cdata1, cdata2) {


    document.getElementById('nameTxt').value = cdata;
    document.getElementById('emailTxt').value = cdata1;
    document.getElementById('departmentcombo').value = cdata2;

    window.scrollTo(0, 0);



}
//function print() {
//    var url = "Mis_Income_Print.php";
//    url = url + "?Command=" + "save";
//    url = url + "&recipt=" + document.getElementById('reciptNoTxt').value;
//    window.open(url, "_blank");
//}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('nameTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name  Not Enterd</span></div>";
        return false;
    }
//    if (document.getElementById('emailTxt').value == "") {
//        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Email Not Enterd</span></div>";
//        return false;
//    }
//    if (document.getElementById('departmentcombo').value == "") {
//        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department Not Enterd</span></div>";
//        return false;
//    }


    var url = "approve_by_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&nameTxt=" + document.getElementById('nameTxt').value;
    url = url + "&emailTxt=" + document.getElementById('emailTxt').value;
    url = url + "&departmentcombo=" + document.getElementById('departmentcombo').value;


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

//function update() {
//
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//
//    var url = "approve_by_data.php";
//    url = url + "?Command=" + "update";
//
//
//    url = url + "&nameTxt=" + document.getElementById('nameTxt').value;
//    url = url + "&emailTxt=" + document.getElementById('emailTxt').value;
//    url = url + "&departmentcombo=" + document.getElementById('departmentcombo').value;
//
////alert(url);
//
//// xmlHttp.onreadystatechange = update;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//}



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


function dele() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Delete") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Deleted</span></div>";
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}



