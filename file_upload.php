<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>

#dropBox{
    border: 3px dashed #0087F7;
    border-radius: 5px;
    background: #F3F4F5;
    cursor: pointer;
}
#dropBox{
    min-height: 150px;
    padding: 54px 54px;
    box-sizing: border-box;
}
#dropBox p{
    text-align: center;
    margin: 2em 0;
    font-size: 16px;
    font-weight: bold;
}
#fileInput{
    display: none;
} 

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    //file input field trigger when the drop box is clicked
    $("#dropBox").click(function(){
        $("#fileInput").click();
    });
    
    //prevent browsers from opening the file when its dragged and dropped
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    //call a function to handle file upload on select file
    $('input[type=file]').on('change', fileUpload);
});

function fileUpload(event){
    //notify user about the file upload status
    $("#dropBox").html(event.target.value+" uploading...");
    
    //get selected file
    files = event.target.files;
    
    //form data check the above bullet for what it is  
    var data = new FormData();                                   

    //file data is presented as an array
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if(!file.type.match('image.*')) {              
            //check file type
            $("#dropBox").html("Please choose an images file.");
        }else if(file.size > 1048576){
            //check file size (in bytes)
            $("#dropBox").html("Sorry, your file is too large (>1 MB)");
        }else{
            //append the uploadable file to FormData object
            data.append('file', file, file.name);
            
            //create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();     
            
            //post file data for upload
            xhr.open('POST', 'upload.php', true);  
            xhr.send(data);
            xhr.onload = function () {
                //get response and show the uploading status
                var response = JSON.parse(xhr.responseText);
                if(xhr.status === 200 && response.status == 'ok'){
                    $("#dropBox").html("File has been uploaded successfully. Click to upload another.");
                }else if(response.status == 'type_err'){
                    $("#dropBox").html("Please choose an images file. Click to upload another.");
                }else{
                    $("#dropBox").html("Some problem occured, please try again.");
                }
            };
        }
    }
}
</script>
</head>

<body>

<form>      
    <div id="dropBox">
        <p>Select file to upload</p>
    </div>
    <input type="file" name="fileInput" id="fileInput" />
</form>
</body>
</html>