
const Dashboard = (function () {

    "use strict";

    function init() {
        initPayrollStatus();
    }
    
    function initPayrollStatus() {
        let payrollStatus = new StatusBar('payroll', 'Payroll for February 28 currently open', 'fa fa-lock-open', 'label-primary');
        payrollStatus.setLink('javascript:;', 'View Payroll');    //  TODO Link
        payrollStatus.render();
    }

    return {init};

})();
