<script src="https://cdn.tailwindcss.com"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/default.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Main Container */
    main {
        padding: 2rem;
        min-height: calc(100vh - 80px);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .chat-container-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 900px;
        height: 85vh;
        min-height: 600px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
    }

    .chat-container-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
    }

    /* Chat Header */
    .chat-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        padding: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
        overflow: hidden;
    }

    .chat-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="grain" width="100" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1.5" fill="white" opacity="0.1"/><circle cx="30" cy="5" r="1" fill="white" opacity="0.05"/><circle cx="50" cy="15" r="1.2" fill="white" opacity="0.08"/><circle cx="70" cy="8" r="0.8" fill="white" opacity="0.06"/><circle cx="90" cy="12" r="1.3" fill="white" opacity="0.07"/></pattern></defs><rect width="100" height="20" fill="url(%23grain)"/></svg>');
        opacity: 0.6;
    }

    .chat-header h3 {
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .chat-header i {
        font-size: 2.5rem;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.75rem;
        border-radius: 16px;
        backdrop-filter: blur(10px);
        position: relative;
        z-index: 1;
    }

    /* Chat Container */
    .chat-container {
        flex: 1;
        padding: 2rem;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        scroll-behavior: smooth;
        position: relative;
    }

    .chat-container::-webkit-scrollbar {
        width: 6px;
    }

    .chat-container::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 10px;
    }

    .chat-container::-webkit-scrollbar-track {
        background: rgba(226, 232, 240, 0.3);
        border-radius: 10px;
    }

    /* Welcome Message */
    .welcome-message {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border: 2px dashed #cbd5e1;
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        margin: 1rem 0;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease;
    }

    .welcome-message::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    .welcome-message h4 {
        color: #4a5568;
        margin-bottom: 1.5rem;
        font-size: 1.3rem;
        font-weight: 600;
        position: relative;
        z-index: 1;
    }

    .welcome-message ul {
        list-style: none;
        color: #6b7280;
        line-height: 2;
        position: relative;
        z-index: 1;
    }

    .welcome-message li {
        padding: 0.5rem 0;
        position: relative;
        padding-left: 1.5rem;
    }

    .welcome-message li::before {
        content: '✨';
        position: absolute;
        left: 0;
        top: 0.5rem;
    }

    /* Chat Bubbles */
    .chat-bubble {
        max-width: 75%;
        padding: 1.25rem 1.75rem;
        border-radius: 24px;
        font-size: 0.95rem;
        line-height: 1.6;
        word-wrap: break-word;
        animation: fadeInUp 0.4s ease;
        position: relative;
        backdrop-filter: blur(10px);
    }

    .user-bubble {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        margin-left: auto;
        border-bottom-right-radius: 8px;
        box-shadow: 0 8px 30px rgba(99, 102, 241, 0.4);
        position: relative;
    }

    .user-bubble::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: -8px;
        width: 0;
        height: 0;
        border-left: 8px solid #8b5cf6;
        border-bottom: 8px solid transparent;
    }

    .ai-bubble {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        color: #2d3748;
        border-bottom-left-radius: 8px;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        position: relative;
    }

    .ai-bubble::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: -8px;
        width: 0;
        height: 0;
        border-right: 8px solid #f8fafc;
        border-bottom: 8px solid transparent;
    }

    /* Input Container */
    .input-container {
        padding: 2rem;
        background: linear-gradient(135deg, rgba(247, 250, 252, 0.9), rgba(226, 232, 240, 0.5));
        border-top: 1px solid rgba(226, 232, 240, 0.5);
        backdrop-filter: blur(20px);
    }

    .input-area {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: white;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(226, 232, 240, 0.8);
        transition: all 0.3s ease;
    }

    .input-area:focus-within {
        box-shadow: 0 8px 40px rgba(99, 102, 241, 0.2);
        border-color: #6366f1;
        transform: translateY(-2px);
    }

    #userInput {
        flex: 1;
        border: none;
        background: transparent;
        padding: 0.75rem;
        outline: none;
        font-family: inherit;
        font-size: 0.95rem;
        color: #2d3748;
        resize: none;
    }

    #userInput::placeholder {
        color: #a0aec0;
    }

    /* Buttons */
    .menu-container {
        position: relative;
        display: flex;
        align-items: center;
    }

    .main-button {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        color: white;
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
        transition: all 0.3s ease;
    }

    .main-button:hover {
        transform: rotate(45deg) scale(1.05);
        box-shadow: 0 6px 25px rgba(99, 102, 241, 0.5);
    }

    .send-btn {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        border: none;
        padding: 0.75rem;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        cursor: pointer;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
    }

    .send-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(99, 102, 241, 0.5);
    }

    .send-btn:active {
        transform: scale(0.95);
    }

    /* Menu Items */
    .menu-items {
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translateY(-50%);
        margin-left: 1rem;
        width: max-content;
        display: none;
        flex-direction: column;
        gap: 0.5rem;
        background: rgba(45, 45, 45, 0.95);
        backdrop-filter: blur(20px);
        padding: 8px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .menu-items.show {
        display: flex;
        animation: fadeInRight 0.3s ease;
    }

    .menu-item {
        background: transparent;
        border: none;
        color: #E8EAED;
        font-family: 'Google Sans', 'Roboto', sans-serif;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        cursor: pointer;
        padding: 8px 12px;
        transition: all 0.2s ease;
        border-radius: 6px;
        white-space: nowrap;
    }

    .menu-item:hover {
        background: rgba(99, 102, 241, 0.2);
        transform: translateX(-4px);
    }

    .menu-item i {
        width: 16px;
        font-size: 16px;
    }

    /* Loading Indicator */
    .loading-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        color: #6b7280;
        background: rgba(247, 250, 252, 0.8);
        border-radius: 20px;
        margin: 1rem 0;
        backdrop-filter: blur(10px);
    }

    .loading-dot {
        width: 8px;
        height: 8px;
        margin: 0 4px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 50%;
        animation: bounce 1.4s infinite ease-in-out both;
    }

    .loading-dot:nth-child(1) {
        animation-delay: -0.32s;
    }

    .loading-dot:nth-child(2) {
        animation-delay: -0.16s;
    }

    .loading-dot:nth-child(3) {
        animation-delay: 0s;
    }

    /* Animations */
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(-10px) translateY(-50%);
        }

        to {
            opacity: 1;
            transform: translateX(0) translateY(-50%);
        }
    }

    @keyframes bounce {

        0%,
        80%,
        100% {
            transform: scale(0);
        }

        40% {
            transform: scale(1.0);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* Image Styles */
    .message-image {
        max-width: 250px;
        max-height: 250px;
        border-radius: 16px;
        margin-top: 0.75rem;
        cursor: pointer;
        border: 1px solid rgba(226, 232, 240, 0.8);
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .message-image:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .uploaded-image-preview {
        max-width: 150px;
        max-height: 150px;
        border-radius: 12px;
        margin-top: 0.5rem;
        border: 2px solid #e2e8f0;
        object-fit: cover;
    }

    #filePreviewContainer:not(:empty) {
        margin: 1rem 0;
        padding: 1rem;
        background: rgba(247, 250, 252, 0.8);
        border-radius: 12px;
        border: 1px solid rgba(226, 232, 240, 0.8);
        backdrop-filter: blur(10px);
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(5px);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        max-width: 90%;
        max-height: 90%;
        border-radius: 16px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .close-modal {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
        user-select: none;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
    }

    .close-modal:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        main {
            padding: 1rem;
        }

        .chat-container-card {
            height: 90vh;
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 1rem;
        }

        .nav-links {
            display: none;
        }

        .hamburger {
            display: flex;
        }

        .chat-bubble {
            max-width: 85%;
            padding: 1rem 1.25rem;
        }

        .chat-header {
            padding: 1.5rem;
        }

        .chat-header h3 {
            font-size: 1.5rem;
        }

        .chat-container {
            padding: 1.5rem;
        }

        .input-container {
            padding: 1.5rem;
        }

        .welcome-message {
            padding: 2rem;
            margin: 0.5rem 0;
        }

        .close-modal {
            top: 10px;
            right: 20px;
            font-size: 30px;
            width: 40px;
            height: 40px;
        }
    }

    @media (max-width: 480px) {
        .chat-container-card {
            border-radius: 16px;
            height: 95vh;
            margin: 0.5rem;
        }

        .chat-header {
            padding: 1rem;
            border-radius: 16px 16px 0 0;
        }

        .chat-header h3 {
            font-size: 1.25rem;
        }

        .chat-header i {
            font-size: 2rem;
            padding: 0.5rem;
        }

        .chat-container {
            padding: 1rem;
        }

        .input-container {
            padding: 1rem;
        }

        .input-area {
            padding: 0.5rem 1rem;
        }

        .chat-bubble {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }

        .welcome-message {
            padding: 1.5rem;
        }

        .welcome-message h4 {
            font-size: 1.1rem;
        }
    }

    /* Hide file input */
    input[type="file"] {
        display: none;
    }
</style>

<main class="flex-grow container mx-auto px-4 md:px-6 py-6 flex flex-col">
    <div class="chat-container-card">
        <div class="chat-header">
            <i class="fas fa-robot"></i>
            <h3>GATOT AI Assistant</h3>
            @guest
            <div id="usageCounter" style="
                background: rgba(255, 255, 255, 0.2);
                padding: 0.5rem 1rem;
                border-radius: 12px;
                font-size: 0.9rem;
                margin-left: auto;
                backdrop-filter: blur(10px);
            ">
                <i class="fas fa-info-circle"></i>
                <span id="usageText">Penggunaan gratis: 1x</span>
            </div>
            @endguest
        </div>

        <div id="chatContainer" class="chat-container flex-grow">
            <div class="chat-bubble ai-bubble">
                Halo! Saya adalah GATOT AI yang selalu siap membantu kamu dengan:
                <ul>
                    <li>Pertanyaan seputar pelajaran </li>
                    <li>Penjelasan materi pembelajaran</li>
                    <li>Tips dan trik belajar</li>
                </ul>
                <div style="margin-top: 1rem; padding: 0.75rem; background: rgba(40, 167, 69, 0.1); border-left: 3px solid #28a745; border-radius: 8px; font-size: 0.9rem;">
                    <strong>🤖 AI Powered:</strong> Saya menggunakan teknologi Azure OpenAI untuk memberikan respons pembelajaran yang akurat dan mendalam!
                </div>
                
                Silakan ajukan pertanyaanmu!
            </div>
        </div>

        <div id="loadingIndicator" class="loading-indicator" style="display: none;">
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
            <span class="ml-2">Gatot AI sedang berpikir...</span>
        </div>

        <div id="filePreviewContainer"></div>

        <!-- Modal untuk menampilkan gambar -->
        <div id="imageModal" class="modal">
            <span class="close-modal" id="closeModalButton">&times;</span>
            <img class="modal-content" id="modalImage">
        </div>

        <div class="input-area mt-auto">
            <!-- Input files - hanya satu untuk setiap fungsi -->
            <input type="file" id="fileInput" accept="image/*,.pdf,.docx,.doc">
            <input type="file" id="cameraInput" accept="image/*" capture="environment">

            <div class="menu-container">
                <button class="main-button" id="mainButton">+</button>
                <div class="menu-items" id="menuItems">
                    <button class="menu-item" id="cameraButton">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2-3h6l2 3h4a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V8a1 1 0 011-1z" />
                            <circle cx="12" cy="13" r="4" />
                        </svg>
                        Ambil Foto
                    </button>
                    <button class="menu-item" id="uploadButton">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5 5 5M12 4v12" />
                        </svg>
                        Upload File
                    </button>
                </div>
            </div>

            <textarea id="userInput" placeholder="Ketik pertanyaanmu di sini"></textarea>
            <button id="sendButton" class="send-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 16.571V11.5a1 1 0 011-1h.094a1 1 0 01.992.913l.348 4.176A1 1 0 0012.409 17l5-1.429a1 1 0 00.331-1.876l-7-14z" />
                </svg>
            </button>
        </div>
    </div>
</main>
<script>
    const chatContainer = document.getElementById('chatContainer');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendButton');
    const uploadButton = document.getElementById('uploadButton');
    const fileInput = document.getElementById('fileInput');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const filePreviewContainer = document.getElementById('filePreviewContainer');

    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const closeModalButton = document.getElementById('closeModalButton');
    const mainButton = document.getElementById('mainButton');
    const menuItems = document.getElementById('menuItems');

    let chatHistory = []; // Untuk menyimpan histori percakapan untuk API
    let currentFile = null; // Untuk menyimpan file yang diunggah
    let currentFileBase64 = null; // Untuk menyimpan data base64 file
    let currentMimeType = null; // Untuk menyimpan mime type file
    let currentFileText = null; // Untuk menyimpan teks yang diekstrak dari dokumen
    let currentSessionId = null; // Untuk menyimpan session ID

    // Azure OpenAI Configuration
    const apiConfig = {
        chatEndpoint: '/api/chat/send' // API route for both authenticated and guest users
    };

    // Generate or get session ID
    function getSessionId() {
        if (!currentSessionId) {
            currentSessionId = 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        }
        return currentSessionId;
    }

    // Inisialisasi AI sebagai tutor
    chatHistory.push({
        role: "system",
        content: "Kamu adalah Gatot AI Assistant. Kamu bertugas membantu siswa dari tingkat SD, SMP, SMA, hingga perguruan tinggi dalam menjawab pertanyaan dan menjelaskan konsep pelajaran. Berikan jawaban yang jelas, akurat, dan mudah dipahami. Jika ada gambar yang diberikan bersama pertanyaan, gunakan gambar tersebut sebagai konteks tambahan untuk menjawab. Jika ada dokumen PDF atau Word yang diberikan, gunakan konten dokumen tersebut sebagai referensi untuk memberikan penjelasan yang lebih mendalam."
    });

    // Pesan sambutan awal dari AI
    chatHistory.push({
        role: "assistant",
        content: "Halo! Saya Gatot AI Assistant. Ada yang bisa saya bantu hari ini? Tanyakan apa saja mengenai pelajaran SD, SMP, SMA, hingga Perguruan Tinggi. Anda juga bisa mengunggah gambar, dokumen PDF, atau file Word (.docx) terkait pertanyaan Anda."
    });

    // Update file input to accept more file types
    fileInput.accept = "image/*,.pdf,.docx,.doc";

    uploadButton.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', handleFileUpload);
    sendButton.addEventListener('click', sendMessage);
    userInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault(); // Hindari enter default
            sendButton.click(); // Panggil tombol kirim
        }
    });

    closeModalButton.onclick = function() {
        imageModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == imageModal) {
            imageModal.style.display = "none";
        }
    }

    mainButton.addEventListener('click', () => {
        menuItems.classList.toggle('show');
    });

    document.getElementById('cameraButton').addEventListener('click', () => {
        document.getElementById('cameraInput').click();
    });

    document.getElementById('uploadButton').addEventListener('click', () => {
        document.getElementById('fileInput').click();
    });

    // Optional: Klik di luar menu akan menutupnya
    document.addEventListener('click', (e) => {
        if (!mainButton.contains(e.target) && !menuItems.contains(e.target)) {
            menuItems.classList.remove('show');
        }
    });

    // Fungsi untuk membaca PDF menggunakan PDF.js
    async function readPDFFile(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = async function(e) {
                try {
                    // Load PDF.js library dynamically if not already loaded
                    if (typeof pdfjsLib === 'undefined') {
                        await loadPDFJS();
                    }

                    const typedArray = new Uint8Array(e.target.result);
                    const pdf = await pdfjsLib.getDocument(typedArray).promise;
                    let fullText = '';

                    for (let i = 1; i <= pdf.numPages; i++) {
                        const page = await pdf.getPage(i);
                        const textContent = await page.getTextContent();
                        const pageText = textContent.items.map(item => item.str).join(' ');
                        fullText += pageText + '\n';
                    }

                    resolve(fullText.trim());
                } catch (error) {
                    reject(error);
                }
            };
            reader.onerror = () => reject(new Error('Error reading PDF file'));
            reader.readAsArrayBuffer(file);
        });
    }

    // Fungsi untuk memuat PDF.js library
    function loadPDFJS() {
        return new Promise((resolve, reject) => {
            if (typeof pdfjsLib !== 'undefined') {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js';
            script.onload = () => {
                pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
                resolve();
            };
            script.onerror = () => reject(new Error('Failed to load PDF.js'));
            document.head.appendChild(script);
        });
    }

    // Fungsi untuk membaca dokumen Word menggunakan mammoth.js
    async function readWordFile(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = async function(e) {
                try {
                    // Load mammoth.js library dynamically if not already loaded
                    if (typeof mammoth === 'undefined') {
                        await loadMammoth();
                    }

                    const arrayBuffer = e.target.result;
                    const result = await mammoth.extractRawText({
                        arrayBuffer: arrayBuffer
                    });
                    resolve(result.value);
                } catch (error) {
                    reject(error);
                }
            };
            reader.onerror = () => reject(new Error('Error reading Word file'));
            reader.readAsArrayBuffer(file);
        });
    }

    // Fungsi untuk memuat mammoth.js library
    function loadMammoth() {
        return new Promise((resolve, reject) => {
            if (typeof mammoth !== 'undefined') {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.8.0/mammoth.browser.min.js';
            script.onload = () => resolve();
            script.onerror = () => reject(new Error('Failed to load mammoth.js'));
            document.head.appendChild(script);
        });
    }

    async function handleFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            currentFile = file;
            currentMimeType = file.type;
            currentFileText = null;
            currentFileBase64 = null;

            // Show loading indicator
            filePreviewContainer.innerHTML = `
            <div class="flex items-center justify-center p-4">
                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-500"></div>
                <span class="ml-2 text-sm text-gray-600">Memproses file...</span>
            </div>
        `;

            try {
                if (file.type.startsWith('image/')) {
                    // Handle image files
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        currentFileBase64 = e.target.result;
                        filePreviewContainer.innerHTML = `
                        <div class="flex flex-col items-center space-y-2">
                            <p class="text-sm text-gray-600">📷 Gambar: ${file.name}</p>
                            <img src="${e.target.result}" alt="Preview" class="uploaded-image-preview mx-auto max-w-xs">
                        </div>
                    `;
                    };
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    // Handle PDF files
                    try {
                        currentFileText = await readPDFFile(file);
                        filePreviewContainer.innerHTML = `
                        <div class="flex flex-col items-center space-y-2 p-4 bg-red-50 rounded-lg">
                            <p class="text-sm text-gray-600">📄 PDF: ${file.name}</p>
                            <p class="text-xs text-gray-500">Dokumen berhasil dibaca (${currentFileText.length} karakter)</p>
                        </div>
                    `;
                    } catch (error) {
                        console.error('Error reading PDF:', error);
                        filePreviewContainer.innerHTML = `
                        <div class="p-4 bg-red-100 rounded-lg">
                            <p class="text-sm text-red-600">❌ Gagal membaca PDF: ${file.name}</p>
                            <p class="text-xs text-red-500">Error: ${error.message}</p>
                        </div>
                    `;
                        resetFileState();
                    }
                } else if (file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                    file.type === 'application/msword') {
                    // Handle Word files
                    try {
                        currentFileText = await readWordFile(file);
                        filePreviewContainer.innerHTML = `
                        <div class="flex flex-col items-center space-y-2 p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm text-gray-600">📝 Word: ${file.name}</p>
                            <p class="text-xs text-gray-500">Dokumen berhasil dibaca (${currentFileText.length} karakter)</p>
                        </div>
                    `;
                    } catch (error) {
                        console.error('Error reading Word file:', error);
                        filePreviewContainer.innerHTML = `
                        <div class="p-4 bg-red-100 rounded-lg">
                            <p class="text-sm text-red-600">❌ Gagal membaca Word: ${file.name}</p>
                            <p class="text-xs text-red-500">Error: ${error.message}</p>
                        </div>
                    `;
                        resetFileState();
                    }
                } else {
                    alert("Format file tidak didukung. Silakan upload gambar (.jpg, .png), PDF (.pdf), atau dokumen Word (.docx).");
                    resetFileState();
                }
            } catch (error) {
                console.error('Error handling file upload:', error);
                filePreviewContainer.innerHTML = `
                <div class="p-4 bg-red-100 rounded-lg">
                    <p class="text-sm text-red-600">❌ Terjadi kesalahan saat memproses file</p>
                </div>
            `;
                resetFileState();
            }
        }
    }

    function resetFileState() {
        fileInput.value = "";
        currentFile = null;
        currentFileBase64 = null;
        currentMimeType = null;
        currentFileText = null;
        filePreviewContainer.innerHTML = "";
    }

    function displayMessage(text, sender, imageUrl = null) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('chat-bubble', sender === 'user' ? 'user-bubble' : 'ai-bubble');

        // Create text content with proper formatting for AI responses
        if (sender === 'ai') {
            // Convert markdown-like formatting to HTML for better display
            const formattedText = text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\*(.*?)\*/g, '<em>$1</em>')
                .replace(/\n/g, '<br>');
            messageDiv.innerHTML = formattedText;
        } else {
            // For user messages, keep text as is to prevent XSS
            const textNode = document.createTextNode(text);
            messageDiv.appendChild(textNode);
        }

        if (imageUrl) {
            const imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.alt = sender === 'user' ? "Gambar Pengguna" : "Gambar dari AI";
            imgElement.classList.add('message-image');
            imgElement.onclick = () => {
                modalImage.src = imageUrl;
                imageModal.style.display = "flex";
            }
            messageDiv.appendChild(imgElement);
        }

        chatContainer.appendChild(messageDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    async function sendMessage() {
        const userText = userInput.value.trim();

        if (!userText && !currentFileBase64 && !currentFileText) {
            return; // Jangan kirim jika tidak ada teks atau file
        }

        // Tampilkan pesan pengguna
        let userDisplayImageUrl = null;
        let messageContent = [];
        let displayText = userText;

        // Tambahkan teks jika ada
        if (userText) {
            messageContent.push({
                type: "text",
                text: userText
            });
        }

        // Handle gambar
        if (currentFileBase64) {
            messageContent.push({
                type: "image_url",
                image_url: {
                    url: currentFileBase64
                }
            });
            userDisplayImageUrl = currentFileBase64;
        }

        // Handle dokumen (PDF/Word)
        if (currentFileText) {
            const documentContext = `\n\n[Konten Dokumen: ${currentFile.name}]\n${currentFileText.substring(0, 4000)}${currentFileText.length > 4000 ? '...' : ''}`;

            if (messageContent.length > 0 && messageContent[0].type === "text") {
                messageContent[0].text += documentContext;
            } else {
                messageContent.push({
                    type: "text",
                    text: `Mohon analisis dokumen berikut: ${documentContext}`
                });
            }

            // Update display text to show file info
            if (displayText) {
                displayText += ` 📄 [${currentFile.name}]`;
            } else {
                displayText = `📄 Mengunggah dokumen: ${currentFile.name}`;
            }
        }

        // Tampilkan pesan di UI
        displayMessage(displayText, 'user', userDisplayImageUrl);

        // Tambahkan ke histori chat untuk API
        chatHistory.push({
            role: "user",
            content: messageContent.length === 1 && messageContent[0].type === "text" ?
                messageContent[0].text : messageContent
        });

        userInput.value = '';
        resetFileState();

        loadingIndicator.style.display = 'flex';

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

            const payload = {
                messages: chatHistory,
                temperature: 0.7,
                max_tokens: 2048,
                session_id: getSessionId()
            };

            const response = await fetch(apiConfig.chatEndpoint, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(payload),
                credentials: 'same-origin' // Include cookies for session
            });

            const result = await response.json();

            if (!response.ok) {
                console.error("API Error:", result);
                
                // Handle CSRF token mismatch specifically
                if (response.status === 419) {
                    throw new Error('CSRF token mismatch. Silakan refresh halaman dan coba lagi.');
                }
                
                throw new Error(result.message || `Request failed with status ${response.status}`);
            }

            if (!result.success) {
                // Check if this is a usage limit error
                if (result.requires_registration) {
                    showRegistrationPrompt('chatbot');
                    return;
                }
                throw new Error(result.message || result.error || 'Invalid response from server');
            }
            
            if (!result.data.choices || result.data.choices.length === 0) {
                throw new Error('Invalid response from server');
            }

            const aiResponseText = result.data.choices[0].message.content;

            // Tampilkan respons AI
            displayMessage(aiResponseText, 'ai');

            // Tambahkan respons AI ke histori
            chatHistory.push({
                role: "assistant",
                content: aiResponseText
            });

        } catch (error) {
            console.error('Error sending message:', error);
            
            // Check if this is a usage limit error
            if (error.message && error.message.includes('Batas penggunaan tercapai')) {
                showRegistrationPrompt('chatbot');
            } else {
                displayMessage(`Terjadi kesalahan: ${error.message}`, 'ai');
            }

            chatHistory.push({
                role: "assistant",
                content: `Error: ${error.message}`
            });
        } finally {
            loadingIndicator.style.display = 'none';
        }
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

        // Add animation styles
        const style = document.createElement('style');
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

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.remove();
            }
        });
    }
</script>
<script>
    window.MathJax = {
        tex: {
            inlineMath: [
                ['$', '$'],
                ['\\(', '\\)']
            ],
            displayMath: [
                ['$$', '$$'],
                ['\\[', '\\]']
            ],
            processEscapes: true,
            processEnvironments: true
        },
        options: {
            skipHtmlTags: ['script', 'noscript', 'style', 'textarea', 'pre']
        }
    };
</script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>