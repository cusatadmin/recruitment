<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$firstname = $_SESSION['firstname'] ;
	$lastname = $_SESSION['lastname'] ;
	$auth = $_SESSION['admin'];
	$photo = $_SESSION['photo'];
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: login.php?message=$message");
    	exit();
	} 

	
?>
<style>
input[type='file'] {
  color: transparent;
}
</style>
<script type="text/javascript">
function resize(){
  //define the width to resize e.g 600px
  var resize_width = 200;//without px

  //get the image selected
  var item = document.querySelector('#uploader').files[0];

  //create a FileReader
  var reader = new FileReader();

  //image turned to base64-encoded Data URI.
  reader.readAsDataURL(item);
  reader.name = item.name;//get the image's name
  reader.size = item.size; //get the image's size
  reader.onload = function(event) {
    var img = new Image();//create a image
    img.src = event.target.result;//result is base64-encoded Data URI
    img.name = event.target.name;//set name (optional)
    img.size = event.target.size;//set size (optional)
    img.onload = function(el) {
      var elem = document.createElement('canvas');//create a canvas

      //scale the image to 600 (width) and keep aspect ratio
      var scaleFactor = resize_width / el.target.width;
      elem.width = resize_width;
      elem.height = el.target.height * scaleFactor;

      //draw in canvas
      var ctx = elem.getContext('2d');
      ctx.drawImage(el.target, 0, 0, elem.width, elem.height);

      //get the base64-encoded Data URI from the resize image
      var srcEncoded = ctx.canvas.toDataURL(el.target, 'image/jpeg', 0);

      //assign it to thumb src
      document.querySelector('#image').src = srcEncoded;
	  
	$("#loaderIcon").show();

	jQuery.ajax({
		  url: "upload_photo.php",
		  data:{photo_src: srcEncoded, photo_name: el.target.name},
		  type: "POST",
		  success:function(data){
	  },
		  error:function (){}
	  });
      /*Now you can send "c" to the server and
      convert it to a png o jpg. Also can send
      "el.target.name" that is the file's name.*/

    }
  }
}

function emailAvailability() {
	  $("#loaderIcon").show();
		  jQuery.ajax({
		  url: "upload_photo.php",
		  data:'photo_name='+$el.target.name,
		  type: "POST",
		  success:function(data){
	  },
		  error:function (){}
	  });
	}
</script>
<div class="col-md-3">
                    <div class="pro-user">
                    			<span>Photo</span>
                              <img src="<?php echo "files/".$photo; ?>" width="150" height="200" alt="Missing Image"  id="image" onerror="this.src='files/default.jpg';">
<input type="file" id="uploader">
								<button onclick='resize()'>Update</button>
								<!-- <img id="image"> -->

                    </div>
                    <div class="pro-user-bio">

                         <h4><?php echo $firstname." ".$lastname; ?></h4>
 						<p><?php echo $emailid; ?></p>
                        <p><a href="logout.php">Logout</a></p>
                    </div>
</div>
                
