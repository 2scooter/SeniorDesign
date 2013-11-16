$(document).ready(function() {


	$('#user-content').dataTable( {

         "bPaginate": false
    }
	);

    $('#wrapper').delegate('#infoButton','click', function() {
        var oTable = $('#user-content').dataTable();
        var row = $(this).closest('tr');

        rowIndex = oTable.fnGetPosition(row.get(0));
        name = row.find('td:eq(0)').text();
        level = row.find('td:eq(2)').text();
        email = row.find('td:eq(1)').text();
        phone = row.find("#phoneCell").val();
        address = row.find("#addressCell").val();
        $('#info-modal').find('.modal-header > h3').text(name);
        $('#info-modal').find('.modal-header > h4').text(level);
//        $('#info-modal').find('.modal-header > h6').text("Account ID: " + row.attr('id')).end();
        $('#email').val(email);
        $('#accountid').val(row.attr('id'));
        $('#phone').val(phone);
        $('#address').val(address);
        $('#info-modal').modal('show');
    });

    $('#info-modal-save').on('click',function() {
        $('#adminform').submit();       
    });    
 
    $('#info-modal-close').on('click', function() {
        $('#info-modal').modal('hide');
    });


    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
});
