# 📚 AyoBelajar API Documentation

## 🌐 Base URL
```
Production: https://ayobelajar.azurewebsites.net/api
Development: http://localhost:8000/api
```

## 🔐 Authentication

### Headers Required
```http
Content-Type: application/json
Accept: application/json
X-Requested-With: XMLHttpRequest
```

### For Authenticated Endpoints
```http
Authorization: Bearer {your-token}
```

---

## 🤖 Chat API

### Send Message
Kirim pesan ke AI chatbot dan dapatkan respons.

**Endpoint:** `POST /chat/send`

**Request Body:**
```json
{
  "messages": [
    {
      "role": "system",
      "content": "Kamu adalah asisten pembelajaran yang membantu siswa belajar."
    },
    {
      "role": "user", 
      "content": "Jelaskan tentang fotosintesis"
    }
  ],
  "temperature": 0.7,
  "max_tokens": 2048,
  "session_id": "uuid-session-id"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "choices": [
      {
        "message": {
          "role": "assistant",
          "content": "Fotosintesis adalah proses..."
        }
      }
    ],
    "usage": {
      "prompt_tokens": 45,
      "completion_tokens": 150,
      "total_tokens": 195
    }
  },
  "session_id": "uuid-session-id",
  "source": "azure-openai"
}
```

**Parameters:**
- `messages` (array, required): Array pesan dalam format OpenAI
- `temperature` (float, optional): Kreativitas respons (0.0-2.0), default: 0.7
- `max_tokens` (integer, optional): Maksimal token respons (1-4096), default: 2048
- `session_id` (string, optional): ID sesi untuk tracking

**Error Responses:**
```json
{
  "error": "Chatbot service failed",
  "message": "Unable to process your request at this time"
}
```

---

## 🌐 Translation API

### Translate Text
Terjemahkan teks ke bahasa lain menggunakan Azure Translator atau Google Translate.

**Endpoint:** `POST /translate`

**Request Body:**
```json
{
  "text": "Selamat pagi, bagaimana kabar Anda?",
  "from": "id",
  "to": "en"
}
```

**Response:**
```json
{
  "success": true,
  "translated_text": "Good morning, how are you?",
  "from": "id",
  "to": "en",
  "api_used": "Microsoft Azure Translator"
}
```

**Parameters:**
- `text` (string, required): Teks yang akan diterjemahkan (max: 5000 karakter)
- `from` (string, required): Kode bahasa sumber (2-3 karakter)
- `to` (string, required): Kode bahasa tujuan (2-3 karakter)

### Get Supported Languages
Dapatkan daftar bahasa yang didukung.

**Endpoint:** `GET /translate/languages`

**Response:**
```json
{
  "success": true,
  "languages": {
    "id": "Bahasa Indonesia",
    "en": "English",
    "jv": "Bahasa Jawa",
    "su": "Bahasa Sunda",
    "ar": "العربية (Arabic)",
    "zh": "中文 (Chinese)",
    "ja": "日本語 (Japanese)",
    "ko": "한국어 (Korean)"
  }
}
```

### Translation Health Check
Cek status API translator.

**Endpoint:** `GET /translate/health`

**Response:**
```json
{
  "success": true,
  "apis": {
    "azure": {
      "configured": true,
      "status": "working"
    },
    "google": {
      "configured": true,
      "status": "working"
    }
  }
}
```

---

## 📚 Modules API

### Get All Modules
Dapatkan daftar semua modul pembelajaran.

**Endpoint:** `GET /modules`

