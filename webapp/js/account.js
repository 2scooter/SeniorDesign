var valid = 1;

$(document).ready(function()
{
    $("#saveButton").click(function()
    {
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