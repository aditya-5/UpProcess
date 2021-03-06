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

// Active sidebar link 
function setNavigation() {
  var path = window.location.pathname;
    path = path.replace(/\/upProcess_v0\/employee\//, "");
    // path = path.replace(/\//, "");
    console.log(path);
  path = decodeURIComponent(path);
  if (path == "") {
    path = "index.php";
  }
  $("a.sb-link").each(function () {
    var href = $(this).attr("href");
    if (path === href) {
      $(this).closest("a").parent().addClass("active-navlink");
      $(this).closest("a").children().addClass("active-navlink-child");
    }
  });
}
setNavigation();

$(".signup-alert").alert('close')  