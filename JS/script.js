// Signup emp --> company code --> paste only
const validate = (evt) => {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[]|\./;
    if(!regex.test(key)) {
     theEvent.returnValue = false;
     if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
// Bootstrap tool tips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
