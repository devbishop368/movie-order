<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

    processPageRequest();
    
    function authenticateUser($username, $password) 
	{
        $file = fopen('data/credentials.db', 'r') or die('Error reading credential data.');
        $userData = explode(',', fgets($file));
        fclose($cred_file);
		
        if ($userData[0] == $username && $userData[1] == $password) 
		{
			session_start();
            $_SESSION['display_name'] = $userData[2];
            $_SESSION['email_address'] = $userData[3];
            header('Location: ./index.php');
        } 
		else 
		{
			displayLoginForm('Invalid Username and/or Password');
        }
    }
	
	function displayLoginForm($message="") 
	{ 
        require_once  './templates/logon_form.html';
    }

    function processPageRequest() 
	{
        session_unset();
        session_destroy();
        if($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			if(isset($_POST['username']) && isset($_POST['password']))
			{
				authenticateUser($_POST['username'], $_POST['password']);
			}
        }
		else if(isset($_GET['message']))
		{
			displayLoginForm(urldecode($_GET['message']));
		}
        else 
		{
			displayLoginForm();
		}           
    }
?>

