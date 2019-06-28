<?php 
    require_once ("classes/PDO.DB.class.php");

	include("classes/Terp.class.php");

	/*
	* UserDB class contains all of the methods for using PHP Data Objects to 
	* interface with the database, specifically in relation to users.
	* version 11/6/2018
	*/
    class TerpDB extends DB{
        private $dbConn;
		/*
		* Constructor for UserDB calls the parent constructor and obtains the connection
		* using the connection accessor method. This will allow us to use methods in the parent class.
		*/
        function __construct(){
            parent::__construct();
            $this->dbConn = $this->getConn();
		}
		
		/*
		* Searchs for terp by their first or last name
		*
		*/
		function searchTerps($name){
			if($name !== " "){
				try{
				 $name = "%".$name."%";
						$data = array();
						$stmt = $this->dbConn->prepare("SELECT DISTINCT id, name, email, certifications, city, state FROM terps WHERE name LIKE :name and persontype = 'terp'"); 
						$stmt->bindParam(":name", $name, PDO::PARAM_STR, 150);    
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_CLASS,"Terps");
						while($databaseProjects = $stmt->fetch()){
								$data[] = $databaseProjects;
						}
						return $data;
				}
				catch(PDOException $e){
					echo $e->getMessage();
					throw new Exception("Problem searching for interpreters in the database.");
				}
			}
		}
		/**
		 * getUsersByRole() - returns an array of users from the database whose role matches that of the specified role
		 */
		function getTerpsByGender($gender){
			//echo $gender;
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT DISTINCT id, name, email, certifications, city, state FROM terps FROM terps WHERE gender = :gender"); 
                $stmt->bindParam("gender",$gender,PDO::PARAM_STR);    
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS,"Terp");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($databaseUser);
				}
				//var_dump($data);
                return $data;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                throw new Exception("Problem getting interpreters from database.");
            }
		}

		function getTerpsByRole($role){
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT DISTINCT id, name, email, certifications, city, state FROM terps FROM terps WHERE persontype = :role"); 
                $stmt->bindParam("role",$role,PDO::PARAM_STR);    
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS,"Terp");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($databaseUser);
				}
				//var_dump($data);
                return $data;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                throw new Exception("Problem getting interpreters from database.");
            }
		}

		function getTerpsByFindTerpSearch($query){
			try{
                $data = array();
                $stmt = $this->dbConn->query($query); 
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS,"Terp");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($data);
				}
				//var_dump($data);
                return $data;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                throw new Exception("Problem getting interpreters from database.");
            }
		}

		function getTerpsFromSearch($data=null){
            if($data != null && count($data) > 0){
                if(true){
					$html = "<div id='body-main'><div id='table-wrapper'><table>\n";
					$html .= "<tr><th>Name</th><th>Email</th><th>Certifications</th><th>City</th><th>State</th></tr>";
                    foreach($data as $terp){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$terp[0]}'>{$terp[1]}</a></td>
							<td>{$terp[2]}</td>
							<td>{$terp[3]}</td>
							<td>{$terp[4]}</td>
							<td>{$terp[5]}</td>
							<td>{$terp[6]}</td>
						</tr>\n";
					}
					$html .= "</table></div>";
					$html .= "<hr/><div class='search-wrapper'>";
					foreach($data as $terp){
						$html .= "<p><span style='color:#bb0a1e;'>Name: </span><a href='profile.php?id={$terp[0]}'>{$terp[1]}</a></p>";
						$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Highschool: </span>{$terp[2]}</p>";
						$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Class of: </span>{$terp[3]}</p>";
						$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Sport: </span>{$terp[4]}</p>";
						$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Position: </span>{$terp[6]}</p>";
						$html .= "<hr />";
					}
				$html .= "</div><!-- end of search-wrapper -->";
				}
			}
			else{
				$html = "<div id='body-main'><div id='empty-search-wrapper'><p>No terps found. Try again</p></div>";
			}
			return $html;
		}

		function getTerps($data=null){
			if($data != null && count($data) > 0){
				$html = "<hr/><div class='search-wrapper'>";
				foreach($data as $terp){
					$html .= "<span><span style='color:#bb0a1e;'>Name: </span><a href='profile.php?id={$terp->getId()}'>{$terp->getName()}</a></span>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Highschool: </span>{$terp->getEmail()}</p>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Class of: </span>{$terp->getCertifications()}</p>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Sport: </span>{$terp->getCity()}</p>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Position: </span>{$terp->getState()}</p>";
					$html .= "<hr />";
				}
				$html .= "</div><!-- end of search-wrapper --></div><!-- end of body-main -->";
			}
			return $html;
		}

		function getTerpsWhileAdminMobile($data=null){
			if($data != null && count($data) > 0){
				$html = "<hr/><div class='search-wrapper'>";
				foreach($data as $terp){
					$html .= "<span><span style='color:#bb0a1e;'>Name: </span><a href='profile.php?id={$terp->getId()}'>{$terp->getName()}</a></span>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Highschool: </span>{$terp->getEmail()}</p>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Class of: </span>{$terp->getCertifications()}</p>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Sport: </span>{$terp->getCity()}</p>";
					$html .= "<p class='terp-attrib'><span style='color:#bb0a1e;'>Position: </span>{$terp->getState()}</p>";
					$html .= "<form method='post' action=''><input type='text' name='terpid' value='{$terp->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE' onclick=\"return confirm('Do you really want to delete this profile?')\"></form>";
					$html .= "<hr />";
				}
				$html .= "</div><!-- end of search-wrapper --></div><!-- end of body-main -->";
			}
			return $html;
		}

		function getTerpsAsTableAsAdmin($data=null){//$data=null
            if($data != null && count($data) > 0){
                $html = "<div id='body-main'><div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Action</th><th>Name</th><th>School</th><th>Class of</th><th>Sport</th><th>Position</th></tr>";
                    foreach($data as $terp){
						$html .= "
						<tr>
							<td><form method='post' action=''><input type='text' name='terpid' value='{$terp->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE' onclick=\"return confirm('Do you really want to delete this profile?')\"></form></td>
                            <td><a href='profile.php?id={$terp->getId()}'>{$terp->getName()}</a></td>
							<td>{$terp->getEmail()}</td>
							<td>{$terp->getCertifications()}</td>
							<td>{$terp->getCity()}</td>
							<td>{$terp->getState()}</td>
						</tr>\n";
                    }
                }
                $html .= "</table></div>";
            }else{
                $html = "<div id='body-main'><h2 class='errorMsg'>No interpreters Found</h2></div>";
            }
            return $html;
		}
		
		function getTerpsAsTable($data=null){//$data=null
			//var_dump($data);
			//var_dump($terp->getID());
            //$data = $this->getEverythingAsObjects("project", "Project");
            if($data != null && count($data) > 0){
                $html = "<div id='body-main'><div id='table-wrapper'><table>\n";
                $html .= "<tr><th>Name</th><th>School</th><th>Class of</th><th>Sport</th><th>Position</th></tr>";
                    foreach($data as $terp){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$terp->getId()}'>{$terp->getName()}</a></td>
							<td>{$terp->getEmail()}</td>
							<td>{$terp->getCertifications()}</td>
							<td>{$terp->getCity()}</td>
							<td>{$terp->getState()}</td>
						</tr>\n";
						//<th>Email</th>
						//<td><a href='mailto:'{$terp->getEmail()}'>{$terp->getEmail()}</a></td>
                    }
                
                $html .= "</table></div>";
            }else{
                $html = "<div id='body-main'><h2 class='errorMsg'>No Interpreters Found</h2></div>";
            }
            return $html;
        }

		/**
		 * updateUser() - Takes in an associative array where the key is the field name and the value is the value to be updated for that field, then updates them
		 */
		function updateUser($updateArray){
			$id = '';
            foreach($updateArray as $key=>$val){
                switch($key){
                    case "id": // case will be the name of the form field the user types in
                        $id = $val;
						break;
                    case 'password':
                        $this->updateField('pass', $val, $id);
                        break;
                    case 'name':
                        $this->updateField('name', $val, $id);
                        break;
                    case 'gender':
                        $this->updateField('gender', $val, $id);
						break;
					case 'email':
                        $this->updateField('email', $val, $id);
                        break;
                    case 'cellPhone':
                        $this->updateField('cellPhone', $val, $id);
                        break;
                    case 'homePhone':
                        $this->updateField('homePhone', $val, $id);
						break;		
					case 'address':
                    	$this->updateField('address', $val, $id);
                        break;
                    case 'city':
                        $this->updateField('city', $val, $id);
                        break;
                    case 'state':
                        $this->updateField('state', $val, $id);
						break;
					case 'zip':
						$this->updateField('zip', $val, $id);
						break;
					case 'highschool':
						$this->updateField('highschool', $val, $id);
						break;
					case 'weight':
						$this->updateField('weight', $val, $id);
						break;
					case 'height':
						$this->updateField('height', $val, $id);
						break;
					case 'gradYear':
						$this->updateField('gradYear', $val, $id);
						break;
					case 'sport':
						$this->updateField('sport', $val, $id);
						break;
					case 'primaryPosition':
						$this->updateField('primaryPosition', $val, $id);
						break;
					case 'secondaryPosition':
						$this->updateField('secondaryPosition', $val, $id);
						break;
					case 'travelTeam':
						$this->updateField('travelTeam', $val, $id);
						break;
					case 'gpa':
						$this->updateField('gpa', $val, $id);
						break;
					case 'sat':
						$this->updateField('sat', $val, $id);
						break;
					case 'act':
						$this->updateField('act', $val, $id);
						break;
					case 'ref1Name':
						$this->updateField('ref1Name', $val, $id);
						break;
					case 'ref1JobTitle':
						$this->updateField('ref1JobTitle', $val, $id);
						break;
					case 'ref1Email':
						$this->updateField('ref1Email', $val, $id);
						break;
					case 'ref1Phone':
						$this->updateField('ref1Phone', $val, $id);
						break;
					case 'ref2Name':
						$this->updateField('ref2Name', $val, $id);
						break;
					case 'ref2JobTitle':
						$this->updateField('ref2JobTitle', $val, $id);
						break;
					case 'ref2Email':
						$this->updateField('ref2Email', $val, $id);
						break;
					case 'ref2Phone':
						$this->updateField('ref2Phone', $val, $id);
						break;
					case 'ref3Name':
						$this->updateField('ref3Name', $val, $id);
						break;
					case 'ref3JobTitle':
						$this->updateField('ref3JobTitle', $val, $id);
						break;
					case 'ref3Email':
						$this->updateField('ref3Email', $val, $id);
						break;
					case 'ref3Phone':
						$this->updateField('ref3Phone', $val, $id);
						break;
					case 'persStatement':
						$this->updateField('persStatement', $val, $id);
						break;
					case 'commitment':
						$this->updateField('commitment', $val, $id);
						break;
					case 'service':
						$this->updateField('service', $val, $id);
						break;
					case 'profileImage':
						$this->updateField('profileImage', $val, $id);
						break;
					case 'showcase1':
						$this->updateField('showcase1', $val, $id);
						break;
					case 'showcase2':
						$this->updateField('showcase2', $val, $id);
						break;
					case 'showcase3':
						$this->updateField('showcase3', $val, $id);
						break;
					case 'college':
						$this->updateField('college', $val, $id);
						break;
					case 'facebook':
						$this->updateField('facebook', $val, $id);
						break;
					case 'twitter':
						$this->updateField('twitter', $val, $id);
						break;
					case 'instagram':
						$this->updateField('instagram', $val, $id);
						break;
					case 'website':
						$this->updateField('website', $val, $id);
						break;
					case 'velocity':
						$this->updateField('velocity', $val, $id);
						break;
					case 'gpareq':
						$this->updateField('gpareq', $val, $id);
						break;
					case 'satactreq':
						$this->updateField('satactreq', $val, $id);
						break;
					case 'characteristics':
						$this->updateField('characteristics', $val, $id);
						break;
					case 'major':
						$this->updateField('major', $val, $id);
						break;
                }
			}
		}
		/** 
		 * checkPassword() - Password Reset part 1 - takes user inputted current password and checks it against the db
		 * returns true if passwords matches, allows creation of new password. For when user already knows their current password
		*/
		function checkPassword($email, $currentPassword){
			$stmt = $this->dbConn->prepare("SELECT pass FROM terps WHERE email = ?");
			$stmt->bindParam(1, $email, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS,"Terp");
            while($databaseUser = $stmt->fetch()){
				$data[] = $databaseUser;
			}
			if((count($data)) == 1){
				$pass = $data[0];

				if(password_verify($currentPassword, $pass->pass)){
					return true;
				}
				else{
					//echo $terp->getPassword();
					echo "<p style='color:red;margin-top:25px'>Your current password is incorrect</p>";
					return false;
				}
			}
			//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		}
		/*
		*updatePassword() called updateUser to update the users password. Is called after checkPasword();
		*
		*/
		function updatePassword($email, $newPassword){
			$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
			echo $hashed_password;
			try{
                $stmt = $this->dbConn->prepare("UPDATE terps SET pass = ? WHERE email = ?");
				$stmt->bindParam(1, $hashed_password, PDO::PARAM_STR);
				$stmt->bindParam(2, $email, PDO::PARAM_STR);
				$stmt->execute();
				return true;
				//echo $stmt;
            }catch(PDOException $e){
				return false;
            }
			
		}

		/**
		 * login() - Takes in a possible email and password for a given user, checks them against the databas, returns a boolean if the user and password match 
		 * and false if they don't
		 */
		function login($email, $password){
				$data = array();
				//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				//$hashed_password = hash('sha256', $password);
				$stmt = $this->dbConn->prepare("SELECT email, pass, id FROM terps WHERE email = ?"); 
				$stmt->bindParam(1, $email, PDO::PARAM_STR);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS,"Terp");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($data);
				}
				if((count($data)) == 1){
					$terp = $data[0];
					if(password_verify($password, $terp->getPassword())){
						$_SESSION['email'] = $terp->getemail();
						//$_SESSION['role'] = $user->getRole();
						$_SESSION['loggedIn'] = true;
						$_SESSION['fullname'] = $terp->getName();
						$_SESSION['id'] = $terp->getId();
					}
					//true
					return 1;

				}
				//false
				return 0;
		}
		/**
		 * ResetPassword() - Takes in a email and password passed in from a reset email sent to the user. Checks that the user
		 * custom password is correct and hasn't expired, sends back whether the password can be changed or not
		 */
		function checkTempPassExpire($email){
			$data = array();
			$now    = date("Y-m-d H:i:s");
			try{
				$stmt = $this->dbConn->prepare("SELECT reset, resetExpires FROM terps WHERE email = ?"); 
				$stmt->bindParam(1, $email, PDO::PARAM_STR);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS,"Terp");
			}
			catch(PDOException $e){
				return 0;
			}
			while($databaseUser = $stmt->fetch()){
				$data[] = $databaseUser;
			}
			if((count($data)) == 1){
				$terp = $data[0];
				$passwordExpire = $terp->getResetExpires();
				//var_dump($now);
				//var_dump($passwordExpire);
				if($now < $passwordExpire){
					return 1;
				}
				else{
					echo "<p style='color:red;margin-top:25px'>Your Temporary Password Has Expired. Please Rest Your Password Again.</p>";
					return 0;
				}
			}
			return 0;
		}
		//checks for duplicate email first
		function register($email, $hashed_password, $persontype){
			$data = [];
			$stmt = $this->dbConn->prepare("SELECT email, pass, id FROM terps WHERE email = ?");
			$stmt->bindParam(1, $email, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS,"terp");
            while($databaseUser = $stmt->fetch()){
				$data[] = $databaseUser;
			}
			if((count($data)) >= 1){
				return 0;
			}
			else{
				$persontype = 'terp';
				$profileImage = 'black.JPG';
				$query = "INSERT INTO terps(email, pass, account_type, profile_image) VALUES(:email, :pass, :account_type, :profile_image)"; 
				$stmt = $this->dbConn->prepare($query);
				$stmt->execute(array(":email"=>$email, ":pass"=>$hashed_password, ":account_type"=>$account_type, ":profile_image"=>$profileImage));

				$info = $this->dbConn->prepare("SELECT email, id, account_type FROM terps WHERE email = ?");
				$info->bindParam(1, $email, PDO::PARAM_STR);
				$info->execute();
				$info->setFetchMode(PDO::FETCH_CLASS,"terp");
            	while($databaseUser = $info->fetch()){
					$data[] = $databaseUser;
				}
				if((count($data)) == 1){
					$terp = $data[0];
					$_SESSION['email'] = $terp->getemail();
					$_SESSION['id'] = $terp->getId();
					$_SESSION['loggedIn'] = true;
					$_SESSION['account_type'] = $terp->getAccountType();
					return 1;	
				}
			}
			
		}

		function getMyInfo($id, $showAdmin){//profile.php - interpreters
			$terp = $this->getObjectByID($id);
			$html = " ";
			if ($terp != null && $terp->getAccountType() == 'terp') {
				$html .= "<div id='body-main'>
							<div id='title-wrapper'>
							<h2 id='name'><a href='myinfo.php'><img src='assets/img/edit2.png' id='edit-img'></a> {$terp->getName()}</h2>
						 </div>
						 <hr/>
						<div id='profile-area'>
							<figure>
								<img src='assets/img/userpictures/{$terp->getProfileImage()}' alt='terp picture' id='terp-pic'>
								<form method='post' action='' onsubmit=\"alert('Profile Reported.');\">
									<input type='text' name='terpid' value='{$terp->getId()}' id='hide'>
    								<input type='submit' name='report' value='Report this profile...'> 
								</form>
							</figure>
							<hr/>
							<div id='personal-statement'>
								<h3>Professional Philosophy</h3>
								<p>{$terp->getPersStatement()}</p>
							</div>
						</div><!-- end of profile-area --> 
						<h3>Videos</h3>
						<div id='videos'>
							<iframe id='ytterp' type='text/html' width='300' height='250' src='{$terp->getShowcase1()}'></iframe>
							<iframe id='ytterp' type='text/html' width='300' height='250' src='{$terp->getShowcase2()}'></iframe>
							<iframe id='ytterp' type='text/html' width='300' height='250' src='{$terp->getShowcase3()}'></iframe>
						</div>
						<hr/>
						<div id='info-box-container'>
								<div class='info-box'>
									<h3>Interpreter Bio</h3>
									<ul>
										<li><span class='attributes'>Email:</span> <a href='mailto:{$terp->getEmail()}'>{$terp->getEmail()}</a></li>
										<li><span class='attributes'>City:</span> {$terp->getCity()}</li>
										<li><span class='attributes'>State:</span> {$terp->getState()}</li>
										<li><span class='attributes'>Zip:</span> {$terp->getZip()}</li>										
										<li><span class='attributes'>twitter:</span> {$terp->getTwitter()}</li>
										<li><span class='attributes'>Facebook:</span> {$terp->getFacebook()}</li>
										<li><span class='attributes'>Instagram:</span> {$terp->getInstagram()}</li>
										<li><span class='attributes'>LinkedIn:</span> {$terp->getLinkedin()}</li>
										<li><span class='attributes'>Website:</span> {$terp->getWebsite()}</li>
									</ul>
								</div><!-- end of .info-box -->
								<div class='info-box'>
									<h3>Professional Info</h3>
									<ul>
										<li><span class='attributes'>Certifications:</span> {$terp->getCertifications()}</li>
										<li><span class='attributes'>College:</span> {$terp->getCollege()}</li>
										<li><span class='attributes'>Major:</span> {$terp->getMajor()}</li>
										<li><span class='attributes'>Graduation Year:</span> {$terp->getGradYear()}</li>
									</ul>
								</div> <!-- end of .info-box -->
							</div> <!-- end of info-box-container -->
				";
			}
			else if ($terp != null && $terp->getAccountType() == 'admin') {
				if($showAdmin == false){
					$html .= "<div id='body-main'>
								<div id='profile-area'>
									<p>Restricted</p>
								</div>
					";
				}
				else{
					$html .= "<div id='body-main'>
					<script src=\"https://js.stripe.com/v3\"></script>
					<h2>Administration Panel</h2>
					<div id='content'>
						<h3>Search for terp or Coach</h3>
					<div id='form-wrapper'>
					<form   id='terp-form'
							class='admin-panel'
							method = 'POST'
							action= ''
							onsubmit = '' 
							enctype='multipart/form-data' >
						<input type='text'
								id = 'name'
								name = 'name'
								size = '20'
								maxlength = '50'
								placeholder = 'Full Name'
								value=''
								onclick='' />
								
						<select name='sport'>
							<option value=' ' selected disabled>Select Sport:</option>
							<option value='football'>Football</option>
							<option value='basketball'>Basketball</option>
							<option value='baseball'>Baseball</option>
							<option value='softball'>Softball</option>
							<option value='hockey'>Hockey</option>
							<option value='fieldhockey'>Field Hockey</option>
							<option value='lacrosse'>Lacrosse</option>
							<option value='soccer'>Soccer</option>
							<option value='trackandField'>Track and Field</option>
							<option value='volleyball'>Volleyball</option>
							<option value='wrestling'>Wrestling</option>
							<option value='tennis'>Tennis</option>
							<option value='swimming'>Swimming</option>
							<option value='golf'>Golf</option>
							<option value='gymnastics'>Gymnastics</option>
							<option value='cheerleading'>Cheerleading</option>
							<option value='esports'>Esports</option>
						</select>
						<select name='state'>
						<option value=' ' selected disabled>Select State:</option>
							<option value='New York'>New York</option>
							<option value='Alabama'>Alabama</option>
							<option value='Alaska'>Alaska</option>
							<option value='Arizona'>Arizona</option>
							<option value='rkansas'>Arkansas</option>
							<option value='California'>California</option>
							<option value='Colorado'>Colorado</option>
							<option value='Connecticut'>Connecticut</option>
							<option value='Delaware'>Delaware</option>
							<option value='District of columbia'>District Of Columbia</option>
							<option value='Florida'>Florida</option>
							<option value='Georgia'>Georgia</option>
							<option value='Hawaii'>Hawaii</option>
							<option value='Idaho'>Idaho</option>
							<option value='Illinois'>Illinois</option>
							<option value='Indiana'>Indiana</option>
							<option value='Iowa'>Iowa</option>
							<option value='Kansas'>Kansas</option>
							<option value='Kentucky'>Kentucky</option>
							<option value='Louisiana'>Louisiana</option>
							<option value='Maine'>Maine</option>
							<option value='Maryland'>Maryland</option>
							<option value='Massachusetts'>Massachusetts</option>
							<option value='Michigan'>Michigan</option>
							<option value='Minnesota'>Minnesota</option>
							<option value='Mississippi'>Mississippi</option>
							<option value='Missouri'>Missouri</option>
							<option value='Montana'>Montana</option>
							<option value='Nebraska'>Nebraska</option>
							<option value='Nevada'>Nevada</option>
							<option value='New Hampshire'>New Hampshire</option>
							<option value='New Jersey'>New Jersey</option>
							<option value='New Mexico'>New Mexico</option>
							<option value='New York'>New York</option>
							<option value='North Carolina'>North Carolina</option>
							<option value='North Dakota'>North Dakota</option>
							<option value='Ohio'>Ohio</option>
							<option value='Oklahoma'>Oklahoma</option>
							<option value='Oregon'>Oregon</option>
							<option value='Pennsylvania'>Pennsylvania</option>
							<option value='Rhode Island'>Rhode Island</option>
							<option value='South Carolina'>South Carolina</option>
							<option value='South Dakota'>South Dakota</option>
							<option value='Tennessee'>Tennessee</option>
							<option value='Texas'>Texas</option>
							<option value='Utah'>Utah</option>
							<option value='Vermont'>Vermont</option>
							<option value='Virginia'>Virginia</option>
							<option value='Washington'>Washington</option>
							<option value='West Virginia'>West Virginia</option>
							<option value='Wisconsin'>Wisconsin</option>
							<option value='Wyoming'>Wyoming</option>			
						</select>
						<select name='class'>
							<option value=' ' selected disabled>Class of:</option>
							<option value='2024'>2024</option>
							<option value='2023'>2023</option>
							<option value='2022'>2022</option>
							<option value='2021'>2021</option>
							<option value='2022'>2020</option>
							<option value='2019'>2019</option>
							<option value='2018'>2018</option>
							<option value='2017'>2017</option>
							<option value='2016'>2016</option>
							<option value='2015'>2015</option>
							<option value='2014'>2014</option>
							<option value='2013'>2013</option>
							<option value='2012'>2012</option>
							<option value='2011'>2011</option>
							<option value='2010'>2010</option>
						</select>
						<input type='text'
								id = 'position'
								name = 'position'
								size = '20'
								maxlength = '50'
								placeholder = 'Position'
								value=''
								onclick='' />
						
						<input type='text'
								id = 'school'
								name = 'school'
								size = '20'
								maxlength = '50'
								placeholder = 'School'
								value=''
								onclick='' />
								
						<select name='gpa'>
							<option value=' ' selected disabled>Select GPA:</option>
							<option value='4.5'>Greater than 4.5</option>
							<option value='4.0'>Greater than 4.0</option>
							<option value='3.5'>Greater than 3.5</option>
							<option value='3.0'>Greater than 3.0</option>
							<option value='2.5'>Greater than 2.5</option>
							<option value='2.0'>Greater than 2.0</option>
						</select>
						<input type='submit'
							value='Search'
							name = 'admin-search'
							class='btnSubmit'
							id='btn-Submit'/>
						<input type='submit'
							value='Download Database'
							name = 'download-db'
							class='btnSubmit'
							id=''/>
						<hr />
					</form>
					<button style=\"background-color:#bb0a1e;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1.2em\" 
							id=\"checkout-button-plan_FJ7HouBZeAK4zB\"
							class=\"btnSubmit\" 
							role=\"link\"
							onclick=\"pay()\">
						Pay For Webhosting
					</button>
					</div> <!-- end of form-wrapper -->
					<div id=\"error-message\"></div>
					<script>
						var stripe = Stripe('pk_live_S2WeKKv4ANIOBSjI3FdXx5Uf00TTNsDx2j');
						var checkoutButton = document.getElementById('checkout-button-plan_FJ7HouBZeAK4zB');
						function pay(){
							stripe.redirectToCheckout({
								items: [{plan: 'plan_FJ7HouBZeAK4zB', quantity: 1}],
								successUrl: window.location.protocol + '//www.athleticprospects.com/index',
								cancelUrl: window.location.protocol + '//www.athleticprospects.com/index',
							})
							.then(function (result) {
							if (result.error) {
								var displayror = document.getElementById('error-message');
								displayError.textContent = result.error.message;
							}
							});
						}
					</script>
					</div><!-- end of #content -->
					";
				}
			}
			return $html;
		}
		function getMyEditableInfo($id) {//myInfo.php
			$terp = $this->getObjectByID($id);
			$html = " ";
			//var_dump($_FILES);
			//populate gender option if it's set
			$m=null;$f=null;
			switch($terp->getGender()){
				case "Male": 
					$m = "selected";
					break;
				case "Female":
					$f = "selected";
					break;
				case "Other":
					$o = "selected";
					break;
				case "Prefer to not say":
					$p = "selected";
					break;
			}

			//populate state if it's set
			$al= null;$ak= null;$az= null;$ar= null;$ca= null;$co= null;$ct= null;$de= null;$dc= null;$fl= null;
			$ga= null;$hi= null;$ida= null;$il= null;$in= null;$ia= null;$ks= null;$ky= null;$la= null;$me= null;
			$md= null;$ma= null;$mi= null;$mn= null;$ms= null;$mo= null;$mt= null;$ne= null;$nv= null;$nh= null;
			$nj= null;$nm= null;$nc= null;$nd= null;$oh= null;$ok= null;$or= null;$pa= null;$ri= null;$sc= null;
			$sd= null;$tn= null;$tx= null;$ut= null;$vt= null;$va= null;$wa= null;$wv= null;$wi= null;$wy= null;
			$ny= null;
			switch($terp->getState()){
				case "New York": 
					$ny = "selected";
					break;
				case "Alabama":
					$al = "selected";
					break;
				case "Alaska": 
					$ak = "selected";
					break;
				case "Arizona":
					$az = "selected";
					break;
				case "Arkansas": 
					$ar = "selected";
					break;
				case "California":
					$ca = "selected";
					break;
				case "Colorado": 
					$co = "selected";
					break;
				case "Connecticut":
					$ct = "selected";
					break;
				case "Deleware": 
					$de = "selected";
					break;
				case "District of Columbia":
					$dc = "selected";
					break;
				case "Florida": 
					$fl = "selected";
					break;
				case "Georgia":
					$ga = "selected";
					break;
				case "Hawaii": 
					$hi = "selected";
					break;
				case "Idaho":
					$ida = "selected";
					break;
				case "Illinois": 
					$il = "selected";
					break;
				case "Indiana":
					$in = "selected";
					break;
				case "Iowa": 
					$ia = "selected";
					break;
				case "Kansas":
					$ks = "selected";
					break;
				case "Kentucky": 
					$ky = "selected";
					break;
				case "Louisiana":
					$la = "selected";
					break;
				case "Maine": 
					$me = "selected";
					break;
				case "Maryland":
					$md = "selected";
					break;
				case "Massachusetts": 
					$ma = "selected";
					break;
				case "Michigan":
					$mi = "selected";
					break;
				case "Minnesota": 
					$mn = "selected";
					break;
				case "Mississippi":
					$ms = "selected";
					break;
				case "Missouri": 
					$mo = "selected";
					break;
				case "Montana":
					$mt = "selected";
					break;
				case "Nebraska": 
					$ne = "selected";
					break;
				case "Nevada":
					$nv = "selected";
					break;
				case "New Hampshire": 
					$nh = "selected";
					break;
				case "New Jersey":
					$nj = "selected";
					break;
				case "New Mexico": 
					$nm = "selected";
					break;
				case "North Carolina":
					$nc = "selected";
					break;
				case "North Dakota": 
					$nd = "selected";
					break;
				case "Ohio":
					$oh = "selected";
					break;
				case "Oklahoma": 
					$ok = "selected";
					break;
				case "Oregon":
					$or = "selected";
					break;
				case "Pennsylvania": 
					$pa = "selected";
					break;
				case "Rhode Island":
					$ri = "selected";
					break;
				case "South Carolina": 
					$sc = "selected";
					break;
				case "South Dakota":
					$sd = "selected";
					break;
				case "Tennessee": 
					$tn = "selected";
					break;
				case "Texas":
					$tx = "selected";
					break;
				case "Utah": 
					$ut = "selected";
					break;
				case "Vermont":
					$vt = "selected";
					break;
				case "Virginia": 
					$va = "selected";
					break;
				case "Washington":
					$wa = "selected";
					break;
				case "West Virginia": 
					$wv = "selected";
					break;
				case "Wisconsin":
					$wi = "selected";
					break;
				case "Wyoming": 
					$wy = "selected";
					break;
			}
			
			if ($terp != null && $terp->getPersonType() == 'terp') {
				$male=null;$female=null;
				//profile.php?id={$terp->getId()}
				$html .= "<div id='body-main'>
					<form id='terp-form'
						  method = 'POST'
						  action= 'profile.php?id={$terp->getId()}'
						  onsubmit = '' 
						  enctype='multipart/form-data' >
						<h1>Interpreter Bio</h1>
						<div id='refs-container'>
						<p>
						<label class='span'>Name:* &nbsp; </label> 
							<input type='text'
								   id = 'name'
								   name= 'name'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'First and Last Name'
								   value='{$terp->getName()}'
								   required />
						</p>
						<p>
						 <label class='span'>Email:* &nbsp; </label> 
							<input type='email'
								   id = 'email'
								   name= 'email'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'example@example.com'
								   value='{$terp->getEmail()}'
								   required />
						</p>
						<p>
						<label class='span'>Gender:* &nbsp; </label> 
							<select name='gender' >
								<option value=' ' selected disabled>Select Gender:</option>
								<option {$m} value='Male'    >Male    </option>
								<option {$f} value='Female'  >Female  </option>
								<option {$o} value='Other'  >Other  </option>
								<option {$p} value='Prefer to not say'  >Prefer to not say  </option>
							</select>
						</p>
						<p>
						<label class='span'>Cell Phone:* &nbsp; </label>
							<input type='tel'
								   id = 'cellphone'
								   name= 'cellPhone'
								   pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx-xxx-xxxx'
								   value='{$terp->getContactPhone()}'
								    />
						</p>
						<p>
						<label class='span'>Address:* &nbsp; </label>
							<input type='text'
								   id = 'address'
								   name= 'address'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Address'
								   value='{$terp->getAddress()}'
								    />
						</p>
						<p>
						<label class='span'>City:* &nbsp; </label>
							<input type='text'
								   id = 'city'
								   name= 'city'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your City'
								   value='{$terp->getCity()}'
								    />
						</p>
						<p>
						<label class='span' for='state'>State:* &nbsp;</label>
							<select name='state' >
								<option value=' ' selected disabled>Select State:</option>
								<option {$ny} value='New York'>New York</option>
								<option {$al} value='Alabama'>Alabama</option>
								<option {$ak} value='Alaska'>Alaska</option>
								<option {$az} value='Arizona'>Arizona</option>
								<option {$ar} value='Arkansas'>Arkansas</option>
								<option {$ca} value='California'>California</option>
								<option {$co} value='Colorado'>Colorado</option>
								<option {$ct} value='Connecticut'>Connecticut</option>
								<option {$de} value='Delaware'>Delaware</option>
								<option {$dc} value='District of Columbia'>District Of Columbia</option>
								<option {$fl} value='Florida'>Florida</option>
								<option {$ga} value='Georgia'>Georgia</option>
								<option {$hi} value='Hawaii'>Hawaii</option>
								<option {$ida} value='Idaho'>Idaho</option>
								<option {$il} value='Illinois'>Illinois</option>
								<option {$in} value='Indiana'>Indiana</option>
								<option {$ia} value='Iowa'>Iowa</option>
								<option {$ks} value='Kansas'>Kansas</option>
								<option {$ky} value='Kentucky'>Kentucky</option>
								<option {$la} value='Louisiana'>Louisiana</option>
								<option {$me} value='Maine'>Maine</option>
								<option {$md} value='Maryland'>Maryland</option>
								<option {$ma} value='Massachusetts'>Massachusetts</option>
								<option {$mi} value='Michigan'>Michigan</option>
								<option {$mn} value='Minnesota'>Minnesota</option>
								<option {$ms} value='Mississippi'>Mississippi</option>
								<option {$mo} value='Missouri'>Missouri</option>
								<option {$mt} value='Montana'>Montana</option>
								<option {$ne} value='Nebraska'>Nebraska</option>
								<option {$nv} value='Nevada'>Nevada</option>
								<option {$nh} value='New Hampshire'>New Hampshire</option>
								<option {$nj} value='New Jersey'>New Jersey</option>
								<option {$nm} value='New Mexico'>New Mexico</option>
								<option {$nc} value='North Carolina'>North Carolina</option>
								<option {$nd} value='North Dakota'>North Dakota</option>
								<option {$oh} value='Ohio'>Ohio</option>
								<option {$ok} value='Oklahoma'>Oklahoma</option>
								<option {$or} value='Oregon'>Oregon</option>
								<option {$pa} value='Pennsylvania'>Pennsylvania</option>
								<option {$ri} value='Rhode Island'>Rhode Island</option>
								<option {$sc} value='South Carolina'>South Carolina</option>
								<option {$sd} value='South Dakota'>South Dakota</option>
								<option {$tn} value='Tennessee'>Tennessee</option>
								<option {$tx} value='Texas'>Texas</option>
								<option {$ut} value='Utah'>Utah</option>
								<option {$vt} value='Vermont'>Vermont</option>
								<option {$va} value='Virginia'>Virginia</option>
								<option {$wa} value='Washington'>Washington</option>
								<option {$wv} value='West Virginia'>West Virginia</option>
								<option {$wi} value='Wisconsin'>Wisconsin</option>
								<option {$wy} value='Wyoming'>Wyoming</option>			
							</select>
						</p>
						<p>
						<label class='span'>Zip:* &nbsp; </label>
							<input type='text'
								   id = 'zip'
								   name= 'zip'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxxxx'
								   value='{$terp->getZip()}'
							/>
						</p>
						<p>
						<label class='span'>College:* &nbsp; </label>
							<input type='text'
								   id = 'college'
								   name= 'college'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'College'
								   value='{$terp->getCollege()}'
							/>
						</p>
						<p>
						<label class='span'>Major:* &nbsp; </label>
							<input type='text'
								   id = 'major'
								   name= 'major'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'ITP, etc'
								   value='{$terp->getMajor()}'
							/>
						</p>
						<p>
						<label class='span'>Graduation Year*: &nbsp; </label>
						  <input type='text'
								 id = 'grad-year'
								 name= 'gradYear'
								 size = '35'
								 maxlength = '50'
								 placeholder = 'xxxx'
								 value='{$terp->getGradYear()}'
							/>
						</p>
						<p>
						<label class='span'>Certifications*: &nbsp; </label>
						<input type='text'
							   id = 'certifications'
							   name= 'certifications'
							   size = '35'
							   maxlength = '50'
							   placeholder = 'BEI, NIC, etc'
							   value='{$terp->getCertifications()}'
							/>
						</p>
						<p>
						<label class='span'>Twitter*: &nbsp; </label>
						<input type='text'
								id = 'twitter'
								name= 'twitter'
								size = '35'
								maxlength = '50'
								placeholder = '@yourname'
								value='{$terp->getTwitter()}'
							/>
						</p>
						<p>
						<label class='span'>Facebook*: &nbsp; </label>
						<input type='text'
								id = 'facebook'
								name= 'facebook'
								size = '35'
								maxlength = '50'
								placeholder = 'yourname'
								value='{$terp->getFacebook()}'
							/>
						</p>
						<p>
						<label class='span'>Instagram*: &nbsp; </label>
						<input type='text'
								id = 'instagram'
								name= 'instagram'
								size = '35'
								maxlength = '50'
								placeholder = 'yourname'
								value='{$terp->getInstagram()}'
							/>
						</p>
						<p>
						<label class='span'>LinkedIn*: &nbsp; </label>
						<input type='text'
								id = 'linkedin'
								name= 'linkedin'
								size = '35'
								maxlength = '50'
								placeholder = 'yourprofile'
								value='{$terp->getLinkedin()}'
							/>
						</p>
						<p>
							<label class='span'>Website*: &nbsp; </label>
							<input type='text'
									id = 'website'
									name= 'website'
									size = '35'
									maxlength = '50'
									placeholder = 'www.yoursite.com'
									value='{$terp->getWebsite()}'
							/>
						</p>
					</div>
						<hr/>
						<h3>terp Image and Video</h3>
						<div id='refs'>
							<p>
								<span class='span'>Upload terp Profile Picture: &nbsp; </span>
								<input type='file' name='profileImage' accept='image/*'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 1 ): &nbsp; </span>
								<input type='text' name='showcase1' id='showcase1' class='showcase' size = '35' maxlength = '50' value='{$terp->getShowcase1()}'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 2 ): &nbsp; </span>
								<input type='text' name='showcase2' id='showcase2' class='showcase' size = '35' maxlength = '50' value='{$terp->getShowcase2()}'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 3 ): &nbsp; </span>
								<input type='text' name='showcase3' id='showcase3' class='showcase' size = '35' maxlength = '50' value='{$terp->getShowcase3()}'>
							</p>
						</div><!-- end of refs -->
						<hr/>
						<div id='refs'>
						<p class='span'>Personal Statement: &nbsp; </p>
						<p>
						  <textarea placeholder='Personal Statement...' rows='4' cols='150' id='textarea' name='persStatement' form='terp-form'>{$terp->getPersStatement()}</textarea>
					  	</p>  
						  </div>
					</div><!-- end of test-container -->
						<input type='submit'
							   value='Update My Info'
							   name = 'updateUserInfo'
							   class='btn-all-buttons'
							   id='btnSubmit'
							   onClick='checkMyInfo()' />
				</form>
				<a href='passwordreset.php'>Reset my password>>></a>
				</body>
					\n";
				
			}
			return $html;
		}
	} // class
?>

<?php 
// <!-- <p class='servicelabel' for='service'>Choose Service</p> -->
//<!-- <select id='service' name='service'>
//						  <option value='' disabled selected>Choose Service</option>
//						  <option value='free'>Free terp Profile</option>
//						  <option value='biweekly'>Bi-weekly recruiting checklist and articles - $100/per year</option>
//						  <option value='mentor1yr'>Mentor Program 1 year - $1099</option>
//						  <option value='mentor6mo'>Mentor Program 6 months - $650</option>
//					  	</select> -->
//
//						  <!-- <li><span class='attributes'>Cell Phone:</span> {$terp->getCellPhone()}</li>
//							<li><span class='attributes'>Home Phone:</span> {$terp->getHomePhone()}</li> -->
//
?>