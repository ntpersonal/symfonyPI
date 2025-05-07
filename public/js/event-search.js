document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('event-search');
    const eventListContainer = document.getElementById('event-list-container');

    if (searchInput && eventListContainer) {
        searchInput.addEventListener('input', debounce(function(e) {
            const searchTerm = e.target.value.trim();
            
            fetch(`/admin/events/search?q=${encodeURIComponent(searchTerm)}`)
                .then(response => response.text())
                .then(html => {
                    eventListContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error('Erreur lors de la recherche:', error);
                    eventListContainer.innerHTML = '<p class="text-danger">Une erreur est survenue lors de la recherche.</p>';
                });
        }, 300));
    }
});

// Fonction debounce pour limiter les appels à l'API
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
} 