<?php
session_start();
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>FOOD MENU MASTER</b></h3>
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

                    <a onclick="edit();" class="btn btn-warning btn-sm ">
                        <span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT
                    </a>       
                    <a onclick="deleteproduct();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>

                </div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>

                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="col-sm-8">

                    <div class="form-group-sm">
                        <label class="col-sm-2">Item Code</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Item Code" disabled="" id="itemCodeTxt" class="form-control  input-sm">
                        </div>
                        <a href = "" onclick = "NewWindow('search_foodMaster.php', 'mywin', '800', '700', 'yes', 'center');
                                return false" onfocus = "this.blur()">
                            <input type = "button" name = "searchcusti" id = "searchcusti1" value = "..." class = "btn btn-default btn-sm">
                        </a>
                    </div>
                    <div class="form-group"></div>


                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Item Description</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Item Description" name="c_code" id="itemDescripTxt" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2"  for="cus_address">Meal Type</label>
                        <div class="hidden">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="breakFastCheck"> Break Fast &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="dinnerCheck"> Dinner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="lunchCheck"> Lunch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>

                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="tPCCheck"> Tea /Plain Tea /Coffee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="sandwhicsCheck"> Sandwiches &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="SpecialDishesCheck"> Special Dishes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <!--<label class="col-sm-2"  for="cus_address"></label>-->
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="cakepcsCheck"> Cake Pcs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="snackCheck"> Snacks &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="dessertCheck"> Dessert &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="juiceCheck"> Juices &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="otherCheck"> Other &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <label class="col-sm-2"  for="cus_address"></label>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="Standard_BreakFast"> Standard BreakFast &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="Standard_Dinner"> Standard Dinner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio"  id="Standard_Lunch"> Standard Lunch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>

                    </div>
                    <div class="form-group"></div>


                    <div class="form-group-sm">
                        <label class="col-sm-2" for="cus_address">Amount</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="amount" id="amountTxt" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="form-group"></div>
                </div>

                <div id="itemdetails" >

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/food_MenuMaster.js"></script>

<script>newent();</script>

