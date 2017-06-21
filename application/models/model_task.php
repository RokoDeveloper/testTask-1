<?php

class Model_Task extends Model
{

  public function save_task($param)
  {
     $parentid = $this->db_query("INSERT INTO tasks(user_name,user_email,task_desc,status) VALUES(:name,:email,:task,0)",array(
       ':name' => $param['user_name'],
       ':email' => $param['user_email'],
       ':task' => $param['task_desc']
     ),true);

		 if(!empty($_FILES['img']))
		 {
			 print_r($parentid);
			 $this->upload_image($parentid,$_FILES['img']);
		 }
  }

  public function update_task($param)
  {

    if(empty($param['status']))
    {
      $param['status'] = 0;
    }
    $this->db_query("UPDATE tasks SET task_desc = :task,status = :status WHERE id = :id",array(
      ':id' => $param['id'],
      ':status' => $param['status'],
      ':task' => $param['task_desc']
    ));
  }

}
