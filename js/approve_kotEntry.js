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


    document.getElementById('entryNoTxt').value = "";
//    document.getElementById('entryDate').value = "";
    document.getElementById('visitorTypeCombo').value = "Standred Visit";
    document.getElementById('departmentCombo').value = "Sample Room";
    document.getElementById('nameOfVisitorTxt').value = "";
    document.getElementById('noOfVisitorTxt').value = "";
    document.getElementById('contactTxt').value = "";
    document.getElementById('creditCombo').value = "IntimatesTeam";
    document.getElementById('savinglockTxt').value = "";
    document.getElementById('noOfPersonTxt').value = "";
//    document.getElementById('requireH').value = "";
//    document.getElementById('requireM').value = "";
    document.getElementById('requireTime').value = "";
    document.getElementById('requireDate').value = "";
    document.getElementById('remarkTxt').value = "";


    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescTxt').value = "";
    document.getElementById('qty').value = "";
    document.getElementById('amountTxt').value = "";
    document.getElementById('gtot').value = "";
    document.getElementById('msg_box').innerHTML = "";
    document.getElementById('msg_box1').innerHTML = "";

//    document.getElementById('vvv').value = "0";


    getdt();
}

function print() {
    var url = "approve_kotEntryPrint.php";
    url = url + "?Command=" + "save";
    url = url + "&entryNo=" + document.getElementById('entryNoTxt').value;
    window.open(url, "_blank");
}




function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "approve_kotEntry_data.php";
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.form1.entryNoTxt1.value = XMLAddress1[0].childNodes[0].nodeValue;
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


function hiddenMenu() {
    document.getElementById('searchcost').style.visibility = "hidden";
}

function hiddenMenu1() {
    document.getElementById('searchcost').style.visibility = "visible";
}

function gtothidden() {
    document.getElementById('gtotqtyCombo').style.visibility = "visible";
    document.getElementById('xgtot').style.visibility = "visible";
}

function gtothidden1() {
    document.getElementById('gtotqtyCombo').style.visibility = "hidden";
    document.getElementById('xgtot').style.visibility = "hidden";
}

function add_tmp() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "approve_kotEntry_data.php";
    url = url + "?Command=" + "set";
    url = url + "&Command1=" + "add_tmp";
    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;
    url = url + "&itemCode=" + document.getElementById('itemCodeTxt').value;
    url = url + "&itemDesc=" + document.getElementById('itemDescTxt').value;
    url = url + "&amount=" + document.getElementById('amountTxt').value;
    url = url + "&qty=" + document.getElementById('qty').value;

    xmlHttp.onreadystatechange = showarmyresultdellll;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}



function showarmyresultdellll() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
        document.getElementById('item_count').value = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot1");
//        document.getElementById('gtot1').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('itemCodeTxt').value = "";
        document.getElementById('itemDescTxt').value = "";
        document.getElementById('qty').value = "";
        document.getElementById('amountTxt').value = "";

        document.getElementById('itemDescTxt').focus();

    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }


    var b = document.getElementById('gtot').value;
    b = b.replace(",", "");
    b = parseFloat(b);
    if (b <= 0) {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Food Not Entered</span></div>";
        return false;
    }


    var url = "approve_kotEntry_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&entryNo=" + document.getElementById('entryNoTxt').value;
//    url = url + "&entryDate=" + document.getElementById('entryDate').value;
    url = url + "&visitorType=" + document.getElementById('visitorTypeCombo').value;
    url = url + "&visitorName=" + document.getElementById('nameOfVisitorTxt').value;
    url = url + "&visitorNo=" + document.getElementById('noOfVisitorTxt').value;
    url = url + "&department=" + document.getElementById('departmentCombo').value;
    url = url + "&personNo=" + document.getElementById('noOfPersonTxt').value;
    url = url + "&requireDate=" + document.getElementById('requireDate').value;
    url = url + "&requireTime=" + document.getElementById('requireTime').value;
    url = url + "&remark=" + document.getElementById('remarkTxt').value;
    url = url + "&gtot=" + document.getElementById('gtot').value;

//    url = url + "&gtotqty=" + document.getElementById('gtotqtyCombo').value;

    url = url + "&contact=" + document.getElementById('contactTxt').value;
    url = url + "&creditCombo=" + document.getElementById('creditCombo').value;
    url = url + "&savinglock=" + document.getElementById('savinglockTxt').value;
    url = url + "&orderby=" + document.getElementById('orderby').value;
