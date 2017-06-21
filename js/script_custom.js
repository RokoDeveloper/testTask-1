
$(document).ready(function() {


  $('#img').on('change', function() {

    var input = $(this);
    var fileName = $(this).val();
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="gif" || extFile=="png"){
      if (!window.FileReader) return false // check for browser support
      if (input[0].files && input[0].files[0]) {
          var reader = new FileReader()
          reader.onload = function (e) {
            $('#img').attr('img-path',e.target.result);
          }
          reader.readAsDataURL(input[0].files[0]);
      }
    }else{
        alert("Only jpg,gif,png files are allowed!");
        input.val('');
    }

  });

  $("#button_Preview").click(function() {
    var inputName  = $('input[name="user_name"]').val();
    var inputEmail = $('input[name="user_email"]').val();
    var inputImg   = $('input[name="img"]').val();
    var inputTask  = $('textarea[name="task_desc"]').val();
    var inputImg   = $('#img').attr('img-path');


    $.post('/task/ajax_preview_task',
           {user_name:inputName,user_email:inputEmail,task_desc:inputTask},
       function(data){
             $("#toPreview").html(data);
             $('#img-view').attr('src',inputImg);
           }
      );
  });
});
