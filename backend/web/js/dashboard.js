/* global bootstrapTooltip, bootstrapDatepicker */
if (typeof bootstrapTooltip !== 'undefined' && $.fn.tooltip) {
    $.fn.tooltip = bootstrapTooltip;
}

if (typeof bootstrapDatepicker !== 'undefined' && $.fn.bootstrapDP === undefined) {
    $.fn.bootstrapDP = bootstrapDatepicker;
}

$(function () {
    'use strict';

    $('.knob').knob();

    $('.connectedSortable').sortable({
        containment: $('.content-wrapper'),
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.card-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999
    });
    $('.connectedSortable .card-header, .connectedSortable .nav-tabs').css('cursor', 'move');

    const tooltipSelector = '[data-bs-toggle="tooltip"]';
    $(tooltipSelector).tooltip();
    $(document).ajaxComplete(function () {
        $(tooltipSelector).tooltip();
    });
});
