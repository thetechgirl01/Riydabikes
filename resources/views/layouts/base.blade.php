<!DOCTYPE html>
<html dir="ltr" lang="en-US" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="{{$settings->site_name}} is a global logistics service provider offering premium shipping, courier, and tracking services worldwide." />
    <meta name="keywords" content="logistics, shipping, freight, courier, transport, global delivery, package tracking" />
    <meta name="author" content="{{$settings->site_name}}" />
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

    <link href="{{ asset('storage/app/public/'.$settings->favicon)}}" rel="shortcut icon">
    <title>This is {{$settings->site_name}} - Best Bike Mobility In Nigeria.</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#fff5f5',
                            100: '#ffe0e0',
                            200: '#ffb3b3',
                            300: '#ff8080',
                            400: '#ff4d4d',
                            500: '#800020',
                            600: '#6b001a',
                            700: '#550015',
                            800: '#400010',
                            900: '#2a000a',
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
                        },
                        lemon: '#FFD600',
                        darkgray: '#4B4B4B',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out forwards',
                        'bounce-slow': 'bounce 2s infinite',
                        'underline-slide': 'underlineSlide 0.3s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        underlineSlide: {
                            '0%': { width: '0%', opacity: '0' },
                            '100%': { width: '100%', opacity: '1' },
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

        /* Custom two-line hamburger icon (replaces default 3-line bars) */
        .menu-icon-two-line {
            width: 24px;
            height: 24px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .menu-icon-two-line span {
            display: block;
            position: absolute;
            width: 20px;
            height: 2px;
            background-color: currentColor;
            border-radius: 2px;
            transition: all 0.25s ease-in-out;
            left: 2px;
        }
        .menu-icon-two-line span:first-child {
            top: 7px;
            transform-origin: left center;
        }
        .menu-icon-two-line span:last-child {
            bottom: 7px;
            transform-origin: left center;
        }
        /* When open (X state): rotate and shift both lines */
        .menu-icon-two-line.open span:first-child {
            transform: rotate(45deg) translate(2px, -1px);
            width: 22px;
        }
        .menu-icon-two-line.open span:last-child {
            transform: rotate(-45deg) translate(2px, 1px);
            width: 22px;
        }
        /* Ensure smooth transitions for the icon container */
        .mobile-menu-btn-custom {
            transition: color 0.2s ease;
        }

        /* Desktop: Logo perfect centering using absolute positioning */
        @media (min-width: 1024px) {
            .desktop-nav-container {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
            }
            .desktop-left-links {
                display: flex;
                align-items: center;
                gap: 2rem;
                flex: 1;
                justify-content: flex-start;
            }
            .desktop-right-actions {
                display: flex;
                align-items: center;
                gap: 1rem;
                flex: 1;
                justify-content: flex-end;
            }
            .logo-absolute-center {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                z-index: 10;
            }
        }

        /* Animated underline for nav links */
        .nav-link {
            position: relative;
            display: inline-block;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #FFD600;
            transition: width 0.3s ease-out;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link.active::after {
            width: 100%;
            background-color: #FFD600;
        }

        /* Enhanced dropdown styling */
        .dropdown-enhanced {
            border-radius: 16px;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(0px);
            overflow: hidden;
        }
        .dropdown-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        .dropdown-item:hover {
            background: linear-gradient(90deg, rgba(255,214,0,0.08) 0%, rgba(255,214,0,0.02) 100%);
            border-left-color: #FFD600;
            padding-left: 1.25rem;
        }
        .dropdown-item i {
            transition: transform 0.2s ease, color 0.2s ease;
        }
        .dropdown-item:hover i {
            transform: translateX(4px);
            color: #FFD600 !important;
        }

        /* Search dropdown styling */
        .search-dropdown-enhanced {
            border-radius: 20px;
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(128,0,32,0.15);
        }
        .track-input-focus:focus {
            border-color: #800020;
            ring-color: #800020;
        }
    </style>
</head>

<body class="font-inter bg-gray-50" x-data="{ mobileMenuOpen: false, searchOpen: false }" x-cloak>
    <!-- iOS-Compatible Preloader -->
  
<div id="preloader"
     class="fixed inset-0 z-[9999] flex items-center justify-center overflow-hidden bg-white">

    <!-- Background Glow -->
    <div class="absolute w-72 h-72 rounded-full blur-3xl"></div>

    <!-- Main Content -->
    <div class="relative flex flex-col items-center">

        <!-- Animated Ring -->
        <div class="relative flex items-center justify-center">

            <!-- Outer Rotating Border -->
            <div class="w-28 h-28 rounded-full border-4 border-[#800020]/20 border-t-[#800020] animate-spin"></div>

            <!-- Inner Logo Circle -->
            <div class="absolute w-20 h-20 rounded-2xl shadow-2xl flex items-center justify-center">

                <img
                    src="{{ asset('storage/app/public/'.$settings->favicon) }}"
                    alt="Logo"
                    class="w-24 h-24 object-contain animate-pulse"
                >
            </div>
        </div>

        <!-- Brand Text -->
        <div class="mt-6 text-center">
            <h2 class="text-[#800020] text-xl font-bold tracking-wide">
                Loading
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                Please wait a moment...
            </p>
        </div>

        <!-- Loading Bar -->
        <div class="mt-6 w-52 h-1.5 bg-gray-200 rounded-full overflow-hidden">
            <div class="h-full w-1/2 bg-white rounded-full animate-[loading_1.5s_ease-in-out_infinite]"></div>
        </div>

    </div>
</div>

<style>
@keyframes loading {
    0% {
        transform: translateX(-100%);
    }
    50% {
        transform: translateX(200%);
    }
    100% {
        transform: translateX(400%);
    }
}
</style>

    <!-- iOS-Compatible Header -->
    <header class="relative bg-black shadow-lg z-50" style="will-change: transform;">
        <!-- Top Bar -->
        <div class="text-white py-2">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-clock text-[#FFD600]"></i>
                            <span>We Are Open 24/7</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-[#FFD600]"></i>
                            <a href="mailto:{{$settings->contact_email}}" class="hover:text-[#FFD600] transition-colors">
                                {{$settings->contact_email}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation - Updated with centered logo, burgundy buttons, animated underlines -->
      <!-- Main Navigation - Updated with centered logo, burgundy buttons, animated underlines -->
<nav class="bg-black border-b border-gray-800" x-data="{ mobileMenuOpen: false, searchOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Desktop container uses relative positioning for absolute logo centering -->
        <div class="flex justify-between items-center h-20 lg:relative desktop-nav-container">
            
            <!-- Mobile Menu Button (Left side on mobile) -->
            <div class="flex items-center lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="text-gray-300 hover:text-[#FFD600] focus:outline-none p-2 rounded-lg transition-colors">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Logo: On mobile stays left, on desktop absolute centered -->
            <div class="flex-shrink-0 flex items-center rounded-full lg:absolute lg:left-1/2 lg:top-1/2 lg:transform lg:-translate-x-1/2 lg:-translate-y-1/2 logo-absolute-center">
                <a href="/" class="flex items-center rounded-full">
                    <img src="{{ asset('storage/app/public/'.$settings->logo)}}"
                         alt="{{$settings->site_name}}"
                         class="h-12 w-auto rounded-full">
                </a>
            </div>

            <!-- Mobile Search Button (Right side on mobile) -->
            <div class="flex items-center lg:hidden">
                <button @click="searchOpen = !searchOpen" 
                        class="p-2 text-gray-300 hover:text-[#FFD600] transition-colors rounded-lg">
                    <i class="fas fa-search text-lg"></i>
                </button>
            </div>

            <!-- Desktop Navigation Links (Left side) with animated underline -->
            <div class="hidden lg:flex lg:items-center desktop-left-links">
                <a href="about" class="nav-link text-white hover:text-[#FFD600] px-3 py-2 text-sm font-medium transition-colors relative group">
                    About
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#FFD600] transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <a href="{{ route('home.shipments.create') }}" class="nav-link text-white hover:text-[#FFD600] px-3 py-2 text-sm font-medium transition-colors relative group">
                    Book Delivery
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#FFD600] transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <a href="order" class="nav-link text-white hover:text-[#FFD600] px-3 py-2 text-sm font-medium transition-colors relative group">
                    Track Delivery
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#FFD600] transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <a href="{{ route('home.bikes.index') }}" class="nav-link text-white hover:text-[#FFD600] px-3 py-2 text-sm font-medium transition-colors relative group">
                    Rent / Buy Bikes
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#FFD600] transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- Desktop Right Section (Search + Contact Button) -->
            <div class="hidden lg:flex lg:items-center desktop-right-actions gap-3">
                <!-- Quick Track Search -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="p-2.5 text-gray-300 hover:text-[#FFD600] transition-colors search-dropdown-container bg-white/5 rounded-full">
                        <i class="fas fa-search text-base"></i>
                    </button>
                    <div x-show="open"
                         x-cloak
                         style="display: none; position: absolute; right: 0; top: 100%; z-index: 9999; margin-top: 0.75rem;"
                         class="w-96 bg-white rounded-2xl shadow-2xl search-dropdown-enhanced p-5 search-dropdown-container">
                        <form method="POST" action="{{ route('trackingresult') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-[#800020] mb-2 flex items-center gap-2">
                                    <i class="fas fa-motorcycle text-[#800020]"></i> Track Your Delivery
                                </label>
                                <input type="text"
                                       name="trackingnumber"
                                       placeholder="Enter RYD tracking ID"
                                       class="track-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all outline-none">
                            </div>
                            <button type="submit"
                                    class="w-full bg-[#800020] text-white py-3 px-4 rounded-full hover:bg-[#6b001a] transition-all font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <i class="fas fa-location-dot"></i> Track Now
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Button -->
                <a href="contact"
                   class="bg-[#800020] text-white px-6 py-2.5 rounded-full hover:bg-[#6b001a] transition-all font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center gap-2 text-sm">
                    <i class="fas fa-headset text-sm"></i> Contact
                </a>
            </div>
        </div>

        <!-- Mobile Search Panel -->
        <div x-show="searchOpen"
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="lg:hidden border-t border-gray-800 bg-gradient-to-b from-gray-900 to-black px-5 py-6">
            <form method="POST" action="{{ route('trackingresult') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-[#FFD600] mb-2 flex items-center gap-2">
                        <i class="fas fa-motorcycle text-sm"></i> Find Your Delivery
                    </label>
                    <input type="text"
                           name="trackingnumber"
                           placeholder="Enter RI tracking ID"
                           class="w-full px-5 py-3.5 border border-gray-700 bg-gray-800 text-white rounded-2xl focus:ring-2 focus:ring-[#FFD600] focus:border-transparent transition-all outline-none text-base"
                           required>
                </div>
                <button type="submit"
                        class="w-full bg-[#800020] text-white py-3.5 px-4 rounded-2xl hover:bg-[#6b001a] transition-all duration-300 font-semibold shadow-lg flex items-center justify-center gap-2">
                    <i class="fas fa-location-dot"></i> Track Delivery
                </button>
            </form>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen"
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden border-t border-gray-800 bg-black"
             style="transform: translateZ(0); -webkit-overflow-scrolling: touch;">
            <div class="px-4 py-6 space-y-2">
                <a href="/" class="block px-3 py-2 text-white font-medium hover:bg-[#800020] hover:text-[#FFD600] rounded-lg transition-colors">Home</a>
                <a href="about" class="block px-3 py-2 text-gray-300 hover:bg-[#800020] hover:text-[#FFD600] rounded-lg transition-colors">About</a>
                <a href="{{ route('home.shipments.create') }}" class="block px-3 py-2 text-gray-300 hover:bg-[#800020] hover:text-[#FFD600] rounded-lg transition-colors">Book Delivery</a>
                <a href="order" class="block px-3 py-2 text-gray-300 hover:bg-[#800020] hover:text-[#FFD600] rounded-lg transition-colors">Track Shipment</a>
                <a href="{{ route('home.bikes.index') }}" class="block px-3 py-2 text-gray-300 hover:bg-[#800020] hover:text-[#FFD600] rounded-lg transition-colors">Rent / Buy Bikes</a>
                <a href="contact" class="block px-3 py-2 text-gray-300 hover:bg-[#800020] hover:text-[#FFD600] rounded-lg transition-colors">Contact</a>
                <div class="pt-4 border-t border-gray-800">
                    <a href="contact"
                       class="block w-full text-center bg-[#800020] text-white py-3 px-4 rounded-xl hover:bg-[#6b001a] transition-colors font-medium shadow-md">
                        Get Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Add Alpine.js if not already included -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Add Font Awesome if not already included -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Additional mobile-specific styles */
    @media (max-width: 1023px) {
        .desktop-nav-container {
            justify-content: space-between;
        }
    }
    
    /* Animation for mobile menu */
    [x-cloak] {
        display: none !important;
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>

        <!-- Error Message Banner -->
        @if (Session::has('error'))
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
        @endif

    </header>

    @yield('content')

    <!-- Modern Footer with RydaBikes branding - Black background -->
    <footer class="bg-black text-white border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Brand Column -->
                <div class="lg:col-span-1">
                    <div class="mb-5">
                        <img src="{{ asset('storage/app/public/'.$settings->logo)}}"
                             alt="{{$settings->site_name}}"
                             class="h-10 w-auto mb-4  rounded-full">
                    </div>
                    <h3 class="text-lg font-bold mb-3 text-white">{{$settings->site_name}}</h3>
                    <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                        Premium bike rental, sales, and delivery services across Nigeria. Your trusted ride partner.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-9 h-9 bg-[#800020] rounded-full flex items-center justify-center hover:bg-[#FFD600] hover:text-[#800020] transition-all duration-300 group">
                            <i class="fab fa-facebook-f text-white text-sm group-hover:text-[#800020]"></i>
                        </a>
                        <a href="#" class="w-9 h-9 bg-[#800020] rounded-full flex items-center justify-center hover:bg-[#FFD600] hover:text-[#800020] transition-all duration-300 group">
                            <i class="fab fa-twitter text-white text-sm group-hover:text-[#800020]"></i>
                        </a>
                        <a href="#" class="w-9 h-9 bg-[#800020] rounded-full flex items-center justify-center hover:bg-[#FFD600] hover:text-[#800020] transition-all duration-300 group">
                            <i class="fab fa-instagram text-white text-sm group-hover:text-[#800020]"></i>
                        </a>
                        <a href="https://wa.me/+2349128526785" class="w-9 h-9 bg-[#800020] rounded-full flex items-center justify-center hover:bg-[#FFD600] hover:text-[#800020] transition-all duration-300 group">
                            <i class="fab fa-whatsapp text-white text-sm group-hover:text-[#800020]"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-base font-semibold mb-5 text-white border-l-3 border-[#FFD600] pl-3">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-[#FFD600] transition-colors flex items-center text-sm"><i class="fas fa-angle-right text-xs mr-2 text-[#FFD600]"></i>Home</a></li>
                        <li><a href="about" class="text-gray-400 hover:text-[#FFD600] transition-colors flex items-center text-sm"><i class="fas fa-angle-right text-xs mr-2 text-[#FFD600]"></i>About Us</a></li>
                        <li><a href="services" class="text-gray-400 hover:text-[#FFD600] transition-colors flex items-center text-sm"><i class="fas fa-angle-right text-xs mr-2 text-[#FFD600]"></i>Our Services</a></li>
                        <li><a href="order" class="text-gray-400 hover:text-[#FFD600] transition-colors flex items-center text-sm"><i class="fas fa-angle-right text-xs mr-2 text-[#FFD600]"></i>Track Delivery</a></li>
                        <li><a href="contact" class="text-gray-400 hover:text-[#FFD600] transition-colors flex items-center text-sm"><i class="fas fa-angle-right text-xs mr-2 text-[#FFD600]"></i>Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-base font-semibold mb-5 text-white border-l-3 border-[#FFD600] pl-3">Contact Info</h4>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <div class="w-7 h-7 bg-[#800020] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-envelope text-white text-xs"></i></div>
                            <div><p class="text-gray-400 text-xs">Email Us</p><a href="mailto:{{$settings->contact_email}}" class="text-white text-sm hover:text-[#FFD600] transition-colors">{{$settings->contact_email}}</a></div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-7 h-7 bg-[#800020] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-phone text-white text-xs"></i></div>
                            <div><p class="text-gray-400 text-xs">Call Us</p><p class="text-white text-sm">+234 800 000 0000</p></div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-7 h-7 bg-[#800020] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-clock text-white text-xs"></i></div>
                            <div><p class="text-gray-400 text-xs">Working Hours</p><p class="text-white text-sm">Mon - Sun: 24/7</p></div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-7 h-7 bg-[#800020] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-map-marker-alt text-white text-xs"></i></div>
                            <div><p class="text-gray-400 text-xs">Location</p><p class="text-white text-sm">Lagos, Nigeria</p></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Track -->
                <div>
                    <h4 class="text-base font-semibold mb-5 text-white border-l-3 border-[#FFD600] pl-3">Track Your Delivery</h4>
                    <form method="POST" action="{{ route('trackingresult') }}" class="space-y-3">
                        @csrf
                        <div class="relative">
                            <input type="text" name="trackingnumber" placeholder="Enter tracking ID..." class="w-full px-4 py-2.5 bg-gray-900 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:ring-2 focus:ring-[#FFD600] focus:border-transparent transition-all text-sm">
                            <i class="fas fa-search absolute right-3 top-3 text-gray-500 text-sm"></i>
                        </div>
                        <button type="submit" class="w-full bg-[#800020] text-white py-2.5 rounded-xl hover:bg-[#6b001a] transition-all duration-300 text-sm font-semibold flex items-center justify-center gap-2">
                            <i class="fas fa-location-dot"></i> Track Now
                        </button>
                    </form>
                    <div class="mt-6 pt-4 border-t border-gray-800">
                        <p class="text-gray-500 text-xs text-center">Need help? <a href="contact" class="text-[#FFD600] hover:underline">Contact support</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 bg-black/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <div class="text-center md:text-left">
                        <p class="text-gray-500 text-xs">Copyright &copy; <span id="currentYear"></span> {{$settings->site_name}}. All rights reserved.</p>
                    </div>
                    <div>
                     <p>Built with &lt;/&gt; by <a href="https://crownatech.com/" target="_blank" class="text-[#FFD600] hover:underline">Crownatech</a></p>
                    <span>
                        
                </span>
                    </p>
</div>

                    <div class="flex items-center space-x-5 text-xs">
                        <a href="#" class="text-gray-500 hover:text-[#FFD600] transition-colors">Privacy Policy</a>
                        <span class="text-gray-700">|</span>
                        <a href="#" class="text-gray-500 hover:text-[#FFD600] transition-colors">Terms of Service</a>
                        <span class="text-gray-700">|</span>
                        <a href="#" class="text-gray-500 hover:text-[#FFD600] transition-colors">Refund Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core Scripts -->
    <script src="{{asset('dash/js/jquery-3.6.0.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.display = 'none';
            document.body.offsetHeight;
            document.body.style.display = '';
            const fallbackTimeout = setTimeout(hidePreloader, 3000);
            function hidePreloader() {
                const preloader = document.getElementById('preloader');
                if (preloader) {
                    preloader.style.transition = 'opacity 0.5s ease';
                    preloader.style.opacity = '0';
                    setTimeout(() => { preloader.style.display = 'none'; }, 500);
                }
                clearTimeout(fallbackTimeout);
            }
            window.addEventListener('load', hidePreloader);
            const yearElement = document.getElementById('currentYear');
            if (yearElement) yearElement.textContent = new Date().getFullYear();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>

    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = { default_language: "en", alt_flags:{"en":"usa"}, wrapper_selector: ".gtranslate_wrapper", flag_style: "3d" };
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    @yield('scripts')
</body>
</html>
@include('layouts.livechat')