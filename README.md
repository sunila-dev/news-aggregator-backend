# 📰 News Aggregator Backend

A Laravel-based backend system that fetches articles from multiple news sources (NewsAPI, OpenNews, NewsCred) and stores them in a MySQL database.  
It exposes a REST API to retrieve articles with filters like source, search keywords, and published date.

---

## 🚀 Features
- **Article Fetching** from multiple sources using APIs (extensible architecture).
- **Source Management** – stores all data articles in a `article` table.
- **Duplicate Prevention** – uses `updateOrCreate()` to avoid storing the same article multiple times.
- **Filterable API** – fetch articles by:
  - `source_id`
  - `search` (title keyword search)
  - `date` (published date)
- **Scheduled Fetching** – automatic cron-based fetching every hour.

---

## 🛠 Tech Stack
- **Framework:** Laravel 11-12
- **Database:** MySQL
- **HTTP Client:** Laravel HTTP Client 
- **Task Scheduling:** Laravel Scheduler
- **Language:** PHP 8.2

---

## 📂 Project 
# 📰 News Aggregator Backend

A Laravel-based backend system that fetches news articles from multiple sources (NewsAPI, OpenNews, NewsCred), stores them in a MySQL database, and exposes REST APIs for consuming the data.  
Built with a clean architecture (Controllers → Services → Repositories) for maintainability and easy extension.

---

## 🚀 Features
- Fetches articles from multiple sources using dedicated fetcher services.
- Stores articles in a relational database with proper source mapping.
- Provides paginated REST APIs with filtering and search.
- Prevents duplicate article insertion using `updateOrCreate`.
- Supports scheduled fetching via Laravel scheduler (can run automatically in production).

---

## 📦 Project Setup

```bash
### Clone Repository

git clone https://github.com/<your-username>/news-aggregator-backend.git
cd news-aggregator-backend

Install Composer

- composer install

### Configure Environment
cp .env.example .env

### Run Migrations & Seed Database

- php artisan migrate --seed

This will create sources and articles tables and seed the sources.

### Running the Application

- php artisan serve

http://127.0.0.1:8000/api/v1/articles

### Manually execute

php artisan api:fetch-articles

### Schedular

- php artisan schedule:run

http://127.0.0.1:8000/api/v1/articles
http://127.0.0.1:8000/api/v1/articles/{id}

eg. http://127.0.0.1:8000/api/v1/articles/4

Output should be like
[
  {
    "id": 4,
    "source_id": 3,
    "title": "Healthcare Innovations",
    "description": "New healthcare technologies are emerging...",
    "author": "Bob Martin",
    "url": "https://newscred.example.com/healthcare-innovations",
    "image_url": null,
    "published_at": "2025-09-19 12:47:06",
    "created_at": "2025-09-19T12:47:06.000000Z",
    "updated_at": "2025-09-19T12:47:06.000000Z",
    "source": {
      "id": 3,
      "name": "NewsCred",
      "endpoint_url": "https://api.newscred.com/v3/articles",
      "auth_key": null,
      "created_at": "2025-09-19T10:08:05.000000Z",
      "updated_at": "2025-09-19T10:08:05.000000Z"
    }
  }
]


