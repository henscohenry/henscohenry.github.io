<?php

require_once("initialise.php");

class database extends alerts{
		public $dbase;
		public $user_email,
				$admin_email,
				$admin_code,
				$user_id,
				$username,
				$phone_no,
				$usertype,
				$profile_pic,
				$cover_pic,
				$open_days,
				$open_time,
				$close_time,
				$address,
				$city,
				$country,
				$password,
				$fetched_email,
				$fetched_user_id,
				$regDate,
				$regTime;
		private $regTable = "bookarreg";
		private $regAdminTable = "bookar_reg_admin";
		private $userRegTable = "bookaruser";
		private $loginTable = "bookarlogin";
		private $bookarTable = "bookar_store";
		private $cartTable = "bookarcart";
		private $bookarMpesaTable = "bookarmpesa";
		private $paymentTable = "bookarpayment";
		private $balanceTable = "bookarpaymentbalances";
		public $stmt;
		public $session_email,$session_user_id,$session_username,$session_user_type,$session_phone,$session_regDate,$session_regTime;

		public $bk_category,$bk_name,$bk_description,$bk_stock,$bk_no_tables,$bk_id,$bk_price,$bk_location,$bk_vacancy,$bk_qty,$bk_date
				,$bk_time,$bk_stop_date,$bk_stop_time,$bk_photo_path,$cart_id,$cart_status,$total;

		public $fetched_bk_category,$fetched_bk_name,$fetched_bk_description,$fetched_bk_stock,$fetched_bk_id,$fetched_bk_price,$fetched_bk_location,
				$fetched_bk_qty,$fetched_bk_date,$fetched_bk_time,$fetched_bk_stop_date,$fetched_bk_stop_time,$fetched_bk_photo_path;

		public $post_id,$post_title,$post_data,$post_photo_path;
		public $regUserId,$regUsername,$regUserEmail,$regUserPhone,$full_name;
		public $fetchedPayId,$fetchedPayUserId,$fetchedPayAmount,$fetchedPayMethod,$fetchedPayStat,$fetchedPayDate,$fetchedPayTime;

		public function __construct()
		{
			$this->connect();
		}


