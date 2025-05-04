document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tabs
    const textSearchTab = document.getElementById('text-search-tab');
    const imageSearchTab = document.getElementById('image-search-tab');
    const textSearchContent = document.getElementById('text-search');
    const imageSearchContent = document.getElementById('image-search');
    
    if (textSearchTab && imageSearchTab) {
        textSearchTab.addEventListener('click', function(e) {
            e.preventDefault();
            // Activate text search tab
            textSearchTab.classList.add('active');
            textSearchTab.setAttribute('aria-selected', 'true');
            textSearchContent.classList.add('show', 'active');
            
            // Deactivate image search tab
            imageSearchTab.classList.remove('active');
            imageSearchTab.setAttribute('aria-selected', 'false');
            imageSearchContent.classList.remove('show', 'active');
        });
        
        imageSearchTab.addEventListener('click', function(e) {
            e.preventDefault();
            // Activate image search tab
            imageSearchTab.classList.add('active');
            imageSearchTab.setAttribute('aria-selected', 'true');
            imageSearchContent.classList.add('show', 'active');
            
            // Deactivate text search tab
            textSearchTab.classList.remove('active');
            textSearchTab.setAttribute('aria-selected', 'false');
            textSearchContent.classList.remove('show', 'active');
        });
    }
    
    // Preview uploaded image
    const imageInput = document.getElementById('image_search');
    if (imageInput) {
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create preview if it doesn't exist
                    let preview = document.getElementById('image_preview');
                    if (!preview) {
                        preview = document.createElement('div');
                        preview.id = 'image_preview';
                        preview.className = 'mt-3';
                        imageInput.parentNode.appendChild(preview);
                    }
                    
                    // Show the image preview
                    preview.innerHTML = `<p>Selected image:</p><img src="${e.target.result}" class="img-thumbnail" style="max-height: 200px;">`;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }
});
