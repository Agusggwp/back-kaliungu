# API CMS Banjar Documentation

## Base URL
```
http://127.0.0.1:8000/api
```

## Authentication Endpoints

### Register User
```
POST /api/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}

Response (201):
{
  "message": "User registered successfully",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "role": "user"
  }
}
```

### Login
```
POST /api/login
Content-Type: application/json

{
  "email": "admin@example.com",
  "password": "password"
}

Response (200):
{
  "message": "Logged in successfully",
  "user": {
    "id": 1,
    "name": "Admin",
    "email": "admin@example.com",
    "role": "admin"
  }
}
```

### Logout
```
POST /api/logout
Authorization: Bearer {session}

Response (200):
{
  "message": "Logged out successfully"
}
```

### Get Current User
```
GET /api/me
Authorization: Bearer {session}

Response (200):
{
  "user": {
    "id": 1,
    "name": "Admin",
    "email": "admin@example.com",
    "role": "admin"
  }
}
```

---

## Public API Endpoints (No Authentication Required)

### Get All Struktur Organisasi
```
GET /api/struktur-organisasi

Response (200):
[
  {
    "id": 1,
    "jabatan": "Kepala Banjar",
    "nama": "I Wayan Suardana",
    "file": "strukturorganisasi-img/kepala.jpg",
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
  }
]
```

### Get All Slider
```
GET /api/slider
```

### Get All Galeri
```
GET /api/galeri
```

### Get All Sejarah
```
GET /api/sejarah
```

### Get All Profil
```
GET /api/profil
```

### Get All Kategori
```
GET /api/kategori
```

### Get All Awig Rules
```
GET /api/awig-rules
```

### Get All Awig File
```
GET /api/awig-file
```

### Get All Penduduk Banjar
```
GET /api/penduduk-banjar
```

---

## Protected CRUD Endpoints (Authentication Required)

### Get Single Item
```
GET /api/{resource}/{id}
Authorization: Bearer {session}

Example:
GET /api/slider/1
```

### Create Item (Admin Only)
```
POST /api/{resource}
Authorization: Bearer {session}
Content-Type: application/json

Example - Create Slider:
POST /api/slider
{
  "title": "New Slider",
  "description": "Description",
  "image": "slider/new.jpg",
  "url": "/page"
}

Response (201):
{
  "id": 3,
  "title": "New Slider",
  "description": "Description",
  "image": "slider/new.jpg",
  "url": "/page",
  "created_at": "2024-01-01T00:00:00.000000Z",
  "updated_at": "2024-01-01T00:00:00.000000Z"
}
```

### Update Item (Admin Only)
```
PUT /api/{resource}/{id}
Authorization: Bearer {session}
Content-Type: application/json

Example - Update Slider:
PUT /api/slider/1
{
  "title": "Updated Title",
  "description": "Updated Description",
  "image": "slider/updated.jpg",
  "url": "/updated-page"
}

Response (200):
{
  "id": 1,
  "title": "Updated Title",
  ...
}
```

### Delete Item (Admin Only)
```
DELETE /api/{resource}/{id}
Authorization: Bearer {session}

Response (200):
{
  "message": "Deleted successfully"
}
```

---

## Available Resources (Services)

1. **struktur-organisasi** - Struktur Kepengurusan Banjar
   - Fields: jabatan, nama, file

2. **slider** - Slider Homepage
   - Fields: title, description, image, url

3. **galeri** - Galeri Foto
   - Fields: title, description, image

4. **sejarah** - Sejarah Banjar
   - Fields: title, content, year_founded

5. **profil** - Profil Banjar
   - Fields: nama, deskripsi, alamat, telepon, email, jam_pelayanan (JSON)

6. **kategori** - Kategori Layanan
   - Fields: nama, deskripsi, jadwal (JSON)

7. **awig-rules** - Peraturan Awig-Awig
   - Fields: bab, judul, isi

8. **awig-file** - File Awig-Awig
   - Fields: nama_file, deskripsi, file_path, tanggal_upload

9. **penduduk-banjar** - Data Penduduk Banjar
   - Fields: nama, nik, status, alamat

---

## User Roles

- **admin** - Can perform all CRUD operations
- **user** - Can only view public data

---

## Default Admin Credentials

```
Email: admin@example.com
Password: password
```

---

## Setup Instructions

1. Run migrations:
```bash
php artisan migrate
```

2. Seed database with sample data:
```bash
php artisan db:seed
```

3. Start the server:
```bash
php artisan serve
```

The API will be accessible at `http://127.0.0.1:8000/api`
