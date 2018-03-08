
/* global ratchet */

const RatchetStatus = (function () {

    "use strict";

    let statusBar;

    function init() {
        statusBar = new StatusBar('ratchet-status', 'Ratchet server checking initiated', 'fa fa-check');
        statusBar.render(true);//true = priority

        checkConnectivity();
    }

    function checkConnectivity() {
        let wasOpened = false;
        const conn = ratchet.connect();

        let retryLink = {
            url: 'javascript:;',
            text: 'Click here to retry checking',
            callback: checkConnectivity
        };

        conn.onerror = function (e) {
            console.error(e);
            displayError('Connection to ratchet server cannot be established. Please check if it\'s running!', retryLink);
        };

        conn.onmessage = function (e) {
            console.log(e.data);

            displaySuccessMessage('Ratchet server is running properly!');
        };

        conn.onopen = function (e) {
            displayLoading('Connected! Now trying to check messaging');
            conn.send('Hello Me!');
            wasOpened = true;
        };

        conn.onclose = function () {
            if (wasOpened) {
                displayError('Connection to ratchet server is closed!', retryLink);
            } else {
                displayError('Connection to ratchet server closed unexpectedly!', retryLink);
            }
        };

        displayLoading('Ratchet server: checking connection ...');
    }


    function displaySuccessMessage(message) {
        statusBar.setIcon('fa fa-check', 'label-success');
        statusBar.setMessage(message);

        statusBar.setLink('javascript:;', 'Learn More', function () {
            alert('clicked');
        });

        statusBar.render(true);        
    }

    function displayLoading(message) {
        statusBar.setIcon('fa fa-ellipsis-h', 'label-info');
        statusBar.setMessage(message);

        statusBar.setLink(null);

        statusBar.render(true);
    }

    function displayError(message, link) {
        statusBar.setIcon('fa fa-remove', 'label-danger');
        statusBar.setMessage(message);

        statusBar.setLink(link.url, link.text, link.callback);

        statusBar.render(true);
        statusBar.pulsate();
    }

    return {init};

})();
