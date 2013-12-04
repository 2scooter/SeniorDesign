$(document).ready(function() {    

    
    $('#clear-button').on('click', function() {
        var r = confirm("This will clear the list of all judges for the year. Are you sure that you want to clear the list?");
        if (r == true)
          {
            var url = "resetUsers.php"; // the script where you handle the form input.  
            var formData = new FormData($("#uploadFileForm")[0]);           
            $.ajax({
                   type: "POST",           
                   url: url
             });
 
            alert('Year reset');
          }
        else
          {
          x = "You pressed Cancel!";
          }
    });
    
    

    $('#user-content').delegate('#removeButton', 'click', function() {
        var oTable = $('#user-content').dataTable();
        var row = $(this).closest('tr');

        rowIndex = oTable.fnGetPosition(row.get(0));
        eId = row.find('td:eq(1)').text();
        eName = row.find('td:eq(2)').text();

        $('#remove-modal').find('.modal-header > h3').text(eId).end();
        $('#message').val("");
        $('#user-name').val("");
        $('#remove-modal').modal('show');
    });


    $('#remove-button').on('click', function() {

        var oTable = $('#user-content').dataTable();

        if($('#message').val() != "" && $('#user-name').val() != "") {
            $('#remove-modal').modal('hide');
            removeId(eId, eName, $('#message').val(), $('#user-name').val());
            oTable.fnDeleteRow(rowIndex);
        }
    });
});


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}



(window.onpopstate = function () {
    var cells = new Array();
    var all = "name=";
    var x = 0;
    var rows = $("#user-content").dataTable().fnGetNodes();
    var client = new XMLHttpRequest();
    
    
    for(var i=0;i<rows.length;i++){
        // Get HTML of 3rd column (for example)
        if($(rows[i]).find("td:eq(4)").html() == "Pass"){
            cells[x] = ($(rows[i]).find("td:eq(0)").html());
            x++;
        }
    }
    cells = cells.sort();
    
    for(var i = 0; i < cells.length; i++){
        all = all + cells[i] + "\n";
    }

    $.ajax({
      type: 'POST',
      url: 'saveFile.php',
      data: all, //your data
      success: function(data)
      {
          //document.getElementById("returnedData").innerHTML = data;          
      }, //callback when ajax request finishes
      dataType: 'text' //text/json...
    });

    //$.post('saveFile.php', {cells:cells}, function(){document.getElementById("user-content_wrapper").html = cells;});

    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query)) {
       urlParams[decode(match[1])] = decode(match[2]);
    }
    var oTable = $('#user-content').dataTable();
    var id = urlParams["id"];
    if(id != null) {
        oTable.fnFilter(id);
    }
});
