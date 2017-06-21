
<div class="row">
  <!-- список задач -->
  <div class="col-sm-12">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th class="field_to_order" id="username"><a href="/?sort=user_name">Имя</a><span></span></th>
            <th class="field_to_order" id="email"><a href="/?sort=user_email">е-mail</a><span></span></th>
            <th>Задача</th>
            <th class="field_to_order" id="status"><a href="/?sort=status">Статус</a><span></span></th>
            <th></th>
          </tr>
        </thead>
        <tbody id="selection">
          <?php
          foreach($data['tasks'] as $key => $value)
          {
            ?>
            <tr>
              <td>
                <img class="img_sm custom img-rounded img-responsive" src="/images/<?php echo $value['filename']; ?>">
              </td>
              <td><?php echo $value['user_name']; ?></td>
              <td><?php echo $value['user_email']; ?></td>
              <td class="task_body_row"><?php echo $value['task_desc']; ?></td>
              <td class="task_status_row"><?php echo $value['status'] ? 'Выполнено' : 'В процессе'; ?></td>

              <?php if(isset($_COOKIE['nosaveadmin'])){ ?>
                <td><input class="btn btn-default btn-block" data-target="#edit_<?php echo $value['id']; ?>" data-toggle="modal" id="button_edit" name="button_edit" type="button" value="Редактировать"></td>
                <form class="" action="/task/update" method="post">
                  <div aria-labelledby="mLabel" class="modal fade" id="edit_<?php echo $value['id']; ?>" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" id="mLabel">Редактирование</h4>
                        </div>
                        <div class="modal-body">
                          <div id="toPreview">
                            <div class="form-group">
                              <label for="InputTask">Задача</label>
                              <textarea required class="form-control" name="task_desc" placeholder="Текст задачи"  rows="5"><?php echo $value['task_desc']; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="InputTask">Завершен</label>
                              <input type="checkbox" <?php echo $value['status'] == 1 ? 'checked' : ''; ?> name="status" value="1">
                              <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <input class="btn btn-default" type="submit" name="save" value="Сохранить">
                          <button class="btn btn-default" data-dismiss="modal" type="button">Закрыть</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
            <?php  } ?>


            </tr>



         <?php } ?>

        </tbody>
      </table>
    </div>
  </div>

  <?php if($data["pagecount"] > 1) { ?>

	   <ul class="pagination">
		<?php if($data["current_page"] > 1)
    {


          if($data["current_page"] == 2)
          {
          $next_custom = Controller_Main::setUrlParams(array(),array("page"));
          } else {
          	$next_custom = Controller_Main::setUrlParams(array("page=" . ($data["current_page"] - 1)),array("page"));
          }
           ?>
           <li ><a  href="<?php echo $next_custom ; ?>">&lsaquo;</a></li>
<?php }

      		for($i = 0;$i < $data["intervals"];$i++)
      		{

      			$finish = ($i+1)*$data["pagesize"] * $data['pager_size'];
      			$start = $finish - ($data["pagesize"] * $data['pager_size']) + 1;
      			if(($data["current_page"]*$data["pagesize"] ) >= $start && $data["current_page"]*$data["pagesize"] <= $finish)
      			{
      				for($p = 0; $p < $data['pager_size'] ; $p++)
      				{
      					$end_value = $start+($p*$data["pagesize"]) + $data["pagesize"] - 1;
      					$pageID = ceil($end_value/$data["pagesize"]);


      					if($i > 0 && $p == 0)
      					{
      						?>
      					  <li ><a href="<?echo Controller_Main::setUrlParams(array("page=" . ( $pageID - 1)),array("page"))?>">&laquo;</a></li>
      					<?php
      					}

      					if($end_value >= $data["all"])
      					{
      						$end_value = $data["all"];
      					}

      					if($pageID == 1)
      					{
      						$url_page = Controller_Main::setUrlParams(array(),array("page"));
      					} else {
      						$url_page = Controller_Main::setUrlParams(array("page=" . $pageID),array("page"));
      					}

      					?>
      					  <li <?=($data["current_page"] == $pageID  ? "class='active'" : "")?> ><a href="<?php echo $url_page; ?>"><?= $pageID ?></a></li>
      					<?php

      					if($end_value >= $data["all"])
      					{
      						break;
      					}


      					if((($data['pager_size'] - $p) == 1) && (($data["intervals"] - $i) > 1))
      					{
      						?>
      					  <li ><a href="<? echo  Controller_Main::setUrlParams(array("page=" . ( $pageID + 1)),array("page"))?>">&raquo;</a></li>
      					<?php

      					}


      				}
      			}

      		}
		?>
	   <?php if( $data["current_page"] < $data["pagecount"] && $data["pagecount"] > 1) { ?>
		    <li ><a  href="<?php echo Controller_Main::setUrlParams(array("page=" . ($data["current_page"] + 1)),array("page"))?>">&rsaquo;</a></li>
	   <?php } ?>
	   </ul>
<?php } ?>
