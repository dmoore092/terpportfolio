<?php 
	/*
	* User class contains all of the methods and variables for
	* interacting with a Terp object
	*/
	class Terp{
		private $id;
		private $email;
		private $password;
		private $profile_image;
		private $name;
		private $gender;
		private $contact_phone;
		private $address;
		private $city;
		private $state;
		private $zip;
		private $college;
		private $major;
		private $grad_year;
		private $certifications;
		private $account_type;
		private $twitter;
		private $facebook;
		private $instagram;
		private $linkedin;
		private $website;
		private $reset_expires;
		
		/**
		 * getId() - returns the User's ID
		 */
		public function getId(){
			return $this->id;
		}
		
				/**
		 * getEmail() - returns the User's Email
		 */
		public function getEmail(){
			return $this->email;
		}

		/**
		 * getPassword() - returns the User's hashed password from the DB
		 */
		public function getPassword(){
			return $this->pass;
		}
		
				/**
		 * getProfileImage() - returns the User's Profile Image
		 */
		public function getProfileImage(){
			return $this->profile_image;
		}

		/**
		 * getName() - returns the User's Name
		 */
		public function getName(){
			return $this->name;
		}
		
		/**
		 * getGender() - returns the User's gender
		 */
		public function getGender(){
			return $this->gender;
		}
		
		/**
		 * getCellPhone() - returns the User's cellPhone
		 */
		public function getContactPhone(){
			return $this->contact_phone;
		}
		/**
		 * getIAddress() - returns the User's Address
		 */
		public function getAddress(){
			return $this->address;
		}
		
		/**
		 * getCity() - returns the User's City
		 */
		public function getCity(){
			return $this->city;
		}
		
		/**
		 * getState() - returns the User's State
		 */
		public function getState(){
			return $this->state;
		}
		
		/**
		 * getZip() - returns the User's Zip
		 */
		public function getZip(){
			return $this->zip;
		}
		
				/**
		 * getCollege() - returns the coach's college
		 */
		public function getCollege(){
			return $this->college;
		}

		/**
		 * getMajor() - returns terp's intended major
		 */
		public function getMajor(){
			return $this->major;
		}

		/**
		 * getGradYear() - returns the User's GradYear
		 */
		public function getGradYear(){
			return $this->grad_year;
		}

				/**
		 * getCertifications() - returns the User's certifications
		 */
		public function getCertifications(){
			return $this->certifications;
		}
		/**
		 * getAccountType() - returns the User's accounttype
		 */
		public function getAccountType(){
			return $this->account_type;
		}

				/**
		 * getTwitter() - returns the coach's twitter
		 */
		public function getTwitter(){
			return $this->twitter;
		}

		/**
		 * getInstagram() - returns the coach's instagram
		 */
		public function getInstagram(){
			return $this->instagram;
		}

		/**
		 * getFacebook() - returns the coach's facebook
		 */
		public function getFacebook(){
			return $this->facebook;
		}

		/**
		 * getLinkedin() - returns the coach's website
		 */
		public function getLinkedin(){
			return $this->linkedin;
		}

		/**
		 * getWebsite() - returns the coach's website
		 */
		public function getWebsite(){
			return $this->website;
		}

		/**
		 * getShowcase1() - returns the User's 1st showcase video
		 */
		public function getShowcase1(){
			return $this->showcase1;
		}

		/**
		 * getShowcase2() - returns the User's 2nd showcase video
		 */
		public function getShowcase2(){
			return $this->showcase2;
		}

		/**
		 * getShowcase3() - returns the User's 3rd showcase video
		 */
		public function getShowcase3(){
			return $this->showcase3;
		}

		/**
		 * getService() - returns the User's Chosen Service
		 */
		public function getService(){
			return $this->service;
		}

		/**
		 * getPersStatement() - returns the User's Personal Statement
		 */
		public function getPersStatement(){
			return $this->personal_statement;
		}

		/**
		 * getResetExpires() - returns when the terps temporary password expires
		 */
		public function getResetExpires(){
			return $this->resetExpires;
		}
	}
?>