//    url = url + "&aplvl=" + document.getElementById('aplvl').value;
    url = url + "&apstep=" + document.getElementById('apstep').value;
    url = url + "&cancel=" + document.getElementById('cancel').value;
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;
//    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function cancel_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('entryNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Entry No Not Enterd</span></div>";
        return false;
    }


    var url = "approve_kotEntry_data.php";
    url = url + "?Command=" + "cancel_item";

    url = url + "&entryNo=" + document.getElementById('entryNoTxt').value;


    xmlHttp.onreadystatechange = cancelresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        print();
        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Approve Order </span></div>";

            setTimeout(function () {
                window.location.href = 'home.php?url=kot_Approval';
            }, 500);
            newent();

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function cancelresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Cancel Order </span></div>";
            setTimeout(function () {
                window.location.href = 'home.php?url=kot_Approval';
            }, 500);
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function food(stname) {


//shan
    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescTxt').value = "";
    document.getElementById('amountTxt').value = "";


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "kotEntry_data.php";
    url = url + "?Command=" + "food";

    url = url + "&stname=" + stname;
    xmlHttp.onreadystatechange = Standard_Menu_result;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function Standard_Menu_result() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("itemcode1");
        document.getElementById('itemCodeTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("itemdese1");
        document.getElementById('itemDescTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("price1");
        document.getElementById('amountTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('qty').focus();

//        document.getElementById('itemCodeTxt').value = "";
//        document.getElementById('itemDescTxt').value = "";
//        document.getElementById('amountTxt').value = "";

    }
}



function search() {

    //shan
    if (document.getElementById('radio12').checked != true) {
        document.getElementById('menuCombo1').style.visibility = "hidden";
        document.getElementById('menuCombodate').style.visibility = "visible";
    } else {
        document.getElementById('menuCombo1').style.visibility = "visible";
    }

    $('#myModal_search').modal('show');
    search_cos('');
}

function search_cos(cdata) {

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "search_cos";
    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;

    url = url + "&requireDate=" + document.getElementById('requireDate').value;
    url = url + "&mtype=" + cdata;

    if (document.getElementById('radio12').checked == true) {
        url = url + "&smtype=VIP";
    }
    if (document.getElementById('radio13').checked == true) {
        url = url + "&smtype=Standard_BreakFast";
    }
    if (document.getElementById('radio15').checked == true) {
        url = url + "&smtype=Standard_Lunch";
    }
    if (document.getElementById('radio14').checked == true) {
        url = url + "&smtype=Standard_Dinner";
    }
    if (document.getElementById('radio1').checked == true) {
        url = url + "&smtype=BreakFast";
    }
    if (document.getElementById('radio3').checked == true) {
        url = url + "&smtype=Lunch";
    }
    if (document.getElementById('radio2').checked == true) {
        url = url + "&smtype=Dinner";
    }
    if (document.getElementById('radio4').checked == true) {
        url = url + "&smtype=Tea/PlainTea/Coffee";
    }
    if (document.getElementById('radio5').checked == true) {
        url = url + "&smtype=Special_Dishes";
    }
    if (document.getElementById('radio6').checked == true) {
        url = url + "&smtype=Sandwiches";
    }
    if (document.getElementById('radio7').checked == true) {
        url = url + "&smtype=Cake_Pcs";
    }
    if (document.getElementById('radio8').checked == true) {
        url = url + "&smtype=Snacks";
    }
    if (document.getElementById('radio9').checked == true) {
        url = url + "&smtype=Dessert";
    }
    if (document.getElementById('radio10').checked == true) {
        url = url + "&smtype=Juices";
    }
    if (document.getElementById('radio11').checked == true) {
        url = url + "&smtype=Other";
    }

    url = url + "&stname=" + document.getElementById("menuCombo1").value;
    url = url + "&stname1=" + document.getElementById("menuCombodate").value;

    url = url + "&jobno=" + document.getElementById('jobno').value;
    url = url + "&costnum=" + document.getElementById('costnum').value;
    url = url + "&invoiceno=" + document.getElementById('invoiceno').value;
    url = url + "&creditor=" + document.getElementById('creditor').value;


    xmlHttp.onreadystatechange = showresultsearch;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}


//function showresultsearch() {
//    var XMLAddress1;
//    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//
//        document.getElementById('search_res').innerHTML = xmlHttp.responseText;
//
//
//    }
//}

function showresultsearch() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tb");
        document.getElementById('search_res').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dt");
        document.getElementById('menuCombodate').value = XMLAddress1[0].childNodes[0].nodeValue;


    }
}


function get_cos(cdata) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "get_cos";
    url = url + "&id=" + cdata;

    xmlHttp.onreadystatechange = showresultgetcos;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function showresultgetcos() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tb");
