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


    document.getElementById('entryNoTxt').value = "";
    document.getElementById('visitorTypeCombo').value = "STANDRED VISIT";
    document.getElementById('departmentCombo').value = "HR";
    document.getElementById('nameOfVisitorTxt').value = "";
    document.getElementById('noOfVisitorTxt').value = "";
    document.getElementById('contactTxt').value = "";
    document.getElementById('noOfPersonTxt').value = "";
    document.getElementById('remarkTxt').value = "";
    document.getElementById('requireDate').value = "";

    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescTxt').value = "";
    document.getElementById('qty').value = "";
    document.getElementById('amountTxt').value = "";
    document.getElementById('gtot').value = "";
    document.getElementById('msg_box').innerHTML = "";
    document.getElementById('msg_box1').innerHTML = "";
    document.getElementById('approveCombo').value = "Mr Yasiru";

    getdt();
}

function print() {
    var url = "bill_print.php";
    url = url + "?Command=" + "save";
    url = url + "&bill=" + document.getElementById('billNoTxt').value;
    window.open(url, "_blank");
}




function add_tmp2(stname) {
//shan 04/23

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp2";
    url = url + "&stname=" + stname;
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;
    url = url + "&itemDesc=" + document.getElementById('itemDescTxt').value;
    url = url + "&amount=" + document.getElementById('amountTxt').value;
    url = url + "&qty=" + document.getElementById('qty').value;
    url = url + "&requireDate=" + document.getElementById('requireDate').value;
    url = url + "&requireTime=" + document.getElementById('requireTime').value;
    url = url + "&savinglock=" + document.getElementById('savinglockTxt').value;
    url = url + "&mealtype=";
    url = url + "&menu=";

    var mmtype = "";

    if (document.getElementById('radio4').checked == true) {
        mmtype = "TeaCoffee";
    }
    if (document.getElementById('radio5').checked == true) {
        mmtype = "SpecialDishes";
    }
    if (document.getElementById('radio6').checked == true) {
        mmtype = "Sandwiches";
    }
    if (document.getElementById('radio7').checked == true) {
        mmtype = "Cake";
    }
    if (document.getElementById('radio8').checked == true) {
        mmtype = "Snacks";
    }
    if (document.getElementById('radio9').checked == true) {
        mmtype = "Dessert";
    }
    if (document.getElementById('radio10').checked == true) {
        mmtype = "Juices";
    }
    if (document.getElementById('radio11').checked == true) {
        mmtype = "Other";
    }
    if (document.getElementById('radio16').checked == true) {
        mmtype = "OwnMenu";
    }

    url = url + "&mmtype=" + mmtype;

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

function del_item(cdate,cdata,cdata1) {
//shan 04/23
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "del_item";
    url = url + "&itemCode=" + cdate;
    url = url + "&mealtype=" + cdata;
    url = url + "&menu=" + cdata1;

    url = url + "&invno=" + document.getElementById('entryNoTxt').value;
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;

    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function del_item1(cdate,cdata,cdata1) {
//shan 04/23
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "setitem1";
    url = url + "&Command1=" + "del_item1";
    url = url + "&id=" + cdate;
    url = url + "&mealtype=" + cdata;
    url = url + "&menu=" + cdata1;
    url = url + "&invno=" + document.getElementById('entryNoTxt').value;
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;

    xmlHttp.onreadystatechange = showarmyresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function showarmyresultdel() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stat");
        if (XMLAddress1[0].childNodes[0].nodeValue != "") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + XMLAddress1[0].childNodes[0].nodeValue + "</span></div>";
//            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");

//            document.getElementById(XMLAddress1[0].childNodes[0].nodeValue).checked = false;
        } else {
            document.getElementById('msg_box').innerHTML = "";

        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
        document.getElementById('item_count').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('itemCodeTxt').value = "";
        document.getElementById('itemDescTxt').value = "";
        document.getElementById('qty').value = "";
        document.getElementById('amountTxt').value = "";

        document.getElementById('qty').focus();

    }
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";
    url = url + "&tmp_entryno=" + document.getElementById('tmpno1').value;
    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}


function assign_dt() {

    document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.form1.entryNoTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno1').value = XMLAddress1[0].childNodes[0].nodeValue;

    }
}



function getcode(cdata, cdata1, cdata2, cdata3) {


    document.getElementById('itemCodeTxt').value = cdata;
    document.getElementById('itemDescTxt').value = cdata1;
    document.getElementById('qty').value = cdata2;
    document.getElementById('amountTxt').value = cdata3;


    window.scrollTo(0, 0);

}



