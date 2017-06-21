<div class="col-sm-12">
  <form action="/task/save" enctype="multipart/form-data" id="new_task" method="post" name="new_task">
    <div class="form-group">
      <label for="InputName">Ваше имя</label> <input required class="form-control" name="user_name" placeholder="Name" type="text">
    </div>
    <div class="form-group">
      <label for="InputEmail">Ваш Email</label> <input required class="form-control" name="user_email" placeholder="Email" type="email">
    </div>
    <div class="form-group">
      <label for="InputImg">Изображение:<br></label>
      <div class="upload_img_wrapper">
        <label for="InputImg"></label>
      </div><input required name="img" type="file" img-path = "" id = "img" >
      <p class="help-block">Допустимый формат jpg/gif/png, допустимый размер - не более 320х240 пикселей</p>
    </div>
    <div class="form-group">
      <label for="InputTask">Задача</label>
      <textarea required class="form-control" name="task_desc" placeholder="Текст задачи"  rows="5"></textarea>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-offset-2 col-md-4">
      <p><!-- вызов модального окна для предпросмотра -->
        <input class="btn btn-default btn-block" data-target="#Preview" data-toggle="modal" id="button_Preview" name="button_Preview" type="button" value="Предварительный просмотр">
      </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <p><input class="btn btn-default btn-block" name="button_save" type="submit" value="Сохранить задачу"></p>
    </div>
  </form><!-- Modal -->
  <div aria-labelledby="mLabel" class="modal fade" id="Preview" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="mLabel">Предварительный просмотр</h4>
        </div>
        <div class="modal-body">
          <div id="toPreview">Wait please...</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button">Закрыть</button>
        </div>
      </div>
    </div>
  </div>
</div><!-- class="col-sm-12" -->
<script type="text/javascript" src = "/js/script_custom.js"></script>
