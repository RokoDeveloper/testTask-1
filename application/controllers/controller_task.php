<?php

class Controller_Task extends Controller
{

	function __construct()
	{
		$this->model = new Model_Task();
		$this->view = new View();
	}

	public function action_add()
	{
		$this->view->generate('add_task_view.php','template_view.php');
	}

  public function action_save()
  {

    if(!empty($_POST))
    {
      $this->model->save_task($_POST);
    }
      $this->redirect('/');
  }

	public function action_ajax_preview_task()
	{
		$this->view->generate_view('preview_task_view.php',$_POST);
	}

	public function action_update()
	{
		if(!empty($_POST))
		{
			$this->model->update_task($_POST);
		}
		  $this->redirect('/');
	}


}
