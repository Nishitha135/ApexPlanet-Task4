# 🔒 Secure Blog Management System - Task 4

This project is developed as part of the **ApexPlanet Web Development Internship - Task 4**. It is a secure blog management system built using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**.

---

## 📌 Project Overview

The application allows users to register, log in, and manage blog posts securely. It includes CRUD operations, user authentication, role-based access control, and protection against common web vulnerabilities.

---

## ✨ Features

- 👤 User Registration
- 🔑 User Login & Logout
- 🔒 Password Hashing
- 🛡️ SQL Injection Prevention using Prepared Statements
- ✅ Client-side Form Validation
- ✅ Server-side Form Validation
- 📝 Add New Post
- 📖 View Posts
- ✏️ Edit Posts
- 🗑️ Delete Posts (Admin Only)
- 👑 Role-Based Access Control (Admin & Editor)
- 🔐 Session Management
- 🎨 Responsive and User-Friendly Interface

---

## 🛠️ Technologies Used

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL
- XAMPP
- Git & GitHub

---

## 📂 Project Structure

```
Task4
│── assets
│   ├── css
│   │   └── style.css
│   └── js
│       └── validation.js
│
│── includes
│   ├── db.php
│   ├── auth.php
│   └── admin.php
│
│── index.php
│── register.php
│── login.php
│── logout.php
│── dashboard.php
│── add_post.php
│── view_posts.php
│── edit_post.php
│── delete_post.php
```

---

## 🔒 Security Measures Implemented

- Prepared Statements to prevent SQL Injection
- Password Hashing using `password_hash()`
- Password Verification using `password_verify()`
- Client-side Validation
- Server-side Validation
- Session-Based Authentication
- Role-Based Authorization
- Protected Pages

---

## 🚀 How to Run the Project

1. Install XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy the project folder into:

```
C:\xampp\htdocs\test\Task4
```

4. Open phpMyAdmin.
5. Create the database:

```
task4_db
```

6. Import the required SQL tables.
7. Open your browser and visit:

```
http://localhost/test/Task4/
```
## 👩‍💻 Developed By

**Nishitha Allamneni**

ApexPlanet Web Development Internship - Task 4
