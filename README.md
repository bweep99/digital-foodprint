# 🌱 Digital Foodprint

**Digital Foodprint** is an educational web application that explores agriculture, sustainability, and food traceability through interactive and informative sections. It is built using **HTML, CSS, JavaScript**, and **PHP (CodeIgniter 4)** as the backend framework.

---

## 📦 Built On: CodeIgniter 4

CodeIgniter is a lightweight, fast, and secure full-stack PHP framework. More information can be found at the [official CodeIgniter site](https://codeigniter.com).

This project is based on the [CodeIgniter 4 App Starter](https://github.com/codeigniter4/CodeIgniter4), installable via Composer.

---

## 🔍 Website Structure

The web application consists of 3 main pages:

- **Home (`index.html`)** – Landing page with introductory information.
- **Trace & Taste** – Explore where your food comes from.
- **Growpedia** – Learn about agricultural terms and techniques through fun games.


---

## 📁 Folder Structure

```
digital-foodprint/
├── app/
│   ├── Config/
│   │   ├── Boot/
│   │   │   ├── development.php
│   │   │   ├── production.php
│   │   │   └── testing.php
│   │   ├── App.php
│   │   ├── Autoload.php
│   │   ├── Cache.php
│   │   ├── Commands.php
│   │   ├── ContentSecurityPolicy.php
│   │   ├── Constants.php
│   │   ├── Cors.php
│   │   ├── Database.php
│   │   ├── Doctype.php
│   │   ├── Email.php
│   │   ├── Encryption.php
│   │   ├── Events.php
│   │   ├── Exceptions.php
│   │   ├── Filters.php
│   │   ├── Format.php
│   │   ├── Generators.php
│   │   ├── Honeypot.php
│   │   ├── Images.php
│   │   ├── Inflector.php
│   │   ├── Kint.php
│   │   ├── Logger.php
│   │   ├── Mimes.php
│   │   ├── Modules.php
│   │   ├── Paths.php
│   │   ├── Registrar.php
│   │   ├── Routes.php
│   │   ├── Security.php
│   │   ├── Services.php
│   │   ├── Session.php
│   │   ├── Toolbar.php
│   │   └── Validation.php
│   ├── Controllers/
│   │   ├── Articles.php
│   │   ├── BaseController.php
│   │   └── Home.php
│   ├── Database/
│   │   ├── Migrations/.gitkeep
│   │   └── Seeds/.gitkeep
│   ├── Filters/.gitkeep
│   ├── Helpers/.gitkeep
│   ├── Language/
│   │   ├── en/
│   │   │   └── Validation.php
│   │   └── .gitkeep
│   ├── Libraries/.gitkeep
│   ├── Models/
│   │   ├── .gitkeep
│   │   └── simplearticlemodel.php
│   ├── ThirdParty/.gitkeep
│   └── Views/
│       ├── articles/
│       │   ├── index.php
│       │   └── view.php
│       ├── errors/
│       │   ├── cli/
│       │   │   ├── error_404.php
│       │   │   └── error_exception.php
│       │   └── html/
│       │       ├── error_400.php
│       │       ├── debug.css
│       │       ├── debug.js
│       │       └── production.php
│       ├── home/
│       │   ├── agritales.php
│       │   ├── ecobit.php
│       │   ├── growpedia.php
│       │   ├── index.php
│       │   ├── nusantara.php
│       │   ├── ship_it_out.php
│       │   └── tracetaste.php
│       ├── layouts/
│       │   ├── main.php
│       │   └── stuff.css
│       └── welcome_message.php
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   ├── agritales.css
│   │   │   ├── growpedia.css
│   │   │   ├── styles.css
│   │   │   └── tracetaste.css
│   │   ├── images/
│   │   │   ├── agriculture/
│   │   │   ├── growpedia/
│   │   │   ├── homepage/
│   │   │   └── tracetaste/
│   │   │       ├── jawa/
│   │   │       ├── kalimantan/
│   │   │       ├── sumatra/
│   │   │       └── trucks/
│   │   └── js/
│   │       └── script.js
│   ├── .htaccess
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
│
├── tests/
│   ├── database/ExampleDatabaseTest.php
│   ├── session/ExampleSessionTest.php
│   ├── unit/HealthTest.php
│   ├── _support/
│   │   ├── Database/
│   │   │   ├── Migrations/
│   │   │   │   └── 2020-02-22-222222_example_migration.php
│   │   │   └── Seeds/
│   │   │       └── ExampleSeeder.php
│   │   ├── Libraries/
│   │   │   └── ConfigReader.php
│   │   └── Models/
│   │       └── ExampleModel.php
│   ├── .htaccess
│   ├── index.html
│   └── README.md
│
├── writable/
│   ├── cache/index.html
│   ├── logs/index.html
│   ├── session/index.html
│   ├── uploads/index.html
│   ├── .htaccess
│   ├── articles.json
│   └── index.html
│
├── .env
├── .gitignore
├── LICENSE
├── builds
├── composer.json
├── composer.lock
├── env
├── phpunit.xml.dist
├── preload.php
└── spark


---

## 🚀 Features

- Responsive layout with modular styles and scripts
- Interactive sections on food traceability and sustainability
- Organized file structure for scalability
- CodeIgniter backend for future dynamic features

---

## ⚙️ Installation & Setup

1. **Clone this repository**
   ```bash
   git clone https://github.com/bweep99/digital-foodprint.git
   cd digital-foodprint
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Copy the environment file**
   ```bash
   cp env .env
   ```

4. **Configure `.env`**
   - Set `app.baseURL` to your localhost or domain
   - Configure database if needed

5. **Run the app**
   Make sure your web server (e.g., Apache, Nginx, or PHP built-in server) points to the `/public` directory.

---

## 💡 Development Notes

- CSS and JS files are modularized per page
- All assets are stored inside `/public/assets/`
- Backend logic (e.g. forms, APIs) can be implemented via `app/Controllers` and `app/Models`

---

## 🛠 Server Requirements

- PHP 8.1 or higher
- PHP extensions: intl, mbstring, json, curl, mysqlnd (if using MySQL)

> ℹ️ PHP 8.0 and 7.4 are no longer supported


## 📖 Learn More

- [CodeIgniter 4 Docs](https://codeigniter.com/user_guide/)
- [PHP Manual](https://www.php.net/manual/en/)
- [HTML/CSS/JS Basics](https://developer.mozilla.org/)