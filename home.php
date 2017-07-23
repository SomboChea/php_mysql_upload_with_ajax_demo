<?php
session_start();

require_once "config.php";

if(empty($_SESSION['username']))
    header("Location: index.php");

$sql = "SELECT *FROM users WHERE username = '{$_SESSION['username']}';";
$res = mysqli_query($conn,$sql);
$img = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload User Profile</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="jquery-1.12.0.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $("#but_upload").click(function(){

                var fd = new FormData();

                var files = $('#file')[0].files[0];

                fd.append('file',files);

                $.ajax({
                    url:'upload.php',
                    type:'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response != 0){
                            $("#img").attr("src",response);

                        }
                    },
                    error:function(response){
                        alert('error : ' + JSON.stringify(response));
                    }
                });
            });
        });


    </script>

</head>
<body>
<div class="container">
    <h1>AJAX File upload AND PHP,MYSQL</h1>

    <form method="post" action="" enctype="multipart/form-data" id="myform">
        <div >
            <img src="<?php echo "upload/".$img['user_img']; ?>" id="img" width="100" height="100">
        </div>
        <div >
<!--            <input type="file" id="file" name="file" style="display: none"/>-->
            <input type="file" id="file" name="file" />
            <input type="button" class="button" value="Upload" id="but_upload">
        </div>
    </form>
</div>

<br />
<a href="index.php?logout">Logout</a>

<script type="text/javascript">
    $("#img").on('click', function () {
       $("#file").click();
    });
</script>
</body>
</html>