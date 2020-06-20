function delete_post(id,delete_link){
   let popup = new AppCmsAlert();
   popup.setTitle($("#delete_title").val());
   popup.setMessage($("#delete_message").val());
   popup.button_text($("#delete_text_button_cancel").val(),$("#delete_text_button_confirm").val());
   popup.run(function() {
       window.location.href = delete_link;
   });
}