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
function mail($to, $subject, $body) {

    $to = "praweenakahemachandra@gmail.com";
    $subject = "Hi!";
    $body = "Hi,\n\nHow are you?";
    if (mail($to, $subject, $body)) {
        echo("<p>Email successfully sent!</p>");
    } else {
        echo("<p>Email delivery failed…</p>");
    }

}


function newent() {

    document.getElementById('codeTxt').value = "";
    document.getElementById('tsNoTxt1').value = "";
    document.getElementById('gatePassTxt1').value = "";
    document.getElementById('tStartTxt1').value = "";
    document.getElementById('tFinishTxt1').value = "";
    document.getElementById('dateForm1').value = "";
    document.getElementById('dateTo1').value = "";
    document.getElementById('driverNameTxt').value = "";
    document.getElementById('vehicleNoTxt').value = "";
    document.getElementById('driverContactTxt').value = "";
    document.getElementById('radio1').value = "";
    document.getElementById('departFormCombo1').value = "";
    document.getElementById('departToCombo1').value = "";
    document.getElementById('remark1').value = "";


    document.getElementById('plantNoTxt').value = "";
    document.getElementById('serialNoTxt').value = "";
    document.getElementById('morterNoTxt').value = "";

    document.getElementById('itemdetails').innerHTML = "";



//    getdt();
}

function print() {
    var url = "repo_Approve_Security.php";
    url = url + "?Command=" + "rep";
    url = url + "&code=" + document.getElementById('codeTxt').value;
    url = url + "&tallyNo=" + document.getElementById('tsNoTxt1').value;
    url = url + "&gatepass=" + document.getElementById('gatePassTxt1').value;
    url = url + "&tstart=" + document.getElementById('tStartTxt1').value;
    url = url + "&tfinish=" + document.getElementById('tFinishTxt1').value;
    url = url + "&dateform=" + document.getElementById('dateForm1').value;
    url = url + "&dateto=" + document.getElementById('dateTo1').value;
    url = url + "&drivername=" + document.getElementById('driverNameTxt').value;
    url = url + "&vehicleno=" + document.getElementById('vehicleNoTxt').value;
    url = url + "&drivercontact=" + document.getElementById('driverContactTxt').value;

    url = url + "&departform=" + document.getElementById('departFormCombo1').value;
    url = url + "&departto=" + document.getElementById('departToCombo1').value;
    url = url + "&remark=" + document.getElementById('remark1').value;
    window.open(url, "_blank");
}





function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Approve_Security_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

//function ApproveOrder() {
//    
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//    
//    var url = "approve_kotEntry_data.php";
//    url = url + "?Command=" + "approve";
//    
//    url = url + "&eno=" + document.getElementById('entryNoTxt1').value;
//
//
//    url = url + "&remark=" + document.getElementById('remark1').value;
////    url = url + "&personName=" + document.getElementById('nameOfPersonTxt1').value;
////    url = url + "&visitorType=" + document.getElementById('visitorTypeCombo').value;
////    url = url + "&department=" + document.getElementById('departmentCombo').value;
////    url = url + "&visitorName=" + document.getElementById('nameOfVisitorTxt').value;
////    url = url + "&visitorNo=" + document.getElementById('noOfVisitorTxt').value;
//
//    xmlHttp.onreadystatechange = salessaveresult;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//}



function assign_dt() {

    document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.form1.codeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}


function getcode(cdata, cdata1, cdata2, cdata3, cdata4, cdata5, cdata6) {


    document.getElementById('billNoTxt').value = cdata;
    document.getElementById('nameText').value = cdata1;
    document.getElementById('addressText').value = cdata2;
    document.getElementById('telephoneText').value = cdata3;
    document.getElementById('emailText').value = cdata4;
    document.getElementById('nicText').value = cdata5;
    document.getElementById('accNoText').value = cdata6;

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


    var url = "Approve_Security_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp";
    url = url + "&tmpno=" + document.getElementById('codeTxt').value;
    url = url + "&plantno=" + document.getElementById('plantNoTxt').value;
    url = url + "&serialno=" + document.getElementById('serialNoTxt').value;
    url = url + "&morterno=" + document.getElementById('morterNoTxt').value;


    xmlHttp.onreadystatechange = showarmyresultdelll;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}





function showarmyresultdelll() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
//        document.getElementById('noTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
//        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;

//        document.getElementById('noTxt').value = "";
        document.getElementById('plantNoTxt').value = "";
        document.getElementById('serialNoTxt').value = "";
        document.getElementById('morterNoTxt').value = "";


        document.getElementById('plantNoTxt').focus();

    }
}





