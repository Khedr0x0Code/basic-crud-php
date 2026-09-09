<div align="center">

# 🗂️ Basic CRUD — PHP

A minimal, clean **CRUD** (Create · Read · Update · Delete) reference implementation using **PHP PDO** with prepared statements — no frameworks, no bloat.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![PDO](https://img.shields.io/badge/PDO-Prepared_Statements-4479A1?style=for-the-badge&logoColor=white)

</div>

---

## ✨ What's Inside

- ✅ **Create** — add items with name + description (`create.php`)
- 📖 **Read** — tabular listing of all items (`index.php`)
- ✏️ **Update** — inline edit page per item (`edit.php`)
- 🗑️ **Delete** — with a JavaScript confirm guard (`delete.php`)
- 🛡️ **PDO prepared statements** throughout — safe from SQL injection
- 🔒 Output escaping via `htmlspecialchars()` to prevent XSS
- ⚠️ Try/catch exception handling on every DB operation

## 🚀 Getting Started

1. Clone the repo:
   ```bash
   git clone https://github.com/Khedr0x0Code/basic-crud-php.git
   ```
2. Create the database and table:
   ```sql
   CREATE DATABASE basiccrud;
   USE basiccrud;
   CREATE TABLE items (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     description TEXT
   );
   ```
3. Update credentials in `dp.php` (host, username, password, database).
4. Run it:
   ```bash
   php -S localhost:8000
   ```
5. Open `http://localhost:8000/index.php`.

## 📁 Structure

| File | Role |
|------|------|
| `dp.php` | PDO connection (host/user/pass/db config) |
| `index.php` | Read — list all items |
| `create.php` | Create new item |
| `edit.php` | Update existing item |
| `delete.php` | Delete item |

## 💡 Why This Repo Exists

A reference for clean, framework-free CRUD with **prepared statements** — useful as a teaching example or a starting skeleton for larger PHP apps.

## 🤝 Contributing

Suggestions and improvements welcome via issues or pull requests.
