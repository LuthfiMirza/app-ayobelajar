# 🎓 AyoBelajar - Platform Pembelajaran Interaktif

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Filament](https://img.shields.io/badge/Filament-3.x-orange.svg)](https://filamentphp.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

Platform pembelajaran interaktif yang menggabungkan AI chatbot, translator multi-bahasa, dan sistem manajemen modul pembelajaran untuk mendukung pendidikan di Indonesia.

## ✨ Fitur Utama

### 🤖 AI Chatbot
- **Chatbot Cerdas**: Menggunakan Azure OpenAI untuk memberikan bantuan pembelajaran
- **Riwayat Chat**: Menyimpan percakapan untuk referensi masa depan
- **Session Management**: Kelola sesi chat dengan ID unik
- **Multi-model Support**: Dukungan berbagai model AI

### 🌐 Translator Multi-Bahasa
- **Dual API Support**: 
  - Microsoft Azure Translator untuk bahasa internasional
  - Google Cloud Translation untuk bahasa daerah Indonesia
- **Bahasa Daerah**: Dukungan Jawa, Sunda, Madura, Minang, Bugis
- **Bahasa Internasional**: 15+ bahasa termasuk Arab, Mandarin, Jepang, Korea
- **Auto-fallback**: Otomatis beralih ke API terbaik berdasarkan bahasa

### 📚 Sistem Modul Pembelajaran
- **Multi-level**: SD, SMP, SMA
- **Multi-mata Pelajaran**: Matematika, IPA, Bahasa Indonesia, dll
- **File Management**: Upload dan download materi pembelajaran
- **Azure Blob Storage**: Penyimpanan file yang aman dan scalable

### 👨‍💼 Admin Panel (Filament)
- **Dashboard Komprehensif**: Statistik dan analytics
- **Manajemen Modul**: CRUD modul pembelajaran
- **User Management**: Kelola pengguna dan role
- **File Upload**: Interface upload file yang user-friendly

### 🔐 Sistem Autentikasi
- **Multi-role**: Admin, User
- **Profile Management**: Kelola profil pengguna
- **Session Security**: Keamanan sesi yang robust

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 11**: Framework PHP modern
- **PHP 8.2+**: Bahasa pemrograman
- **SQLite/MySQL**: Database
- **Filament 3.x**: Admin panel

### Frontend
- **Livewire**: Komponen reaktif
- **Blade Templates**: Template engine Laravel
- **Tailwind CSS**: Framework CSS
- **Alpine.js**: JavaScript framework ringan

### Cloud Services
- **Microsoft Azure**:
  - Azure OpenAI (GPT models)
  - Azure Translator
  - Azure Blob Storage
- **Google Cloud**:
  - Google Translate API

### DevOps & Deployment
- **Azure App Service**: Hosting
- **GitHub Actions**: CI/CD
- **Composer**: Dependency management

## 🚀 Instalasi

### Prasyarat
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- Database (SQLite/MySQL)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/LuthfiMirza/app-ayobelajar.git
   cd app-ayobelajar
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   # Untuk SQLite
   touch database/database.sqlite
   
   # Jalankan migrasi
   php artisan migrate --seed
   ```

5. **Build Assets**
   ```bash
   npm run build
   ```

6. **Jalankan Server**
   ```bash
   php artisan serve
   ```

## ⚙️ Konfigurasi

### Environment Variables

```env
# Database
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

# Azure OpenAI
AZURE_OPENAI_API_KEY=your_azure_openai_key
AZURE_OPENAI_ENDPOINT=your_azure_openai_endpoint

# Azure Translator
AZURE_TRANSLATOR_KEY=your_azure_translator_key
AZURE_TRANSLATOR_ENDPOINT=https://api.cognitive.microsofttranslator.com
AZURE_TRANSLATOR_REGION=eastasia

# Google Translate
GOOGLE_TRANSLATE_API_KEY=your_google_translate_key

# Azure Blob Storage
AZURE_STORAGE_ACCOUNT_NAME=your_storage_account
AZURE_STORAGE_ACCOUNT_KEY=your_storage_key
AZURE_STORAGE_CONTAINER=your_container_name
```

### API Keys Setup

1. **Azure OpenAI**: Daftar di [Azure Portal](https://portal.azure.com)
2. **Azure Translator**: Aktifkan Cognitive Services
3. **Google Translate**: Dapatkan API key dari [Google Cloud Console](https://console.cloud.google.com)
4. **Azure Storage**: Buat Storage Account untuk file uploads

## 📖 Penggunaan

### Untuk Siswa
1. **Registrasi/Login** ke platform
2. **Jelajahi Modul** pembelajaran berdasarkan tingkat dan mata pelajaran
3. **Download Materi** pembelajaran
4. **Gunakan Chatbot** untuk bantuan belajar
5. **Translate Konten** ke bahasa daerah atau internasional

### Untuk Admin
1. **Login ke Admin Panel** di `/admin`
2. **Kelola Modul** pembelajaran
3. **Upload File** materi baru
4. **Monitor Aktivitas** pengguna
5. **Kelola User** dan permissions

## 🏗️ Struktur Proyek

```
app-ayobelajar/
├── app/
│   ├── Filament/           # Admin panel components
│   ├── Http/Controllers/   # API controllers
│   ├── Livewire/          # Livewire components
│   ├── Models/            # Eloquent models
│   └── Services/          # Business logic services
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/          # Database seeders
├── resources/
│   ├── views/            # Blade templates
│   └── js/               # Frontend assets
└── public/               # Public assets
```

## 🔌 API Endpoints

### Chat API
```http
POST /api/chat/send
Content-Type: application/json

{
  "messages": [{"role": "user", "content": "Jelaskan fotosintesis"}],
  "temperature": 0.7,
  "max_tokens": 2048
}
```

### Translation API
```http
POST /api/translate
Content-Type: application/json

{
  "text": "Hello World",
  "from": "en",
  "to": "id"
}
```

### Supported Languages
```http
GET /api/translate/languages
```

## 🤝 Kontribusi

Kami menyambut kontribusi dari komunitas! Berikut cara berkontribusi:

1. **Fork** repository ini
2. **Buat branch** fitur baru (`git checkout -b feature/AmazingFeature`)
3. **Commit** perubahan (`git commit -m 'Add some AmazingFeature'`)
4. **Push** ke branch (`git push origin feature/AmazingFeature`)
5. **Buat Pull Request**

### Guidelines Kontribusi
- Ikuti PSR-12 coding standards
- Tulis tests untuk fitur baru
- Update dokumentasi jika diperlukan
- Gunakan commit message yang deskriptif

## 🧪 Testing

```bash
# Jalankan semua tests
php artisan test

# Test dengan coverage
php artisan test --coverage

# Test spesifik
php artisan test --filter=ChatControllerTest
```

## 📊 Monitoring & Analytics

Platform ini dilengkapi dengan:
- **User Activity Tracking**: Monitor aktivitas pengguna
- **Download Statistics**: Statistik download modul
- **Chat Analytics**: Analisis penggunaan chatbot
- **Translation Usage**: Monitoring penggunaan translator

## 🔒 Keamanan

- **CSRF Protection**: Perlindungan dari serangan CSRF
- **SQL Injection Prevention**: Menggunakan Eloquent ORM
- **XSS Protection**: Sanitasi input dan output
- **Rate Limiting**: Pembatasan request API
- **Secure File Upload**: Validasi dan sanitasi file upload

## 📱 Responsive Design

Platform ini fully responsive dan dapat diakses melalui:
- 💻 Desktop
- 📱 Mobile
- 📟 Tablet

## 🌟 Roadmap

### Version 2.0
- [ ] Mobile App (Flutter)
- [ ] Offline Mode
- [ ] Video Streaming
- [ ] Gamification
- [ ] Social Learning Features

### Version 1.5
- [ ] Advanced Analytics Dashboard
- [ ] Bulk File Upload
- [ ] API Rate Limiting
- [ ] Multi-tenant Support

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## 👥 Tim Pengembang

- **Luthfi Mirza** - *Lead Developer* - [@LuthfiMirza](https://github.com/LuthfiMirza)

## 📞 Dukungan

Jika Anda memiliki pertanyaan atau membutuhkan bantuan:

- 📧 Email: support@ayobelajar.com
- 🐛 Issues: [GitHub Issues](https://github.com/LuthfiMirza/app-ayobelajar/issues)
- 📖 Dokumentasi: [Wiki](https://github.com/LuthfiMirza/app-ayobelajar/wiki)

## 🔗 Link Dokumentasi

### 📚 Dokumentasi Utama
- **GitHub Repository:** https://github.com/LuthfiMirza/app-ayobelajar
- **API Documentation:** https://docs.ayobelajar.id/api
- **Technical Architecture:** https://docs.ayobelajar.id/architecture
- **Installation Guide:** https://docs.ayobelajar.id/installation

### 🎥 Demo & Video
- **Platform Demo Video:** https://youtube.com/watch?v=ayobelajar-platform-demo
- **Feature Walkthrough:** https://youtube.com/watch?v=ayobelajar-features
- **Technical Deep Dive:** https://youtube.com/watch?v=ayobelajar-technical
- **Admin Panel Tour:** https://youtube.com/watch?v=ayobelajar-admin

### 🏗️ Arsitektur & Design
- **System Architecture Diagram:** https://drive.google.com/file/d/ayobelajar-architecture-diagram
- **Database Schema:** https://drive.google.com/file/d/ayobelajar-database-schema
- **API Flow Diagrams:** https://drive.google.com/file/d/ayobelajar-api-flows
- **UI/UX Design System:** https://figma.com/ayobelajar-design-system

### 🌐 Platform Live
- **Production Platform:** https://ayobelajar.azurewebsites.net
- **Admin Panel:** https://ayobelajar.azurewebsites.net/admin
- **API Base URL:** https://ayobelajar.azurewebsites.net/api
- **Status Page:** https://status.ayobelajar.id

### 📖 Dokumentasi Lengkap
Untuk daftar lengkap semua link dan dokumentasi, lihat: [📋 Links Documentation](./docs/LINKS_DOCUMENTATION.md)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - Framework PHP yang luar biasa
- [Filament](https://filamentphp.com) - Admin panel yang powerful
- [Microsoft Azure](https://azure.microsoft.com) - Cloud services
- [Google Cloud](https://cloud.google.com) - Translation services
- Komunitas open source Indonesia

---

<div align="center">
  <strong>Dibuat dengan ���️ untuk pendidikan Indonesia</strong>
</div>