//        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("itemcode");
        document.getElementById('itemCodeTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("itemdese");
        document.getElementById('itemDescTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("price");
        document.getElementById('amountTxt').value = XMLAddress1[0].childNodes[0].nodeValue;

        $('#myModal_search').modal('hide');

        document.getElementById('qty').focus();


    }
}

function ADD(cdata) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "set";
    url = url + "&id=" + cdata;
    if (document.getElementById(cdata).checked == true) {
        url = url + "&stat=1";
    } else {
        url = url + "&stat=0";
    }

    url = url + "&menqty=" + document.getElementById('gtotqtyCombo').value;
    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;
//    if (document.getElementById(cdata).checked == true) {
//
//    }

    xmlHttp.onreadystatechange = added;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function ADD1(cdata) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "set1";
    url = url + "&id=" + cdata;
    if (document.getElementById(cdata).checked == true) {
        url = url + "&stat=1";
    } else {
        url = url + "&stat=0";
    }

    url = url + "&menqty=" + document.getElementById('gtotqtyCombo').value;
    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;
//    if (document.getElementById(cdata).checked == true) {
//
//    }

    xmlHttp.onreadystatechange = added;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function added() {
    //shan
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stat");
        if (XMLAddress1[0].childNodes[0].nodeValue != "") {
            document.getElementById('msg_box1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + XMLAddress1[0].childNodes[0].nodeValue + "</span></div>";
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");

            document.getElementById(XMLAddress1[0].childNodes[0].nodeValue).checked = false;
        } else {
            document.getElementById('msg_box1').innerHTML = "";
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("gtot");
        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("gtot1");
        document.getElementById('gtot1').value = XMLAddress1[0].childNodes[0].nodeValue;


    }
}

//function qtyClick() {
//
//
//    var amount = document.getElementById("gtot").value;
//    var mul = document.getElementById("gtotqtyCombo").value;
//
//    amount = parseFloat(amount);
//    mul = parseFloat(mul);
//
//    ans = amount * mul;
//
//    document.getElementById("gtot1").value = ans;
//}


function clear() {

    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescTxt').value = "";
    document.getElementById('amountTxt').value = "";

}


function del_item(cdate) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "del_item";
    url = url + "&itemCode=" + cdate;
    url = url + "&invno=" + document.getElementById('entryNoTxt').value;
    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;

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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('gtot1').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('itemCodeTxt').value = "";
        document.getElementById('itemDescTxt').value = "";
        document.getElementById('qty').value = "";
        document.getElementById('amountTxt').value = "";

        document.getElementById('qty').focus();

    }
}
function add_tmp2(stname) {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var visiNum = document.getElementById("noOfVisitorTxt").value;
    var empNo = document.getElementById("noOfPersonTxt").value;

    visiNum1 = parseFloat(visiNum);
    empNo1 = parseFloat(empNo);

    ans = visiNum1 + empNo1;

    var qq = document.getElementById('qty').value;
    var vvv = document.getElementById("vvv").value;

    qq1 = parseFloat(qq);
    vvv1 = parseFloat(vvv);

    hh = vvv1 + qq1;

    if (ans >= hh) {

    } else {
        alert("Quentity Has Limited");
        return false
    }


    var url = "kotEntry_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp2";
    url = url + "&stname=" + stname;
    url = url + "&tmpno=" + document.getElementById('entryNoTxt').value;
    url = url + "&itemDesc=" + document.getElementById('itemDescTxt').value;
    url = url + "&amount=" + document.getElementById('amountTxt').value;
    url = url + "&qty=" + document.getElementById('qty').value;

    url = url + "&vvv=" + document.getElementById('vvv').value;


    var status20 = document.getElementById('radio16').checked;

    if (status20 == true) {
        ownMenu = "yes";
        url = url + "&itemCode=" + document.getElementById('entryNoTxt').value + "own" + document.getElementById('item_count').value;
    } else {
        ownMenu = "no";
        url = url + "&itemCode=" + document.getElementById('itemCodeTxt').value;
    }
    url = url + "&chkType=" + ownMenu;

    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}




function qtyClick() {


    var amount = document.getElementById("gtot").value;
    var mul = document.getElementById("vvv").value;

    amount = parseFloat(amount);
    mul = parseFloat(mul);

    ans = amount * mul;

    document.getElementById("gtot1").value = ans;
}

function counter() {


    var visiNum = document.getElementById("noOfVisitorTxt").value;
    var empNo = document.getElementById("noOfPersonTxt").value;

    visiNum1 = parseFloat(visiNum);
    empNo1 = parseFloat(empNo);

    ans = visiNum1 + empNo1;

    document.getElementById("gtotqtyCombo").value = ans;
    qtyClick();
}
