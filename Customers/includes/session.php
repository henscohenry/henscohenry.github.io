<?php

	require_once("initialise.php");

	class session {

		public $session_id;
		public $is_logged = false;


		public function __construct()
		{
			if(!isset($_SESSION)) {
				session_start();
			}

			$this->check_login();
		}


		public function login($user_id)
		{

			$this->session_id = $_SESSION["user_id"] = $user_id;
			$this->is_logged = true;

		}

		public function logout($redirect_url)
		{

			if($this->is_logged) {
				unset($this->session_id);
				unset($_SESSION["user_id"]);
				$this->is_logged = false;
				header("Location: ".$redirect_url);
			}

		}

		public function is_logged()
		{
			return $this->is_logged;
		}

		public function check_login()
		{

			if(isset($_SESSION["user_id"])) {
				$this->session_id = $_SESSION["user_id"];
				$this->is_logged = true;
			} else {
				unset($this->session_id);
				$this->is_logged = false;
			}

		}

	}

	$session = new session();

?>