/**
 * Reclamation Chatbot Integration
 * Extends the AI Chatbot with reclamation-specific features
 */
document.addEventListener('DOMContentLoaded', function() {
    // Wait for the AI Chatbot to initialize
    setTimeout(() => {
        // Get the reclamation form and message input
        const reclamationForm = document.getElementById('reclamation-form');
        const messageField = document.getElementById('reclamation-message');
        const chatbotToggle = document.getElementById('ai-chatbot-toggle');
        
        // Check if elements exist
        if (!reclamationForm || !messageField || !chatbotToggle) {
            console.error('Required reclamation elements not found');
            return;
        }
        
        // Add a suggestion button next to the reclamation message field
        addSuggestionButton(messageField);
        
        // Show the chatbot after 3 seconds automatically
        setTimeout(() => {
            const aichatbot = window.aichatbot;
            if (aichatbot && typeof aichatbot.toggleChatbot === 'function') {
                aichatbot.toggleChatbot(true);
                aichatbot.addMessage('bot', 'Besoin d\'aide pour formuler votre réclamation? Je suis là pour vous aider!');
            } else {
                console.log('Chatbot not fully initialized yet');
            }
        }, 3000);
    }, 1000);
});

/**
 * Add a suggestion button next to the message field
 */
function addSuggestionButton(messageField) {
    // Create the suggestion button
    const suggestionButton = document.createElement('button');
    suggestionButton.type = 'button';
    suggestionButton.className = 'ai-suggestion-btn';
    suggestionButton.innerHTML = '<i class="fas fa-lightbulb"></i> Besoin d\'aide?';
    suggestionButton.style.cssText = `
        position: absolute;
        right: 15px;
        top: -40px;
        background-color: #ffc107;
        color: #212529;
        border: none;
        border-radius: 20px;
        padding: 8px 15px;
        font-size: 14px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    `;
    
    // Add hover effects
    suggestionButton.addEventListener('mouseover', () => {
        suggestionButton.style.backgroundColor = '#e0a800';
    });
    
    suggestionButton.addEventListener('mouseout', () => {
        suggestionButton.style.backgroundColor = '#ffc107';
    });
    
    // Add click handler
    suggestionButton.addEventListener('click', () => {
        // Get the chatbot instance
        const aichatbot = window.aichatbot;
        if (aichatbot && typeof aichatbot.toggleChatbot === 'function') {
            // Show the chatbot
            aichatbot.toggleChatbot(true);
            
            // Add a message suggesting help
            aichatbot.addMessage('bot', 
                'Je peux vous aider à rédiger votre réclamation. Voici quelques exemples de formulations:<br><br>' +
                '<strong>1.</strong> "Je souhaite signaler un problème avec..."<br>' +
                '<strong>2.</strong> "J\'ai rencontré une difficulté concernant..."<br>' +
                '<strong>3.</strong> "Je demande une révision de..."<br><br>' +
                'Quel type de réclamation souhaitez-vous soumettre?'
            );
        } else {
            console.error('Chatbot instance not available');
        }
    });
    
    // Add the button to the page
    const inputContainer = messageField.closest('.input-box');
    if (inputContainer) {
        inputContainer.style.position = 'relative';
        inputContainer.appendChild(suggestionButton);
    }
}

// Make the chatbot instance available globally
document.addEventListener('aichatbot:initialized', (event) => {
    window.aichatbot = event.detail.chatbot;
}); 