/**
 * Basic Zoom functionality
 */
(function($) {
    'use strict';
    
    // Initialize zoom when document is ready
    $(document).ready(function() {
        // Basic zoom functionality
        $('.zoom-image').on('click', function() {
            // Simple zoom effect
            $(this).css('transform', 'scale(1.2)');
            setTimeout(function() {
                $('.zoom-image').css('transform', 'scale(1)');
            }, 300);
        });
    });
    
})(jQuery);
