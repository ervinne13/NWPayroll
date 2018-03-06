/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global formutils */

Array.prototype.column = function (column) {
    function reduction(previousValue, currentValue) {
        previousValue.push(currentValue[column]);
        return previousValue;
    }

    return this.reduce(reduction, []);
};