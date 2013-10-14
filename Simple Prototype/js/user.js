$(document).ready(function() {

    $('#wrapper').delegate('#infoButton','click', function() {
        var oTable = $('#user-content').dataTable();
        var row = $(this).closest('tr');

        rowIndex = oTable.fnGetPosition(row.get(0));
        name = row.find('td:eq(0)').text();
        level = row.find('td:eq(2)').text();
        email = row.find('td:eq(1)').text();

        $('#info-modal').find('.modal-header > h3').text(name).end();
        $('#info-modal').find('.modal-header > h4').text(level).end();
        $('#info-modal').find('.modal-header > h6').text("Account ID: " + row.attr('id')).end();
        $('#accountType').text(level);
        $('#email').val(email);
        $('#phone').val("");
        $('#address').val("");
        $('#info-modal').modal('show');
    });

    $('#info-modal-close').on('click', function() {
        $('#info-modal').modal('hide');
    });

    $('#info-modal-close').on('click', function() {
        $('#info-modal').modal('hide');
    });

    function refreshDashboard() {
        setTimeout(function() {
            var errorDiv = $("#error-alert");

            var minutes = 5;
            var seconds = minutes * 60;
            var millis  = seconds * 1000;

            $.ajax("api/metrics/dashboard/oms", {
                dataType: "json",
                success: function(dashboard) {
                    errorDiv.hide();

                    processResults(dashboard);

                    setTimeout(refreshDashboard, millis);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    errorDiv.show();

                    setTimeout(refreshDashboard, millis);
                }
            });
        }, 1)
    }

    /**
     * Clears and then re-populates the table.
     *
     * @param dashboard he dashboard object
     */
    function processResults(dashboard) {
        var dataTable = $("#user-content").dataTable();
        dataTable.fnClearTable();
        dataTable.fnAddData(dashboard.memberDashboards);
    }

    /**
     * Takes a jQuery element and wraps it in a div along with a status label, if needed.  Returns the resulting raw HTML.
     *
     * @param element a jQuery element to wrap
     * @param metric the metric
     */
    function getMetricCellHtml(element, metric) {
        var status = metric.status;
        var color;
        var message = metric.statusMessage;

        if(status == "ERROR") {
            color = "#f2dede";
        } else if (status == "OUT_OF_DATE") {
            color = "#E0E0E0";
        } else if(status == "WARNING") {
            color = "#fcf8e3";
        } else if(status == "WEAK_WARNING") {
            color = "#d9edf7";
        } else if(status == "OK") {
            color = "#dff0d8";
        }

        var div = $("<div id='metricClick' align='" + message + "' style='background-color:" + color + "'></div>", {
            "class": getStatusClass(status)
        }).append(getShortLabel(status).css("margin-right", "5px"));
        div.append(element);

        return div.wrap("<p/>").parent().html();
    }

    function removeId(eId, eName, message, userName) {
        var path = "api/ignore/add/oms/" + eId + "/" + eName + "/" + message + "/" + userName;
        $.ajax(path, {
            type: "post",
            success: function() {
                $('#message-modal').find('.modal-header > h4').text("OMS").end();
                $('#message-modal').find('.modal-body > h5').text("Removed "  + eId).end();
                $('#message-modal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                errorDiv.show();
            }
        });
    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
});
