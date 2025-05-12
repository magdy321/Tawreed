#### 📦 Tawreed - Supply Management System

**Tawreed** is a Laravel-based web application designed to manage supply transactions between businesses and clients. It supports recording multiple products per transaction with automatic calculations for totals, paid amounts, and remaining balances.

---

### 🚀 Features

* Create transactions of type: **in (Receiving)** or **out (Delivery)**
* Select client from a dynamic list
* Add multiple products to each transaction
* Input quantity and unit price per product
* Automatic calculation of total, paid, and remaining amounts
* Simple, clean dashboard UI with Bootstrap 5
* Notes field for additional transaction details

---

### 🛠️ Built With

* **Laravel 10**
* **MySQL**
* **Bootstrap 5**

---

### 📷 Screenshot

![Tawreed Dashboard](put-the-image-link-here-if-hosted-or-relative-path-if-in-repo)

---

### 📄 Installation & Setup

1. Clone the repository:

```bash
git clone https://github.com/your-username/tawreed-supply-management-system.git
```

2. Install dependencies:

```bash
composer install
npm install && npm run dev
```

3. Copy `.env.example` to `.env` and update your database credentials.

4. Run migrations:

```bash
php artisan migrate
```

5. Start the server:

```bash
php artisan serve
```
