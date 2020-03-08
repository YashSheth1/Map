<!DOCTYPE html>
<html>
<head>
<title>Upload Page</title>

<style type="text/css">
    body{

        margin:0;
        padding:0;
        font-family: sans-serif;
    }
    .box{
        height:100vh;
        background:url(back.jpg);
        background-size: cover;
        background-repeat:no-repeat; 

    }
    h2{
        position :absolute;
        top: 50%;
        transform:translateY(-50%);
        margin: 0;
        padding:0;
        text-align: center;
        font-size: 2em;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
         padding-top: 20px;
        margin-left: 250px;
        text-shadow: 0 5px 10px rgba(0,0,0,0.5);
        mix-blend-mode: overlay;
        box-shadow: 0 5px 10px rgba(0,0,0,0.5);
        background:rgba(0,0,0,0.6); 
}
 

</style>



</head>

<body>



<div class="box">

<h2><u><strong>Upload Your File:</u></strong><br><br>

     <form action="Excel_Sheet_Configuration_Setup_And_Upload.php" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
       
                <label>Choose Excel
                    File</label> <input style="  font-size: 20px;" type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button style="  font-size: 20px; cursor: pointer;" type="submit"  id="submit" name="import"
                    class="btn-submit" onclick="javascript:submission();">Import</button>        
        </form>
    </h2>
    </div>
<script type="text/javascript">
function submission(){
    alert("You can close the window now");
window.close();
}

</script>

</body>
</html>