# 🧩 Project API

RESTful API CRUD untuk tabel **User** (`id`, `username`, `email`, `password`) menggunakan **PHP Native + MySQL**.

## 🚀 Fitur CRUD Lengkap
- **GET /users** → Menampilkan semua data user  
- **GET /users/{id}** → Menampilkan 1 user berdasarkan `id`  
- **POST /users** → Menambahkan data user baru  
- **PUT /users/{id}** → Mengubah data user  
- **DELETE /users/{id}** → Menghapus data user  

---

## 🗂️ Struktur Folder
project-api/
│
├── config/
│ └── Database.php # Koneksi ke database MySQL
│
├── controllers/
│ └── UserController.php # Logika CRUD untuk tabel user
│
├── index.php # Router utama API
└── README.md # Dokumentasi project

---

## ⚙️ Cara Menjalankan
1. Jalankan **Laragon** atau **XAMPP**.  
2. Letakkan folder `project-api` di dalam `htdocs` atau `www`.  
3. Buat database dengan nama `db_project_api`.  
4. Buat tabel `users` dengan struktur berikut:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255)
);

Jalankan di browser atau Postman:
http://localhost/project-api/

📮 Contoh Request API
🔹 POST /users

Body (JSON):

{
  "username": "yulda",
  "email": "yulda@gmail.com",
  "password": "123456"
}

🔹 PUT /users/1

Body (JSON):

{
  "username": "yulda_update",
  "email": "yulda_update@gmail.com",
  "password": "654321"
}

🔹 DELETE /users/1

Menghapus data user dengan ID = 1

🧠 Teknologi yang Digunakan

PHP Native

MySQL

RESTful API

Laragon / XAMPP

✍️ Author

Yulda Sattu
📧 [yulda@gmail.com
]
💻 GitHub: @yuldaganteng


---

### Langkah selanjutnya
1. Buka folder `project-api` di VS Code.  
2. Buat file baru bernama **`README.md`**.  
3. Tempel isi di atas.  
4. Simpan dan jalankan perintah berikut di terminal:

```bash
git add README.md
git commit -m "add README documentation"
git push