function del_item(cdate) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "Approve_Security_data.php";
    url = url + "?Command=" + "set";
    url = url + "&Command1=" + "del_item";
    url = url + "&itemCode=" + cdate;
    url = url + "&invno=" + document.getElementById('codeTxt').value;
    url = url + "&tmpno=" + document.getElementById('codeTxt').value;

    xmlHttp.onreadystatechange = showarmyresultdelll;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

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
    if (document.getElementById('tsNoTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Tally No Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('gatePassTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Gate Pass No  Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('tStartTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>T Start  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('tFinishTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>T Finish Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('dateForm1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Form Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('dateTo1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date To Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('driverNameTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Driver Name Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('vehicleNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('driverContactTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Contact No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('departFormCombo1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department Form  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('departToCombo1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department To Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('remark1').value == "") {
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
        var tallyNo = document.getElementById('tsNoTxt1').value;
        var gatepass = document.getElementById('gatePassTxt1').value;
        var tstart = document.getElementById('tStartTxt1').value;
        var tfinish = document.getElementById('tFinishTxt1').value;
        var dateform = document.getElementById('dateForm1').value;
        var dateto = document.getElementById('dateTo1').value;
        var drivername = document.getElementById('driverNameTxt').value;
        var vehicleno = document.getElementById('vehicleNoTxt').value;
        var drivercontact = document.getElementById('driverContactTxt').value;
        var departform = document.getElementById('departFormCombo1').value;
        var departto = document.getElementById('departToCombo1').value;
        var remark = document.getElementById('remark1').value;
        var approve = document.getElementById('approve').value;

        var tmpno = document.getElementById('tmpno').value;
        var tmpno = document.getElementById('codeTxt').value;



        data.append('code', code);
        data.append('tallyNo', tallyNo);
        data.append('gatepass', gatepass);
        data.append('tstart', tstart);
        data.append('tfinish', tfinish);
        data.append('dateform', dateform);
        data.append('dateto', dateto);
        data.append('drivername', drivername);
        data.append('vehicleno', vehicleno);
        data.append('drivercontact', drivercontact);
        data.append('departform', departform);
        data.append('departto', departto);
        data.append('remark', remark);
        data.append('approve', approve);


        data.append('tmpno', tmpno);
        data.append('tmpno', tmpno);


//        data.append('file', alpha);

        $.ajax({
            url: 'Approve_Security_data.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (msg) {
                if (msg == "Saved") {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
                    setTimeout(function () {
                        window.location.href = 'home.php?url=Security_Approval';
                    }, 500);
                    newent();
                } else {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + msg + "</span></div>";
                }
            }
        });

        newent();
//    }

}


function cancel_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('codeTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('tsNoTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Tally No Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('gatePassTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Gate Pass No  Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('tStartTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>T Start  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('tFinishTxt1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>T Finish Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('dateForm1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Form Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('dateTo1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date To Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('driverNameTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Driver Name Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('vehicleNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('driverContactTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Contact No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('departFormCombo1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department Form  Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('departToCombo1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department To Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('remark1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Remark Not Enterd</span></div>";
        return false;
    }

    var files = $('#file')[0].files;
    var size = files.length;

    if (size == 0) {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Image Not Enterd</span></div>";
        return false;
    }
    for (var i = 0, f; f = files[i]; i++) {
        var name = document.getElementById('file');
        var alpha = name.files[i];
        console.log(alpha.name);


        var data = new FormData();

        var radio;
        if (document.getElementById('radio1').checked == true) {
            radio = "R";
        }

        if (document.getElementById('radio2').checked == true) {
            radio = "N";
        }

        data.append('Command', "cancel_item");

        data.append('radio', radio);

        var code = document.getElementById('codeTxt').value;
        var tallyNo = document.getElementById('tsNoTxt1').value;
        var gatepass = document.getElementById('gatePassTxt1').value;
        var tstart = document.getElementById('tStartTxt1').value;
        var tfinish = document.getElementById('tFinishTxt1').value;
        var dateform = document.getElementById('dateForm1').value;
        var dateto = document.getElementById('dateTo1').value;
        var drivername = document.getElementById('driverNameTxt').value;
        var vehicleno = document.getElementById('vehicleNoTxt').value;
        var drivercontact = document.getElementById('driverContactTxt').value;
        var departform = document.getElementById('departFormCombo1').value;
        var departto = document.getElementById('departToCombo1').value;
        var remark = document.getElementById('remark1').value;


        var tmpno = document.getElementById('tmpno').value;
        var tmpno = document.getElementById('codeTxt').value;



        data.append('code', code);
        data.append('tallyNo', tallyNo);
        data.append('gatepass', gatepass);
        data.append('tstart', tstart);
        data.append('tfinish', tfinish);
        data.append('dateform', dateform);
        data.append('dateto', dateto);
        data.append('drivername', drivername);
        data.append('vehicleno', vehicleno);
        data.append('drivercontact', drivercontact);
        data.append('departform', departform);
        data.append('departto', departto);
        data.append('remark', remark);


        data.append('tmpno', tmpno);
        data.append('tmpno', tmpno);


        data.append('file', alpha);

        $.ajax({
            url: 'Approve_Security_data.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (msg) {
                if (msg == "Saved") {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
                    setTimeout(function () {
                        window.location.href = 'home.php?url=Security_Approval';
                    }, 500);
                    newent();
                } else {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + msg + "</span></div>";
                }
            }
        });

        newent();
    }

}



function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

    }
}







