
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>FOODMENU VIP MASTER FILE</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>

                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"  ></div>


                <div class="col-sm-8">
                    <div class="form-group-sm">
                        <label class="col-sm-2 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" for="invno">Item Code</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Item Code" disabled id="itemcodeTxt" class="form-control  input-sm">
                        </div>                                        
                        <div class="col-sm-1">
                            <a onfocus="this.blur()" onclick="NewWindow('search_foodMaster_VIP.php', 'mywin', '800', '700', 'yes', 'center');
                                    return false" href="">

                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </a>
                        </div>



                    </div>
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" id="c_description">Category</label>
                        <div class="col-sm-5">
                            <select id="menuCombo" class="input-sm col-sm-7">
                                <option value="MENU1" >MENU1</option>
                                <option value="MENU2" >MENU2</option>
                                <option value="MENU3" >MENU3</option>
                                <option value="MENU4" >MENU4</option>
                                <!--<option value="SPECIAL_MENU_130" >SPECIAL MENU 130</option>-->

                            </select>
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" id="c_description">Price</label>
                        <div class="col-sm-5">
                            <input type="text" placeholder="Price" name="" id="priceTxt" class="form-control  input-sm">
                        </div>

                    </div>
                    <div class="form-group"></div>

                </div>
                <table class = "table table-striped">
                    <tr class = 'info'>
                        <th>Menu Name</th>
                        <th style = "width: 100px;"></th>
                        <th></th>
                        
                    </tr>

                    <tr>
                        <td>
                            <input type = "text" placeholder = "Menu Description"  id = "menudescriptionTxt" class = "form-control input-sm">
                        </td>
                        <td>
                            <input type = "text" placeholder = "QTY"  id = "qtyTxt" class = "form-control input-sm">
                        </td>
                        <td>
                            <input type = "text" placeholder = "Meal Name"  id = "mealnameTxt" class = "form-control input-sm">
                        </td>
                        <td>
                            <a onclick = "add_tmp();" class = "btn btn-default btn-sm"> <span class = "fa fa-plus"></span> &nbsp;
                            </a>
                        </td>
                    </tr>

                </table>

                <div id ="itemdetails"></div>




        </form>
    </div>

</section>
<script src="js/food_MenuMasterVIP.js"></script>

<script>newent();</script>
