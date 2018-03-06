
const ProductSync = (function () {

    "use strict";

    let status = {
        productRequiresCategorization: null,
        productSyncProgress: null,
    };

    function init() {
        initEvents();
    }

    function initEvents() {
        $('#action-synchronize-product-updates').click(function () {
            startSync();
        });
    }

    function startSync() {
        displaySynchronizing();

        setTimeout(function () {
            displaySyncStopped();
        }, 5000);
    }

    function displaySynchronizing() {
        let icon = $('#action-synchronize-product-updates').find('.top-news-icon');

        icon.addClass('fa-refresh');
        icon.removeClass('fa-download');

        icon.addClass('fa-spin');

        $('#action-synchronize-product-updates').attr('disabled', true);

        displayProductSyncProgress();
    }

    function displaySyncStopped() {
        let icon = $('#action-synchronize-product-updates').find('.top-news-icon');

        icon.removeClass('fa-refresh');
        icon.addClass('fa-download');

        icon.removeClass('fa-spin');

        $('#action-synchronize-product-updates').attr('disabled', false);
        displayProductSyncProgress(true);   // true = finished
        displayProductsRequiresCategorization(3);

    }

    function displayProductSyncProgress(finished = false) {

        let message = `Product synchronization currently running`;

        if (!status.productSyncProgress) {
            status.productSyncProgress = new StatusBar('sync-progress', message, 'fa fa-ellipsis-h', 'label-primary');
            status.productSyncProgress.setLink('javascript:;', 'View Progress');    //  TODO Link
        }

        if (finished) {
            message = 'Product synchronization finished!';
            status.productSyncProgress.setMessage(message);
            status.productSyncProgress.setIcon('fa fa-check');
            status.productSyncProgress.setLink('javascript:;', 'View Sync Logs');    //  TODO Link
        } else {
            status.productSyncProgress.setIcon('fa fa-ellipsis-h');
        }

        status.productSyncProgress.setMessage(message);

        status.productSyncProgress.render();
    }

    function displayProductsRequiresCategorization(productCount) {
        let message = `You have ${productCount} new products that need categorization`;
        if (!status.productRequiresCategorization) {
            status.productRequiresCategorization = new StatusBar('prcs', message, 'fa fa-warning', 'label-warning');
            status.productRequiresCategorization.setLink('javascript:;', 'Fix Now');    //  TODO Link
        }

        status.productRequiresCategorization.setMessage(message);
        status.productRequiresCategorization.render();
        
        status.productRequiresCategorization.pulsate();        
    }

    return {init};

})();