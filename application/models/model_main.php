<?php

class Model_Main extends Model
{

	public function get_all_task()
	{

		if(isset($_GET['sort']))
		{
			$sql_part = 'ORDER BY '.$_GET['sort'] . ' DESC';
		} else {
			$sql_part = '';
		}

		$data["pagesize"] = 3;
		$data['pager_size'] = 5;
		$all = $this->db_query("SELECT COUNT(id) as count FROM tasks");
		$data['all'] = $all[0]['count'];
		$data["pagecount"] = ceil($data['all']/$data["pagesize"]);
		$data["current_page"] = (isset($_GET["page"]) && intval($_GET["page"]) > 0 ? intval($_GET["page"]) : 1 );
		$data["intervals"] = ceil($data["pagecount"]/$data['pager_size']);
		$last = $data["current_page"] * $data['pagesize'];
		$first = $last - $data['pagesize'];
    $data['tasks'] = $this->db_query("SELECT t.*,i.filename FROM tasks t LEFT JOIN images i ON t.id = i.parentid $sql_part LIMIT :first,:last ",array(
			':first' => $first,
			':last' => $last
		));



		return $data;
	}

}