		public function connect()
		{

			try {

				$this->dbase = new PDO("mysql:host=".server.";dbname=".database,user,pass);

				

			}catch(PDOException $e) {

				echo "Failed to connect to db";

			}

			$this->dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		public function set_email($email)
		{
			$this->user_email = $email;
		}
		
		public function set_admin_email($admin_email)
		{
			$this->admin_email = $admin_email;
		}
		
		public function set_admin_code($admin_code)
		{
			$this->admin_code = $admin_code;
		}

		public function set_user_id($userId)
		{
			$this->user_id = $userId;
		}

		public function set_user_city($city){
			$this->city =$city;
		}

		public function set_user_country($country){
			$this->country =$country;
		}

		public function set_user_address($address){
			$this->address = $address;
		}

		public function set_username($username)
		{
			$this->username = $username;
		}

		public function set_full_name($fname,$lname)
		{
			$this->full_name = $fname." ".$lname;
		}

		public function set_phone_no($phoneNo)
		{
			$this->phone_no = $phoneNo;
		}

		public function set_user_type($usertype)
		{
			$this->usertype = $usertype;
		}
		
		public function set_profile_pic($profile_pic)
		{
			$this->profile_pic = $profile_pic;
		}
		
		public function set_cover_pic($cover_pic)
		{
			$this->cover_pic = $cover_pic;
		}
		
		public function set_open_days($open_days)
		{
			$this->open_days = $open_days;
		}
		
		public function set_open_time($open_time)
		{
			$this->open_time = $open_time;
		}
		
		public function set_close_time($close_time)
		{
			$this->close_time = $close_time;
		}

		public function set_address($address)
		{
			$this->address = $address;
		}

		public function set_city($city)
		{
			$this->city = $city;
		}

		public function set_country($country)
		{
			$this->country = $country;
		}

		public function set_password($pass)
		{
			$this->password = md5($pass);
		}

		public function set_photo_id($photoid)
		{
			$this->photo_id = $photoid;
		}

		public function set_photo_name($photoname)
		{
			$this->photo_name = $photoname;
		}

		public function set_photo_desc($photodesc)
		{
			$this->photo_desc = $photodesc;
		}

		public function set_photo_path($photopath)
		{
			$this->photo_path = $photopath;
		}

		public function set_post_id($postid) 
		{
			$this->post_id = $postid;
		}

		public function set_post_title($title)
		{
			$this->post_title = $title;
		}

		public function set_post_data($postdata)
		{
			$this->post_data = $postdata;
		}

		public function set_post_photo_path($photopath)
		{
			$this->post_photo_path = $photopath;
		}
		
		public function set_prod_id($prod_id)
		{
			$this->prod_id = $prod_id;
		}
		
		public function set_cart_id($cartId)
		{
			$this->cart_id = $cartId;
		}
		
		public function set_cart_status($cartStatus)
		{
			$this->cart_status = $cartStatus;
		}

		public function set_bk_id($bk_id)
		{
			$this->bk_id = $bk_id;
		}
		
		public function set_bk_category($category)
		{
			$this->bk_category = $category;
		}
		
		public function set_bk_name($name)
		{
			$this->bk_name = $name;
		}
		
		public function set_bk_description($bk_desc)
		{
			$this->bk_description = $bk_desc;
		}
		
		public function set_bk_stock($bk_stock)
		{
			$this->bk_stock = $bk_stock;
		}
		
		public function set_bk_no_seats($bk_no_tables)
		{
			$this->bk_no_tables = $bk_no_tables;
		}
		
		public function set_bk_qty($bk_qty)
		{
			$this->bk_qty = $bk_qty;
		}
		
		public function set_bk_photo_path($bk_photo_path)
		{
			$this->bk_photo_path = $bk_photo_path;
		}
		
		public function set_bk_price($bk_price)
		{
			$this->bk_price = $bk_price;
		}

		public function set_bk_location($bk_location)
		{
			$this->bk_location = $bk_location;
		}
		
		public function set_bk_vacancy($bk_vacancy)
		{
			$this->bk_vacancy = $bk_vacancy;
		}

		public function set_bk_date($bk_start)
		{
			$this->bk_date = $bk_start;
		}

		public function set_bk_time($bk_start)
		{
			$this->bk_time = $bk_start;
		}

		public function set_bk_stop_date($bk_stop)
		{
			$this->bk_stop_date = $bk_stop;
		}

		public function set_bk_stop_time($bk_stop)
		{
			$this->bk_stop_time = $bk_stop;
		}
		

		public function insert_to_bookar_table()
		{
			$this->stmt = $this->dbase->prepare("INSERT INTO $this->bookarTable(Category,BookarId,OwnerId,BookarName,BookarDesc,PicPath,BookarStock,BookarSeatsTotal,BookarPrice,BookarLocation,BookarVacancy,BookarDate,BookarTime) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?,now(),now() )");

			$this->stmt->bindParam(1,$this->bk_category);
			$this->stmt->bindParam(2,$this->bk_id);
			$this->stmt->bindParam(3,$this->user_id);
			$this->stmt->bindParam(4,$this->bk_name);
			$this->stmt->bindParam(5,$this->bk_description);
			$this->stmt->bindParam(6,$this->bk_photo_path);
			$this->stmt->bindParam(7,$this->bk_stock);
			$this->stmt->bindParam(8,$this->bk_no_tables);
			$this->stmt->bindParam(9,$this->bk_price);
			$this->stmt->bindParam(10,$this->bk_location);
			$this->stmt->bindParam(11,$this->bk_vacancy);
			/* $this->stmt->bindParam(10,date("Y-m-d",'now'));
			$this->stmt->bindParam(11,date("H:i:s",'now')); */
			$this->stmt->execute();

			if($this->stmt) {
				return true;
			} else {
				return false;
			}
		}

		public function update_bookar_table($UserId)
		{
			$this->stmt = $this->dbase->prepare
			("UPDATE $this->bookarTable SET Category=?,BookarId=?,OwnerId=?,BookarName=?,BookarDesc=?,BookarStock=?,BookarPrice=?,BookarLocation=?,BookarVacancy,
				BookarDate=now(),BookarTime=now() WHERE BookarId=? AND OwnerId='$UserId' AND BookarVacancy='Vacant' ");

			$this->stmt->bindParam(1,$this->bk_category);
			$this->stmt->bindParam(2,$this->bk_id);
			$this->stmt->bindParam(3,$this->user_id);
			$this->stmt->bindParam(4,$this->bk_name);
			$this->stmt->bindParam(5,$this->bk_description);
			$this->stmt->bindParam(6,$this->bk_stock);
			$this->stmt->bindParam(7,$this->bk_price);
			$this->stmt->bindParam(8,$this->bk_location);
			$this->stmt->bindParam(9,$this->bk_id);
			$this->stmt->bindParam(10,$this->bk_vacancy);
			$this->stmt->execute();

			if($this->stmt) {
				return true;
			} else {
				return false;
			}
		}
		
		public function update_bk_vacancy_status($bookar_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->bookarTable SET BookarVacancy='Not Vacant' WHERE BookarId=? ");
			
			$this->stmt->bindParam(1,$bookar_id);
			
			$this->stmt->execute(); 

			if($this->stmt) {
				return true;
			} else {
				return false;
			} 
			
		}
		
		public function search_bookars($keyword)
		{

			$this->stmt = $this->dbase->prepare("SELECT * FROM $this->bookarTable WHERE Category LIKE ? OR BookarName LIKE ? 
				OR BookarDesc LIKE ? OR BookarLocation LIKE ? AND BookarVacancy='Vacant' ");

			$this->stmt->execute(array("%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%"));

			return $this->stmt;

		}
		
		public function search_bookar_category($keyword)
		{

			$this->stmt = $this->dbase->prepare("SELECT * FROM $this->bookarTable WHERE Category LIKE ? AND BookarVacancy='Vacant' ");

			$this->stmt->execute(array("%".$keyword."%"));

			return $this->stmt;

		}

		public function delete_bookar($bookar_id)
		{

			$this->stmt = $this->dbase->prepare("DELETE FROM $this->bookarTable WHERE BookarId=? ");

			$this->stmt->bindParam(1,$bookar_id);
			$this->stmt->execute();

			if($this->stmt) {
				return true;
			} else {
				return false;
			}

		}
		
		public function fetch_from_bookar_table_by_category_index($Cat)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE Category='$Cat' ORDER BY BookarDate ASC LIMIT 4");
			
			return $sql;
		}
		
		public function fetch_from_bookar_table_by_category($Cat)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE Category='$Cat' ORDER BY BookarDate");
			
			return $sql;
		}
		
		public function fetch_from_bookar_table()
		{
			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE BookarVacancy='Vacant' ORDER BY BookarDate LIMIT 12");
			
			return $sql;
		}
		
		public function fetch_from_bookar_table_by_club($ownerId)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE BookarVacancy='Vacant' AND OwnerId='$ownerId' ORDER BY BookarDate LIMIT 12");
			
			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				echo "<h2>NO CARS AT THE MOMENT</h2>";
			}
			
		}

		public function fetch_bookar_by_owner_category($OwnerId,$Cat)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE OwnerId='$OwnerId' AND Category='$Cat'  ");

			return $sql;

		}

		public function fetch_specific_bookar_data($bookar_id)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE BookarId='$bookar_id' ");
			
			if($sql->rowCount() > 0 ) {

				foreach($sql as $row) {


							$this->fetched_bk_category = $row["Category"];
							$this->fetched_bk_id = $row["BookarId"];
							$this->fetched_user_id = $row["OwnerId"];
							$this->fetched_bk_name = $row["BookarName"];
							$this->fetched_bk_description = $row["BookarDesc"];
							$this->fetched_bk_photo_path = $row["PicPath"];
							$this->fetched_bk_stock = $row["BookarStock"];
							$this->fetched_bk_price = $row["BookarPrice"];
							$this->fetched_bk_location = $row["BookarLocation"];
							$this->fetched_bk_date = $row["BookarDate"];
							$this->fetched_bk_time = $row["BookarTime"];

				}

			} else {

				echo "Invalid BookarId";

			}

		}

		/*public function fetch_all_bookar_specific_data()
		{

			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable a,$this->")

		}*/

		public function fetch_from_bookar_table_ID($BookarId)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->bookarTable WHERE BookarId='$BookarId' ");
			
			return $sql;
		}
		
		public function fetch_from_reg_by_owner_id($UserId)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserId='$UserId' ");
			
			return $sql;
		}

		public function fetch_all_bookar_by_owners($OwnerId)
		{
			$sql = $this->dbase->query("SELECT DISTINCT a.BookarId,b.BookarId,a.OwnerId FROM $this->bookarTable a,$this->paymentTable b 
				WHERE a.BookarId=b.BookarId AND a.OwnerId='$OwnerId' ");

			return $sql;
		}
		
		public function insert_to_cart_table()
		{
			$this->stmt = $this->dbase->prepare("INSERT INTO $this->cartTable(CustId,CartId,CartStatus,Category,ProdId,ProdName,ProdQty,ProdPrice,PaymentId,CartDate,CartTime) 
																	VALUES(:custId,:cartId,:cartStatus,:cat,:prodid,:pname,:pQty,:price,:payid,now(),now())");

			$this->stmt->bindParam(":custId",$this->user_id);
			$this->stmt->bindParam(":cartId",$this->cart_id);
			$this->stmt->bindParam(":cartStatus",$this->cart_status);
			$this->stmt->bindParam(":cat",$this->prod_category);
			$this->stmt->bindParam(":prodid",$this->prod_id);
			$this->stmt->bindParam(":pname",$this->prod_name);
			$this->stmt->bindParam(":pQty",$this->prod_qty);
			$this->stmt->bindParam(":price",$this->prod_price);
			$this->stmt->bindParam(":payid",$this->pay_id);
			$this->stmt->execute();

			if($this->stmt) {
				return true;
			} else {
				return false;
			}
		}

		public function fetch_from_cart_table($session_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->cartTable WHERE CustId='$session_id' AND CartStatus='Cart' ");
			
			return $sql;
		}

		public function fetch_all_from_pay_table()
		{
			$sql = $this->dbase->query("SELECT * FROM $this->paymentTable a,$this->cartTable b WHERE a.PaymentId = b.PaymentId AND a.DeliveryStat='Not Delivered' ");
			
			return $sql;
		}
		
		public function fetch_all_from_reg_table($user_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->regTable  WHERE UserId='$user_id' ");
			
			foreach($sql as $row) {
				$this->regUserId = $row["UserId"];
				$this->regUsername = $row["Username"];
				$this->regUserEmail = $row["Email"];
				$this->regUserPhone = $row["PhoneNo"];
			}
		}
		
		public function update_cart_table($session_id,$pay_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->cartTable SET CartStatus='offload', PaymentId='$pay_id' WHERE CustId='$session_id' ");
			$this->stmt->execute();
			
			if($this->stmt) {
				return true;
			} else {
				return false;
			}
			
		}

		public function update_manager_pay_table($prod_id,$cart_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->paymentTable a,$this->cartTable b SET a.DeliveryStat='Delivery'
			 WHERE a.PaymentId= b.PaymentId AND b.CartId='$cart_id' AND b.ProdId='$prod_id' ");
			$this->stmt->execute();
			
			if($this->stmt) {
				return true;
			} else {
				return false;
			}
			
		}
		
		public function insert_to_payment_table()
		{
			$this->stmt = $this->dbase->prepare("INSERT INTO $this->paymentTable(CustId,PaymentId,PaymentMethod,Amount,DeliveryStat,PurchaseDate,PurchaseTime) 
																	VALUES(:custId,:payId,:payMethod,:amt,:delivery,now(),now())");

			$this->stmt->bindParam(":custId",$this->user_id);
			$this->stmt->bindParam(":payId",$this->pay_id);
			$this->stmt->bindParam(":payMethod",$this->pay_method);
			$this->stmt->bindParam(":amt",$this->pay_amount);
			$this->stmt->bindParam(":delivery",$this->delivery_stat);
			$this->stmt->execute();

			if($this->stmt) {
				return true;
			} else {
				return false;
			}
		}
		
		public function fetch_cart_pay($session_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->cartTable WHERE CustId='$session_id' ");
			
			return $sql;
		}

		public function fetch_purchases($session_id,$pay_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->paymentTable WHERE CustId='$session_id' AND PaymentId='$pay_id' ");
			
			foreach($sql as $row) {
				$this->fetchedPayUserId = $row["CustId"];
				$this->fetchedPayId = $row["PaymentId"];
				$this->fetchedPayMethod = $row["PaymentMethod"];
				$this->fetchedPayAmount = $row["Amount"];
				$this->fetchedPayStat = $row["DeliveryStat"];
				$this->fetchedPayDate = $row["PurchaseDate"];
				$this->fetchedPayTime= $row["PurchaseTime"];
			}
		}

		public function insert_to_reg_table()
		{

			//sql query to determine if the UserId is already registered
			$sql2 = $this->dbase->query("SELECT * FROM ".$this->regAdminTable." WHERE Email='$this->user_email' AND Unique_Code='$this->admin_code' ");


						if($sql2->rowCount() > 0) { // if it does not exist in database
						
						
								$this->stmt = $this->dbase->prepare("INSERT INTO $this->regTable(UserId,Username,UserType,ProfilePic,CoverPic,OpeningDays,OpeningTime,ClosingTime,Email,PhoneNo,Address,City,Country,Password,RegDate,RegTime) 
																	VALUES(:userid,:username,:usertype,:p_pic,:c_pic,:open_days,:open_time,:close_time,:email,:phoneno,:address,:city,:country,:pass,now(),now())");

								$this->stmt->bindParam(":userid",$this->user_id);
								$this->stmt->bindParam(":username",$this->username);
								$this->stmt->bindParam(":usertype",$this->usertype);
								$this->stmt->bindParam(":p_pic",$this->profile_pic);
								$this->stmt->bindParam(":c_pic",$this->cover_pic);
								$this->stmt->bindParam(":open_days",$this->open_days);
								$this->stmt->bindParam(":open_time",$this->open_time);
								$this->stmt->bindParam(":close_time",$this->close_time);
								$this->stmt->bindParam(":email",$this->user_email);
								$this->stmt->bindParam(":phoneno",$this->phone_no);
								$this->stmt->bindParam(":address",$this->address);
								$this->stmt->bindParam(":city",$this->city);
								$this->stmt->bindParam(":country",$this->country);
								$this->stmt->bindParam(":pass",$this->password);
								$this->stmt->execute();

								if($this->stmt) {
									return true;
								} else {
									return false;
								}

								

						} else {

								$this->message("Use of an unregistered e-mail and unique code.","Fail");

						}

		}
		
		public function update_user_pics($user_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET ProfilePic=?,CoverPic=? WHERE UserId=? ");
			
			$this->stmt->bindParam(1,$this->profile_pic);
			$this->stmt->bindParam(2,$this->cover_pic);
			$this->stmt->bindParam(3,$user_id);
			
			$this->stmt->execute(); 

			if($this->stmt) {
				return true;
			} else {
				return false;
			} 
			
		}
		
		public function update_club_time($user_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET OpeningDays=?,OpeningTime=?,ClosingTime=? WHERE UserId=? ");
			
			$this->stmt->bindParam(1,$this->open_days);
			$this->stmt->bindParam(2,$this->open_time);
			$this->stmt->bindParam(3,$this->close_time);
			$this->stmt->bindParam(4,$user_id);
			
			$this->stmt->execute(); 

			if($this->stmt) {
				return true;
			} else {
				return false;
			} 
			
		}
		
		public function insert_to_admin_reg_table()
		{

			//sql query to determine if the UserId is already registered
			$sql2 = $this->dbase->query("SELECT * FROM ".$this->regAdminTable." WHERE Email='$this->user_email' ");


						if($sql2->rowCount() > 0) { // if it does not exist in database

								$this->message("Use an unregistered e-mail.","Fail");

						} else {

								$this->stmt = $this->dbase->prepare("INSERT INTO $this->regAdminTable(Email,Unique_Code,RegDate,RegTime) 
																	VALUES(?,?,now(),now())");

								$this->stmt->bindParam(1,$this->admin_email);
								$this->stmt->bindParam(2,$this->admin_code);
								$this->stmt->execute();

								if($this->stmt) {
									return true;
								} else {
									return false;
								}

						}

		}

		public function insert_to_user_reg_table()
		{

			$sql = $this->dbase->query("SELECT * FROM $this->bookarMpesaTable WHERE SenderPhone='$this->phone_no'");

			if($sql->rowCount() < 0) {

				$this->stmt = $this->dbase->prepare("INSERT INTO $this->bookaruser(Name,PhoneNo,Email,Password,RegDate,RegTime) VALUES(?,?,?,?,now(),now()) ");

				$this->stmt->bindParam(1,$this->full_name);
				$this->stmt->bindParam(2,$this->phone_no);
				$this->stmt->bindParam(3,$this->user_email);
				$this->stmt->bindParam(4,$this->password);
				$this->execute();

				if($this->stmt) {
					return true;
				} else {
					return false;
				}

			}

		}

		public function insert_to_login_table()
		{

			//see whether the entered email matches that in the EmailLihub table
			$sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE Email='$this->user_email' ");

			//if yes, fetch all the details that match the entered email and store in variables
			if($sql->rowCount() > 0) {

				foreach($sql as $row) {
					$this->fetched_email = $row["Email"];
					$this->fetched_user_id = $row["UserId"];
				}

				// then fetch the userid from the regTable that matches the fetched user id and the password entered
				$sql2 = $this->dbase->query("SELECT * FROM $this->regTable  WHERE UserId='$this->fetched_user_id' AND Password='$this->password' ");

				//if above condition is met, enter that data into the LoginLihub table
				if($sql2->rowCount() > 0) {

					$this->stmt = $this->dbase->prepare("INSERT INTO $this->loginTable(UserId,LoginDate,LoginTime) VALUES(:userid,now(),now())");

					$this->stmt->bindParam(":userid",$this->fetched_user_id);
					$this->stmt->execute();

					if($this->stmt) {
						return true;
					} else {
						return false;
					}

				}

			}


		}

		public function get_session_details($session_id)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserId='$session_id' ");

			foreach($sql as $row) {
				$this->session_email = $row["Email"];
				$this->session_user_id = $row["UserId"];
				$this->session_username = $row["Username"];
				$this->session_user_type = $row["UserType"];
				$this->session_phone = $row["PhoneNo"];
				$this->session_regDate = $row["RegDate"];
				$this->session_regTime = $row["RegTime"];
			}

		}

		public function get_all_users()
		{

			$sql = $this->dbase->query("SELECT * FROM $this->regTable ");
			return $sql;

		}

		public function delete_user($userid)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->emailTable WHERE UserId='$userid' ");

			if($sql->rowCount() > 0) {

				$this->stmt = $this->dbase->prepare("DELETE $this->emailTable,$this->regTable FROM $this->emailTable INNER JOIN $this->regTable 
													WHERE $this->emailTable.UserId=$this->regTable.UserId AND $this->emailTable.UserId=:userid ");

				$this->stmt->bindParam(":userid",$userid);
				$this->stmt->execute();

				if($this->stmt) {
					echo "Deletion success";
				} else {
					echo "Deletion failed";
				}

			} else {
				echo "User not registered";
			}

		}
		public function test(){
			return "Db Connect";
		}

		public function delete_from_balance_table($PayerPhone)
		{

			$sql = $this->dbase->query("SELECT PayerPhone,AmountBalance FROM $this->balanceTable WHERE AmountBalance ='0' AND PayerPhone='$PayerPhone' ");

				//if($balance != 0 ) // if the balance status of the buyer is 0 for any bookar, delete that record 

			if($sql->rowCount() > 0 ) {


				$this->stmt = $this->dbase->prepare("DELETE FROM $this->balanceTable WHERE AmountBalance='0' AND PayerPhone='$PayerPhone'");

				$this->stmt->execute();

				if($this->stmt) {
					return true;
				} else {
					return false;
				}
;

			} 

		}


	}
	$database = new database();

?>