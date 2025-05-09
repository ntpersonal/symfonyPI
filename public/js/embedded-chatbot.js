/**
 * Embedded Chatbot for the Contact page
 * Integrates AI assistance directly within the page
 */
class EmbeddedChatbot {
    constructor() {
        this.messagesContainer = document.getElementById('embedded-chatbot-messages');
        this.inputField = document.getElementById('embedded-chatbot-input');
        this.sendButton = document.getElementById('embedded-chatbot-send');
        this.scrollDownBtn = document.getElementById('scroll-down-btn');
        this.apiEndpoint = '/reclamation/ai-chat';
        this.isScrolledToBottom = true;
        this.quickReplies = [
            "Comment formuler ma réclamation ?",
            "Quels documents fournir ?",
            "Délai de traitement ?",
            "Types de réclamations"
        ];
        
        // Modèles de réclamations disponibles
        this.modelsQuickReplies = [
            "Générer un modèle de réclamation produit",
            "Générer un modèle de réclamation service",
            "Générer un modèle de réclamation facturation",
            "Générer un modèle pour problème avec personnel"
        ];
        
        this.init();
    }

    init() {
        if (!this.messagesContainer || !this.inputField || !this.sendButton) {
            console.error('Embedded chatbot elements not found');
            return;
        }
        
        // Add event listeners
        this.addEventListeners();
        
        // Add welcome message with quick replies
        this.addMessage('bot', 'Bonjour ! Je suis l\'assistant virtuel de Sportify. Comment puis-je vous aider avec votre réclamation ?', true);
    }

