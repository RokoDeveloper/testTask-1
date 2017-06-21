<?php
require_once 'application/config/connect.php';

class Model
{

	public function db_get_one($query,$params = array())
	{
	  $query = DBQuery::parseQuery($query);
		$db = new DBQuery($query,$params);
		$row = $db->fetch(PDO::FETCH_BOTH);
		return isset($row[0]) ? $row[0] : "";
  }

	public function db_query($query,$params = array(),$last_id = false)
  {

			$query = DBQuery::parseQuery($query);


			$result = array();


			$db = new DBQuery($query,$params);

			while($r = $db->fetch())
			{
				array_push($result,$r);
			}

			if($last_id)
			{
				$result = DBQuery::$connection->lastInsertId();
			}


			return $result;
	}

	public function upload_image($parentid,$image,$title = "",$description = "")
	{
		$allowed_extension = array("jpg","png","gif");

		if(!empty($image["name"]))
		{
			$ext = explode(".",$image["name"]);
			if(isset($ext[1]) && in_array($ext[1],$allowed_extension))
			{
				$filename = uniqid().".".$ext[1];
				$imageinfo = @getimagesize($image["tmp_name"]);
				if($imageinfo != NULL)
				{
					if(move_uploaded_file($image["tmp_name"],'images/' . $filename))
					{
						$this->db_query("INSERT INTO " . _DB_TABLE_PREFIX . "images (parentid,title,description,originalname,filename,width,height) VALUES(:parentid,:title,:description,:originalname,:filename,:width,:height
						)",array(
							":parentid"=>$parentid,
							":title"=>$title,
							":description"=>$description,
							":originalname"=>$image["name"],
							":filename"=>$filename,
							":width"=>$imageinfo[0],
							":height"=>$imageinfo[1]
						));
					}
				}
			}
		}
	}


}
