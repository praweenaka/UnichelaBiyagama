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
    document.getElementById('seqNoTxt').value = "";
//    document.getElementById('gatePassTxt').value = "";
//    document.getElementById('tStartTxt').value = "";
//    document.getElementById('tFinishTxt').value = "";
//    document.getElementById('dateForm').value = "";
//    document.getElementById('dateTo').value = "";
//    document.getElementById('driverNameTxt').value = "";
//    document.getElementById('vehicleNoTxt').value = "";
//    document.getElementById('driverContactTxt').value = "";
    document.getElementById('radio1').value = "";
    document.getElementById('departFormCombo').value = "";
    document.getElementById('departToCombo').value = "";
    document.getElementById('remark').value = "";


    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemNameTxt').value = "";
    document.getElementById('Qty').value = "";
    document.getElementById('price').value = "";

    document.getElementById('itemdetails').innerHTML = "";

    document.getElementById('approve').value = "0";

    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Parcel_Transer_Data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function assign_dt() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//        document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("idgen");
        document.form1.codeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}


function add_tmp() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "Parcel_Transer_Data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp";
    url = url + "&tmpno=" + document.getElementById('codeTxt').value;
    url = url + "&itemcode=" + document.getElementById('itemCodeTxt').value;
    url = url + "&itemname=" + document.getElementById('itemNameTxt').value;
    url = url + "&qty=" + document.getElementById('Qty').value;
    url = url + "&price=" + document.getElementById('price').value;


    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showarmyresultdel() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
//        document.getElementById('noTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;

//        document.getElementById('noTxt').value = "";
        document.getElementById('itemCodeTxt').value = "";
        document.getElementById('itemNameTxt').value = "";
        document.getElementById('Qty').value = "";
        document.getElementById('price').value = "";

        document.getElementById('price').focus();

    }
}


function del_item(cdate) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Parcel_Transer_Data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "del_item";
    url = url + "&itemcode=" + cdate;
    url = url + "&invno=" + document.getElementById('codeTxt').value;
    url = url + "&tmpno=" + document.getElementById('codeTxt').value;

    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

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
    if (document.getElementById('seqNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Sequence No Not Selected</span></div>";
        return false;
    }


    if (document.getElementById('departFormCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Form  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('departToCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>To Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('remark').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Remark Not Enterd</span></div>";
        return false;
    }

//    var files = $('#file')[0].files;
//    var size = files.length;
//
//    if (size == 0) {
//        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Image Not Enterd</span></div>";
//        return false;
//    }
//
//
//    for (var i = 0, f; f = files[i]; i++) {
//        var name = document.getElementById('file');
//        var alpha = name.files[i];
//        console.log(alpha.name);


    var data = new FormData();
    
    var radio;
    if (document.getElementById('radio1').checked == true) {
        radio = "R";
    }

    if (document.getElementById('radio2').checked == true) {
        radio = "N";
    }

    data.append('Command', "save_item");
    data.append('radio', radio);


    var code = document.getElementById('codeTxt').value;
    var seqno = document.getElementById('seqNoTxt').value;
//        var gatepass = document.getElementById('gatePassTxt').value;
//        var tstart = document.getElementById('tStartTxt').value;
//        var tfinish = document.getElementById('tFinishTxt').value;
//        var dateform = document.getElementById('dateForm').value;
//        var dateto = document.getElementById('dateTo').value;
//        var drivername = document.getElementById('driverNameTxt').value;
//        var vehicleno = document.getElementById('vehicleNoTxt').value;
//        var drivercontact = document.getElementById('driverContactTxt').value;
    var departform = document.getElementById('departFormCombo').value;
    var departto = document.getElementById('departToCombo').value;
    var remark = document.getElementById('remark').value;
    var approve = document.getElementById('approve').value;

    var gtot = document.getElementById('gtot').value;


    var tmpno = document.getElementById('tmpno').value;
    var tmpno = document.getElementById('codeTxt').value;




    data.append('code', code);
    data.append('seqno', seqno);
//        data.append('gatepass', gatepass);
//        data.append('tstart', tstart);
//        data.append('tfinish', tfinish);
//        data.append('dateform', dateform);
//        data.append('dateto', dateto);
//        data.append('drivername', drivername);
//        data.append('vehicleno', vehicleno);
//        data.append('drivercontact', drivercontact);
    data.append('departform', departform);
    data.append('departto', departto);
    data.append('remark', remark);


    data.append('gtot', gtot);
    data.append('approve', approve);

    data.append('tmpno', tmpno);
    data.append('tmpno', tmpno);


//        data.append('file', alpha);

    $.ajax({
        url: 'Parcel_Transer_Data.php',
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (msg) {
            if (msg == "Saved") {
                document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
                newent();
            } else {
                document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + msg + "</span></div>";
            }
        }
    });

    newent();
}


function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {


    }
}




