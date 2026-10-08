# 🏠 PropertyHub

A full-stack real estate web application where owners can list properties for sale or rent, and buyers/tenants can search, review, and book them. An admin panel controls user management and approves property listings.

> 

---

## ✨ Features

- **Role-based access:** Admin, Owner, and User (buyer/tenant) with separate dashboards
- **Property listings:** Add properties for sale or rent with multiple images, price, area, beds/baths, state and city
- **Admin approval:** Listings go live only after admin approval
- **Search & filter:** Browse properties by type, location, and price
- **Rent & purchase flow:** Request rent or buy properties
- **Payments:** Payment module for bookings/deposits (demo only, no real transactions)
- **Reviews:** Users can leave reviews on properties
- **Contact form:** Visitors can send messages to the admin
- **AJAX:** Dynamic, no-reload interactions in parts of the app

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML, CSS, JavaScript, AJAX |
| Backend | PHP |
| Database | MySQL |
| Local server | XAMPP / WAMP / LAMP |

---

## 🗄️ Database

The database has 7 related tables:

`tbl_admin` · `tbl_user` · `tbl_property` · `tbl_rent` · `tbl_payment` · `tbl_review` · `tbl_contact`

---

## 🚀 Getting Started

### Prerequisites
- XAMPP / WAMP / LAMP (PHP 7.4+ and MySQL)
- A web browser

### Installation


1. **Move the project into your server folder**
   - XAMPP: `C:/xampp/htdocs/`
   - WAMP: `C:/wamp64/www/`

2. **Start Apache and MySQL** from the XAMPP/WAMP control panel.

3. **Create the database and import the SQL file**
   - Open `http://localhost/phpmyadmin`
   - Create a new database named `propertyhub`   

4. **Configure the database connection**
   Open the PHP file that holds your database connection and set your own credentials:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";            // your MySQL password
   $db   = "propertyhub";
   ```

5. **Run the project**
   ```
   http://localhost/<project-folder-name>/
   ```

---

## 🔑 Demo Login Credentials

| Role | Email | Password |
|---|---|---|
| **Admin** | `admin@example.com` | `admin123` |
| **User 1** (Buyer / Tenant) | `user1@example.com` | `user123` |
| **User 2** (Property Owner) | `user2@example.com` | `user123` |


---


## 📁 Project Structure

```
PropertyHub_Main/
├── admin/            # Admin panel pages
├── user/             # User & owner pages
├── uploads/          # Uploaded property images
├── css/ js/ images/  # Assets
├── propertyhub.sql   # Database structure + demo data
└── README.md
```

---


## 🤝 Contributing

Suggestions and improvements are welcome. Fork the repo, create a feature branch, and open a pull request.

---


---

⭐ If you like this project, give it a star!
