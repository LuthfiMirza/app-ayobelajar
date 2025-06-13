<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
.translator-container {
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    padding: 1.5rem;
    margin: 2rem 0;
}

.language-selector {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    align-items: center;
}

.language-box {
    flex: 1;
    background: var(--page-bg);
    padding: 1rem;
    border-radius: var(--radius-md);
    border: 2px solid var(--border-ui);
}

.language-box select {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid var(--border-soft);
    border-radius: var(--radius-sm);
    background: var(--card-bg);
    color: var(--text-main);
}

.swap-button {
    background: var(--accent-main-soft);
    color: var(--accent-main);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.swap-button:hover {
    background: var(--accent-main);
    color: var(--text-on-dark-accent);
    transform: scale(1.1);
}

.text-area-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

@media (max-width: 768px) {
    .text-area-wrapper {
        grid-template-columns: 1fr;
    }
}

.text-box {
    background: var(--page-bg);
    border-radius: var(--radius-md);
    padding: 1rem;
}

.text-box h3 {
    color: var(--text-main);
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.text-box textarea {
    width: 100%;
    min-height: 200px;
    padding: 1rem;
    border: 2px solid var(--border-ui);
    border-radius: var(--radius-md);
    background: var(--card-bg);
    color: var(--text-main);
    font-family: var(--font-primary);
    resize: vertical;
    transition: border-color 0.3s ease;
}

.text-box textarea:focus {
    outline: none;
    border-color: var(--accent-main);
}

.translate-button {
    background: var(--accent-main);
    color: var(--text-on-dark-accent);
    border: none;
    padding: 1rem 2rem;
    border-radius: var(--radius-lg);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0 auto;
}

.translate-button:hover {
    background: var(--accent-main-light);
    transform: translateY(-2px);
}

.translate-button i {
    font-size: 1.2rem;
}

.api-status {
    background: var(--page-bg);
    border-radius: var(--radius-md);
    padding: 1rem;
    margin-bottom: 1.5rem;
    border: 1px solid var(--border-soft);
}

.status-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.status-item:last-child {
    margin-bottom: 0;
}

.status-label {
    color: var(--text-main);
    font-weight: 500;
}

.status-indicator {
    font-weight: 600;
}

.language-box label {
    display: block;
    color: var(--text-main);
    font-weight: 500;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.translation-info {
    background: var(--page-bg);
    border-radius: var(--radius-md);
    padding: 1rem;
    margin-bottom: 1.5rem;
    border: 1px solid var(--border-soft);
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.info-item:last-child {
    margin-bottom: 0;
}

.info-label {
    color: var(--text-main);
    font-weight: 500;
}

.info-value {
    color: var(--accent-main);
    font-weight: 600;
}

.translate-button:disabled {
    cursor: not-allowed;
    opacity: 0.7 !important;
}

.translate-button:disabled:hover {
    transform: none;
}

@media (max-width: 768px) {
    .language-selector {
        flex-direction: column;
        gap: 1rem;
    }
    
    .swap-button {
        align-self: center;
        transform: rotate(90deg);
    }
    
    .status-item,
    .info-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
}
</style>

<div class="translator-container">
    @guest
    <!-- Usage Counter for Guests -->
    <div id="guestUsageWarning" style="
        background: linear-gradient(135deg, #fef3c7 0%, #fbbf24 100%);
        border: 2px solid #f59e0b;
        border-radius: 16px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        animation: pulse 2s infinite;
        box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
    ">
        <div style="
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: #92400e;
            font-weight: 600;
        ">
            <i class="fas fa-exclamation-triangle" style="color: #f59e0b;"></i>
            <span id="usageWarningText">⚠️ HANYA 1x PENGGUNAAN GRATIS - Berlaku untuk SEMUA bahasa!</span>
        </div>
        <p style="
            margin: 0.5rem 0 0 0;
            font-size: 0.9rem;
            color: #92400e;
            font-weight: 500;
        ">
            Termasuk bahasa daerah! Daftar sekarang untuk akses unlimited!
        </p>
        <div style="
            margin-top: 1rem;
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            flex-wrap: wrap;
        ">
            <a href="/register" style="
                background: #f59e0b;
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                font-size: 0.9rem;
                transition: all 0.3s ease;
            " onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e0b'">
                🚀 Daftar Gratis
            </a>
            <a href="/login" style="
                background: transparent;
                color: #92400e;
                padding: 0.5rem 1rem;
                border: 2px solid #f59e0b;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                font-size: 0.9rem;
                transition: all 0.3s ease;
            " onmouseover="this.style.background='#f59e0b'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='#92400e'">
                📝 Login
            </a>
        </div>
    </div>
    
    <style>
        @keyframes pulse {
            0%, 100% { 
                transform: scale(1); 
                box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
            }
            50% { 
                transform: scale(1.02); 
                box-shadow: 0 6px 25px rgba(245, 158, 11, 0.5);
            }
        }
    </style>
    @endguest

    <!-- API Status Indicator -->
    <div class="api-status" id="apiStatus" style="display: none;">
        <div class="status-item">
            <span class="status-label">Azure Translator:</span>
            <span class="status-indicator" id="azureStatus">⚪ Unknown</span>
        </div>
        <div class="status-item">
            <span class="status-label">MyMemory API:</span>
            <span class="status-indicator" id="myMemoryStatus">⚪ Unknown</span>
        </div>
        <div class="status-item">
            <span class="status-label">Local Dictionary:</span>
            <span class="status-indicator" id="localStatus">🟢 Ready</span>
        </div>
    </div>

    <div class="language-selector">
        <div class="language-box">
            <label for="sourceLanguage">Dari Bahasa:</label>
            <select id="sourceLanguage">
                <option value="id">🇮🇩 Bahasa Indonesia</option>
                <option value="en">🇺🇸 English</option>
                <option value="ar">🇸🇦 العربية (Arabic)</option>
                <option value="de">🇩🇪 Deutsch (German)</option>
                <option value="fr">🇫🇷 Français (French)</option>
                <option value="es">🇪🇸 Español (Spanish)</option>
                <option value="pt">🇵🇹 Português (Portuguese)</option>
                <option value="ru">🇷🇺 Русский (Russian)</option>
                <option value="ja">🇯🇵 日本語 (Japanese)</option>
                <option value="ko">🇰🇷 한국어 (Korean)</option>
                <option value="zh">🇨🇳 中文 (Chinese)</option>
                <option value="th">🇹🇭 ไทย (Thai)</option>
                <option value="vi">🇻🇳 Tiếng Việt (Vietnamese)</option>
                <option value="ms">🇲🇾 Bahasa Melayu (Malay)</option>
                <option value="tl">🇵🇭 Filipino</option>
                <optgroup label="Bahasa Daerah Indonesia">
                    <option value="jv">🏛️ Bahasa Jawa</option>
                    <option value="su">🏛️ Bahasa Sunda</option>
                    <option value="mad">🏛️ Bahasa Madura</option>
                    <option value="min">🏛️ Bahasa Minang</option>
                    <option value="bug">🏛️ Bahasa Bugis</option>
                </optgroup>
            </select>
        </div>
        
        <button class="swap-button" id="swapLanguages" title="Tukar Bahasa">
            <i class="fas fa-exchange-alt"></i>
        </button>
        
        <div class="language-box">
            <label for="targetLanguage">Ke Bahasa:</label>
            <select id="targetLanguage">
                <option value="en">🇺🇸 English</option>
                <option value="id">🇮🇩 Bahasa Indonesia</option>
                <option value="ar">🇸🇦 العربية (Arabic)</option>
                <option value="de">🇩🇪 Deutsch (German)</option>
                <option value="fr">🇫🇷 Français (French)</option>
                <option value="es">🇪🇸 Español (Spanish)</option>
                <option value="pt">🇵🇹 Português (Portuguese)</option>
                <option value="ru">🇷🇺 Русский (Russian)</option>
                <option value="ja">🇯🇵 日本語 (Japanese)</option>
                <option value="ko">🇰🇷 한국어 (Korean)</option>
                <option value="zh">🇨🇳 中文 (Chinese)</option>
                <option value="th">🇹🇭 ไทย (Thai)</option>
                <option value="vi">🇻🇳 Tiếng Việt (Vietnamese)</option>
                <option value="ms">🇲🇾 Bahasa Melayu (Malay)</option>
                <option value="tl">🇵🇭 Filipino</option>
                <optgroup label="Bahasa Daerah Indonesia">
                    <option value="jv">🏛️ Bahasa Jawa</option>
                    <option value="su">🏛️ Bahasa Sunda</option>
                    <option value="mad">🏛️ Bahasa Madura</option>
                    <option value="min">🏛️ Bahasa Minang</option>
                    <option value="bug">🏛️ Bahasa Bugis</option>
                </optgroup>
            </select>
        </div>
    </div>
    
    <div class="text-area-wrapper">
        <div class="text-box">
            <h3>Teks Asli</h3>
            <textarea 
                id="sourceText" 
                placeholder="Ketik atau tempel teks yang ingin diterjemahkan di sini..."
            ></textarea>
        </div>
        
        <div class="text-box">
            <h3>Hasil Terjemahan</h3>
            <textarea 
                id="translatedText" 
                placeholder="Hasil terjemahan akan muncul di sini..."
                readonly
            ></textarea>
        </div>
    </div>
    
    <div class="translation-info" id="translationInfo" style="display: none;">
        <div class="info-item">
            <span class="info-label">API yang digunakan:</span>
            <span class="info-value" id="apiUsed">-</span>
        </div>
        <div class="info-item">
            <span class="info-label">Waktu terjemahan:</span>
            <span class="info-value" id="translationTime">-</span>
        </div>
    </div>

    <button class="translate-button" id="translateButton">
        <i class="fas fa-language"></i>
        <span id="buttonText">Terjemahkan</span>
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sourceLanguage = document.getElementById('sourceLanguage');
    const targetLanguage = document.getElementById('targetLanguage');
    const sourceText = document.getElementById('sourceText');
    const translatedText = document.getElementById('translatedText');
    const translateButton = document.getElementById('translateButton');
    const swapButton = document.getElementById('swapLanguages');
    const buttonText = document.getElementById('buttonText');
    const translationInfo = document.getElementById('translationInfo');
    const apiUsed = document.getElementById('apiUsed');
    const translationTime = document.getElementById('translationTime');

    // Check API health on page load
    checkApiHealth();

    // Swap languages functionality
    swapButton.addEventListener('click', function() {
        const tempLang = sourceLanguage.value;
        sourceLanguage.value = targetLanguage.value;
        targetLanguage.value = tempLang;

        const tempText = sourceText.value;
        sourceText.value = translatedText.value;
        translatedText.value = tempText;
    });

    // Translation functionality
    translateButton.addEventListener('click', function() {
        const text = sourceText.value.trim();
        const fromLang = sourceLanguage.value;
        const toLang = targetLanguage.value;

        // Validation
        if (!text) {
            alert('Silakan masukkan teks yang ingin diterjemahkan.');
            return;
        }

        if (fromLang === toLang) {
            alert('Bahasa sumber dan target tidak boleh sama.');
            return;
        }

        // Check if user is guest and trying to use regional languages
        @guest
        const regionalLanguages = ['jv', 'su', 'mad', 'min', 'bug'];
        const isUsingRegionalLang = regionalLanguages.includes(fromLang) || regionalLanguages.includes(toLang);
        
        if (isUsingRegionalLang) {
            // Show special warning for regional languages
            showRegionalLanguageWarning(fromLang, toLang);
            return;
        }
        @endguest

        // Start translation
        performTranslation(text, fromLang, toLang);
    });

    // Auto-translate on Enter key
    sourceText.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && e.ctrlKey) {
            translateButton.click();
        }
    });

    async function performTranslation(text, fromLang, toLang) {
        const startTime = Date.now();
        
        // Update UI to show loading state
        setLoadingState(true);
        
        try {
            // Get CSRF token from meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            // Prepare headers
            const headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            };

            // Add CSRF token if available
            if (csrfToken) {
                headers['X-CSRF-TOKEN'] = csrfToken;
            }

            const response = await fetch('/api/translate-alt', {
                method: 'POST',
                headers: headers,
                body: JSON.stringify({
                    text: text,
                    from: fromLang,
                    to: toLang
                }),
                credentials: 'same-origin' // Include cookies for session
            });

            const data = await response.json();
            
            const endTime = Date.now();
            const duration = ((endTime - startTime) / 1000).toFixed(2);

            if (response.status === 419) {
                throw new Error('CSRF token mismatch. Silakan refresh halaman dan coba lagi.');
            }

            if (data.success) {
                // Display translation result
                translatedText.value = data.translated_text;
                
                // Show translation info
                apiUsed.textContent = data.api_used;
                translationTime.textContent = duration + ' detik';
                translationInfo.style.display = 'block';
                
                // Show success message
                showNotification('Terjemahan berhasil!', 'success');
            } else {
                // Check if this is a usage limit error
                if (data.requires_registration) {
                    showRegistrationPrompt('translator');
                    return;
                }
                throw new Error(data.error || data.details || 'Translation failed');
            }
        } catch (error) {
            console.error('Translation error:', error);
            translatedText.value = '';
            
            // More detailed error message
            let errorMessage = 'Terjemahan gagal: ';
            if (error.message.includes('JSON')) {
                errorMessage += 'Server configuration error. Please check if the API endpoint is working correctly.';
            } else {
                errorMessage += error.message;
            }
            
            showNotification(errorMessage, 'error');
        } finally {
            setLoadingState(false);
        }
    }

    function setLoadingState(isLoading) {
        if (isLoading) {
            translateButton.disabled = true;
            buttonText.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menerjemahkan...';
            translateButton.style.opacity = '0.7';
        } else {
            translateButton.disabled = false;
            buttonText.innerHTML = '<i class="fas fa-language"></i> Terjemahkan';
            translateButton.style.opacity = '1';
        }
    }

    async function checkApiHealth() {
        try {
            const response = await fetch('/api/translate-alt/health');
            const data = await response.json();
            
            if (data.success) {
                updateApiStatus('azure', data.apis.azure);
                updateApiStatus('myMemory', data.apis.mymemory);
                document.getElementById('apiStatus').style.display = 'block';
            }
        } catch (error) {
            console.error('Health check failed:', error);
        }
    }

    function updateApiStatus(apiName, status) {
        const statusElement = document.getElementById(apiName + 'Status');
        let statusText = '';
        let statusColor = '';

        if (!status.configured) {
            statusText = '⚪ Not Configured';
            statusColor = '#999';
        } else if (status.status === 'working') {
            statusText = '🟢 Working';
            statusColor = '#4CAF50';
        } else if (status.status === 'error') {
            statusText = '🔴 Error';
            statusColor = '#f44336';
        } else {
            statusText = '⚪ Unknown';
            statusColor = '#999';
        }

        statusElement.textContent = statusText;
        statusElement.style.color = statusColor;
    }

    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '12px 20px',
            borderRadius: '8px',
            color: 'white',
            fontWeight: '500',
            zIndex: '1000',
            opacity: '0',
            transform: 'translateY(-20px)',
            transition: 'all 0.3s ease'
        });

        if (type === 'success') {
            notification.style.backgroundColor = '#4CAF50';
        } else if (type === 'error') {
            notification.style.backgroundColor = '#f44336';
        }

        // Add to page
        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateY(0)';
        }, 100);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Function to show registration prompt
    function showRegistrationPrompt(service) {
        const serviceName = service === 'chatbot' ? 'ChatBot GATOT AI' : 'Translator';
        
        // Create modal overlay
        const modal = document.createElement('div');
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            backdrop-filter: blur(5px);
        `;

        // Create modal content
        const modalContent = document.createElement('div');
        modalContent.style.cssText = `
            background: white;
            padding: 2rem;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.3s ease;
            position: relative;
        `;

        modalContent.innerHTML = `
            <div style="margin-bottom: 1.5rem;">
                <i class="fas fa-user-plus" style="font-size: 3rem; color: #6366f1; margin-bottom: 1rem;"></i>
                <h3 style="color: #1f2937; font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem;">
                    Batas Penggunaan Tercapai
                </h3>
                <p style="color: #6b7280; line-height: 1.6;">
                    Anda telah mencapai batas penggunaan ${serviceName} untuk pengguna yang belum login. 
                    Daftar sekarang untuk menggunakan semua fitur tanpa batas!
                </p>
            </div>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="/register" style="
                    background: linear-gradient(135deg, #6366f1, #8b5cf6);
                    color: white;
                    padding: 0.75rem 1.5rem;
                    border-radius: 12px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                " onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <i class="fas fa-user-plus"></i>
                    Daftar Gratis
                </a>
                
                <a href="/login" style="
                    background: transparent;
                    color: #6366f1;
                    padding: 0.75rem 1.5rem;
                    border: 2px solid #6366f1;
                    border-radius: 12px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                " onmouseover="this.style.background='#6366f1'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='#6366f1'">
                    <i class="fas fa-sign-in-alt"></i>
                    Sudah Punya Akun?
                </a>
            </div>
            
            <button onclick="this.closest('.registration-modal').remove()" style="
                position: absolute;
                top: 1rem;
                right: 1rem;
                background: none;
                border: none;
                font-size: 1.5rem;
                color: #9ca3af;
                cursor: pointer;
                width: 2rem;
                height: 2rem;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: all 0.3s ease;
            " onmouseover="this.style.background='#f3f4f6'; this.style.color='#374151'" onmouseout="this.style.background='none'; this.style.color='#9ca3af'">
                ×
            </button>
        `;

        modal.className = 'registration-modal';
        modal.appendChild(modalContent);
        document.body.appendChild(modal);

        // Add animation styles if not already added
        if (!document.querySelector('#registration-modal-styles')) {
            const style = document.createElement('style');
            style.id = 'registration-modal-styles';
            style.textContent = `
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            `;
            document.head.appendChild(style);
        }

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.remove();
            }
        });
    }

    // Special warning for regional languages
    function showRegionalLanguageWarning(fromLang, toLang) {
        const languageNames = {
            'jv': 'Bahasa Jawa',
            'su': 'Bahasa Sunda', 
            'mad': 'Bahasa Madura',
            'min': 'Bahasa Minang',
            'bug': 'Bahasa Bugis'
        };
        
        const fromName = languageNames[fromLang] || fromLang;
        const toName = languageNames[toLang] || toLang;
        
        // Create modal overlay
        const modal = document.createElement('div');
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            backdrop-filter: blur(10px);
        `;

        // Create modal content
        const modalContent = document.createElement('div');
        modalContent.style.cssText = `
            background: linear-gradient(135deg, #fef3c7 0%, #fbbf24 100%);
            padding: 2.5rem;
            border-radius: 20px;
            max-width: 600px;
            width: 90%;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            animation: bounceIn 0.5s ease;
            position: relative;
            border: 3px solid #f59e0b;
        `;

        modalContent.innerHTML = `
            <div style="margin-bottom: 2rem;">
                <i class="fas fa-ban" style="font-size: 4rem; color: #dc2626; margin-bottom: 1rem; animation: shake 0.5s infinite;"></i>
                <h3 style="color: #dc2626; font-size: 1.8rem; font-weight: 700; margin-bottom: 1rem;">
                    🚫 AKSES DITOLAK!
                </h3>
                <p style="color: #92400e; line-height: 1.6; font-size: 1.1rem; font-weight: 600;">
                    Anda mencoba menggunakan <strong>${fromName}</strong> → <strong>${toName}</strong>
                </p>
                <p style="color: #dc2626; line-height: 1.6; font-size: 1rem; margin-top: 1rem;">
                    <strong>BAHASA DAERAH JUGA TERBATAS!</strong><br>
                    Tidak ada cara untuk mengakali sistem ini. Semua fitur translator dibatasi 1x untuk guest.
                </p>
            </div>
            
            <div style="
                background: rgba(220, 38, 38, 0.1);
                padding: 1rem;
                border-radius: 12px;
                margin-bottom: 2rem;
                border: 2px dashed #dc2626;
            ">
                <p style="color: #dc2626; font-weight: 600; margin: 0;">
                    💡 Ingin akses unlimited ke semua bahasa?<br>
                    <span style="font-size: 1.2rem;">Daftar sekarang - GRATIS!</span>
                </p>
            </div>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="/register" style="
                    background: linear-gradient(135deg, #dc2626, #b91c1c);
                    color: white;
                    padding: 1rem 2rem;
                    border-radius: 12px;
                    text-decoration: none;
                    font-weight: 700;
                    font-size: 1.1rem;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                    box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
                " onmouseover="this.style.transform='translateY(-3px) scale(1.05)'" onmouseout="this.style.transform='translateY(0) scale(1)'">
                    <i class="fas fa-rocket"></i>
                    DAFTAR SEKARANG!
                </a>
                
                <a href="/login" style="
                    background: transparent;
                    color: #dc2626;
                    padding: 1rem 2rem;
                    border: 3px solid #dc2626;
                    border-radius: 12px;
                    text-decoration: none;
                    font-weight: 700;
                    font-size: 1.1rem;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                " onmouseover="this.style.background='#dc2626'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='#dc2626'">
                    <i class="fas fa-sign-in-alt"></i>
                    Sudah Punya Akun
                </a>
            </div>
            
            <button onclick="this.closest('.regional-warning-modal').remove()" style="
                position: absolute;
                top: 1rem;
                right: 1rem;
                background: #dc2626;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
                width: 3rem;
                height: 3rem;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: all 0.3s ease;
                font-weight: bold;
            " onmouseover="this.style.background='#b91c1c'; this.style.transform='scale(1.1)'" onmouseout="this.style.background='#dc2626'; this.style.transform='scale(1)'">
                ×
            </button>
        `;

        modal.className = 'regional-warning-modal';
        modal.appendChild(modalContent);
        document.body.appendChild(modal);

        // Add animation styles if not already added
        if (!document.querySelector('#regional-warning-styles')) {
            const style = document.createElement('style');
            style.id = 'regional-warning-styles';
            style.textContent = `
                @keyframes bounceIn {
                    0% {
                        opacity: 0;
                        transform: scale(0.3) translateY(-100px);
                    }
                    50% {
                        opacity: 1;
                        transform: scale(1.05) translateY(0);
                    }
                    70% {
                        transform: scale(0.9);
                    }
                    100% {
                        transform: scale(1);
                    }
                }
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    25% { transform: translateX(-5px); }
                    75% { transform: translateX(5px); }
                }
            `;
            document.head.appendChild(style);
        }

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.remove();
            }
        });
        
        // Auto close after 10 seconds
        setTimeout(() => {
            if (document.body.contains(modal)) {
                modal.remove();
            }
        }, 10000);
    }
});
</script>