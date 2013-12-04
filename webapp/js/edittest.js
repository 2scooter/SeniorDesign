$(document).ready(function(){   
  $("#myModal").modal('hide');
  doStuff();
});


function doStuff()
{
var url = "getQuestionBar.php"; // the script where you handle the form input.            
    $.ajax({
           type: "POST",
           url: url,
           success: function(data)
           {
                
             document.getElementById("questionButton").innerHTML = data;
            $("#questionButton > a").hover(function(){
              var currentQuestion = this.id;
              if((this).id !== "")
              {                
              $(this).append('<div id = "deleteButton" style="position:absolute; right: 5px; top: 5px;"><image src="../images/deletered.png" width="18px" height="18px"></div>');
              }
              $(this).css("color","white");
              $(this).css("background-color","#7CC0FF");
              $("#deleteButton").click(function(){
                  var url = "deleteQuestion.php"; // the script where you handle the form input.            
                  $.ajax({
                         type: "POST",
                         url: url,
                         data: "questionId=" + currentQuestion, // serializes the form's elements.
                         success: function(data)
                         {         
                            document.getElementById("questionCenter").innerHTML = data;
                            doStuff();                    
                         }
                       });
              });

              },function(){
              if((this).id !== "")
              {
              $( this ).find( "#deleteButton" ).remove();
            }            
              $(this).removeAttr('style');
            });
            
    $("#questionButton > a").click(function(){
    var str = (this.id);
    $("#questionButton > a").removeClass('active');
    $(this).addClass('active');
    if(this.id != "")
    {
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
          document.getElementById("questionCenter").innerHTML=xmlhttp.responseText;
          $("#info-modal-close").click(function(){
           $('#myModal').modal('hide');
          });  
          $("#info-modal-save").click(function(){         
           {
              var url = "updateOldQuestion.php"; // the script where you handle the form input.            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: $("#oldQuestionForm").serialize(), // serializes the form's elements.
                     success: function(data)
                     {
                         document.getElementById("saveResponse").innerHTML = data; // show response from the php script.
                     }
                   });
              return false; // avoid to execute the actual submit of the form.
            }          
          });           
          }
        }
      xmlhttp.open("GET","getquestion.php?q="+str,true);
      xmlhttp.send();
      }
      else
      {
        $('#myModal').modal('show');      
        $("#info-modal-close").click(function(){
            $("#myModal").modal('hide');
        });
        $("#submitButton").click(function(){
              var url = "submitNewQuestion.php"; // the script where you handle the form input.            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: $("#newQuestionForm").serialize(), // serializes the form's elements.
                     success: function(data)
                     {
                       document.getElementById("questionCenter").innerHTML = data;                
                     }
                   });
          var url = "getQuestionBar.php"; // the script where you handle the form input.            
           $.ajax({
           type: "POST",
           url: url,
           success: function(data)
           {
             document.getElementById("questionButton").innerHTML = data;
             doStuff();
           }
           });    

          $("#newQuestionForm").find("input").val(""); 
          $("#myModal").modal('hide');          
          return false; // avoid to execute the actual submit of the form.
        });
      }
    });
           }
           });    

}