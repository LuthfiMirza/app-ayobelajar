// Debug function for chatbot
function debugChatbot() {
    console.log('=== Chatbot Debug Info ===');
    
    // Check CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    console.log('CSRF Token:', csrfToken ? 'Found' : 'Not found');
    
    // Check API endpoint
    console.log('API Endpoint:', '/api/chat/send');
    
    // Test fetch availability
    console.log('Fetch available:', typeof fetch !== 'undefined');
    
    // Test basic connectivity
    testConnectivity();
}

async function testConnectivity() {
    try {
        console.log('Testing basic connectivity...');
        const response = await fetch('/api/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
            },
            body: JSON.stringify({
                messages: [
                    {
                        role: 'user',
                        content: 'Test message'
                    }
                ],
                temperature: 0.7,
                max_tokens: 100
            })
        });
        
        console.log('Response status:', response.status);
        console.log('Response ok:', response.ok);
        console.log('Response headers:', [...response.headers.entries()]);
        
        const text = await response.text();
        console.log('Response text:', text);
        
        try {
            const json = JSON.parse(text);
            console.log('Response JSON:', json);
        } catch (e) {
            console.log('Response is not valid JSON');
        }
        
    } catch (error) {
        console.error('Connectivity test failed:', error);
        console.error('Error type:', error.constructor.name);
        console.error('Error message:', error.message);
    }
}

// Auto-run debug when script loads
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', debugChatbot);
} else {
    debugChatbot();
}