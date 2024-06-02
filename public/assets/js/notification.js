document.addEventListener('DOMContentLoaded', (event) => {
  if (document.getElementById('success-message')) {
    var modal = new Modal(document.getElementById('modal-notif'), {
      backdrop: 'static',
      keyboard: false
    });
    modal.show();
  }
});