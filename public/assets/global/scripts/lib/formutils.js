
var formutils = {
    useIntegerForBooleanValues: true,
    ckeditorFields: {}
};

formutils.disableFieldsOnViewMode = function () {
    $('.form-control').prop('disabled', app.routeAction === "show");
    $('[type=checkbox]').prop('disabled', app.routeAction === "show");
};

formutils.displayRequired = function () {
    var requiredMarkerHtml = " <span class='field-required'>*</span>";

    $(':input[required]').each(function () {
        var label = $(this).siblings('label')[0];
        $(label).append(requiredMarkerHtml);
    });
};

formutils.displayErrors = function (errors) {

    $('.form-group,.error-msg-container').removeClass('has-error');
    $('.form-group,.error-msg-container').find('.error-marker').remove();

    for (let field in errors) {
        let $container = $(`.form-group[for=${field}]`);

        if (!$container.length) {
            $container = $(`.error-msg-container[for=${field}]`);
        }

        if (!$container.length) {
            continue;
        }

        let labelHtml = `<label class="control-label error-marker">${errors[field][0]}</label>`;

        $container.append(labelHtml);
        $container.addClass('has-error');
    }
};

formutils.handleRequestError = xhr => {
    try {
        let response = JSON.parse(xhr.responseText);
        swal('Error', response.message, 'error');

        if (formutils && response.errors) {
            formutils.displayErrors(response.errors);
        }
    } catch (e) {
        swal('Error', xhr.responseText, 'error');
    }
};

formutils.initBasicFormActions = function (options) {
    $('#action-back').click(function () {
        formutils.closeForm(options);
    });

    $('#action-edit').click(function () {
        window.location.href = options.url + '/' + options.originalId + '/edit';
    });

    $('.btn-form-action').click(function () {
        let action = $(this).data('action');
        formutils.submit(options, action);
    });
};

formutils.closeForm = function (options) {
    if (options.url) {
        window.location.href = options.url;
    } else {
        window.history.back();
    }
};

formutils.submit = function (options, action) {
    formutils.getBasicFormSubmitAction(options)
            .done(response => {
                console.log(response);
                swal('Success', 'Saved!', 'success');

                formutils.handleAction(options, action);
            })
            .fail(formutils.handleRequestError);
};

formutils.handleAction = function (options, action) {
    //  TODO: add base url to links
    setTimeout(function () {
        if (action === 'save-close') {
            formutils.closeForm(options);
        } else if (action === 'save-new') {
            window.location.href = options.url + '/create';
        } else {
            console.warn('Unknown action ' + action);
        }
    }, 2000);
};

formutils.getBasicFormSubmitAction = function (options) {
    let url, method;
    let data = options.formSelector ? formutils.formToJson(options.formSelector) : options.data;
    data._token = app.csrf;

    if (app.routeAction === 'create') {
        url = options.url;
        method = 'POST';
    } else if (app.routeAction === 'edit') {
        url = options.url + '/' + options.originalId;
        data._method = 'PUT';
        method = 'PUT';
    }

    return $.ajax({
        url: url,
        data: data,
        type: method
    });
};

formutils.formToJson = function (formSelector) {
    var json = {};

    $(formSelector + ' :input').each(function () {
        var name = $(this).attr('name');
        var type = $(this).attr('type');
        var value = $(this).val();

        if (type == "checkbox") {
            value = $(this).is(':checked');

            if (formutils.useIntegerForBooleanValues) {
                value = value ? 1 : 0;
                console.log(name, value);
            }
        }

        if ($(this).data('autoNumeric')) {
            value = $(this).autoNumeric('get');
        }

        if ($(this).data('date-format')) {
            //  auto date processing requires momentjs
            if (moment) {
                value = moment(value, $(this).data('date-format'))
                        .format(formats.SERVER_DATE_FORMAT);

                if (value == 'Invalid date') {
                    value = null;
                }
            } else {
                console.warn("Date formatting detected but momentjs is not included in the scripts!");
            }
        }

        if ($(this).data('time-format')) {
            //  auto date processing requires momentjs
            if (moment) {
                value = moment(value, $(this).data('time-format'))
                        .format(formats.SERVER_TIME_FORMAT);

                if (value == 'Invalid date') {
                    value = null;
                }
            } else {
                console.warn("Date formatting detected but momentjs is not included in the scripts!");
            }
        }

        if (formutils.ckeditorFields[name]) {
            value = formutils.ckeditorFields[name].getData();
            value = value.replace(/<p>&nbsp;<\/p>/g, '').trim();
        }

        if (name && value !== undefined && value !== null) {
            json[name] = value;
        }
    });

    return json;
};

formutils.setFieldAsCKEditor = function (fieldName, editor) {
    formutils.ckeditorFields[fieldName] = editor;
};