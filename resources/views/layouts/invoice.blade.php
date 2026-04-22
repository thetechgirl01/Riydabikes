<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$settings->site_name}} Logistics Company | Invoice</title>
    
    <!-- Define Charset -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Page Description and Author -->
    <meta name="description" content="{{$settings->site_name}} Tracking and Logistics">
    <meta name="keywords" content="{{$settings->site_name}}, logistics, shipping, courier">
    <meta name="author" content="{{$settings->site_name}}">
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
                            950: '#082f49',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        @page {
            size: A4;
            margin: 0.5cm;
        }
        
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
                background-color: white !important;
            }
            
            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            
            .print\:hidden {
                display: none !important;
            }
            
            .print\:block {
                display: block !important;
            }
            
            .print\:shadow-none {
                box-shadow: none !important;
            }
            
            .print\:bg-white {
                background-color: white !important;
            }
        }
    </style>
</head>
<body>
@yield('content')
</body>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

</html>