function lvl1enb() {
    if (document.getElementById('lvl1').checked == true) {
        document.getElementById("save").style.visibility = "visible";
    } else if (document.getElementById('lvl1').checked == false) {
        document.getElementById("save").disabled;
    }

}
function lvl2enb() {
    if (document.getElementById('lvl2').checked == true) {
        document.getElementById("save").style.visibility = "visible";
    } else if (document.getElementById('lvl2').checked == false) {
        document.getElementById("save").disabled;
    }

}
function lvl3enb() {
    if (document.getElementById('lvl3').checked == true) {
        document.getElementById("save").style.visibility = "visible";
    } else if (document.getElementById('lvl3').checked == false) {
        document.getElementById("save").disabled;
    }

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
    var url = "kotEntry_data.php";
    url = url + "?Command=" + "cancel_item";

    url = url + "&entryNo=" + document.getElementById('entryNoTxt').value;


    xmlHttp.onreadystatechange = cancelresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function cancelresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Cancel") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Cancel</span></div>";
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}


function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('entryNoTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Entry No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('visitorTypeCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Visitor Type Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('nameOfVisitorTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Organization Name Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('noOfVisitorTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>No Of Visitors Not Selected</span></div>";
        return false;
    }

    if (document.getElementById('departmentCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('noOfPersonTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>No Of Persons Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('requireDate').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Require Date Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('contactTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Contact No Not Selected</span></div>";
        return false;
    }

    if (document.getElementById('creditCombo').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Credit Account Not Selected</span></div>";
        return false;
    }


    var b = document.getElementById('gtot').value;
    b = b.replace(",", "");
    b = parseFloat(b);
    if (b <= 0) {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Food Not Entered</span></div>";
        return false;
    }


    var url = "kotEntry_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&entryNo=" + document.getElementById('entryNoTxt').value;
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;

    url = url + "&entryDate=" + document.getElementById('entryDate').value;
    url = url + "&visitorType=" + document.getElementById('visitorTypeCombo').value;
    url = url + "&visitorName=" + document.getElementById('nameOfVisitorTxt').value;
    url = url + "&visitorNo=" + document.getElementById('noOfVisitorTxt').value;
    url = url + "&department=" + document.getElementById('departmentCombo').value;
    url = url + "&personNo=" + document.getElementById('noOfPersonTxt').value;
    url = url + "&requireDate=" + document.getElementById('requireDate').value;
    url = url + "&remark=" + document.getElementById('remarkTxt').value;
    url = url + "&contact=" + document.getElementById('contactTxt').value;
    url = url + "&creditCombo=" + document.getElementById('creditCombo').value;
    url = url + "&orderby=" + document.getElementById('orderby').value;

    url = url + "&approveby=" + $('#approveCombo').val();

    url = url + "&gtot=" + document.getElementById('gtot').value;
    url = url + "&apstep=" + document.getElementById('apstep').value;
    url = url + "&cancel=" + document.getElementById('cancel').value;

    if (document.getElementById('lvl1').checked == true) {
        url = url + "&check1" + "=lvl1";
    }
    if (document.getElementById('lvl2').checked == true) {
        url = url + "&check1" + "=lvl2";
    }
    if (document.getElementById('lvl3').checked == true) {
        url = url + "&check1" + "=lvl3";
    }



    if (document.getElementById('radio1').checked == true) {
        url = url + "&checkBreakfast" + "=radio1";
    }
    if (document.getElementById('radio2').checked == true) {
        url = url + "&checkLunch" + "=radio2";
    }
    if (document.getElementById('radio3').checked == true) {
        url = url + "&checkDinner" + "=radio3";
    }
    if (document.getElementById('radio4').checked == true) {
        url = url + "&checkTeaCoffee" + "=radio4";
    }
    if (document.getElementById('radio5').checked == true) {
        url = url + "&checkSpecialDishes" + "=radio5";
    }
    if (document.getElementById('radio6').checked == true) {
        url = url + "&checkSandwiches" + "=radio6";
    }
    if (document.getElementById('radio7').checked == true) {
        url = url + "&checkVIP" + "=radio7";
    }
    if (document.getElementById('radio8').checked == true) {
        url = url + "&checkOwnMenu" + "=radio8";
    }
    if (document.getElementById('radio9').checked == true) {
        url = url + "&checkCake" + "=radio9";
    }
    if (document.getElementById('radio10').checked == true) {
        url = url + "&checkSnacks" + "=radio10";
    }
    if (document.getElementById('radio11').checked == true) {
        url = url + "&checkDessert" + "=radio11";
    }
    if (document.getElementById('radio12').checked == true) {
        url = url + "&checkJuices" + "=radio12";
    }
    if (document.getElementById('radio16').checked == true) {
        url = url + "&checkOther" + "=radio16";
    }


    var mmtype = "";
    if (document.getElementById('radio12').checked == true) {
        mmtype = "VIP";
    }
    if (document.getElementById('radio4').checked == true) {
        mmtype = "TeaCoffee";
    }
    if (document.getElementById('radio5').checked == true) {
        mmtype = "SpecialDishes";
    }
    if (document.getElementById('radio6').checked == true) {
        mmtype = "Sandwiches";
    }
    if (document.getElementById('radio7').checked == true) {
        mmtype = "Cake";
    }
    if (document.getElementById('radio8').checked == true) {
        mmtype = "Snacks";
    }
    if (document.getElementById('radio9').checked == true) {
        mmtype = "Dessert";
    }
    if (document.getElementById('radio10').checked == true) {
        mmtype = "Juices";
    }
    if (document.getElementById('radio11').checked == true) {
        mmtype = "Other";
    }
    if (document.getElementById('radio16').checked == true) {
        mmtype = "OwnMenu";
    }
    if (document.getElementById('radio1').checked == true) {
        mmtype = "Breakfast";
    }
    if (document.getElementById('radio3').checked == true) {
        mmtype = "Lunch";
    }
    if (document.getElementById('radio2').checked == true) {
        mmtype = "Dinner";
    }

    url = url + "&mmtype=" + mmtype;

    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
//            print();
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
//    xmlHttp.onreadystatechange = Standard_Menu_result;
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

    }
}



function search() {

    //shan
    if (document.getElementById('radio12').checked != true) {
        document.getElementById('menuCombo1').style.visibility = "hidden";
        document.getElementById('foodsave').style.visibility = "hidden";
        document.getElementById('menuCombodate').style.visibility = "visible";
    } else {
        document.getElementById('menuCombo1').style.visibility = "visible";
        document.getElementById('foodsave').style.visibility = "visible";
    }


    $('#myModal_search').modal('show');
    search_cos('');
}

function search_cos(cdata) {

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "search_cos";
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;

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
    if (document.getElementById('radio17').checked == true) {
        url = url + "&smtype=Menu 130";
    }
    if (document.getElementById('radio18').checked == true) {
        url = url + "&smtype=Hurbal Drink";
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
//shan 04/24
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
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;
    url = url + "&menu=" + document.getElementById('menuCombo1').value;

    xmlHttp.onreadystatechange = added_tmp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function added_tmp() {
    //shan  04/24
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stat");
        if (XMLAddress1[0].childNodes[0].nodeValue != "") {
            document.getElementById('msg_box1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + XMLAddress1[0].childNodes[0].nodeValue + "</span></div>";
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");


//shan 04/24
           document.getElementById(XMLAddress1[0].childNodes[0].nodeValue).checked = false;
        } else {
            document.getElementById('msg_box1').innerHTML = "";

        }

    }
}

function added() {
    //shan  04/24
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stat");
        if (XMLAddress1[0].childNodes[0].nodeValue != "") {
            document.getElementById('msg_box1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + XMLAddress1[0].childNodes[0].nodeValue + "</span></div>";
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");


//shan 04/24
        //   document.getElementById(XMLAddress1[0].childNodes[0].nodeValue).checked = false;
        } else {
            document.getElementById('msg_box1').innerHTML = "";

        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
        document.getElementById('item_count').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;

        $('#myModal_search').modal('hide');  
    }
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
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;

    xmlHttp.onreadystatechange = added;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function clear() {

    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescTxt').value = "";
    document.getElementById('amountTxt').value = "";

}


function checkall(cdata) {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "kotEntry_data.php";
    url = url + "?Command=" + "checkadd";
    url = url + "&Command1=" + "add_checkadd";

    url = url + "&id=" + cdata;
    url = url + "&itemCode=" + document.getElementById('itemcode').value + "visitno" + document.getElementById('item_count').value;

    var desc = "desc" + cdata;
    var price = "price" + cdata;
    var qty = "qty" + cdata;

    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;
    url = url + "&qty=" + document.getElementById(qty).value;
    url = url + "&desc=" + document.getElementById(desc).value;
    url = url + "&price=" + document.getElementById(price).value;
    url = url + "&requireTime=" + document.getElementById('requireTime').value;
    url = url + "&savinglock=" + document.getElementById('savinglockTxt').value;
    url = url + "&requireDate=" + document.getElementById('requireDate').value;

    var mmtype = "";

    if (document.getElementById('radio1').checked == true) {
        mmtype = "Breakfast";
    }
    if (document.getElementById('radio3').checked == true) {
        mmtype = "Lunch";
    }
    if (document.getElementById('radio2').checked == true) {
        mmtype = "Dinner";
    }

    url = url + "&mmtype=" + mmtype;

    xmlHttp.onreadystatechange = added;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function foodsave() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "kotEntry_data.php";
    url = url + "?Command=" + "foodsave";
    url = url + "&tmpno1=" + document.getElementById('tmpno1').value;
    url = url + "&serialno=" + document.getElementById('item_count').value;

    url = url + "&requireDate=" + document.getElementById('requireDate').value;
    url = url + "&requireTime=" + document.getElementById('requireTime').value;
    url = url + "&savinglock=" + document.getElementById('savinglockTxt').value;

    var mmtype = "";

    if (document.getElementById('radio12').checked == true) {
        mmtype = "VIP";
    }

    url = url + "&mmtype=" + mmtype;

    xmlHttp.onreadystatechange = added;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
