/**
 * func VnNative Alert
 */
function AppCmsAlert() {
    this.confirmButton = false;
    this.button_text = function(cancel = 'Cancel',confirm = 'Confirm') {
        $("#app-modal-alert-button-cancel").text(cancel);
        $("#app-modal-alert-button-confirm").text(confirm);
    }
    this.setTitle = function(title) {
        $("#app-modal-alert-title-cms").text(title);
    }
    this.setMessage = function(message) {
        $("#app-modal-alert-message-cms").text(message);
    }
    this.run = function(callback){
        $("#alert-modal-cms-modal-box-trigger").trigger('click');
        $("#app-modal-alert-button-confirm").click((e) => {
            callback();
        });
    }
    return this;
}