**Query Parameters:**
- `level` (string, optional): Filter berdasarkan tingkat (SD, SMP, SMA)
- `subject` (string, optional): Filter berdasarkan mata pelajaran
- `search` (string, optional): Pencarian berdasarkan judul atau deskripsi
- `page` (integer, optional): Halaman untuk pagination
- `per_page` (integer, optional): Jumlah item per halaman (default: 15)

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "title": "Matematika Dasar - Penjumlahan",
      "description": "Modul pembelajaran penjumlahan untuk siswa SD",
      "icon": "fas fa-calculator",
      "level": "SD",
      "subject": "Matematika",
      "file_path": "modules/math-basic-addition.pdf",
      "file_name": "math-basic-addition.pdf",
      "file_size": "2.5 MB",
      "is_active": true,
      "created_at": "2024-01-15T10:30:00Z",
      "updated_at": "2024-01-15T10:30:00Z"
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/modules?page=1",
    "last": "http://localhost:8000/api/modules?page=5",
    "prev": null,
    "next": "http://localhost:8000/api/modules?page=2"
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 5,
    "per_page": 15,
    "to": 15,
    "total": 75
  }
}
```

### Get Module Detail
Dapatkan detail modul berdasarkan ID.

**Endpoint:** `GET /modules/{id}`

**Response:**
```json
{
  "data": {
    "id": 1,
    "title": "Matematika Dasar - Penjumlahan",
    "description": "Modul pembelajaran penjumlahan untuk siswa SD kelas 1-3",
    "icon": "fas fa-calculator",
    "level": "SD",
    "subject": "Matematika",
    "file_path": "modules/math-basic-addition.pdf",
    "file_name": "math-basic-addition.pdf",
    "file_size": "2.5 MB",
    "download_url": "https://storage.azure.com/modules/math-basic-addition.pdf",
    "is_active": true,
    "created_at": "2024-01-15T10:30:00Z",
    "updated_at": "2024-01-15T10:30:00Z"
  }
}
```

### Download Module
Download file modul (requires authentication).

**Endpoint:** `GET /modules/{id}/download`

**Headers:**
```http
Authorization: Bearer {your-token}
```

**Response:**
- Success: File download stream
- Error: JSON error response

---

## 👤 User API

### Get User Profile
Dapatkan profil pengguna yang sedang login.

**Endpoint:** `GET /user/profile`

**Headers:**
```http
Authorization: Bearer {your-token}
```

**Response:**
```json
{
  "data": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "role": "user",
    "avatar": "https://storage.azure.com/avatars/john-doe.jpg",
    "created_at": "2024-01-01T00:00:00Z",
    "updated_at": "2024-01-15T10:30:00Z"
  }
}
```

### Get Chat History
Dapatkan riwayat chat pengguna.

**Endpoint:** `GET /user/chat-history`

**Query Parameters:**
- `session_id` (string, optional): Filter berdasarkan session ID
- `page` (integer, optional): Halaman untuk pagination
- `per_page` (integer, optional): Jumlah item per halaman

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "session_id": "uuid-session-id",
      "message_type": "user",
      "message_content": "Jelaskan fotosintesis",
      "message_metadata": {
        "temperature": 0.7,
        "max_tokens": 2048
      },
      "sent_at": "2024-01-15T10:30:00Z"
    },
    {
      "id": 2,
      "session_id": "uuid-session-id",
      "message_type": "assistant",
      "message_content": "Fotosintesis adalah proses...",
      "message_metadata": {
        "model": "gpt-4",
        "usage": {
          "total_tokens": 195
        }
      },
      "sent_at": "2024-01-15T10:30:15Z"
    }
  ]
}
```

### Get Download History
Dapatkan riwayat download pengguna.

**Endpoint:** `GET /user/download-history`

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "module_id": 1,
      "module_title": "Matematika Dasar - Penjumlahan",
      "downloaded_at": "2024-01-15T10:30:00Z"
    }
  ]
}
```

---

## ���� Authentication API

### Login
Login pengguna dan dapatkan access token.

**Endpoint:** `POST /auth/login`

**Request Body:**
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "role": "user"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
    "expires_at": "2024-01-16T10:30:00Z"
  }
}
```

### Register
Registrasi pengguna baru.

**Endpoint:** `POST /auth/register`

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

### Logout
Logout pengguna dan invalidate token.

**Endpoint:** `POST /auth/logout`

**Headers:**
```http
Authorization: Bearer {your-token}
```

---

## 📊 Statistics API

### Get Platform Statistics
Dapatkan statistik platform (public).

**Endpoint:** `GET /stats`

**Response:**
```json
{
  "data": {
    "total_modules": 150,
    "total_users": 1250,
    "total_downloads": 5430,
    "total_chat_sessions": 2890,
    "active_users_today": 45,
    "popular_subjects": [
      {
        "subject": "Matematika",
        "count": 45
      },
      {
        "subject": "IPA",
        "count": 38
      }
    ]
  }
}
```

---

## ❌ Error Handling

### Standard Error Response
```json
{
  "success": false,
  "error": "Error type",
  "message": "Human readable error message",
  "details": "Additional error details (optional)"
}
```

### HTTP Status Codes
- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `429` - Too Many Requests
- `500` - Internal Server Error

### Validation Error Response
```json
{
  "success": false,
  "error": "Validation failed",
  "details": {
    "email": ["The email field is required."],
    "password": ["The password must be at least 8 characters."]
  }
}
```

---

## 🚀 Rate Limiting

### Limits
- **General API**: 100 requests per minute
- **Chat API**: 20 requests per minute
- **Translation API**: 50 requests per minute
- **Download API**: 10 requests per minute

### Rate Limit Headers
```http
X-RateLimit-Limit: 100
X-RateLimit-Remaining: 95
X-RateLimit-Reset: 1640995200
```

---

## 🧪 Testing

### Using cURL
```bash
# Test chat API
curl -X POST https://ayobelajar.azurewebsites.net/api/chat/send \
  -H "Content-Type: application/json" \
  -d '{
    "messages": [{"role": "user", "content": "Hello"}],
    "temperature": 0.7
  }'

# Test translation API
curl -X POST https://ayobelajar.azurewebsites.net/api/translate \
  -H "Content-Type: application/json" \
  -d '{
    "text": "Hello World",
    "from": "en",
    "to": "id"
  }'
```

### Using Postman
Import collection: [AyoBelajar API Collection](./postman/AyoBelajar-API.postman_collection.json)

---

## 📞 Support

Jika Anda mengalami masalah dengan API:

- 📧 Email: api-support@ayobelajar.id
- 🐛 Issues: [GitHub Issues](https://github.com/LuthfiMirza/app-ayobelajar/issues)
- 📖 Documentation: [API Docs](https://docs.ayobelajar.id)

---

**Last Updated:** January 2024  
**API Version:** v1.0