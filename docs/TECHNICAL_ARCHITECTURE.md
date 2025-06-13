# 🏗️ AyoBelajar - Technical Architecture

## 📋 Overview

AyoBelajar adalah platform pembelajaran interaktif yang dibangun dengan arsitektur modern, scalable, dan cloud-native. Platform ini menggabungkan AI chatbot, translator multi-bahasa, dan sistem manajemen konten pembelajaran.

---

## 🎯 System Architecture

### High-Level Architecture
```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   Frontend      │    │   Backend       │    │   Cloud         │
│   (Web App)     │◄──►│   (Laravel)     │◄──►│   Services      │
└─────────────────┘    └─────────────────┘    └─────────────────┘
│                      │                      │
├─ Livewire           ├─ REST API            ├─ Azure OpenAI
├─ Alpine.js          ├─ Filament Admin      ├─ Azure Translator
├─ Tailwind CSS       ├─ Authentication      ├─ Azure Blob Storage
└─ Blade Templates    └─ File Management     └─ Google Translate
```

### Detailed System Architecture
```
                    ┌─────────────────────────────────────────┐
                    │              Load Balancer              │
                    └─────────────────┬───────────────────────┘
                                      │
                    ┌─────────────────▼───────────────────────┐
                    │            Azure App Service            │
                    │         (Laravel Application)          │
                    └─────────────────┬───────────────────────┘
                                      │
        ┌─────────────────────────────┼────────────────���────────────┐
        │                             │                             │
        ▼                             ▼                             ▼
┌───────────────┐           ┌─────────────────┐           ┌─────────────────┐
│   Database    │           │   File Storage  │           │  External APIs  │
│   (SQLite/    │           │  (Azure Blob)   │           │                 │
│    MySQL)     │           │                 │           │ ├─ Azure OpenAI │
└───────────────┘           └─────────────────┘           │ ├─ Azure Trans. │
                                                          │ └─ Google Trans.│
                                                          └─────────────────┘
```

---

## 🔧 Technology Stack

### Backend Framework
- **Laravel 11**: PHP framework dengan fitur modern
- **PHP 8.2+**: Bahasa pemrograman dengan performance tinggi
- **Composer**: Dependency management

### Frontend Technologies
- **Livewire 3**: Full-stack framework untuk Laravel
- **Alpine.js**: Lightweight JavaScript framework
- **Tailwind CSS**: Utility-first CSS framework
- **Blade**: Laravel templating engine

### Admin Panel
- **Filament 3**: Modern admin panel untuk Laravel
- **Filament Widgets**: Dashboard components
- **Filament Forms**: Dynamic form builder

### Database
- **SQLite**: Development database
- **MySQL**: Production database
- **Eloquent ORM**: Database abstraction layer

### Cloud Services
```
Azure Services:
├── Azure App Service (Hosting)
├── Azure OpenAI (GPT Models)
├── Azure Translator (Translation)
├── Azure Blob Storage (File Storage)
└── Azure Database for MySQL (Production DB)

Google Cloud:
└── Google Translate API (Regional Languages)
```

---

## 📊 Database Schema

### Core Tables

