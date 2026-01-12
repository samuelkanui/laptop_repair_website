# Laptop Doctors - Modern Repair Services Platform

A premium, high-performance web application for a laptop repair and software service business. Built with a modern full-stack architecture, it features a sleek, dark-themed UI with sophisticated animations and 3D interactive elements.

## 🚀 Technology Stack

### Backend
-   **Framework**: [Laravel 12](https://laravel.com)
-   **Authentication**: [Laravel Fortify](https://laravel.com/docs/fortify) (Secure backend-only auth implementation with 2FA support)
-   **Database**: MySQL (Default) / SQLite (Supported)

### Frontend
-   **Framework**: [Vue 3](https://vuejs.org) (Composition API, `<script setup>`)
-   **SPA Protocol**: [Inertia.js 2.0](https://inertiajs.com) (Seamless monorepo experience)
-   **Language**: TypeScript
-   **Styling**: [Tailwind CSS 4.0](https://tailwindcss.com)
-   **Build Tool**: [Vite 7.0](https://vitejs.dev)

### UI & Animations
-   **Three.js**: Custom 3D "Dotted Surface" wave animation in the Hero section.
-   **GSAP**: High-performance animations for interactions.
-   **Lucide Vue**: Modern, consistent icon set.
-   **Component Architecture**: Modular, Shadcn-like structure (`resources/js/components/ui/`).

## ✨ Key Features

### 🖥️ Customer Facing
-   **Interactive Home Page**:
    -   **3D Hero Section**: Dynamic white dotted wave animation.
    -   **Brand Marquee**: Infinite scrolling list of supported brands (Apple, Dell, HP, etc.) with auto-color switching.
    -   **Stacked Process Cards**: Interactive "How It Works" section showing the 4-step repair process (Diagnosis -> Quote -> Repair -> Pickup).
    -   **Floating Footer**: Premium "Card-style" footer with rainbow hover effects and "Laptop Doctors" branding.
-   **Service Pages**: Detailed breakdown of Hardware and Software services.
-   **Contact System**: Integrated contact form with backend email handling.
-   **About Page**: Company mission and values.

### 🔐 User & System (Fortify)
-   **Authentication**: Login, Registration, Password Reset.
-   **Security**: Two-Factor Authentication (2FA) with QR Code setup and Recovery Codes.
-   **Profile Management**: Update profile information and passwords.
-   **Dashboard**: User dashboard for managing account settings.

## 🛠️ Installation & Setup

1.  **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/laptop-doctors.git
    cd laptop-doctors
    ```

2.  **Install PHP Dependencies**:
    ```bash
    composer install
    ```

3.  **Install Node.js Dependencies**:
    ```bash
    npm install
    ```

4.  **Environment Setup**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configure your database credentials in the `.env` file.*

5.  **Database Migration**:
    ```bash
    php artisan migrate
    ```

6.  **Build Assets**:
    ```bash
    npm run build
    ```

7.  **Run Development Server**:
    ```bash
    php artisan serve
    ```
    *The site will be available at http://localhost:8000*

## 📂 Project Structure

-   `app/`: Core Laravel application logic (Models, Controllers, Mailables).
-   `resources/js/`:
    -   `pages/`: Inertia Page components (Welcome, About, Contact).
    -   `components/ui/`: Reusable UI components (Navbar, Footer, Animations).
    -   `lib/`: Utility functions (e.g., `utils.ts` for Tailwind class merging).
-   `routes/`:
    -   `web.php`: Application routes (Home, About, Contact).
    -   `auth.php`: Authentication routes (handled by Fortify).

## 🎨 Design Philosophy

The design mandates a "Premium Dark Mode" aesthetic:
-   **Colors**: Deep blacks (`#000000`, `#0F0F11`) contrasted with bright white text and subtle blue/purple accents.
-   **Typography**: Clean sans-serif fonts (Inter/Geist) for readability.
-   **Motion**: Every interaction provides feedback. Elements fade in, hover states expand, and the background remains alive with subtle motion.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
