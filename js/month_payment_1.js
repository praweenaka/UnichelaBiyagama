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

function generate() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "month_payment_data.php";
    url = url + "?Command=" + "gen";
    url = url + "&month=" + document.getElementById('month').value;

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function generateDateRange() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "month_payment_data.php";
    url = url + "?Command=" + "gena";
    url = url + "&from=" + document.getElementById('from').value;
    url = url + "&to=" + document.getElementById('to').value;

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function doNothing(){}

function downloadUrl(url, callback) {
                                        var request = window.ActiveXObject ?
                                                new ActiveXObject('Microsoft.XMLHTTP') :
                                                new XMLHttpRequest;
                                        request.onreadystatechange = function () {
                                            if (request.readyState == 4) {
                                                request.onreadystatechange = doNothing;
                                                callback(request, request.status);
                                            }
                                        };
                                        request.open('GET', url, true);
                                        request.send(null);
                                    }


function assign_dt() {
    document.getElementById('tab_con').innerHTML = xmlHttp.responseText; 
    
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("i");
        document.getElementById('total').value = XMLAddress1[0].childNodes[0].nodeValue;
    
    }
    
    
}
function save() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "month_payment_data.php";
    url = url + "?Command=" + "save";
    url = url + "&month=" + document.getElementById('month').value;


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function print() {

    var url = "print_all.php";
    url = url + "?Command=" + "rep";
    url = url + "&month=" + document.getElementById('month').value;
    window.open(url, "_blank");

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