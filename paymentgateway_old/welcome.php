
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <script src="../paymentgateway/jquery-3.3.1.min.js"></script>

<style type="text/css">
.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

</style> 

</head>
<body>


<div align="center">
<div  class="btn btn-success"><h3>Please select a Transaction type from below</h3></div>
	<a href="../paymentgateway/meTrnReq.php"><h3>Normal Transaction</h3></a>
	<a href="../paymentgateway/meTrnCardReq.html"><h3>Card Capture Transaction</h3></a>
	<a href="../paymentgateway/meTrnStatusReq.html"><h3>Transaction Status</h3></a>
	<a href="../paymentgateway/meTrnCancelReq.html"><h3>Cancel Transaction Request</h3></a>
	<a href="../paymentgateway/meTrnRefundReq.html"><h3>Refund Transaction Request</h3></a>
</div>

</body>
</html>

