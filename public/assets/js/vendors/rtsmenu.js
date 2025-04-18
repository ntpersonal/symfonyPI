/**
 * RTS Menu - Basic implementation
 */
(function($) {
    'use strict';
    
    // Initialize menu when document is ready
    $(document).ready(function() {
        // Basic menu functionality
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
        });
        
        // Dropdown functionality
        $('.has-dropdown').on('click', function(e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).toggleClass('active');
            }
        });
    });
    
})(jQuery);
