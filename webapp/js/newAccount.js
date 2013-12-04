
$(document).ready(function() {
    $("#submitButton").click(function()
    {   
       var valid = 1;
       $(":input").each(function()
       {
          if(this.value === "")
          {
            valid = 0;
            alert(this.id + " must be filled out.")
          }
       });
       if(valid == 1)
       {            
          $("#myForm").submit();
       }
       else
       {
           valid = 1;
       }
    });

});