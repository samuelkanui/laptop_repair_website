# Laptop Doctors - Modern Repair Services Platform

A premium, high-performance web application for a laptop repair and software service business. Built with a modern full-stack architecture, it features a sleek, dark-themed UI with sophisticated animations, WebGL shaders, and 3D interactive elements.

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
-   **WebGL Shaders**: 
    - Custom **Dotted Surface** wave animation (Hero Section).
    - **Neon Crystal City** infinite flyover shader (Services Background).
    - **Spiral Animation** hypnotic 3D shader effect.
-   **GSAP**: High-performance animations for card interactions and page transitions.
-   **Radix Vue**: Accessible primitive components (Accordion, Dialog, etc.).
-   **Three.js**: Powering interactive 3D elements.
-   **Lucide Vue**: Modern, consistent icon set.

## 🛠️ Getting Started

### Prerequisites
-   **PHP**: 8.2 or higher
-   **Node.js**: 20.x or higher
-   **Composer**: Latest version
-   **Database**: MySQL or SQLite

### Installation

1.  **Clone the repository**
    ```bash
    git clone <repository_url>
    cd laptop-doctors
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Database Setup**
    Configure your `.env` file with your database credentials, then run:
    ```bash
    php artisan migrate
    ```

5.  **Start Development Server**
    ```bash
    npm run dev
    ```
    This command will start both the Vite dev server and the Laravel server (using concurrently).

## ✨ Key Features

### 🖥️ Customer Facing
-   **Interactive Home Page**:
    -   **3D Hero Section**: Dynamic white dotted wave animation with mouse interactivity.
    -   **Brand Marquee**: Infinite scrolling list of 20+ supported brands with auto-color switching.
    -   **Stacked Process Cards**: Interactive "How It Works" cards showing the 4-step repair journey.
    -   **Text Hover Effect**: Dynamic SVG-based text paths for branding.
-   **Services Experience**:
    -   **Neon City Shader**: Immersive high-tech background for service exploration.
    -   **Detailed Catalog**: Hardware Repairs (Microsoldering, Liquid Damage), Upgrades, and Software Solutions.
-   **Contact & FAQ**:
    -   **Atmospheric Bell Hero**: Interactive bell-lamp hero that transitions to "Service Ready" state.
    -   **Glassmorphic FAQ**: Premium accordion system with frosted-glass effects and hover glows.
    -   **Smart Form UX**: Focus-aware input fields with cyan glow effects and real-time validation.
-   **About Page**: Responsive mission statement and expertise showcase using specialized **GlowCards**.

### 🔐 User & System (Fortify)
-   **Authentication**: Secure Login, Registration, and Password Reset.
-   **Security**: Two-Factor Authentication (2FA) with QR Code setup and Recovery Codes.
-   **Profile Management**: Comprehensive settings for profile info, passwords, and security.

## 📂 Project Structure

-   `app/`: Laravel logic (Models, Controllers, Mailables, Actions).
-   `resources/js/`:
    -   `pages/`: Inertia Page components (`Welcome.vue`, `Services.vue`, `Contact.vue`, `About.vue`).
    -   `components/ui/`: Modular UI system.
        -   `BellLoader.vue`: Interactive bell hero.
        -   `NeonCrystalCity.vue`: WebGL city shader.
        -   `DottedSurface.vue`: 3D wave animation.
        -   `GlowCard.vue`: Interactive lighting cards.
        -   `SpiralAnimation.vue`: Hypnotic spiral shader.
    -   `lib/`: Utility functions (`cn` for Tailwind merging).
-   `routes/`:
    -   `web.php`: Core application routing.

## 🎨 Design Philosophy

The "Laptop Doctors" aesthetic is defined by **Premium Dark Design**:
-   **Visual Hierarchy**: Pure black backgrounds (`#000000`) paired with cyan accents (`#06B6D4`) and subtle border glows.
-   **Glassmorphism**: Extensive use of `backdrop-blur-md` and low-opacity whites (`bg-white/[0.03]`) for depth.
-   **Motion**: Orchestrated entry animations using GSAP and Tailwind's `animate-in` variants for a living UI.

## 📄 License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
