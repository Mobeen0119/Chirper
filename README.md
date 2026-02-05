<h1> Chirper: Speak Your Mind </h1>
A sleek, high-performance social micro-blogging platform built with the TALL stack (Tailwind, Alpine.js, Laravel, Livewire). This isn't just a basic tutorial app; it’s a fully authenticated, dark-mode optimized experience designed for speed and aesthetic.

<h2>Features</h2>
Secure Authentication: Powered by Laravel Breeze for robust, industry-standard security.

Sleek Dark UI: A custom-engineered "Midnight" theme using Tailwind CSS and Glassmorphism.

Real-time Feel: Smooth transitions and animations for a modern user experience.

User Ownership: Full CRUD functionality where users own their data.

Responsive Design: Fluid layouts that look stunning on mobile, tablet, and desktop.

🛠️ The Tech Stack
Framework: Laravel 12

Styling: Tailwind CSS & DaisyUI

Frontend Logic: Alpine.js

Icons: Heroicons

🚀 Quick Start
To get this project running locally, follow these steps:

1. Clone the repository
Bash
git clone https://github.com/your-username/chirper.git
cd chirper
2. Install dependencies
Bash
composer install
npm install && npm run dev
3. Environment Setup
Bash
cp .env.example .env
php artisan key:generate
4. Database Migration
Note: Ensure your database credentials are set in .env

Bash
php artisan migrate
5. Launch
Bash
php artisan serve
Visit http://127.0.0.1:8000 and start chirping!
