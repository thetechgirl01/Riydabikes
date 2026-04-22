<!DOCTYPE html>
<html lang="en" data-theme="<?php echo e($settings->usertheme); ?>" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="author">
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('storage/app/public/' . $settings->favicon)); ?>" sizes="any">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                    },
                    fontFamily: {
                        sans: ['Open Sans', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="<?php echo e(asset('themes/dashly/assets/ext/font/bootstrap-icons.css')); ?>">
    
    <!-- Original theme CSS (keeping for compatibility) -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/dashly/assets/css/theme.bundle.css')); ?>" id="stylesheetLTR">
    <link rel="stylesheet" href="<?php echo e(asset('themes/dashly/assets/css/theme.rtl.bundle.css')); ?>" id="stylesheetRTL" disabled>
    
    <!-- Custom Styles -->
    <style>
        /* Base styles */
        body {
            font-family: 'Open Sans', sans-serif;
        }
        
        /* Animation utilities */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
        
        /* Dark mode handling */
        [data-theme="dark"] {
            --tw-bg-opacity: 1;
            background-color: rgba(17, 24, 39, var(--tw-bg-opacity));
            color: rgba(243, 244, 246, var(--tw-text-opacity));
        }
        
        [data-theme="dark"] .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
        }
        
        [data-theme="dark"] .text-gray-800 {
            --tw-text-opacity: 1;
            color: rgba(229, 231, 235, var(--tw-text-opacity));
        }
        
        [data-theme="dark"] .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgba(209, 213, 219, var(--tw-text-opacity));
        }
        
        [data-theme="dark"] .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgba(156, 163, 175, var(--tw-text-opacity));
        }
        
        [data-theme="dark"] .border-gray-300 {
            --tw-border-opacity: 1;
            border-color: rgba(75, 85, 99, var(--tw-border-opacity));
        }
        
        [data-theme="dark"] .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
        }
    </style>
    
    <!-- Theme Switcher Script -->
    <script>
        // Theme switcher
        const getPreferredTheme = () => {
            if (localStorage.getItem('theme') != null) {
                return localStorage.getItem('theme');
            }
            return document.documentElement.dataset.theme;
        };

        const setTheme = function(theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                    'dark' : 'light';
            } else {
                document.documentElement.dataset.theme = theme;
            }
            localStorage.setItem('theme', theme);
        };

        // RTL Support
        var isRTL = localStorage.getItem('isRTL') === 'true',
            linkLTR = document.getElementById('stylesheetLTR'),
            linkRTL = document.getElementById('stylesheetRTL'),
            html = document.documentElement;

        if (isRTL) {
            linkLTR.setAttribute('disabled', '');
            linkRTL.removeAttribute('disabled');
            html.setAttribute('dir', 'rtl');
        } else {
            linkRTL.setAttribute('disabled', '');
            linkLTR.removeAttribute('disabled');
            html.removeAttribute('dir');
        }
        
        // Apply theme immediately
        setTheme(getPreferredTheme());
    </script>
    
    <!-- Alpine.js -->
    <script src="<?php echo e(asset('themes/dashly/assets/ext/dist/alpine.min.js')); ?>" defer></script>
    
    <!-- Page Title -->
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($settings->site_name); ?></title>
</head>

<body class="h-full bg-gray-50 flex flex-col">
    <!-- MAIN CONTENT -->
    <main class="flex-grow flex items-center justify-center">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <!-- FOOTER -->
    <footer class="py-4 text-center text-gray-500 text-sm">
        <?php if($settings->google_translate == 'on'): ?>
            <div id="google_translate_element" class="mb-3"></div>
        <?php endif; ?>
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($settings->site_name); ?>. All rights reserved.</p>
    </footer>

    <!-- JAVASCRIPT -->
    <!-- Theme JS (keeping for compatibility) -->
    <script src="<?php echo e(asset('themes/dashly/assets/js/theme.bundle.js')); ?>"></script>
    
    <!-- Google Translate -->
    <?php if($settings->google_translate == 'on'): ?>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en'
                }, 'google_translate_element');
            }
        </script>
    <?php endif; ?>
    
    <!-- jQuery (keeping for compatibility) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $('#username').on('keypress', function(e) {
            return e.which !== 32;
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ship\resources\views/layouts/guest1.blade.php ENDPATH**/ ?>