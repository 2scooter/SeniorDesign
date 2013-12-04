var currentSlide = "question";
var currentModule = 1;

$(document).mouseup(function (e) {
    var container = $("#moduleList");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $("#moduleList").hide();
    }
});

$(document).ready(function () {

    $("#info-modal-close").click(function () {
        $("#myModal").modal('hide');
    });
    ddMenu('one', -1);
    $("#moduleList").hide();
    $(document).on('click', '#moduleSelect', function () {
        $("#moduleList").toggle();
    });

    doStuff();
    $("#imageSelect").hide();
    $("#videoSelect").hide();
    $("#slideTypeChanger").change(function () {
        if ((this.value) == "image") {
            $("#questionForm").hide();
            $("#imageSelect").show();
            $("#videoSelect").hide();
            currentSlide = "image";
        } else if ((this.value) == "video") {
            $("#questionForm").hide();
            $("#imageSelect").hide();
            $("#videoSelect").show();
            currentSlide = "video";
        } else {
            $("#questionForm").show();
            $("#imageSelect").hide();
            $("#videoSelect").hide();
            currentSlide = "question";
        }

    });
    $("#imagesInput").change(function () {
        var url = "upload_file.php"; // the script where you handle the form input.  
        var formData = new FormData($("#uploadFileForm")[0]);
        $.ajax({
            type: "POST",
            data: formData, // serializes the form's elements.
            url: url,
            contentType: false,
            processData: false,
            success: function (data) {
                document.getElementById("loadedImage").innerHTML = data;
            }
        });

    });
});


function doStuff() {

    $.ajax({
        type: 'POST',
        success: function (data) {        

            document.getElementById("moduleList").innerHTML = data;
             $("#moduleList > a").hover(function () {
                var currentModule = this.id;
                if (((this).id !== "new")&&((this).id !=="1")) {
                    $(this).append('<div id = "deleteButton" style="position:absolute; right: 5px; top: 5px;"><image src="../images/deletered.png" width="18px" height="18px"></div>');
                }
                $(this).css({
                    "color": "rgb(255, 255, 255)",
                    "background-color": "rgb(124, 192, 255)"
                });
                $("#deleteButton").click(function () {
                    var url = "deleteModule.php"; // the script where you handle the form input.            
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: "moduleId=" + currentModule, // serializes the form's elements.
                        success: function (data) {
                            document.getElementById("questionCenter").innerHTML = data;
                            doStuff();
                        }
                    });
                });

            }, function () {
                $(this).css({
                    "background-color": "",
                    "color": ""
                });
                if ((this).id !== "new") {
                    $(this).find("#deleteButton").remove();
                }
            });
            $("#moduleList > a").click(function () {
                $(this).find("#deleteButton").remove();
                if(($(this).attr("id")!="home")&&($(this).attr("id")!="new"))
                {
                    $("#moduleSelect").html($(this).html());
                    currentModule = this.id;
                    $("#moduleList").hide();
                    doStuff();
                }
                else if($(this).attr("id")=="new")
                {
                    $("#moduleSelect").html($(this).html());
                    $("#moduleList").hide();    
                    var newModuleName = prompt("Enter a name for the new module:");
                    $.ajax({
                        url: "newModule.php",
                        type: "POST",
                        data: "newModule="+newModuleName,
                        success: function(data)
                        {
                            doStuff();
                            document.getElementById("questionCenter").innerHTML = data;
                        }
                    });
                }
            });
        },
        url: 'getModuleList.php',
    });

    var data = "moduleId=" + currentModule;
    var url = "getPresentationBar.php"; // the script where you handle the form input.            
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            document.getElementById("questionButton").innerHTML = data;
            $("#questionButton").sortable({
                axis: 'y',
                containment: "parent",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data: data,
                        type: 'POST',
                        success: function (data) {
                            doStuff();
                        },
                        url: 'updateSlideOrder.php',
                    });
                }

            });
            $("#questionButton > a").hover(function () {
                var currentSlide = this.id.substring(5);
                if ((this).id !== "") {
                    $(this).append('<div id = "deleteButton" style="position:absolute; right: 5px; top: 5px;"><image src="../images/deletered.png" width="18px" height="18px"></div>');
                }
                $(this).css({
                    "color": "rgb(255, 255, 255)",
                    "background-color": "rgb(124, 192, 255)"
                });
                $("#deleteButton").click(function () {
                    var url = "deleteSlide.php"; // the script where you handle the form input.            
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: "slideId=" + currentSlide, // serializes the form's elements.
                        success: function (data) {
                            document.getElementById("questionCenter").innerHTML = data;
                            doStuff();
                        }
                    });
                });

            }, function () {
                $(this).css({
                    "background-color": "",
                    "color": ""
                });
                if ((this).id !== "") {
                    $(this).find("#deleteButton").remove();
                }
            });

            $("#questionButton > a").click(function () {
                var str = (this.id.substring(5));
                $("#questionButton > a").removeClass('active');
                $(this).addClass('active');
                if (this.id != "") {
                    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("questionCenter").innerHTML = xmlhttp.responseText;
                            $('#questionSave').click(function () {
                                {
                                    var url = "updatePresentationQuestion.php"; // the script where you handle the form input.            
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: $("#newPresentationQuestion").serialize(), // serializes the form's elements.
                                        success: function (data) {
                                            document.getElementById("saveResponse").innerHTML = data; // show response from the php script.
                                        }
                                    });
                                    return false; // avoid to execute the actual submit of the form.
                                }
                            });
                        }
                    }
                    xmlhttp.open("GET", "getSlide.php?q=" + str, true);
                    xmlhttp.send();
                } else {
                    $('#myModal').modal('show');

                    $("#submitButton").click(function () {
                        if (currentSlide == "image") {
                            var url = "submitImageSlide.php"; // the script where you handle the form input.            
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: "image=" + $("div#loadedImage img").attr("src") + "&moduleId=" + currentModule, // serializes the form's elements.
                                success: function (data) {
                                    document.getElementById("questionCenter").innerHTML = data;
                                    doStuff();
                                }
                            });
                        }
                        if (currentSlide == "question") {
                            var url = "submitPresentationQuestion.php"; // the script where you handle the form input.   
                            var data = $("#newQuestionForm").serialize() + "&moduleId=" + currentModule;
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: data, // serializes the form's elements.
                                success: function (data) {
                                    document.getElementById("questionCenter").innerHTML = data;
                                    doStuff();
                                }
                            });
                        }
                        if (currentSlide == "video") {
                            var url = "submitNewVideo.php"
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: $("#videoForm").serialize() + "&moduleId=" + currentModule, // serializes the form's elements.
                                success: function (data) {
                                    document.getElementById("questionCenter").innerHTML = data;
                                    doStuff();
                                }
                            });
                        }
                        $("#newQuestionForm").find("input").val("");
                        $("#myModal").modal('hide');     
                        $("#submitButton").off("click");
                        return false; // avoid to execute the actual submit of the form.
                    });
                }
            });
        }
    });

}