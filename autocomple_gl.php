<link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css" />
<script src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>    <!-- minified  --> 
<script>
    $(function () {
        if ($('#nameOfVisitorTxt').length > 0) {
            $("#nameOfVisitorTxt").autocomplete({
                source: "kotEntry_data.php?Command=get_list&gl_name=" + document.getElementById('nameOfVisitorTxt').value,
                minLength: 1,
                select: function (event, ui) {
//                                            $("#txt_gl_code").val(ui.item.id);
                    $("#nameOfVisitorTxt").val(ui.item.name);
//                                            $("#itemPrice").focus();
                    return false;
                }
            });
        }
    });

    $(function () {
        if ($('#savinglockTxt').length > 0) {
            $("#savinglockTxt").autocomplete({
                source: "kotEntry_data.php?Command=get_list1&gl_name=" + document.getElementById('savinglockTxt').value,
                minLength: 1,
                select: function (event, ui) {
//                                            $("#txt_gl_code").val(ui.item.id);
                    $("#savinglockTxt").val(ui.item.name);
//                                            $("#itemPrice").focus();
                    return false;
                }
            });
        }
    });
</script>















