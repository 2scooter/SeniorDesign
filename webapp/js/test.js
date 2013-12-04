$(document).ready(function()
{
    var buttonAllowed = 1;
    var slidesSeen = 0;
    var currentSlide = 1;
	$("#nextButton").hide();
	$("#previousButton").hide();
	$("input").change(function()
	{
		if($(this).closest('.item').attr("id") > slidesSeen)
            slidesSeen = $(this).closest('.item').attr("id");
        $("#nextButton").show();
	});
    $('#myCarousel').on('slid.bs.carousel', function () {
    buttonAllowed = 1;
    })
    $("#previousButton").click(function()
    {
        if(buttonAllowed)
        {
            currentSlide--;   
            buttonAllowed = 0;
        
            if(currentSlide == 1)
            {
                $("#previousButton").hide();
            }
            else
            {
                $("#previousButton").show();
            }
            if(slidesSeen >= currentSlide)
            {
                $("#nextButton").show();
            }
            else{        
                $("#nextButton").hide();
            }    
            $("#myCarousel").carousel('prev');
        }
    });
	$("#nextButton").click(function()
	{
        if(buttonAllowed)
        {
            buttonAllowed = 0;
            currentSlide++;
            if(slidesSeen >= currentSlide)
            {
                $("#nextButton").show();
            }
            else{        
        	    $("#nextButton").hide();
            }
    		$("#previousButton").show();
            $("#myCarousel").carousel('next');
        }
	});
    $("#submitButton").click(function()
    {        
        var numberOfQuestions = 0.0;
        var numberCorrect = 0.0;
        $("#previousButton").hide();
        $('input:checked').each(function()
        {
            numberOfQuestions++;
            numberCorrect += ($(this).closest('.wrap').find('.correctAnswer').val() == $(this).val());
        });        
        var testScore = (numberCorrect/numberOfQuestions) * 100;
        $("#score").text("Your score was: " + testScore + "%");
        $.ajax({
            type:"POST",
            url: "updateUserTestProgress.php",
            data: "testScore="+testScore,
            success: function(data)
            {
                document.getElementById("testSubmitResult").innerHTML = data;
            }
            
        });
        
    });
});