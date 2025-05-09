/**
 * AI Chatbot for Sportify
 * Handles communication with the Gemini AI service
 */
class AIChatbot {
    constructor() {
        this.chatWindow = null;
        this.chatMessages = null;
        this.inputField = null;
        this.sendButton = null;
        this.toggleButton = null;
        this.isOpen = false;
        this.apiEndpoint = '/reclamation/ai-chat';
        this.init();
    }

    init() {
        // Create chatbot UI elements
        this.createChatbotUI();
        
        // Add event listeners
        this.addEventListeners();
        
        // Add welcome message
        this.addMessage('bot', 'Bonjour ! Je suis l\'assistant virtuel de Sportify. Comment puis-je vous aider avec vos réclamations ?');
        
        // Dispatch initialization event
        this.dispatchInitEvent();
    }
    
    dispatchInitEvent() {
        // Create and dispatch a custom event to notify that the chatbot is initialized
        const event = new CustomEvent('aichatbot:initialized', {
            detail: {
                chatbot: this
            },
            bubbles: true
        });
        document.dispatchEvent(event);
    }

    createChatbotUI() {
        // Create the main chat container
        const chatbotContainer = document.createElement('div');
        chatbotContainer.className = 'ai-chatbot-container';
        chatbotContainer.innerHTML = `
            <div class="ai-chatbot-toggle">
                <button type="button" id="ai-chatbot-toggle">
                    <i class="fas fa-comments"></i>
                </button>
            </div>
            <div class="ai-chatbot-window" style="display: none;">
                <div class="ai-chatbot-header">
                    <div class="ai-chatbot-title">
                        <i class="fas fa-robot"></i>
                        Assistant Sportify
                    </div>
                    <button type="button" class="ai-chatbot-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="ai-chatbot-messages"></div>
                <div class="ai-chatbot-input">
                    <textarea placeholder="Posez votre question ici..." rows="1"></textarea>
                    <button type="button" class="ai-chatbot-send">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        `;
        
        // Append to body
        document.body.appendChild(chatbotContainer);
        
        // Store references to elements
        this.chatWindow = document.querySelector('.ai-chatbot-window');
        this.chatMessages = document.querySelector('.ai-chatbot-messages');
        this.inputField = document.querySelector('.ai-chatbot-input textarea');
        this.sendButton = document.querySelector('.ai-chatbot-send');
        this.toggleButton = document.querySelector('#ai-chatbot-toggle');
        this.closeButton = document.querySelector('.ai-chatbot-close');
    }

    addEventListeners() {
        // Toggle chatbot visibility
        this.toggleButton.addEventListener('click', () => this.toggleChatbot());
        this.closeButton.addEventListener('click', () => this.toggleChatbot(false));
        
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
            this.inputField.style.height = (this.inputField.scrollHeight) + 'px';
        });
    }

    toggleChatbot(forceState = null) {
        this.isOpen = forceState !== null ? forceState : !this.isOpen;
        this.chatWindow.style.display = this.isOpen ? 'flex' : 'none';
        
        if (this.isOpen) {
            this.inputField.focus();
        }
    }

    sendMessage() {
        const message = this.inputField.value.trim();
        if (!message) return;
        
        // Add user message to chat
        this.addMessage('user', message);
        
        // Clear input field
        this.inputField.value = '';
        this.inputField.style.height = 'auto';
        
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
            
            // Add AI response
            if (data.success) {
                this.addMessage('bot', data.response);
            } else {
                this.addMessage('bot', 'Désolé, je n\'ai pas pu traiter votre demande. Veuillez réessayer plus tard.');
            }
        } catch (error) {
            console.error('AI Chatbot Error:', error);
            this.removeTypingIndicator();
            this.addMessage('bot', 'Désolé, une erreur s\'est produite. Veuillez réessayer plus tard.');
        }
    }

    addMessage(sender, text) {
        const messageElement = document.createElement('div');
        messageElement.className = `ai-chatbot-message ${sender}-message`;
        
        let icon = '';
        if (sender === 'bot') {
            icon = '<div class="message-icon"><i class="fas fa-robot"></i></div>';
        } else if (sender === 'user') {
            icon = '<div class="message-icon"><i class="fas fa-user"></i></div>';
        }
        
        messageElement.innerHTML = `
            ${icon}
            <div class="message-content">${this.formatMessage(text)}</div>
        `;
        
        this.chatMessages.appendChild(messageElement);
        this.scrollToBottom();
    }

    formatMessage(text) {
        // Convert URLs to links
        const urlRegex = /(https?:\/\/[^\s]+)/g;
        return text
            .replace(urlRegex, url => `<a href="${url}" target="_blank">${url}</a>`)
            .replace(/\n/g, '<br>');
    }

    addTypingIndicator() {
        const typingElement = document.createElement('div');
        typingElement.className = 'ai-chatbot-message bot-message typing-indicator';
        typingElement.innerHTML = `
            <div class="message-icon"><i class="fas fa-robot"></i></div>
            <div class="message-content">
                <div class="typing-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        `;
        
        this.chatMessages.appendChild(typingElement);
        this.scrollToBottom();
    }

    removeTypingIndicator() {
        const typingIndicator = document.querySelector('.typing-indicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    scrollToBottom() {
        this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
    }
}

// Initialize the chatbot when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    new AIChatbot();
}); 