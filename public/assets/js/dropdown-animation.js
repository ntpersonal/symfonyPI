document.addEventListener('DOMContentLoaded', function() {
    // Add click event to custom select elements
    const customSelects = document.querySelectorAll('.custom-select');
    
    customSelects.forEach(function(select) {
        select.addEventListener('click', function() {
            // Toggle the active class
            this.classList.toggle('active');
        });
    });
    
    // Highlight selected options with animation
    const dropdowns = document.querySelectorAll('select');
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('change', function() {
            // Add animation class to the selected option
            const selectedOption = this.options[this.selectedIndex];
            selectedOption.classList.add('selected-with-animation');
            
            // Remove the class after animation completes
            setTimeout(function() {
                selectedOption.classList.remove('selected-with-animation');
            }, 500);
        });
    });
    
    // Add additional styling to make dropdowns more visible
    const selectElements = document.querySelectorAll('.custom-select select');
    selectElements.forEach(function(select) {
        // Add focus event to enhance visibility
        select.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        // Remove focus styling when blurred
        select.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
