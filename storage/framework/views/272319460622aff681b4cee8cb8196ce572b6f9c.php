<!DOCTYPE html>
<html dir="ltr" lang="en-US" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="<?php echo e($settings->site_name); ?> is a global logistics service provider offering premium shipping, courier, and tracking services worldwide." />
    <meta name="keywords" content="logistics, shipping, freight, courier, transport, global delivery, package tracking" />
    <meta name="author" content="<?php echo e($settings->site_name); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="google-site-verification" content="" />

    <!-- Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Heroicons -->
    <script src="https://unpkg.com/heroicons@2.0.16/24/outline/index.js" type="module"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="<?php echo e(asset('storage/app/public/'.$settings->favicon)); ?>" rel="shortcut icon">
    <title>Welcome to <?php echo e($settings->site_name); ?> - Premium Global Shipping Solutions</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out forwards',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Alpine.js x-cloak directive */
        [x-cloak] {
            display: none !important;
        }


        body {
            top: 0px !important;
        }

        .skiptranslate iframe {
            visibility: hidden !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Smooth transitions */
        * {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="font-inter bg-gray-50" x-data="{ mobileMenuOpen: false, searchOpen: false }" x-cloak>
    <!-- iOS-Compatible Preloader -->
    <div id="preloader" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center" style="-webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px);">
        <div class="text-center">
            <!-- Simplified Animated Logo Container -->
            <div class="w-24 h-24 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <!-- Company Initial or Small Logo -->
                <img src="<?php echo e(asset('storage/app/public/'.$settings->favicon)); ?>" alt="Logo" class="w-12 h-12 object-contain animate-bounce">
            </div>

            <!-- Simple Loading Spinner (more compatible across devices) -->
            <div class="mt-4 flex items-center justify-center space-x-2">
                <div class="w-3 h-3 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0s;"></div>
                <div class="w-3 h-3 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
                <div class="w-3 h-3 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0.4s;"></div>
            </div>
        </div>
    </div>

    <!-- iOS-Compatible Header -->
    <header class="relative bg-white shadow-lg z-50" style="will-change: transform;">
        <!-- Top Bar -->
        <div class="bg-primary-700 text-white py-2">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-clock text-primary-200"></i>
                            <span>Open 24/7 for Global Logistics</span>
                        </div>
                        <div class="hidden md:flex items-center space-x-2">
                            <i class="fas fa-phone text-primary-200"></i>
                            <span>TOLL FREE Support</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-primary-200"></i>
                            <a href="mailto:<?php echo e($settings->contact_email); ?>" class="hover:text-primary-200 transition-colors">
                                <?php echo e($settings->contact_email); ?>

                            </a>
                        </div>
                        <!-- Google Translate with iOS fix -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="flex items-center">
                            <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>"
                                 alt="<?php echo e($settings->site_name); ?>"
                                 class="h-12 w-auto">
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden lg:flex items-center space-x-8">
                        <a href="/" class="text-gray-900 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                            Home
                        </a>
                        <a href="about" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                            About
                        </a>
                        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <button class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600 flex items-center">
                                Services
                                <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                            <div x-show="open"
                                 x-cloak
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-1"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 translate-y-1"
                                 class="absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2">
                                <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-ship mr-3 text-primary-600"></i>Sea/Ocean Freight
                                </a>
                                <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-truck mr-3 text-primary-600"></i>Road Transportation
                                </a>
                                <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-plane mr-3 text-primary-600"></i>Air Freight
                                </a>
                                <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-warehouse mr-3 text-primary-600"></i>Warehousing
                                </a>
                                <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-box mr-3 text-primary-600"></i>Packaging & Storage
                                </a>
                                <a href="diplomatic" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-shield-alt mr-3 text-primary-600"></i>Diplomatic Services
                                </a>
                            </div>
                        </div>
                        <a href="order" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                            Track Shipment
                        </a>
                        <a href="contact" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                            Contact
                        </a>
                    </div>

                    <!-- Search & CTA -->
                    <div class="hidden lg:flex items-center space-x-4">
                        <!-- Quick Track Search -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                    class="p-2 text-gray-500 hover:text-primary-600 transition-colors">
                                <i class="fas fa-search text-lg"></i>
                            </button>
                            <!-- Dropdown for tracking -->
                            <div x-show="open"
                                 x-cloak
                                 style="display: none; position: absolute; right: 0; top: 100%; z-index: 9999; margin-top: 0.5rem;"
                                 class="w-80 bg-white rounded-lg shadow-2xl border border-gray-200 p-4">
                                <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="space-y-3">
                                    <?php echo csrf_field(); ?>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Track Your Shipment</label>
                                        <input type="text"
                                               name="trackingnumber"
                                               placeholder="Enter tracking number..."
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                               required>
                                    </div>
                                    <button type="submit"
                                            class="w-full bg-primary-600 text-white py-2 px-4 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                                        <i class="fas fa-search mr-2"></i>Track Now
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Get Quote Button -->
                        <a href="contact"
                           class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                            Get Quote
                        </a>
                    </div>

                    <!-- iOS-Compatible Mobile Menu Button -->
                    <div class="lg:hidden flex items-center space-x-2">
                        <button type="button"
                                @click="searchOpen = !searchOpen"
                                class="p-3 text-gray-500 hover:text-primary-600 transition-colors">
                            <i class="fas fa-search text-lg"></i>
                        </button>
                        <button type="button"
                                @click="mobileMenuOpen = !mobileMenuOpen"
                                class="p-3 text-gray-500 hover:text-primary-600 transition-colors"
                                aria-label="Toggle menu">
                            <i class="fas fa-bars text-xl" x-show="!mobileMenuOpen" x-cloak></i>
                            <i class="fas fa-times text-xl" x-show="mobileMenuOpen" x-cloak></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Search -->
            <div x-show="searchOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-1"
                 class="lg:hidden border-t border-gray-200 bg-gray-50 px-4 py-4">
                <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="space-y-3">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Track Your Shipment</label>
                        <input type="text"
                               name="trackingnumber"
                               placeholder="Enter tracking number..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                               required>
                    </div>
                    <button type="submit"
                            class="w-full bg-primary-600 text-white py-3 px-4 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                        <i class="fas fa-search mr-2"></i>Track Now
                    </button>
                </form>
            </div>

            <!-- iOS-Compatible Mobile Navigation Menu -->
            <div x-show="mobileMenuOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-0"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-0"
                 class="lg:hidden border-t border-gray-200 bg-white"
                 style="transform: translateZ(0); -webkit-overflow-scrolling: touch;">
                <div class="px-4 py-6 space-y-2">
                    <a href="/" class="block px-3 py-2 text-gray-900 font-medium hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                        Home
                    </a>
                    <a href="about" class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                        About
                    </a>
                    <div x-data="{ servicesOpen: false }">
                        <button @click="servicesOpen = !servicesOpen"
                                class="w-full flex items-center justify-between px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                            Services
                            <i class="fas fa-chevron-down text-xs transition-transform"
                               :class="servicesOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="servicesOpen"
                             x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-1"
                             class="pl-6 mt-2 space-y-2">
                            <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                <i class="fas fa-ship mr-2 text-primary-600"></i>Sea/Ocean Freight
                            </a>
                            <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                <i class="fas fa-truck mr-2 text-primary-600"></i>Road Transportation
                            </a>
                            <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                <i class="fas fa-plane mr-2 text-primary-600"></i>Air Freight
                            </a>
                            <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                <i class="fas fa-warehouse mr-2 text-primary-600"></i>Warehousing
                            </a>
                            <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                <i class="fas fa-box mr-2 text-primary-600"></i>Packaging & Storage
                            </a>
                            <a href="diplomatic" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                <i class="fas fa-shield-alt mr-2 text-primary-600"></i>Diplomatic Services
                            </a>
                        </div>
                    </div>
                    <a href="order" class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                        Track Shipment
                    </a>
                    <a href="contact" class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                        Contact
                    </a>
                    <div class="pt-4 border-t border-gray-200">
                        <a href="contact"
                           class="block w-full text-center bg-primary-600 text-white py-3 px-4 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                            Get Quote
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Error Message Banner -->
        <?php if(Session::has('error')): ?>
        <div class="bg-red-50 border-l-4 border-red-400 p-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            <strong>Error!</strong> You have entered an incorrect tracking number.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>



    </header>



        <?php echo $__env->yieldContent('content'); ?>

        <!-- Modern Footer -->
        <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
            <!-- Main Footer Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div class="lg:col-span-2">
                        <div class="mb-6">
                            <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>"
                                 alt="<?php echo e($settings->site_name); ?>"
                                 class="h-12 w-auto mb-4 filter brightness-0 invert">
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-white"><?php echo e($settings->site_name); ?></h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            Providing Smart Logistics Solutions Across The World. We deliver excellence in shipping,
                            courier services, and package tracking with our global network of trusted partners.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-facebook-f text-white"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-twitter text-white"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-linkedin-in text-white"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="/" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="services" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Our Services
                                </a>
                            </li>
                            <li>
                                <a href="order" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Track Shipment
                                </a>
                            </li>
                            <li>
                                <a href="contact" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Contact Us
                                </a>
                            </li>
                            <li>
                                <a href="diplomatic" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Diplomatic Services
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Contact Info</h4>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-envelope text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Email Us</p>
                                    <a href="mailto:<?php echo e($settings->contact_email); ?>" class="text-white hover:text-primary-400 transition-colors">
                                        <?php echo e($settings->contact_email); ?>

                                    </a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-phone text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Call Us</p>
                                    <p class="text-white">TOLL FREE Support</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Working Hours</p>
                                    <p class="text-white">24/7 Global Support</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Track -->
                        <div class="mt-8">
                            <h5 class="text-sm font-semibold mb-3 text-white">Quick Track</h5>
                            <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="space-y-2">
                                <?php echo csrf_field(); ?>
                                <input type="text"
                                       name="trackingnumber"
                                       placeholder="Enter tracking number..."
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all text-sm">
                                <button type="submit"
                                        class="w-full bg-primary-600 text-white py-2 px-3 rounded-lg hover:bg-primary-700 transition-colors text-sm font-medium">
                                    <i class="fas fa-search mr-1"></i>Track
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                        <div class="text-center md:text-left">
                            <p class="text-gray-400 text-sm">
                                Copyright &copy; <span id="currentYear"></span> <?php echo e($settings->site_name); ?>. All rights reserved.
                            </p>
                        </div>
                        <div class="flex items-center space-x-6 text-sm">
                            <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Privacy Policy</a>
                            <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Terms of Service</a>
                            <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Shipping Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- WhatsApp Float Button -->


    <!-- Core Scripts -->
    <script src="<?php echo e(asset('dash/js/jquery-3.6.0.min.js')); ?>"></script>
    <!-- Alpine.js with iOS compatibility fixes -->
    <script>
        // Fix for iOS Safari issues with Alpine.js
        document.addEventListener('DOMContentLoaded', function() {
            // Force repaint to help with iOS rendering
            document.body.style.display = 'none';
            document.body.offsetHeight; // Trigger reflow
            document.body.style.display = '';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <script>
        // Enhanced preloader functionality for iOS compatibility
        document.addEventListener('DOMContentLoaded', function() {
            // Set a timeout as a fallback in case the load event doesn't fire properly on iOS
            const fallbackTimeout = setTimeout(hidePreloader, 3000); // 3 second fallback

            function hidePreloader() {
                const preloader = document.getElementById('preloader');
                if (preloader) {
                    // Add transition styles programmatically
                    preloader.style.transition = 'opacity 0.5s ease';
                    preloader.style.opacity = '0';

                    // Ensure the preloader is actually hidden
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 500);
                }
                // Clear the fallback timeout if the load event fired properly
                clearTimeout(fallbackTimeout);
            }

            // Try to detect when the page is fully loaded
            window.addEventListener('load', hidePreloader);

            // Set the current year for copyright
            const yearElement = document.getElementById('currentYear');
            if (yearElement) {
                yearElement.textContent = new Date().getFullYear();
            }
        });

        // Google Translate initialization - with iOS compatibility fixes

    </script>

<div class="gtranslate_wrapper"></div>
<script>
    window.gtranslateSettings = {
        default_language: "en",
        alt_flags:{"en":"usa"},
        wrapper_selector: ".gtranslate_wrapper",
        flag_style: "3d",
    };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>


    <!-- Custom Scripts -->
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php echo $__env->make('layouts.livechat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\shyp\resources\views/layouts/base.blade.php ENDPATH**/ ?>