<?php
error_reporting(0);
$name = $_GET['name'];
$program = $_GET['program'];
$appId = $_GET['appId'];
if ($_FILES && $_FILES['img']) {
    
    if (!empty($_FILES['img']['name'][0])) {
        
        $zip = new ZipArchive();
        $zip_name = getcwd() . "/Documents"."/upload_".$name."_".$appId."_" . time() . ".zip";
        // echo $zip_name;
        // Create a zip target
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
            $error .= "Sorry ZIP creation is not working currently.<br/>";
        }
        
        $imageCount = count($_FILES['img']['name']);
        for($i=0;$i<$imageCount;$i++) {
        
            if ($_FILES['img']['tmp_name'][$i] == '') {
                continue;
            }
            $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
            
            // Moving files to zip.
            $zip->addFromString($_FILES['img']['name'][$i], file_get_contents($_FILES['img']['tmp_name'][$i]));
            
            // moving files to the target folder.
            move_uploaded_file($_FILES['img']['tmp_name'][$i], './uploads_26to27/' . $newname);
        }
        $zip->close();
        
        echo'
         <button type="button" class="btn btn-danger" style = "color : White; float : right; margin-top : 30px; margin-right : 20px">
                <a href="http://www.watim.com.pk" style = "color : White; padding-right:5px; padding-left:5px "><i class = "fa fa-home" style = "padding-right:10px">
                         
                     </i>Home</a>
              </button>
        ';
        
        //PROGRAM
        
        
//         if($program == "BDS")
// {
//     echo "<script>alert('FORM SUBMITTED SUCCESSFULLY CHECK YOUR MAIL');
//     window.location.href='Dentalchallan.php';</script>";
// }
// else if($program == "MBBS")
// {
//     echo "<script>alert('FORM SUBMITTED SUCCESSFULLY CHECK YOUR MAIL');
//     window.location.href='Medchallan.php';</script>";
// }

// 


//CLOSE PROGRAM
        // Create HTML Link option to download zip
        $success = basename($zip_name);
    } else {
        $error = '<strong>Error!! </strong> Please select a file.';
    }
}
?>