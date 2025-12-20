🌿 GreenLeaf – Smart Plant Marketplace & Care Guide System

GreenLeaf is a full-stack web application developed as part of the Web Programming Practice Lab.
The system modernizes plant buying and plant care learning by providing a secure, role-based online marketplace for buyers, sellers, and administrators.

📌 Project Information

Project Title: GreenLeaf – Smart Plant Marketplace & Care Guide System

Course Name: Web Programming Practice Lab

Instructor: Lukman Nakib

Institution: Metropolitan University

👩‍💻 Team Members
Name:Anika Tahsin 

Student ID:231-134-004

Name:Suchana Rani Das

Student ID:232-134-014


🧩 Problem Statement

Plant buyers often struggle to find:

Reliable sellers

Accurate plant care instructions

A trusted and organized marketplace

At the same time, small nursery owners lack:

A digital platform to sell plants

Tools to manage inventory and orders

Administrators also lack a centralized system to manage users, sellers, and listings.

💡 Proposed Solution

GreenLeaf solves these problems by offering a centralized web platform with role-based dashboards:

Buyers can browse plants, add to cart, checkout, wishlist items, and access plant care guides.

Sellers can list plants, manage stock, and handle customer orders.

Admins can manage users, approve sellers, and monitor system activity.

🛠️ Technology Stack
Backend

PHP (Laravel Framework)

Laravel Breeze (Authentication)

SQLite (Database)

MVC Architecture

RESTful Controllers

Role-based Middleware

Frontend

Laravel Blade

Tailwind CSS

Alpine.js

Responsive UI design

Tools

Composer

Node.js & npm

Vite

Git & GitHub

👥 User Roles & Features
👤 Buyer

Browse plants after login

View plant details & care guide

Add plants to cart

Checkout and place orders

Track order status

Wishlist management

Profile management

🧑‍🌾 Seller

Add new plant listings

Edit or delete plants

Manage plant stock

View orders related to their products

Update order status

Manage shop profile

🛡 Administrator

Manage users and sellers

Approve or reject seller accounts

Monitor platform activity

Control system access

📄 Core Pages Implemented

Home Page (role-based)

Login / Signup

Buyer Dashboard

Seller Dashboard

Admin Dashboard

Profile Management

Settings Page

404 / Error Page

🗄️ Database Overview

Main tables used:

users

products

carts

cart_items

orders

Relationships are handled using Eloquent ORM.

⚙️ Setup Guide (Quick Start)
# 1. Install dependencies
composer install
npm install

# 2. Create environment file
cp .env.example .env
php artisan key:generate

# 3. Database (SQLite)
touch database/database.sqlite
php artisan migrate

# 4. Storage link
php artisan storage:link

# 5. Run the project
npm run dev
php artisan serve


📍 Access the application at:
http://127.0.0.1:8000

🔐 Authentication & Security

Secure login & registration using Laravel Breeze

Role-based route protection using middleware

Server-side validation and error handling

Protected dashboards for each role