#### Users Table
```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    avatar VARCHAR(255) NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

#### Modules Table
```sql
CREATE TABLE modules (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(255) DEFAULT 'fas fa-book',
    level ENUM('SD', 'SMP', 'SMA') NOT NULL,
    subject VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NULL,
    file_name VARCHAR(255) NULL,
    file_size VARCHAR(255) NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

#### Chat History Table
```sql
CREATE TABLE chat_histories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NULL,
    session_id VARCHAR(255) NOT NULL,
    message_type ENUM('user', 'assistant', 'system') NOT NULL,
    message_content TEXT NOT NULL,
    message_metadata JSON NULL,
    sent_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_session_id (session_id),
    INDEX idx_user_id (user_id)
);
```

#### Download History Table
```sql
CREATE TABLE download_histories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    module_id BIGINT NOT NULL,
    downloaded_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (module_id) REFERENCES modules(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_module_id (module_id)
);
```

### Database Relationships
```
Users (1) ──────── (N) Chat Histories
Users (1) ──────── (N) Download Histories
Modules (1) ─────── (N) Download Histories
```

---

## 🔄 Application Flow

### User Registration & Authentication Flow
```
1. User Registration
   ├── Validation (email, password)
   ├── Password Hashing (bcrypt)
   ├── User Creation
   └── Auto Login

2. User Login
   ├── Credential Validation
   ├── Session Creation
   ├── Remember Token (optional)
   └── Redirect to Dashboard

3. Authentication Middleware
   ├── Session Verification
   ├── Role-based Access Control
   └── Route Protection
```

### Chat System Flow
```
1. User Input
   ├── Message Validation
   ├── Session ID Generation/Retrieval
   └── Message Storage (if authenticated)

2. AI Processing
   ├── Azure OpenAI API Call
   ├── Fallback Mechanism
   ├── Response Processing
   └── Response Storage

3. Response Delivery
   ├── Real-time Response
   ├─�� Session Tracking
   └── Analytics Logging
```

### Translation System Flow
```
1. Language Detection
   ├── Source Language Validation
   ├── Target Language Validation
   └── API Selection Logic

2. Translation Processing
   ├── Azure Translator (Primary)
   ├── Google Translate (Fallback)
   ├── Regional Language Support
   └── Error Handling

3. Response Optimization
   ├── Caching Strategy
   ├── Rate Limiting
   └── Quality Assurance
```

### File Management Flow
```
1. File Upload
   ├── File Validation (type, size)
   ├── Security Scanning
   ├── Azure Blob Upload
   └── Database Record Creation

2. File Access
   ├── Authentication Check
   ├── Permission Validation
   ├── Secure URL Generation
   └── Download Tracking

3. File Management
   ├── Admin CRUD Operations
   ├── Bulk Operations
   ├── Storage Optimization
   └── Backup Strategy
```

---

## 🔐 Security Architecture

### Authentication & Authorization
```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   Session       │    │   Middleware    │    │   Role-Based    │
│   Management    │◄──►│   Pipeline      │◄──►│   Access        │
└─────────────────┘    └─────────────────┘    └─────────────────┘
│                      │                      │
├─ CSRF Protection    ├─ Authentication      ├─ Admin Routes
├─ Session Timeout    ├─ Rate Limiting       ├─ User Routes
└─ Secure Cookies     └─ Input Validation    └─ Guest Routes
```

### Data Protection
- **Encryption at Rest**: Database encryption
- **Encryption in Transit**: HTTPS/TLS 1.3
- **API Key Security**: Environment variables
- **File Upload Security**: Type validation, size limits
- **SQL Injection Prevention**: Eloquent ORM
- **XSS Protection**: Blade template escaping

### Security Headers
```http
Strict-Transport-Security: max-age=31536000; includeSubDomains
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
X-XSS-Protection: 1; mode=block
Content-Security-Policy: default-src 'self'
```

---

## 📈 Performance & Scalability

### Caching Strategy
```
Application Cache:
├── Route Caching
├── Config Caching
├── View Caching
└── Query Result Caching

External Cache:
├── Redis (Session Storage)
├── CDN (Static Assets)
└── Browser Caching
```

### Database Optimization
- **Indexing Strategy**: Optimized indexes for frequent queries
- **Query Optimization**: Eager loading, query scoping
- **Connection Pooling**: Efficient database connections
- **Read Replicas**: Separate read/write operations

### File Storage Optimization
- **Azure Blob Storage**: Scalable file storage
- **CDN Integration**: Global content delivery
- **Compression**: File size optimization
- **Lazy Loading**: On-demand file loading

### Monitoring & Analytics
```
Performance Monitoring:
├── Application Performance Monitoring (APM)
├── Database Query Analysis
├── API Response Time Tracking
└── Error Rate Monitoring

Business Analytics:
├── User Activity Tracking
├── Feature Usage Statistics
├── Download Analytics
└── Chat Session Analytics
```

---

## 🚀 Deployment Architecture

### Development Environment
```
Local Development:
├── Laravel Sail (Docker)
├── SQLite Database
├── Local File Storage
└── Mock API Services
```

### Staging Environment
```
Azure Staging:
├── Azure App Service (Staging Slot)
├── Azure Database for MySQL
├── Azure Blob Storage
└── Full API Integration
```

### Production Environment
```
Azure Production:
├── Azure App Service (Production)
├── Azure Database for MySQL (HA)
├── Azure Blob Storage (Geo-redundant)
├── Azure CDN
├── Azure Application Insights
└── Azure Key Vault
```

### CI/CD Pipeline
```
GitHub Actions:
├── Code Quality Checks
├── Automated Testing
├── Security Scanning
├── Build Process
├── Staging Deployment
└── Production Deployment
```

---

## 🔧 API Architecture

### RESTful API Design
```
API Structure:
├── /api/v1/auth/*          (Authentication)
├── /api/v1/chat/*          (Chat System)
├── /api/v1/translate/*     (Translation)
├── /api/v1/modules/*       (Learning Modules)
├── /api/v1/user/*          (User Management)
└── /api/v1/stats/*         (Statistics)
```

### API Gateway Pattern
- **Rate Limiting**: Request throttling
- **Authentication**: Token validation
- **Logging**: Request/response logging
- **Monitoring**: API health checks

### Microservices Integration
```
External Services:
├── Azure OpenAI Service
├── Azure Translator Service
├── Google Translate API
└── Azure Blob Storage API
```

---

## 📊 Data Flow Architecture

### Real-time Data Flow
```
User Input → Validation → Processing → External APIs → Response → Storage → Analytics
```

### Batch Processing
```
Scheduled Jobs:
├── Database Cleanup
├── File Optimization
├── Analytics Processing
└── Backup Operations
```

### Event-Driven Architecture
```
Events:
├── User Registration
├── Module Download
├── Chat Session Start/End
├── File Upload/Delete
└── System Alerts
```

---

## 🔍 Monitoring & Observability

### Application Monitoring
- **Azure Application Insights**: Performance monitoring
- **Custom Metrics**: Business KPIs
- **Error Tracking**: Exception monitoring
- **User Analytics**: Behavior tracking

### Infrastructure Monitoring
- **Azure Monitor**: Resource utilization
- **Database Monitoring**: Query performance
- **Storage Monitoring**: File access patterns
- **Network Monitoring**: Traffic analysis

### Alerting System
```
Alert Categories:
├── Performance Degradation
├── Error Rate Increase
├── Resource Utilization
├── Security Incidents
└── Business Metrics
```

---

## 🔄 Backup & Disaster Recovery

### Backup Strategy
```
Data Backup:
├── Database: Daily automated backups
├── Files: Geo-redundant storage
├── Configuration: Version controlled
└── Secrets: Azure Key Vault

Recovery Objectives:
├── RTO (Recovery Time): < 4 hours
├── RPO (Recovery Point): < 1 hour
└── Data Integrity: 99.99%
```

### Disaster Recovery Plan
1. **Detection**: Automated monitoring alerts
2. **Assessment**: Impact evaluation
3. **Recovery**: Automated failover procedures
4. **Validation**: System integrity checks
5. **Communication**: Stakeholder notifications

---

## 📚 Documentation Standards

### Code Documentation
- **PHPDoc**: Function and class documentation
- **README**: Setup and usage instructions
- **API Docs**: Endpoint specifications
- **Architecture Docs**: System design

### Operational Documentation
- **Deployment Guide**: Step-by-step procedures
- **Troubleshooting**: Common issues and solutions
- **Monitoring Guide**: Alert handling procedures
- **Security Policies**: Security best practices

---

## 🔮 Future Architecture Considerations

### Scalability Enhancements
- **Microservices Migration**: Service decomposition
- **Container Orchestration**: Kubernetes deployment
- **Event Streaming**: Apache Kafka integration
- **Global Distribution**: Multi-region deployment

### Technology Upgrades
- **PHP 8.3+**: Latest language features
- **Laravel 12+**: Framework updates
- **Database Sharding**: Horizontal scaling
- **Edge Computing**: CDN optimization

---

**Document Version:** 1.0  
**Last Updated:** January 2024  
**Maintained By:** Development Team