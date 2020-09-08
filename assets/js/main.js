$(document).ready(function () {
    $('#browsebutton :file').change(function (e) {
        var fileName = e.target.files[0].name;
        $("#up-file").attr('placeholder', fileName)
    });
});
    
function validateForm() {  
if (((document.getElementById("sel-course").value =="Please Select") && (document.getElementById("sel-month").value =="Please Select") &&
(document.getElementById("sel-year").value =="Please Select")) && document.getElementById("searchbox").value==""){
alert( "Please enter at least one field" );
 return false;    
 }   
}

function validateAdmin() {  
  if ((document.getElementById("up-course").value =="Please Select") || (document.getElementById("up-month").value =="Please Select") ||
  (document.getElementById("up-year").value =="Please Select") || (document.getElementById("my-file-selector").value =="")){
  alert( "Please fill all" );
   return false;    
   }   
  }
