if (bootstrapTooltip && $.fn.tooltip) {
    $.fn.tooltip = bootstrapTooltip;
}

$(function () {
    'use strict';

    if ($.fn.sortable) {
        $('.connectedSortable').sortable({
            containment: $('.app-content'),
            placeholder: 'sort-highlight',
            connectWith: '.connectedSortable',
            handle: '.card-header, .nav-tabs',
            forcePlaceholderSize: true,
            zIndex: 999999
        });
        $('.connectedSortable .card-header, .connectedSortable .nav-tabs').css('cursor', 'move');
    }

    const initTooltips = () => {
        const triggers = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        triggers.forEach((trigger) => {
            if (!bootstrap.Tooltip.getInstance(trigger)) {
                new bootstrap.Tooltip(trigger);
            }
        });
    };

    initTooltips();

    $(document).on('ajaxComplete', () => {
        initTooltips();
    });
});
