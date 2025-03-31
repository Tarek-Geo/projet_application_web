<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	/*
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	*/
////////////////////////////////recipionist/////////////////////////////

	public function doLogin2($umail,$upass,$user)
	{$user="receptionniste";
				try
		{
			$stmt = $this->conn->prepare("SELECT RECEPTION_ID,NOM_R, EMAIL_R, PASSWORD_R FROM $user WHERE  EMAIL_R=:umail ");
			$stmt->execute(array( ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if((md5($upass) == $userRow['PASSWORD_R']))
				{
					$_SESSION['user_session'] = $userRow['RECEPTION_ID'];
					//return true;
$a=$userRow['NOM_R'];
					// header("Location: administrateur/index.php?b=$a");
				$compte="Réceptionniste";
		$_SESSION['compte']=$compte;
$_SESSION['name']=$userRow['NOM_R'];
				
				
		header("Location: receptionniste/index.php");
					
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	//////////////////////////medcin pation///////////////////////
		public function doLogin1($umail,$upass,$user)
	{$user="medecin";
		try
		{
			$stmt = $this->conn->prepare("SELECT MEDECIN_ID, NOM_M, EMAIL_M, PASSWORD_M FROM $user WHERE  EMAIL_M=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(md5($upass) == $userRow['PASSWORD_M'])
				{
					$_SESSION['user_session'] = $userRow['MEDECIN_ID'];
					//return true;
					
		$a=$userRow['NOM_M'];
		       // session_start();
		$compte="Médecin";
		$_SESSION['compte']=$compte;
				$_SESSION['name']=$userRow['NOM_M'];
				//
					 header("Location: medecin/index.php");
				}
				else
				{
					return false;
				}
			}
			else{
				$user="patient";
		
			$stmt = $this->conn->prepare("SELECT PATIENT_ID, NOM_P, EMAIL_P, PASSWORD_P FROM $user WHERE  EMAIL_P=:umail  ");
			$stmt->execute(array( ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if((md5($upass)== $userRow['PASSWORD_P']))
				{
					$_SESSION['user_session'] = $userRow['PATIENT_ID'];

					//return true;
		$a=$userRow['NOM_P'];
		$compte="Patient";
		$_SESSION['compte']=$compte;
		$_SESSION['name']=$userRow['NOM_P'];
				
				
					// header("Location: administrateur/index.php?b=$a");
		

		
					header("Location: patient/index.php");
				}
				else
				{
					return false;
				}
			}
			}
			
		}
		
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	//////////////////////////admin infer////////////////////////
	public function doLogin($umail,$upass,$user)
	{$user="admin";
		try
		{
			$stmt = $this->conn->prepare("SELECT ADMIN_ID, NOM_A, EMAIL_A, PASSWORD_A FROM $user WHERE  EMAIL_A=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(md5($upass) == $userRow['PASSWORD_A'])
				{
					$_SESSION['user_session'] = $userRow['ADMIN_ID'];
					//return true;
					
		$a=$userRow['NOM_A'];
		       // session_start();$
		$compte="Administrateur";
		$_SESSION['compte']=$compte;
				$_SESSION['name']=$userRow['NOM_A'];
				
				
				//
					 header("Location: administrateur/index.php");
				}
				else
				{
					return false;
				}
			}
			else{
				$user="infirmiere";
		
			$stmt = $this->conn->prepare("SELECT INFRMIERE_ID, NOM_I, EMAIL_I, PASSWORD_I FROM $user WHERE  EMAIL_I=:umail  ");
			$stmt->execute(array( ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if((md5($upass)== $userRow['PASSWORD_I']))
				{
					$_SESSION['user_session'] = $userRow['INFRMIERE_ID'];
					//return true;
					
		$a=$userRow['NOM_I'];
					// header("Location: administrateur/index.php?b=$a");
				//session_start();
		$compte="Infirmier";
		$_SESSION['compte']=$compte;
				$_SESSION['name']=$userRow['NOM_I'];
				
					header("Location: infirmiere/index.php");
				}
				else
				{
					return false;
				}
			}
			}
			
		}
		
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>