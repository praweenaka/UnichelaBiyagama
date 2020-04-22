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


function custno(code)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_kotEntry_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;


    xmlHttp.onreadystatechange = passcusresult_quot;

    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}



function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("idd");
        opener.document.form1.entryNoTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_seqno");
        opener.document.form1.entryDate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_o");
        opener.document.form1.visitorTypeCombo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_1");
        opener.document.form1.departmentCombo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_2");
        opener.document.form1.nameOfVisitorTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_3");
        opener.document.form1.noOfVisitorTxt.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_5");
        opener.document.form1.noOfPersonTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_6");
//        opener.document.form1.requireTime.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_7");
        opener.document.form1.requireDate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_8");
        opener.document.form1.remarkTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_9");
        opener.document.form1.contactTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_11");
        opener.document.form1.creditCombo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_13");
        opener.document.form1.orderby.value = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_12");
//        opener.document.form1.savinglockTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_10");
//        opener.document.form1.gtot1.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_15");
        opener.document.form1.gtot.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_16");
        opener.document.form1.tmpno1.value = XMLAddress1[0].childNodes[0].nodeValue;

//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("rr");
//        opener.document.form1.vvv.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

//        opener.document.getElementById('radio1').checked = false;
//        opener.document.getElementById('radio3').checked = false;
//        opener.document.getElementById('radio2').checked = false;
//        opener.document.getElementById('radio12').checked = false;
//        opener.document.getElementById('radio16').checked = false;
//        opener.document.getElementById('radio4').checked = false;
//        opener.document.getElementById('radio5').checked = false;
//        opener.document.getElementById('radio6').checked = false;
//        opener.document.getElementById('radio7').checked = false;
//        opener.document.getElementById('radio8').checked = false;
//        opener.document.getElementById('radio9').checked = false;
//        opener.document.getElementById('radio10').checked = false;


//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("check");
//        if (XMLAddress1[0].childNodes[0].nodeValue == "breakFast") {
//            opener.document.getElementById('radio1').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Lunch") {
//            opener.document.getElementById('radio3').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].odeValue == "Dinner") {
//            opener.document.getElementById('radio2').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "VIP") {
//            opener.document.getElementById('radio12').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Tea/PlainTea/Coffee") {
//            opener.document.getElementById('radio4').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "CreateOwnMenu") {
//            opener.document.getElementById('radio16').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Special_Dishes") {
//            opener.document.getElementById('radio5').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Other") {
//            opener.document.getElementById('radio11').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Sandwiches") {
//            opener.document.getElementById('radio6').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Dessert") {
//            opener.document.getElementById('radio9').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Snacks") {
//            opener.document.getElementById('radio8').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Cake_Pcs") {
//            opener.document.getElementById('radio7').checked = true;
//        } else if (XMLAddress1[0].childNodes[0].nodeValue == "Juices") {
//            opener.document.getElementById('radio10').checked = true;
//        } else {
//            opener.document.getElementById('radio1').checked = false;
//            opener.document.getElementById('radio3').checked = false;
//            opener.document.getElementById('radio2').checked = false;
//            opener.document.getElementById('radio12').checked = false;
//            opener.document.getElementById('radio16').checked = false;
//            opener.document.getElementById('radio4').checked = false;
//            opener.document.getElementById('radio5').checked = false;
//            opener.document.getElementById('radio6').checked = false;
//            opener.document.getElementById('radio7').checked = false;
//            opener.document.getElementById('radio8').checked = false;
//            opener.document.getElementById('radio9').checked = false;
//            opener.document.getElementById('radio10').checked = false;
//        }

        self.close();
    }
}

function update_cust_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_kotEntry_data.php";
    url = url + "?Command=" + "search_custom";


    if (document.getElementById('cusno').value != "") {
        url = url + "&mstatus=cusno";
    } else if (document.getElementById('customername').value != "") {
        url = url + "&mstatus=customername";
    }

    url = url + "&cusno=" + document.getElementById('cusno').value;
    url = url + "&customername=" + document.getElementById('customername').value;
    url = url + "&stname=" + stname;


    xmlHttp.onreadystatechange = showcustresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showcustresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;



    }
}