
/* global _,  moment, formats */

//  TODO: enable formatters, import moment

var dtutils = {};

//<editor-fold defaultstate="collapsed" desc="Renderers">

dtutils.renderDate = function (date, type) {

    // if display or filter data is requested, format the date
    if (date && (type === 'display' || type === 'filter')) {
        return (moment(date).format(formats.DISPLAY_DATE_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return date;

};

dtutils.renderTime = function (time, type) {

    // if display or filter data is requested, format the time
    if (type === 'display' || type === 'filter') {
        return (moment(time, formats.SERVER_TIME_FORMAT).format(formats.DISPLAY_TIME_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return time;

};

dtutils.renderDateTime = function (date, type) {

    // if display or filter data is requested, format the date
    if (date && (type === 'display' || type === 'filter')) {
        return (moment(date).format(formats.DISPLAY_DATE_TIME_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return date;

};

dtutils.renderTimeFromDateTime = function (time, type) {

    // if display or filter data is requested, format the time
    if (type === 'display' || type === 'filter') {
        return (moment(time, formats.SERVER_DATETIME_FORMAT).format(formats.DISPLAY_TIME_FORMAT));
    }

    // Otherwise the data type requested (`type`) is type detection or
    // sorting data, for which we want to use the raw date value, so just return
    // that, unaltered
    return time;

};

//</editor-fold>


/**
 * Requires #template-table-inline-actions
 * @param {type} actions
 * @returns {undefined}
 */
dtutils.getInlineActionsView = function (actions) {

    if (!$('#template-table-inline-actions').length) {
        console.error("#template-table-inline-actions not found");
        return "";
    }

    var template = _.template($('#template-table-inline-actions').html());

    return template({actions: actions});

};

dtutils.getAllDefaultActions = function (id) {
    return [
        dtutils.getDefaultViewAction(id),
        dtutils.getDefaultEditAction(id),
        dtutils.getDefaultDeleteAction(id)
    ];
};

dtutils.getDefaultViewAction = function (id) {
    return {
        id: id,
        href: window.location.href + "/" + id,
        name: "view",
        displayName: "View",
        icon: "fa-search"
    };
};

dtutils.getDefaultEditAction = function (id) {
    return {
        id: id,
        href: window.location.href + "/" + id + "/edit",
        name: "edit",
        displayName: "Edit",
        icon: "fa-pencil"
    };
};


dtutils.getDefaultDeleteAction = function (id) {
    return {
        id: id,
        href: 'javascript:void(0)',
        name: "delete",
        displayName: "Delete",
        icon: "fa-times"
    };
};

dtutils.getAccessBasedActions = function (id, rowData, moduleCode) {
    var access = session.getModuleAccess(moduleCode);
    var actions = [];

    if (access == "MANAGER") {
        actions = dtutils.getAllDefaultActions(id);
    } else if (access == "AUTHOR") {
        if (session.currentUser.username == rowData.created_by) {
            actions = dtutils.getAllDefaultActions(id);
        } else {
            actions = [dtutils.getDefaultViewAction(id)];
        }
    } else if (access == "VIEWER") {
        actions = [dtutils.getDefaultViewAction(id)];
    } else {
        actions = [];
    }

    return actions;
};

//<editor-fold defaultstate="collapsed" desc="Actions">
dtutils.initializeDeleteAction = function (callback) {

    $(document).on('click', '.action-delete', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        let url = ($(this).data('url') ? $(this).data('url') : window.location.href) + "/" + id;

        swal({
            title: 'Are you sure?',
            text: 'Deletion cannot be undone. Continue?',
            icon: 'warning',
            dangerMode: true,
            buttons: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url,
                    data: {_token: app.csrf},
                    type: "DELETE",
                    success: function (response) {
                        console.log(response);
                        swal("Success", "Record deleted", "success");

                        setTimeout(function () {
                            location.reload();
                        }, 1500);

                    },
                    error: function (response) {
                        console.error(response);
                        swal("Error", response.responseText, "error");
                    }
                });
            }
        });
        
    });


};
//</editor-fold>