    addEventListeners() {
        // Send message on button click
        this.sendButton.addEventListener('click', () => this.sendMessage());
        
        // Send message on Enter key (but allow Shift+Enter for new line)
        this.inputField.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.sendMessage();
            }
        });
        
        // Auto-resize textarea
        this.inputField.addEventListener('input', () => {
            this.inputField.style.height = 'auto';
            this.inputField.style.height = Math.min(this.inputField.scrollHeight, 100) + 'px';
        });
        
        // Scroll events for the messages container
        this.messagesContainer.addEventListener('scroll', () => {
            const isScrolledToBottom = this.messagesContainer.scrollHeight - this.messagesContainer.clientHeight <= this.messagesContainer.scrollTop + 50;
            
            if (isScrolledToBottom !== this.isScrolledToBottom) {
                this.isScrolledToBottom = isScrolledToBottom;
                this.toggleScrollButton(!isScrolledToBottom);
            }
        });
        
        // Scroll down button click
        if (this.scrollDownBtn) {
            this.scrollDownBtn.addEventListener('click', () => this.scrollToBottom());
        }
        
        // Modèle de réclamation button
        const generateModelBtn = document.getElementById('generate-model-btn');
        if (generateModelBtn) {
            generateModelBtn.addEventListener('click', () => this.showModelSelector());
        }
    }
    
    toggleScrollButton(show) {
        if (!this.scrollDownBtn) return;
        
        if (show) {
            this.scrollDownBtn.style.display = 'flex';
        } else {
            this.scrollDownBtn.style.display = 'none';
        }
    }

    sendMessage(text = null) {
        const message = text || this.inputField.value.trim();
        if (!message) return;
        
        // Add user message to chat
        this.addMessage('user', message);
        
        // Clear input field if it's from the input, not a quick reply
        if (!text) {
            this.inputField.value = '';
            this.inputField.style.height = 'auto';
            this.inputField.focus();
        }
        
        // Show typing indicator
        this.addTypingIndicator();
        
        // Send to AI service
        this.sendToAI(message);
    }

    async sendToAI(message) {
        try {
            const response = await fetch(this.apiEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ message })
            });
            
            if (!response.ok) {
                throw new Error('Erreur réseau lors de la connexion au service IA');
            }
            
            const data = await response.json();
            
            // Remove typing indicator
            this.removeTypingIndicator();
            
            // Add AI response with random delay for realistic effect
            setTimeout(() => {
                // Add AI response
                if (data.success) {
                    // 70% chance to show quick replies for variety
                    const showQuickReplies = Math.random() < 0.7;
                    this.addMessage('bot', data.response, showQuickReplies);
                } else {
                    this.addMessage('bot', 'Désolé, je n\'ai pas pu traiter votre demande. Veuillez réessayer plus tard.');
                }
            }, Math.random() * 500 + 500); // Random delay between 500ms and 1000ms
        } catch (error) {
            console.error('Embedded Chatbot Error:', error);
            this.removeTypingIndicator();
            this.addMessage('bot', 'Désolé, une erreur s\'est produite. Veuillez réessayer plus tard.');
        }
    }

    addMessage(sender, text, showQuickReplies = false) {
        const messageElement = document.createElement('div');
        messageElement.className = `embedded-message embedded-${sender}-message`;
        
        let icon = '';
        if (sender === 'bot') {
            icon = '<div class="embedded-message-icon"><i class="fas fa-robot"></i></div>';
        } else if (sender === 'user') {
            icon = '<div class="embedded-message-icon"><i class="fas fa-user"></i></div>';
        }
        
        // Add animation class for smooth appearance
        messageElement.classList.add('fadeIn');
        
        let quickRepliesHTML = '';
        if (sender === 'bot' && showQuickReplies) {
            // Détecter si le message parle de réclamations ou de modèles
            const lowerText = text.toLowerCase();
            const isAboutReclamation = lowerText.includes('réclamation') || 
                                      lowerText.includes('formuler') || 
                                      lowerText.includes('rédiger') ||
                                      lowerText.includes('modèle');
            
            // Si le texte contient un modèle formaté (avec le div style), n'affichez pas les quick replies
            const hasFormattedModel = text.includes('<div style=');
            
            if (isAboutReclamation && !hasFormattedModel) {
                // Afficher les options de modèles
                quickRepliesHTML = `
                    <div class="quick-replies">
                        ${this.modelsQuickReplies.map(reply => `<button type="button" class="quick-reply-btn">${reply}</button>`).join('')}
                    </div>
                `;
            } else if (!hasFormattedModel) {
                // Shuffle and pick 3 random quick replies from the standard set
                const shuffled = [...this.quickReplies].sort(() => 0.5 - Math.random());
                const selected = shuffled.slice(0, 3);
                
                quickRepliesHTML = `
                    <div class="quick-replies">
                        ${selected.map(reply => `<button type="button" class="quick-reply-btn">${reply}</button>`).join('')}
                    </div>
                `;
            }
        }
        
        messageElement.innerHTML = `
            ${icon}
            <div class="embedded-message-content">${this.formatMessage(text)}</div>
        `;
        
        this.messagesContainer.appendChild(messageElement);
        
        // Add quick replies if needed
        if (quickRepliesHTML) {
            const quickRepliesElement = document.createElement('div');
            quickRepliesElement.className = 'embedded-bot-message';
            quickRepliesElement.innerHTML = quickRepliesHTML;
            this.messagesContainer.appendChild(quickRepliesElement);
            
            // Add event listeners to quick reply buttons
            const quickReplyButtons = quickRepliesElement.querySelectorAll('.quick-reply-btn');
            quickReplyButtons.forEach(button => {
                button.addEventListener('click', () => {
                    this.sendMessage(button.textContent);
                    // Remove all quick replies after one is selected
                    document.querySelectorAll('.quick-replies').forEach(el => el.remove());
                });
            });
        }
        
        // Ajouter les événements pour les boutons d'utilisation de modèle
        const useModelButtons = messageElement.querySelectorAll('.use-model-btn');
        useModelButtons.forEach(button => {
            button.addEventListener('click', () => {
                const action = button.getAttribute('data-action');
                const modelContainer = button.closest('.embedded-message-content').querySelector('div[style*="background:#f9f9f9"]');
                
                if (modelContainer) {
                    // Récupérer le modèle (sans les balises HTML)
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = modelContainer.innerHTML;
                    const modelText = tempDiv.textContent || tempDiv.innerText;
                    
                    if (action === 'copy') {
                        // Copier le modèle dans le presse-papier
                        navigator.clipboard.writeText(modelText).then(() => {
                            this.showNotification('Modèle copié dans le presse-papier !');
                        }).catch(err => {
                            console.error('Erreur lors de la copie: ', err);
                        });
                    } else if (action === 'use') {
                        // Chercher le formulaire de réclamation
                        const reclamationForm = document.getElementById('reclamation-form');
                        const messageField = document.getElementById('reclamation-message');
                        
                        if (messageField) {
                            // Insérer le modèle dans le champ de message
                            messageField.value = modelText;
                            messageField.focus();
                            // Déclencher l'événement input pour mettre à jour compteurs, etc.
                            const event = new Event('input', { bubbles: true });
                            messageField.dispatchEvent(event);
                            
                            this.showNotification('Modèle ajouté au formulaire !');
                            
                            // Faire défiler jusqu'au formulaire
                            messageField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        } else {
                            this.showNotification('Formulaire non trouvé.', 'error');
                        }
                    }
                }
            });
        });
        
        this.scrollToBottom();
    }

    formatMessage(text) {
        // Vérifier si le message contient un modèle (div avec style)
        if (text.includes('<div style=\'background:#f9f9f9;')) {
            // Ajouter un bouton pour utiliser le modèle
            const buttonHtml = `<div class="use-model-actions">
                <button class="use-model-btn" data-action="copy">
                    <i class="fas fa-copy"></i> Copier le modèle
                </button>
                <button class="use-model-btn" data-action="use">
                    <i class="fas fa-file-import"></i> Utiliser dans le formulaire
                </button>
            </div>`;
            
            // Ajouter le bouton après le modèle
            text = text.replace('</div><br>', '</div>' + buttonHtml + '<br>');
            
            // Ajouter un style pour le bouton
            if (!document.querySelector('#use-model-styles')) {
                const style = document.createElement('style');
                style.id = 'use-model-styles';
                style.textContent = `
                    .use-model-actions {
                        display: flex;
                        gap: 10px;
                        margin-top: 15px;
                        justify-content: center;
                    }
                    .use-model-btn {
                        background-color: #4CAF50;
                        color: white;
                        border: none;
                        border-radius: 20px;
                        padding: 8px 15px;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.2s;
                        display: inline-flex;
                        align-items: center;
                    }
                    .use-model-btn i {
                        margin-right: 6px;
                    }
                    .use-model-btn:hover {
                        background-color: #43A047;
                        transform: translateY(-2px);
                    }
                    .use-model-btn[data-action="copy"] {
                        background-color: #2196F3;
                    }
                    .use-model-btn[data-action="copy"]:hover {
                        background-color: #1E88E5;
                    }
                `;
                document.head.appendChild(style);
            }
        }
        
        // Convert URLs to links
        const urlRegex = /(https?:\/\/[^\s]+)/g;
        return text
            .replace(urlRegex, url => `<a href="${url}" target="_blank">${url}</a>`)
            .replace(/\n/g, '<br>');
    }

    addTypingIndicator() {
        const typingElement = document.createElement('div');
        typingElement.className = 'embedded-message embedded-bot-message embedded-typing-indicator';
        typingElement.innerHTML = `
            <div class="embedded-message-icon"><i class="fas fa-robot"></i></div>
            <div class="embedded-message-content">
                <div class="embedded-typing-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        `;
        
        this.messagesContainer.appendChild(typingElement);
        this.scrollToBottom();
    }

    removeTypingIndicator() {
        const typingIndicator = this.messagesContainer.querySelector('.embedded-typing-indicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    scrollToBottom() {
        if (this.messagesContainer) {
            this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
            this.isScrolledToBottom = true;
            this.toggleScrollButton(false);
        }
    }
    
    // Utility method to help reclamation form
    suggestForReclamation(reclamationField) {
        if (!reclamationField) return;
        
        const suggestButton = document.createElement('button');
        suggestButton.type = 'button';
        suggestButton.className = 'embedded-suggest-btn';
        suggestButton.innerHTML = '<i class="fas fa-lightbulb"></i> Besoin d\'aide?';
        suggestButton.style.position = 'absolute';
        suggestButton.style.right = '10px';
        suggestButton.style.top = '-30px';
        
        suggestButton.addEventListener('click', () => {
            this.addMessage('user', 'Comment puis-je formuler ma réclamation?');
            this.addTypingIndicator();
            
            setTimeout(() => {
                this.removeTypingIndicator();
                this.addMessage('bot', 
                    'Voici quelques exemples de formulations pour votre réclamation:<br><br>' +
                    '<strong>1.</strong> "Je souhaite signaler un problème avec..."<br>' +
                    '<strong>2.</strong> "J\'ai rencontré une difficulté concernant..."<br>' +
                    '<strong>3.</strong> "Je demande une révision de..."<br><br>' +
                    'Quel type de réclamation souhaitez-vous soumettre?',
                    true
                );
                
                // Scroll both the chatbot and the page to make sure the message is visible
                this.scrollToBottom();
                reclamationField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 1000);
        });
        
        // Find the parent container and append the button
        const container = reclamationField.closest('.input-box');
        if (container) {
            container.style.position = 'relative';
            container.appendChild(suggestButton);
        }
    }

    showModelSelector() {
        // Supprimer tout selecteur existant
        const existingSelector = document.querySelector('.model-selector-container');
        if (existingSelector) {
            existingSelector.remove();
        }
        
        // Créer le sélecteur de modèle
        const selectorContainer = document.createElement('div');
        selectorContainer.className = 'model-selector-container';
        selectorContainer.innerHTML = `
            <div class="model-selector-backdrop"></div>
            <div class="model-selector-modal">
                <div class="model-selector-header">
                    <h4>Choisissez un type de réclamation</h4>
                    <button class="model-selector-close"><i class="fas fa-times"></i></button>
                </div>
                <div class="model-selector-options">
                    <button class="model-option" data-type="produit">
                        <i class="fas fa-box"></i>
                        <span>Produit</span>
                        <small>Produit défectueux, livraison, qualité...</small>
                    </button>
                    <button class="model-option" data-type="service">
                        <i class="fas fa-concierge-bell"></i>
                        <span>Service</span>
                        <small>Prestation, rendez-vous, assistance...</small>
                    </button>
                    <button class="model-option" data-type="facturation">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Facturation</span>
                        <small>Erreurs de facturation, remboursements...</small>
                    </button>
                    <button class="model-option" data-type="personnel">
                        <i class="fas fa-user-tie"></i>
                        <span>Personnel</span>
                        <small>Comportement, service client...</small>
                    </button>
                    <button class="model-option" data-type="général">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Général</span>
                        <small>Modèle standard pour tout type de réclamation</small>
                    </button>
                </div>
            </div>
        `;
        
        // Ajouter des styles CSS pour le sélecteur
        const style = document.createElement('style');
        style.textContent = `
            .model-selector-container {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .model-selector-backdrop {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(3px);
            }
            .model-selector-modal {
                position: relative;
                width: 90%;
                max-width: 500px;
                background-color: white;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
                overflow: hidden;
                animation: modelSelectorFadeIn 0.3s ease-out;
            }
            @keyframes modelSelectorFadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .model-selector-header {
                padding: 15px 20px;
                background: linear-gradient(135deg, #4CAF50, #2E7D32);
                color: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .model-selector-header h4 {
                margin: 0;
                font-size: 18px;
                font-weight: 500;
            }
            .model-selector-close {
                background: none;
                border: none;
                color: white;
                font-size: 18px;
                cursor: pointer;
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: background-color 0.2s;
            }
            .model-selector-close:hover {
                background-color: rgba(255, 255, 255, 0.2);
            }
            .model-selector-options {
                padding: 20px;
                display: grid;
                gap: 15px;
            }
            .model-option {
                display: grid;
                grid-template-columns: 40px 1fr;
                grid-template-rows: auto auto;
                gap: 5px 10px;
                padding: 15px;
                background-color: #f9f9f9;
                border: 2px solid #eee;
                border-radius: 10px;
                text-align: left;
                cursor: pointer;
                transition: all 0.2s;
            }
            .model-option:hover {
                border-color: #4CAF50;
                background-color: #f1f8e9;
                transform: translateY(-2px);
            }
            .model-option i {
                grid-column: 1;
                grid-row: 1 / span 2;
                font-size: 20px;
                color: #4CAF50;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .model-option span {
                grid-column: 2;
                grid-row: 1;
                font-weight: 600;
                font-size: 16px;
                color: #333;
            }
            .model-option small {
                grid-column: 2;
                grid-row: 2;
                font-size: 13px;
                color: #666;
            }
        `;
        document.head.appendChild(style);
        
        // Ajouter le sélecteur au document
        document.body.appendChild(selectorContainer);
        
        // Ajouter les événements
        const closeBtn = selectorContainer.querySelector('.model-selector-close');
        const backdrop = selectorContainer.querySelector('.model-selector-backdrop');
        const optionsButtons = selectorContainer.querySelectorAll('.model-option');
        
        // Fermer le sélecteur
        closeBtn.addEventListener('click', () => selectorContainer.remove());
        backdrop.addEventListener('click', () => selectorContainer.remove());
        
        // Gérer les clics sur les options
        optionsButtons.forEach(button => {
            button.addEventListener('click', () => {
                const type = button.getAttribute('data-type');
                this.sendMessage(`Générer un modèle de réclamation ${type}`);
                selectorContainer.remove();
            });
        });
    }

    showNotification(message, type = 'success') {
        // Supprimer toute notification existante
        const existingNotification = document.querySelector('.chatbot-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Créer la notification
        const notification = document.createElement('div');
        notification.className = `chatbot-notification chatbot-notification-${type}`;
        notification.innerHTML = `
            <div class="chatbot-notification-icon">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
            </div>
            <div class="chatbot-notification-message">${message}</div>
        `;
        
        // Ajouter un style pour la notification s'il n'existe pas déjà
        if (!document.querySelector('#chatbot-notification-styles')) {
            const style = document.createElement('style');
            style.id = 'chatbot-notification-styles';
            style.textContent = `
                .chatbot-notification {
                    position: fixed;
                    bottom: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: white;
                    padding: 12px 20px;
                    border-radius: 30px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    z-index: 9999;
                    animation: notification-appear 0.3s ease-out forwards, notification-disappear 0.3s ease-in forwards 3s;
                }
                @keyframes notification-appear {
                    from { transform: translate(-50%, 100%); opacity: 0; }
                    to { transform: translate(-50%, 0); opacity: 1; }
                }
                @keyframes notification-disappear {
                    from { transform: translate(-50%, 0); opacity: 1; }
                    to { transform: translate(-50%, 100%); opacity: 0; }
                }
                .chatbot-notification-success .chatbot-notification-icon {
                    color: #4CAF50;
                }
                .chatbot-notification-error .chatbot-notification-icon {
                    color: #F44336;
                }
                .chatbot-notification-icon i {
                    font-size: 18px;
                }
                .chatbot-notification-message {
                    font-size: 15px;
                    font-weight: 500;
                }
            `;
            document.head.appendChild(style);
        }
        
        // Ajouter la notification au document
        document.body.appendChild(notification);
        
        // Supprimer la notification après 3.5 secondes
        setTimeout(() => {
            notification.remove();
        }, 3500);
    }
}

// Initialize chatbot when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const chatbot = new EmbeddedChatbot();
    
    // Connect to reclamation form if it exists
    const reclamationMessageField = document.getElementById('reclamation-message');
    if (reclamationMessageField && chatbot) {
        chatbot.suggestForReclamation(reclamationMessageField);
    }
    
    // Expose chatbot to global scope for possible interactions
    window.embeddedChatbot = chatbot;
}); 