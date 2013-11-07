$(document).ready(function(){
  $("#questionButton > a").click(function(){
    var str = (this.id);
    $("#questionButton > a").removeClass('active');
    $(this).addClass('active');
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myModal").innerHTML=xmlhttp.responseText;
        $("#info-modal-close").click(function(){
          $('#myModal').modal('hide');
        });  
        $("#info-modal-save").click(function(){         
         {
            var url = "submitNewQuestion.php"; // the script where you handle the form input.            
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#newQuestionForm").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                       document.getElementById("saveResponse").innerHTML = data; // show response from the php script.
                   }
                 });
            $('#myModal').modal('hide');
            return false; // avoid to execute the actual submit of the form.
          }          
        });           
        }
      }
    xmlhttp.open("GET","getquestion.php?q="+str,true);
    xmlhttp.send();
    $('#myModal').modal('show');
  });
});