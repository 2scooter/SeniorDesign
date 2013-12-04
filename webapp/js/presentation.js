var initialLoad = 1;
var completedPresentation = 0;
var currentSlide;
var currentModule;

$(document).ready(function(){

    
    $('#myCarousel').on('slid.bs.carousel', function () {
       var currentModuleSlide = $("div > .item.active").attr("id");
       currentModuleSlide = currentModuleSlide.split("_");
       currentSlide = currentModuleSlide[1];
       currentModule = currentModuleSlide[0];
       if(((currentSlide == 1)&&(currentModule==1))&&(completedPresentation == 0))
       {
            $("#previousButton").hide();
       }
       else
       {
            $("#previousButton").show();
       }
       loadModules();     
    })    
   loadSlides();  
    $('#home-close').on('click', function() {
        $('#home-modal').modal('hide');  
        
         $.ajax({
           type: "POST",  
           url: "sessionZero.php",
           success: function(data){
           }
         });
    });
    
    $('#other-close').on('click', function() {
         $.ajax({
           type: "POST",  
           url: "sessionZero.php"
         });
    });
    
    $("#nextButton").click(function(){
       $.ajax({
           type: "POST",  
           data: "currentSlide=" + currentSlide + "&currentModule=" + currentModule,
           dataType: "text",
           url: "updateUserProgress.php",
           success: function(data)
           {  
              if($.trim(data) == "endofpresentation")
              {
                 $("#myCarousel").carousel('next');
                 completedPresentation = 1; 
              }
              if($.trim(data) == "noupdate")
              {      
                 $("#myCarousel").carousel('next');
              }
              else if($.trim(data) == "newmodule")
              {
                 initialLoad = 1;
                 loadSlides();
              }
              else if($.trim(data) == "update")
              {
                 loadSlides();
              }
           }        
       });     
    });
    $("#previousButton").click(function()
    {
       $("#myCarousel").carousel('prev'); 
    });
});

function loadSlides()
{
  $.ajax({
       type: "POST",           
       url: "loadPresentationSlides.php",
       success: function(data)
       { 
          document.getElementById("carousel-inner").innerHTML = data;   
          if(initialLoad == 1)
          {
            $("#carousel-inner > div").eq("-2").removeClass("item");
            $("#carousel-inner > div").eq("-2").addClass("item active");  
            initialLoad++;
          }
          else
          {
              $("#carousel-inner > div").eq("-3").removeClass("item");
              $("#carousel-inner > div").eq("-3").addClass("item active");  
              $("#myCarousel").carousel('next');
          }
       var currentModuleSlide = $("div > .item.active").attr("id");
       currentModuleSlide = currentModuleSlide.split("_");
       currentSlide = currentModuleSlide[1];
       currentModule = currentModuleSlide[0];
       if(((currentSlide == 1)&&(currentModule==1))&&(completedPresentation == 0))
       {
            $("#previousButton").hide();
       }
       loadModules();
       
        $("input").change(function()
        {
            var questionCurrentModuleSlide = $("div > .item.active").attr("id");
            var questionCurrentModuleSlide = questionCurrentModuleSlide.split("_");
            var questionCurrentSlide = questionCurrentModuleSlide[1];
            var questionCurrentModule = questionCurrentModuleSlide[0];
    		$.ajax({
                type:"POST",
                url: "getQuestionAnswer.php",
                data:"currentSlide=" + questionCurrentSlide + "&currentModule=" + questionCurrentModule + "&currentAnswer=" + $(this).val(),
                success: function(data)
                {
                    $("#carousel-inner > .item.active > #testResult").html(data);   
                }        	    
    		});
    	});
       
       
       }        
     });      
}



function loadModules()
{
    $.ajax({
        type: "POST",
        url: "loadModuleList.php",
        data: "currentSlide=" + currentSlide + "&currentModule=" + currentModule,
        success: function(data)
        {     
            document.getElementById("innerlist").innerHTML = data;
            $("#slides > a").click(function()
            {
                $("#myCarousel").carousel(parseInt($(this).attr("id"))); 
            });            
            $("#innerlist > #questionButton > #moduleWrap > #module").click(function()
            {          
               $(this).closest("#moduleWrap").find("#slides").toggle();
            });     
            $("#innerlist > #questionButton > #moduleWrap > .list-group-item:not(.active)").each(function()
            {
                $(this).next("#slides").hide();
            });            
        }
    });
}

