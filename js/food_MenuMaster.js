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

    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescripTxt').value = "";
    document.getElementById('breakFastCheck').checked = false;
    document.getElementById('dinnerCheck').checked = false;
    document.getElementById('lunchCheck').checked = false;
    document.getElementById('tPCCheck').checked = false;
    document.getElementById('sandwhicsCheck').checked = false;
    document.getElementById('SpecialDishesCheck').checked = false;
    document.getElementById('cakepcsCheck').checked = false;
    document.getElementById('snackCheck').checked = false;
    document.getElementById('dessertCheck').checked = false;
    document.getElementById('juiceCheck').checked = false;
    document.getElementById('otherCheck').checked = false;
    document.getElementById('Standard_BreakFast').checked = false;
    document.getElementById('Standard_Dinner').checked = false;
    document.getElementById('Standard_Lunch').checked = false;

    document.getElementById('amountTxt').value = "";


    getdt();

}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMaster_data.php";
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
        document.form1.itemCodeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}




function getcode(cdata, cdata1, cdata2, cdata3, cdata4, cdata5, cdata6) {


    document.getElementById('itemCodeTxt').value = cdata;
    document.getElementById('itemDescripTxt').value = cdata1;
    document.getElementById('addressText').value = cdata2;
    document.getElementById('telephoneText').value = cdata3;
    document.getElementById('emailText').value = cdata4;
    document.getElementById('nicText').value = cdata5;
    document.getElementById('accNoText').value = cdata6;
    if (cdata7 == 'Y') {
        document.getElementById('active').checked = true;
    } else {
        document.getElementById('active').checked = false;
    }
    window.scrollTo(0, 0);
}



function edit() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('itemCodeTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('itemDescripTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Description Not Selected</span></div>";
        return false;
    }

    if (document.getElementById('amountTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Amount Not Selected</span></div>";
        return false;
    }


    var url = "food_MenuMaster_data.php";
    url = url + "?Command=" + "edit";
    url = url + "&itemcode=" + document.getElementById('itemCodeTxt').value;
    url = url + "&itemdesc=" + document.getElementById('itemDescripTxt').value;
    url = url + "&amount=" + document.getElementById('amountTxt').value;
    xmlHttp.onreadystatechange = edited;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('itemCodeTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('itemDescripTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Description Not Selected</span></div>";
        return false;
    }

    if (document.getElementById('amountTxt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Amount Not Selected</span></div>";
        return false;
    }



    var data = new FormData();
    if (document.getElementById('breakFastCheck').checked == true) {
        lockitemBreak = "Y";
    } else {
        lockitemBreak = "N";
    }
    if (document.getElementById('dinnerCheck').checked == true) {
        lockitemDinner = "Y";
    } else {
        lockitemDinner = "N";
    }
    if (document.getElementById('lunchCheck').checked == true) {
        lockitemLunch = "Y";
    } else {
        lockitemLunch = "N";
    }
    if (document.getElementById('tPCCheck').checked == true) {
        lockitemtPCCheck = "Y";
    } else {
        lockitemtPCCheck = "N";
    }
    if (document.getElementById('sandwhicsCheck').checked == true) {
        lockitemsandwhicsCheck = "Y";
    } else {
        lockitemsandwhicsCheck = "N";
    }
    if (document.getElementById('SpecialDishesCheck').checked == true) {
        lockitemSpecial_Dishes = "Y";
    } else {
        lockitemSpecial_Dishes = "N";
    }
    if (document.getElementById('cakepcsCheck').checked == true) {
        lockitemcakepcsCheck = "Y";
    } else {
        lockitemcakepcsCheck = "N";
    }
    if (document.getElementById('snackCheck').checked == true) {
        lockitemsnackCheck = "Y";
    } else {
        lockitemsnackCheck = "N";
    }
    if (document.getElementById('dessertCheck').checked == true) {
        lockitemdessertCheck = "Y";
    } else {
        lockitemdessertCheck = "N";
    }
    if (document.getElementById('juiceCheck').checked == true) {
        lockitemjuiceCheck = "Y";
    } else {
        lockitemjuiceCheck = "N";
    }
    if (document.getElementById('otherCheck').checked == true) {
        lockitemotherCheck = "Y";
    } else {
        lockitemotherCheck = "N";
    }
    if (document.getElementById('Standard_BreakFast').checked == true) {
        lockitemStandard_BreakFast = "Y";
    } else {
        lockitemStandard_BreakFast = "N";
    }
    if (document.getElementById('Standard_Dinner').checked == true) {
        lockitemStandard_Dinner = "Y";
    } else {
        lockitemStandard_Dinner = "N";
    }
    if (document.getElementById('Standard_Lunch').checked == true) {
        lockitemStandard_Lunch = "Y";
    } else {
        lockitemStandard_Lunch = "N";
    }


    data.append('Command', "save_item");
    data.append('lockitemBreak', lockitemBreak);
    data.append('lockitemDinner', lockitemDinner);
    data.append('lockitemLunch', lockitemLunch);
    data.append('lockitemtPCCheck', lockitemtPCCheck);
    data.append('lockitemsandwhicsCheck', lockitemsandwhicsCheck);
    data.append('lockitemSpecial_Dishes', lockitemSpecial_Dishes);
    data.append('lockitemcakepcsCheck', lockitemcakepcsCheck);
    data.append('lockitemsnackCheck', lockitemsnackCheck);
    data.append('lockitemdessertCheck', lockitemdessertCheck);
    data.append('lockitemjuiceCheck', lockitemjuiceCheck);
    data.append('lockitemotherCheck', lockitemotherCheck);
    data.append('lockitemStandard_BreakFast', lockitemStandard_BreakFast);
    data.append('lockitemStandard_Dinner', lockitemStandard_Dinner);
    data.append('lockitemStandard_Lunch', lockitemStandard_Lunch);

    var itemCode = document.getElementById('itemCodeTxt').value;
    var description = document.getElementById('itemDescripTxt').value;
    var amount = document.getElementById('amountTxt').value;
    data.append('itemCode', itemCode);
    data.append('description', description);
    data.append('amount', amount);
    $.ajax({
        url: 'food_MenuMaster_data.php',
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

//        if (xmlHttp.responseText == "Saved") {
//            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
//            newent();
////            document.getElementById('msg_box').innerHTML;
//        } else {
//            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
//        }
    }
}


function edited() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "EDIT") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>EDITED</span></div>";
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}






function deleteproduct() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMaster_data.php";
    url = url + "?Command=" + "delete";


    url = url + "&itemcode=" + document.getElementById('itemCodeTxt').value;

    xmlHttp.onreadystatechange = dele;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
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



