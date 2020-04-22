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
    var url = "search_foodMaster_data.php";
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
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_type");
        opener.document.form1.itemCodeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_rate");
        opener.document.form1.itemDescripTxt.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_downpayment");
        opener.document.form1.amountTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
//
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_day");
//        opener.document.form1.dayCombo.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_menu");
//        opener.document.form1.menuCombo.value = XMLAddress1[0].childNodes[0].nodeValue;
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_menutype");
//        opener.document.form1.menutypeCombo.value = XMLAddress1[0].childNodes[0].nodeValue;




        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("breakFastCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.breakFastCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.breakFastCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dinnerCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.dinnerCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.dinnerCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lunchCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.lunchCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.lunchCheck.checked = false;
        }
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tPCCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.tPCCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.tPCCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sandwhicsCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.sandwhicsCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.sandwhicsCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cakepcsCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.cakepcsCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.cakepcsCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("snackCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.snackCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.snackCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dessertCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.dessertCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.dessertCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("juiceCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.juiceCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.juiceCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("otherCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.otherCheck.checked = true;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.otherCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sprcdisCheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.sprcdisCheck.checked = true;
            opener.document.form1.dayCombo.value = XMLAddress1[0].childNodes[0].nodeValue;
        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.sprcdisCheck.checked = false;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("vipcheck");

        if (XMLAddress1[0].childNodes[0].nodeValue == "Y") {
            opener.document.form1.vipcheck.checked = true;

            window.opener.document.getElementById('vipcombodiv1').style.visibility = "visible";
            window.opener.document.getElementById('vipcombodiv').style.visibility = "visible";
            menu1();
//            opener.document.form1.menuCombo.value = XMLAddress1[0].childNodes[0].nodeValue;
//            opener.document.form1.menutypeCombo.value = XMLAddress1[0].childNodes[0].nodeValue;

        } else if (XMLAddress1[0].childNodes[0].nodeValue == "N") {
            opener.document.form1.vipcheck.checked = false;
            window.opener.document.getElementById('vipcombodiv1').style.visibility = "hidden";
            window.opener.document.getElementById('vipcombodiv').style.visibility = "hidden";
        }


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


    var url = "search_foodMaster_data.php";
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