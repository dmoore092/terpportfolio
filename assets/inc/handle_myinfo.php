<?php 
    // Handles all form data from myinfo.php
    //goes into profile.php
    if(isset($_POST['updateUserInfo'])) {
        //echo "update being attempted";
    echo "<meta http-equiv='refresh' content='0'>";//force page refresh
        $updateArray = array();
        if(isset($_SESSION['id'])){
            $myId = $_SESSION['id'];
            var_dump($_POST);
            $updateArray['id'] = $_SESSION['id'];
            if(isset($_POST['name'])){
                //echo $_POST['name'];
                if($terpDB->isAlphaNumeric($_POST['name']) != 0){
                    $updateArray['name'] = $terpDB->sanitize($_POST['name']);
                }
            }
            if(isset($_POST['email'])){
                if($terpDB->isAlphaNumeric($_POST['email']) != 0){
                    $updateArray['email'] = $terpDB->sanitize($_POST['email']);
                }
            }

            if(isset($_POST['gender'])){
            if($terpDB->isMaleOrFemale($_POST['gender']) != 0){
                $updateArray['gender'] = $terpDB->sanitize($_POST['gender']);
            }
            }
            
            if(isset($_POST['email'])){
            if($terpDB->isValidEmail($_POST['email']) != 0){
                $updateArray['email'] = $terpDB->sanitize($_POST['email']);
            }
            }

            if(isset($_POST['cellPhone'])){
                if($terpDB->isValidPhone($_POST['cellPhone']) != 0){
                    $updateArray['cellPhone'] = $terpDB->sanitize($_POST['cellPhone']);
                }
            }

            if(isset($_POST['homePhone'])){
            if($terpDB->isValidPhone($_POST['homePhone']) != 0){
                $updateArray['homePhone'] = $terpDB->sanitize($_POST['homePhone']);
            }
            }
            
            if(isset($_POST['address'])){
            //if($terpDB->isAlphaNumeric($_POST['address']) != 0){
                $updateArray['address'] = $terpDB->sanitize($_POST['address']);
            //}
            }

            if(isset($_POST['city'])){
            if($terpDB->isAlphaNumeric($_POST['city']) != 0){
                $updateArray['city'] = $terpDB->sanitize($_POST['city']);
            }
            }
            
            if(isset($_POST['state'])){
                $updateArray['state'] = $_POST['state'];
            }

            if(isset($_POST['zip'])){
            if($terpDB->isZip($_POST['zip']) != 0){
                $updateArray['zip'] = $terpDB->sanitize($_POST['zip']);
            }
            }

            if(isset($_POST['highschool'])){
                $updateArray['highschool'] = $terpDB->sanitize($_POST['highschool']);
                echo $updateArray['highschool'];
            }

            if(isset($_POST['weight'])){
            if($terpDB->isAlphaNumeric($_POST['weight']) != 0){
                $updateArray['weight'] = $terpDB->sanitize($_POST['weight']);
            }
            }
            
            if(isset($_POST['height'])){
                $updateArray['height'] = $terpDB->sanitize($_POST['height']);
            }

            if(isset($_POST['gradYear'])){
                if($terpDB->isNumeric($_POST['gradYear']) != 0){
                $updateArray['gradYear'] = $terpDB->sanitize($_POST['gradYear']);
                }
            }
            if(isset($_POST['sport'])){
            if($terpDB->isAlphaNumeric($_POST['sport']) != 0){
                $updateArray['sport'] = $terpDB->sanitize($_POST['sport']);
            }
            }
            if(isset($_POST['primaryPosition'])){
            if($terpDB->isAlphaNumeric($_POST['primaryPosition']) != 0){
                $updateArray['primaryPosition'] = $terpDB->sanitize($_POST['primaryPosition']);
            }
            }

            if(isset($_POST['secondaryPosition'])){
            if($terpDB->isAlphaNumeric($_POST['secondaryPosition']) != 0){
                $updateArray['secondaryPosition'] = $terpDB->sanitize($_POST['secondaryPosition']);
            }
            }

            if(isset($_POST['travelTeam'])){
            if($terpDB->isAlphaNumeric($_POST['travelTeam']) != 0){
                $updateArray['travelTeam'] = $terpDB->sanitize($_POST['travelTeam']);
            }
            }

            if(isset($_POST['gpa'])){
                $updateArray['gpa'] = $terpDB->sanitize($_POST['gpa']);
            }

            if(isset($_POST['sat'])){
            if($terpDB->isNumeric($_POST['sat']) != 0){
                $updateArray['sat'] = $terpDB->sanitize($_POST['sat']);
            }
            }

            if(isset($_POST['act'])){
            if($terpDB->isNumeric($_POST['act']) != 0){
                $updateArray['act'] = $terpDB->sanitize($_POST['act']);
            }
            }

            if(isset($_POST['ref1Name'])){
            if($terpDB->isAlphaNumeric($_POST['ref1Name']) != 0){
                $updateArray['ref1Name'] = $terpDB->sanitize($_POST['ref1Name']);
            }
            }

            if(isset($_POST['ref1JobTitle'])){
            if($terpDB->isAlphaNumeric($_POST['ref1JobTitle']) != 0){
                $updateArray['ref1JobTitle'] = $terpDB->sanitize($_POST['ref1JobTitle']);
            }
            }

            if(isset($_POST['ref1Email'])){
            if($terpDB->isValidEmail($_POST['ref1Email']) != 0){
                $updateArray['ref1Email'] = $terpDB->sanitize($_POST['ref1Email']);
            }
            }

            if(isset($_POST['ref1Phone'])){
            if($terpDB->isValidPhone($_POST['ref1Phone']) != 0){
                $updateArray['ref1Phone'] = $terpDB->sanitize($_POST['ref1Phone']);
            }
            }

            if(isset($_POST['ref2Name'])){
            if($terpDB->isAlphaNumeric($_POST['ref2Name']) != 0){
                $updateArray['ref2Name'] = $terpDB->sanitize($_POST['ref2Name']);
            }
            }

            if(isset($_POST['ref2JobTitle'])){
            if($terpDB->isAlphaNumeric($_POST['ref2JobTitle']) != 0){
                $updateArray['ref2JobTitle'] = $terpDB->sanitize($_POST['ref2JobTitle']);
            }
            }

            if(isset($_POST['ref2Email'])){
            if($terpDB->isValidEmail($_POST['ref2Email']) != 0){
                $updateArray['ref2Email'] = $terpDB->sanitize($_POST['ref2Email']);
            }
            }

            if(isset($_POST['ref2Phone'])){
            if($terpDB->isValidPhone($_POST['ref2Phone']) != 0){
                $updateArray['ref2Phone'] = $terpDB->sanitize($_POST['ref2Phone']);
            }
            }

            if(isset($_POST['ref3Name'])){
            if($terpDB->isAlphaNumeric($_POST['ref3Name']) != 0){
                $updateArray['ref3Name'] = $terpDB->sanitize($_POST['ref3Name']);
            }
            }

            if(isset($_POST['ref3JobTitle'])){
            if($terpDB->isAlphaNumeric($_POST['ref3JobTitle']) != 0){
                $updateArray['ref3JobTitle'] = $terpDB->sanitize($_POST['ref3JobTitle']);
            }
            }

            if(isset($_POST['ref3Email'])){
            if($terpDB->isValidEmail($_POST['ref3Email']) != 0){
                $updateArray['ref3Email'] = $terpDB->sanitize($_POST['ref3Email']);
            }
            }

            if(isset($_POST['ref3Phone'])){
            if($terpDB->isValidPhone($_POST['ref3Phone']) != 0){
                $updateArray['ref3Phone'] = $terpDB->sanitize($_POST['ref3Phone']);
            }
            }

            if(isset($_POST['persStatement'])){
            if($terpDB->isAlphaNumeric($_POST['persStatement']) != 0){
                $updateArray['persStatement'] = $terpDB->sanitize($_POST['persStatement']);
            }
            }

            if(isset($_POST['major'])){
            if($terpDB->isAlphaNumeric($_POST['major']) != 0){
                $updateArray['major'] = $terpDB->sanitize($_POST['major']);
            }
            }

            if(isset($_POST['commitment'])){
            if($terpDB->isAlphaNumeric($_POST['commitment']) != 0){
                $updateArray['commitment'] = $terpDB->sanitize($_POST['commitment']);
            }
            }

            if(isset($_POST['service'])){
            if($terpDB->isAlphabetic($_POST['service']) != 0){
                $updateArray['service'] = $terpDB->sanitize($_POST['service']);
            }
            }
            if(isset($_POST['showcase1'])){
                $updateArray['showcase1'] = $terpDB->isYouTube($_POST['showcase1']);
                //var_dump($updateArray);
            }

            if(isset($_POST['showcase2'])){
                $updateArray['showcase2'] = $terpDB->isYouTube($_POST['showcase2']);
                //var_dump($updateArray);
            }

            if(isset($_POST['showcase3'])){
                $updateArray['showcase3'] = $terpDB->isYouTube($_POST['showcase3']);
                //var_dump($updateArray);
            }
            if(isset($_POST['college'])){
                $updateArray['college'] = $terpDB->sanitize($_POST['college']);
            }
            if(isset($_POST['twitter'])){
                $updateArray['twitter'] = $terpDB->sanitize($_POST['twitter']);
            }
            if(isset($_POST['facebook'])){
                $updateArray['facebook'] = $terpDB->sanitize($_POST['facebook']);
            }
            if(isset($_POST['instagram'])){
                $updateArray['instagram'] = $terpDB->sanitize($_POST['instagram']);
            }
            if(isset($_POST['website'])){
                $updateArray['website'] = $terpDB->sanitize($_POST['website']);
            }
            if(isset($_POST['characteristics'])){
                $updateArray['characteristics'] = $terpDB->sanitize($_POST['characteristics']);
                //var_dump($updateArray);
            }
            if(isset($_POST['velocity'])){
                $updateArray['velocity'] = $terpDB->sanitize($_POST['velocity']);
            }
            if(isset($_POST['gpareq'])){
                $updateArray['gpareq'] = $terpDB->sanitize($_POST['gpareq']);
            }
            if(isset($_POST['satactreq'])){
                $updateArray['satactreq'] = $terpDB->sanitize($_POST['satactreq']);
            }
            //move profileImage to server folder
            $uploadOk = 1;
            if (is_uploaded_file($_FILES['profileImage']['tmp_name'])){ 
                //First, Validate the file name
                    if(empty($_FILES['profileImage']['name'])){
                        echo " File name is empty! ";
                        $uploadOk = 0;
                        exit;
                    }
                    $upload_file_name = $_FILES['profileImage']['name'];
                    //Too long file name?
                    if(strlen ($upload_file_name)>100){
                        echo " too long file name ";
                        $uploadOk = 0;
                    }
                    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    //replace any non-alpha-numeric cracters in th file name
                    $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
                    //set a limit to the file upload size
                    if ($_FILES['profileImage']['size'] > 1000000){
                        echo " File is too large ";
                        $uploadOk = 0;        
                    }
                    //Save the file
                    if ($uploadOk == 1){
                    $dest='./assets/img/userpictures/'.$upload_file_name;
                    //$dest='/var/www/html/assets/img/userpictures/'.$upload_file_name;
                    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $dest)){
                        //echo 'File Has Been Uploaded !';
                        $updateArray['profileImage'] = $_FILES['profileImage']['name'];
                    }
                    else{
                        //var_dump($_FILES['1111.jpg']['error']);
                    //   echo 'File was not uploaded';
                    }
                    }
                }
                $terpDB->updateUser($updateArray);
        }
    }
?>