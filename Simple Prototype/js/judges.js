$(document).ready(function() {
    $.extend($.fn.dataTableExt.oStdClasses, {
        "sWrapper": "dataTables_wrapper form-inline"
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

    $('#user-content').delegate('#metricClick', 'click', function() {
        var row = $(this).closest('tr');
        var eId = row.find('td:eq(1)').text();
        var oTable = $('#user-content').dataTable();
        var aPos = oTable.fnGetPosition($(this).parent().get(0))[1];
        var head = $('#user-content thead th:eq(' + aPos + ')').text();
        var metric = $(this).parent().text();
        if(metric.charAt(0) == 'W' || metric.charAt(0) == 'E') {
            metric = metric.substr(1);
        }

        $('#info-modal').find('.modal-header > h3').text(eId).end();
        $('#info-modal').find('.modal-header > h5').text(head + " - " + metric).end();
        $('#info-modal').find('.modal-body').text(this.align).end();
        $('#info-modal').modal('show');
        var link = document.getElementById("history-link");
        link.style.visibility = 'visible';
        if("Restored Consumers" == head) {
            link.style.visibility='hidden';
        }
        link.setAttribute("href", "history.html?id=" + eId + "&metric=" + head);
    });

    $('#info-modal-close').on('click', function() {
        $('#info-modal').modal('hide');
    });

    $('#remove-button').on('click', function() {

        var oTable = $('#user-content').dataTable();

        if($('#message').val() != "" && $('#user-name').val() != "") {
            $('#remove-modal').modal('hide');
            removeId(eId, eName, $('#message').val(), $('#user-name').val());
            oTable.fnDeleteRow(rowIndex);
        }
    });

    $('#remove-modal-close').on('click', function() {
        $('#remove-modal').modal('hide');
    });

    $('#message-modal-close').on('click', function() {
        $('#message-modal').modal('hide');
    });

    $("#error-alert").hide();

    var rowIndex;
    var eId;
    var eName;

    var idCallback = function(memberDashboard, type) {
        var metric = memberDashboard.metrics.restoredOutages;
        if (metric === undefined) {
            return "N/A";
        }

        if (type === "set") {
            memberDashboard.restoredOutages_display = getMetricCellHtml($("<span/>", {
                                        text: metric.result
                                    }), metric);
        } else if (type === "display") {
            return memberDashboard.restoredOutages_display;
        } else if (type === "sort") {
            return metric.sortableResult;
        } else {
            return metric.result;
        }
    }

    var nameCallback = function(memberDashboard, type) {
        var metric = memberDashboard.metrics.restoredOutages;
        if (metric === undefined) {
            return "N/A";
        }

        if (type === "set") {
            memberDashboard.restoredOutages_display = getMetricCellHtml($("<span/>", {
                                        text: metric.result
                                    }), metric);
        } else if (type === "display") {
            return memberDashboard.restoredOutages_display;
        } else if (type === "sort") {
            return metric.sortableResult;
        } else {
            return metric.result;
        }
    }

    var progressCallback = function(memberDashboard, type) {
        var metric = memberDashboard.metrics.restoredOutages;
        if (metric === undefined) {
            return "N/A";
        }

        if (type === "set") {
            memberDashboard.restoredOutages_display = getMetricCellHtml($("<span/>", {
                                        text: metric.result
                                    }), metric);
        } else if (type === "display") {
            return memberDashboard.restoredOutages_display;
        } else if (type === "sort") {
            return metric.sortableResult;
        } else {
            return metric.result;
        }
    }

    var certifiedCallback = function(memberDashboard, type) {
        var metric = memberDashboard.metrics.restoredOutages;
        if (metric === undefined) {
            return "N/A";
        }

        if (type === "set") {
            memberDashboard.restoredOutages_display = getMetricCellHtml($("<span/>", {
                                        text: metric.result
                                    }), metric);
        } else if (type === "display") {
            return memberDashboard.restoredOutages_display;
        } else if (type === "sort") {
            return metric.sortableResult;
        } else {
            return metric.result;
        }
    }

    var swallowClick = function(event) {
        event.preventDefault();
        event.stopPropagation();
    };

    var options = {
        sDom: "<'row'<'span6'f>r>t",
        sPaginationType: "bootstrap",
        iDisplayLength: -1,
        aoColumns: [
            { sTitle: "ID" },
            { sTitle: "Name" },
            { sTitle: "Progress" },
            { sTitle: "Certified" }
        ],
        aoColumnDefs: [
            {
                aTargets: [0],
                mData: idCallback
            },
            {
                aTargets: [1],
                mData: nameCallback
            },
            {
                aTargets: [2],
                mData: progressCallback
            },
            {
                aTargets: [3],
                mData: certifiedCallback
            }
        ],
        fnRowCallback: function(row, data, index) {
            $(".oneoff-tooltip", row).tooltip().click(swallowClick);
        }
    };

    $("#user-content").dataTable(options);

    refreshDashboard();
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

(window.onpopstate = function () {
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
