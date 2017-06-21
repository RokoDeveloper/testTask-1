<?php

class Controller_Login extends Controller
{

	public function action_index()
	{


		$this->model = new Model_Login();

		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$check = $this->model->check_login($login,$password);

			if($check)
			{
				//Сессию нужно на сервере настроить , нет доступа
				//Знаю что в куках хранить нельзя
				//session_start();
				//$_SESSION['admin'] = true;
				setcookie("nosaveadmin", true, time()+3600,'/');
				$this->redirect('/');
			}

		}
		$this->view->generate('login_view.php', 'template_view.php');
	}

}
