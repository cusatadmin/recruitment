
<html>
<head>
	<meta charset="utf-8">
    <script src="jquery-3.3.1.min.js"></script>
	<title>Normal Transaction</title>
	<style>
		body{
		font-family:Verdana, sans-serif	;
		font-size::12px;
		}
		.wrapper{
		width:980px;
		margin:0 auto;	
		}
		table{

		}
		tr{
			padding:5px
		}
		td{
		padding:5px;	
		}
		input{
		padding:5px;	
		}
	</style>


	<script type="text/javascript">
		function getData()
		{
			var d = new Date();
			var n = d.getTime();
			var orderID = n +  '' +randomFromTo(0,1000);
			
			document.getElementById("OrderId").value = orderID;
			return true;
		}

		function randomFromTo(from, to){
			return Math.floor(Math.random() * (to - from + 1) + from);
		}
    </script>
        <?php
        session_start();print_r($_SESSION); ?>
        <script>

        var amount= "<?php echo $_SESSION['amount']; ?>";
//        var amount=10000;
        console.log("sss ",amount);

            $("#amount").attr("value",amount);
            alert($("#amount").val());


//        $("#amount").val(amount).trigger("change");
//        $("#dob_yyyy").val(dob[0]).trigger("change");


        </script>



</head>
<body onLoad="getData();">

<div class="wrapper">
<center> <h3> Transaction Request </h3></center>
	<form action="meTrnPay.php" method="post" id="form1">
		<table>
			<tr>
				<td><label for="one"> Order No.</label></td>
				<td><input type="text" value="" id="OrderId" name="OrderId"></td>
				 
				<td><label for="one"> Total Amount </label></td>
				<td><input type="text" value="<?php echo $_SESSION['amount']; ?>" id="amount" ></td>
				
				<td><label for="one"> Currency Name </label></td>
				<td><input type="text" value="INR" id="currencyName" name="currencyName"> </td>
			 </tr>
				<td><label for="two">Transaction Type (S/P/R)</label></td>
				<td><input type="text" value="S" id="meTransReqType" name="meTransReqType"></td>
				
				<td><label for="two">Recurring Period(NA/W/M)</label></td>
				<td><input type="text" value="" id="recurPeriod" name="recurPeriod"></td>
				
				<td><label for="two">Recurring Day</label></td>
				<td><input type="text" value="" id="recurDay" name="recurDay"></td>
			</tr>
			<tr>
				<td><label for="three">No Of Recurring</label></td>
				<td><input type="text" name="numberRecurring" id="numberRecurring" value=""></td>
				
				<td><label for="three">Merchant ID</label></td>
				<td><input type="text" name="mid" id="mid" value="WL0000000027698"></td>
				
				<td><label for="three">Encryption Key</label></td>
				<td><input type="text" name="enckey" id="enckey" value="6375b97b954b37f956966977e5753ee6"></td>
			</tr>
			<tr>
				<td><label for="addField1">Add Field 1</label></td>
				<td><input type="text" name="addField1" id="addField1"  /></td>

				<td><label for="addField2">Add Field 2</label></td>
				<td><input type="text" name="addField2" id="addField2" /></td>

				<td><label for="addField3">Add Field 3</label></td>
				<td><input type="text" name="addField3" id="addField3"  /></td>
			</tr>
			<tr>
				<td><label for="addField4">Add Field 4</label></td>
				<td><input type="text" name="addField4" id="addField4" /></td>

				<td><label for="addField5">Add Field 5</label></td>
				<td><input type="text" name="addField5" id="addField5" /></td>

				<td><label for="addField6">Add Field 6</label></td>
				<td><input type="text" name="addField6" id="addField6"  /></td>
			</tr>
			<tr>
				<td><label for="addField7">Add Field 7</label></td>
				<td><input type="text" name="addField7" id="addField7" /></td>

				<td><label for="addField8">Add Field 8</label></td>
				<td><input type="text" name="addField8" id="addField8" /></td>
				<td><label for="responseUrl">Response Url</label></td>
				<td><input type="text" name="responseUrl" id="responseUrl" value="meTrnSuccess.php" /></td>
			</tr>
			<tr>
				<td>
				<input type="submit" class="btn btn-danger btn-block" style="background:#33CC33;padding:5px;font-size:15px"
					name="CHECKOUT" value= "CHECKOUT" />
				</td>
			</tr>

		</table>
	</form>
</div>

</body>
</html>
