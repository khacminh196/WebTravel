toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "timeOut": "2000",
}
  
  $(document).ready(function (e) {
    let toastSuccess = $('#show-toast-success');
    let toastError = $('#show-toast-error');
    if (toastSuccess.length > 0) {
      toastr.info(toastSuccess.data('msg')).css({"width": "30rem", "height": "5rem", "display": "flex", "align-items": "center"});
    } else if (toastError.length > 0) {
      toastr.error(toastError.data('msg')).css({"width": "30rem", "height": "5rem", "display": "flex", "align-items": "center"});
    }
});
  