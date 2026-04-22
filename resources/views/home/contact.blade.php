@extends('layouts.base')

@section('title', 'Contact Us')

@section('styles')
@parent

@endsection
@inject('content', 'App\Http\Controllers\FrontController')
@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary-700 to-primary-900 py-24 md:py-32">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.2\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 animate-slide-up">Contact Us</h1>
            <p class="text-xl text-primary-100 max-w-2xl mx-auto animate-slide-up" style="animation-delay: 0.1s">
                We're here to help with your shipping and logistics needs. Reach out to our team for assistance.
            </p>
            
            <!-- Breadcrumbs -->
            <nav class="mt-8 flex justify-center" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm text-primary-200">
                    <li>
                        <a href="/" class="hover:text-white transition-colors">Home</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-4 w-4 text-primary-300 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white font-medium">Contact</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="text-white fill-current">
            <path d="M0,96L80,80C160,64,320,32,480,32C640,32,800,64,960,69.3C1120,75,1280,53,1360,42.7L1440,32L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Get In Touch</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Contact our customer support team for immediate assistance with your shipments or logistics queries.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Phone Card -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow p-8 text-center border border-gray-100">
                <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-phone text-primary-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Call Us</h3>
                <p class="text-gray-600 mb-4">Our support team is available 24/7</p>
                <p class="text-lg font-medium text-primary-600">TOLL FREE</p>
            </div>
            
            <!-- Email Card -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow p-8 text-center border border-gray-100">
                <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-envelope text-primary-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Email Us</h3>
                <p class="text-gray-600 mb-4">Send us an email for any inquiry</p>
                <a href="mailto:{{$settings->contact_email}}" class="text-lg font-medium text-primary-600 hover:underline">{{$settings->contact_email}}</a>
            </div>
            
            <!-- Location Card -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow p-8 text-center border border-gray-100">
                <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-map-marker-alt text-primary-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Our Location</h3>
                <p class="text-gray-600 mb-4">Our head office is located at</p>
                <p class="text-lg font-medium text-primary-600">{{ $settings->locations }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Global Network Map -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Global Network</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We operate a global network of shipping routes and logistics partners to serve you better.
            </p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="p-6">
                <!-- Fallback Map with Location Marker -->
                <div id="location-map" class="h-80 md:h-96 w-full rounded-lg relative bg-blue-50 overflow-hidden">
                    <!-- World Map Background (SVG Embedded for Reliability) -->
                    <div class="absolute inset-0 opacity-20 bg-contain bg-center bg-no-repeat" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA4MDAgNDAwIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBtZWV0Ij48cGF0aCBmaWxsPSIjMzI4MWY2IiBkPSJNNzc5LDI1M2MwLDAtNi43LTgtMTYtOS43cy0xNy42LTMuMy0yMi42LTEuM2MtNS4xLDItOS4zLDYuNy0xMS44LDEyLjRjLTIuNiw1LjctNS43LDEzLjMtMTIuNCwxMS44Yy02LjctMS41LTExLjgtNS4yLTE1LjUtNi43Yy0zLjYtMS41LTEwLjgtMS41LTE3LjYsMGMtNi43LDEuNS0xMS40LDEuMi0xOS43LTMuNmMtOC4zLTQuOC0xNC4yLTEwLjMtMjQuNC0xMS41QzYyOS4yLDI0NCw2MjAsMjQwLDYxOC4xLDI0MGMtMS45LDAtNy4yLDIuNC0xMy45LDkuMWMtNi43LDYuNy0xOC42LDE2LjEtMjQuNiwyMC42Yy02LDQuNS0xNC40LDE0LjEtMTksOS4zYy00LjYtNC44LTExLjQtMTQuOS0xOS43LTIwLjdjLTguMy01LjctMTktMTEuMS0zMC4xLTEyLjFjLTExLjEtMS05LjMsNS40LTE3LjYsMTMuOWMtOC4zLDguNS0zMC4xLDE3LjYtMzAuMSwxNy42czYuNyw3LjcsMi4xLDEzLjljLTQuNiw2LjMtMTMuNCwxMi45LTEzLjQsMTIuOXMtMTIuOS0zLjQtMjEuNy0zLjljLTguOC0wLjUtMTYuMSw0LjYtMjcuNywzLjZjLTExLjYtMS0yNi4zLTcuNy0zMi4xLTExLjFzLTE5LjgsMC0yMy4yLDYuMnMtMTIuOSwxMi4xLTEyLjksMTIuMXMtNi43LTYuNS0xNS0xMC41cy0yMC4xLTUuNC0yNS4zLTYuMnMtMTYuNi03LjQtMTYuNi03LjRsLTMuNi0xNy45bC0xNS0zLjNsLTE3LjYtMTEuNlYxOTBjMCwwLDgtNi4yLDE0LjctOS4zczE5LjctNi43LDI2LjctMTMuNGM3LTYuNywyMi43LTIyLjQsMjIuNy0yMi40cy0yLTExLjktOC41LTE3LjZjLTYuNS01LjctMjIuNy0xNC40LTI2LjctMTMuNGMtNCwxLTExLjYsNi41LTE3LjMsMTEuNnMtMTQuMiw2LjctMTcuOSw1LjJjLTMuNi0xLjUtMTEuMS04LjgtMTUuMi0xNi42Yy00LjEtNy43LTYuMi0xNS4yLTExLjktMTkuM2MtNS43LTQuMS0xMi45LTExLjYtMTYuMS0xMi40Yy0zLjEtMC44LTEyLjEsMS42LTE3LjYsOC44Yy01LjQsNy4yLTkuOCwxMy42LTE0LjQsMTUuMmMtNC42LDEuNS0xMC4xLDAuOC0xNy44LTAuOGMtNy43LTEuNS0xOC4xLTcuOC0yNC40LThjLTYuMi0wLjMtMTcuNiwzLjQtMjIuNywxM2MtNS4yLDkuNi0xMS42LDEyLjYtMjQsMTMuOWMtMTIuNCwxLjMtMjQuMiw1LjItMzAuOSwxMS4xYy02LjcsNS45LTEzLjksMTIuNi0xOC4xLDEyLjZzLTE0LjQsMS41LTIwLjEsNS4yYy01LjcsMy42LTE0LjIsMTQuNC0xOS4zLDE1LjJjLTUuMiwwLjgtMTAuNi0wLjgtMTcuMS0yLjZjLTYuNS0xLjgtMTkuMy0xMS4xLTI2LTExLjlzLTE2LjYsMi45LTIzLjIsMTAuOGMtNi43LDcuOC0xMSwxOC42LTE2LjYsMjEuNGMtNS43LDIuOC0xNC40LTEuMy0yMC42LDEuM2MtNi4yLDIuNi0xMS42LDkuMy0xMy40LDE0LjdjLTEuOCw1LjQtMi42LDExLjYtOC44LDE0LjljLTYuMiwzLjQtMTIuMSw1LjQtMTMuNCwxMC4zYy0xLjMsNC45LTEuMyw4LjgtMy4xLDE0LjRjLTEuOCw1LjctNi4yLDEzLjktOS4zLDE3LjZjLTMuMSwzLjYtNi43LDcuMi04LjUsMTQuMmMtMS44LDctMy4xLDExLjktMS44LDE4LjRjMS4zLDYuNSwzLjQsMTIuMSw1LjcsMTIuOWMyLjMsMC44LDYuMiwyLjgsOS44LDUuMmMzLjYsMi4zLDcuMiw0LjEsOS4zLDMuM2MyLjEtMC44LDUuNy0yLjgsNy44LTUuOXMyLjMtNyw1LjItMTAuNmMyLjgtMy42LDQuMS00LjEsNy41LTUuOXMxNC43LTguMywxOC42LTkuNmMzLjktMS4zLDExLjQtNS45LDE0LjktNy41YzMuNC0xLjUsOS42LTQuOSwxNS0xLjNjNS40LDMuNiw3LjcsNy4yLDEwLjMsNy44YzIuNiwwLjUsNy44LTAuMyw5LjEsNC4xYzEuMyw0LjQsMS41LDUuMiw0LjksNS4yYzMuNCwwLDExLjQtMS44LDE2LjMsMGM0LjksMS44LDEzLjYsOC4zLDE3LjYsOC4zYzQsMCw3LjUtMi42LDEwLjMtMC4zYzIuOCwyLjMsNi43LDQuOSw5LjYsNy44YzIuOCwyLjgsMTIuMSw4LjUsMTYuOSwxMC4zYzQuOCwxLjgsMTEuNiwzLjEsMTUuMiw1LjJjMy42LDIuMSw3LjIsOC41LDExLjYsOC41YzQuNCwwLDYuNy00LjksOS41LTQuOWMyLjgsMCw3LjIsMy4xLDExLjksNi4yYzQuOCwzLjEsMTUuNyw4LjMsMTkuMyw4LjNjMy42LDAsOC0yLjYsMTMuNC0yLjZjNS40LDAsMTEuNi0yLjgsMTkuMS0xLjVjNy41LDEuMywxMi42LDQuOSwxNi45LDQuOWM0LjMsMCw4LjUtMS4zLDExLjktNC42YzMuNC0zLjQsNS4yLTExLjYsNS4yLTExLjZzOC44LTIuOCwxNS4yLTcuN2M2LjUtNC45LDEyLjktMTEuNCwxOC42LTEyLjljNS43LTEuNSw5LjMtMC44LDEyLjksNC4xYzMuNiw0LjksNy41LDEyLjQsMTUuNywxNS41YzguMiwzLjEsMTYuMSw0LjYsMTguNiw3LjhjMi42LDMuMSw0LjYsNy44LDkuMyw3LjhjNC42LDAsNy44LTAuOCwxMS42LTQuNGMzLjktMy42LDEwLjMtMTEuNCwxMC4zLTExLjRzMi45LDguOCw4LjUsOS44YzUuNywxLDEwLjgsMS41LDE2LjYtMS44YzUuNy0zLjMsMTIuNi05LjUsMTYuOS0xMS42YzQuMy0yLjEsNi41LTIuMSwxMC4zLTAuNXMxMC44LDQuOSwxNC40LDYuMnM4LjUsNS43LDEyLjksNi43YzQuNSwxLDE1LDMuMSwxOC40LDBjMy4zLTMuMSw0LjgtNy4yLDkuMy04YzQuNS0wLjgsMTYuMSwwLDIwLjEtMS44YzQtMS44LDguMy02LjUsMTIuNC02LjJjNC4xLDAuMyw4LjMsMC44LDEzLjYsNy41YzUuNCw2LjcsMTIuMSwxNS41LDE3LjEsMThjNS4yLDIuMywxNS43LDQuOSwyMC4xLDIuOGM0LjUtMi4xLDYuMi00LjYsMTAtOC41YzMuOS0zLjksNi4yLTYuMiwxMy45LTkuOGM3LjctMy42LDE3LjEtNy44LDIyLjctOC4zYzUuNy0wLjUsMTAuMy0wLjUsMTMuOSw1LjJjMy41LDUuNyw0LjYsOC44LDguOCwxMy40YzQuMSw0LjYsMTAuOCwxMS40LDE1LjcsMTIuOWM0LjksMS41LDEyLjYsMywxOC42LDIuM2M2LTAuOCw4LjgtMi44LDEyLjYtNi43YzMuOC0zLjksOC4zLTEwLjMsMTAuNi0xNS41YzIuMy01LjIsNy4yLTEzLjksNy4yLTE4LjlzLTMuNC0xNC4yLTMuNC0xOC45YzAtNC42LDEuNS03LjUsMS04LjhjLTAuNS0xLjMtMy4zLTcuMi0zLjMtNy4yeiIvPjwvc3ZnPg==')"></div>
                    
                    <!-- Headquarters Marker -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center p-6 bg-white bg-opacity-90 rounded-xl shadow-lg max-w-md transform hover:scale-105 transition-transform duration-300">
                            <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4 animate-pulse">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Our Headquarters</h3>
                            <p class="text-primary-600 font-medium mb-2">{{ $settings->site_name }}</p>
                            <p class="text-gray-700">{{ $settings->locations }}</p>
                        </div>
                    </div>
                    
                    <!-- Route Indicators -->
                    <div class="absolute inset-0">
                        <!-- London Route -->
                        <div class="absolute top-[25%] left-[45%] w-1 h-1 bg-primary-500 rounded-full animate-ping"></div>
                        <div class="absolute top-[25%] left-[45%] w-2 h-2 bg-primary-500 rounded-full"></div>
                        
                        <!-- New York Route -->
                        <div class="absolute top-[30%] left-[25%] w-1 h-1 bg-primary-500 rounded-full animate-ping"></div>
                        <div class="absolute top-[30%] left-[25%] w-2 h-2 bg-primary-500 rounded-full"></div>
                        
                        <!-- Tokyo Route -->
                        <div class="absolute top-[30%] left-[80%] w-1 h-1 bg-primary-500 rounded-full animate-ping"></div>
                        <div class="absolute top-[30%] left-[80%] w-2 h-2 bg-primary-500 rounded-full"></div>
                        
                        <!-- Singapore Route -->
                        <div class="absolute top-[60%] left-[70%] w-1 h-1 bg-primary-500 rounded-full animate-ping"></div>
                        <div class="absolute top-[60%] left-[70%] w-2 h-2 bg-primary-500 rounded-full"></div>
                    </div>
                </div>
                
                <!-- Shipping Routes Overlay -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-4 text-center">
                    <div class="px-4 py-3 bg-primary-50 rounded-lg">
                        <i class="fas fa-plane text-primary-600 mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Air Routes</p>
                    </div>
                    <div class="px-4 py-3 bg-primary-50 rounded-lg">
                        <i class="fas fa-ship text-primary-600 mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Sea Routes</p>
                    </div>
                    <div class="px-4 py-3 bg-primary-50 rounded-lg">
                        <i class="fas fa-truck text-primary-600 mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Ground Routes</p>
                    </div>
                    <div class="px-4 py-3 bg-primary-50 rounded-lg">
                        <i class="fas fa-warehouse text-primary-600 mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Distribution Centers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Contact Information -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Let's Discuss Your Shipping Needs</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Whether you need a quick quote, have a question about our services, or want to request a specialized logistics solution, our team is ready to help.
                    </p>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-headset text-primary-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Customer Support</h3>
                            <p class="text-gray-600">24/7 dedicated support for all shipping inquiries</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-truck text-primary-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Fast Response</h3>
                            <p class="text-gray-600">Quick turnaround on shipping quotes and inquiries</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-primary-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Secure Communications</h3>
                            <p class="text-gray-600">Your information is encrypted and securely handled</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h3>
                
                <form method="post" action="{{ route('enquiry') }}" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input id="fname" name="name" type="text" placeholder="John Doe" required 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                        </div>
                        
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input id="email" name="email" type="email" placeholder="john@example.com" required 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                        </div>
                        
                        <!-- Phone Field -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input id="phone" name="phone" type="text" placeholder="+1 (555) 000-0000" required 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                        </div>
                        
                        <!-- Subject Field -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input id="subject" name="subject" type="text" placeholder="Shipping Inquiry" required 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Please describe how we can help you..." required 
                                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-primary-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Find answers to common questions about our shipping and courier services
            </p>
        </div>
        
        <div class="max-w-3xl mx-auto" x-data="{ activeTab: 'none' }">
            <!-- FAQ Items -->
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="activeTab = activeTab === 'faq1' ? 'none' : 'faq1'" 
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-900 font-medium hover:bg-gray-50 transition-colors"
                    >
                        <span>How can I track my shipment?</span>
                        <i class="fas" :class="activeTab === 'faq1' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div x-show="activeTab === 'faq1'" x-collapse x-cloak class="px-6 py-4 text-gray-600">
                        <p>You can track your shipment by entering your tracking number in our online tracking system on the home page or track shipment page. Alternatively, you can contact our customer service team with your tracking number for assistance.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="activeTab = activeTab === 'faq2' ? 'none' : 'faq2'" 
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-900 font-medium hover:bg-gray-50 transition-colors"
                    >
                        <span>What shipping services do you offer?</span>
                        <i class="fas" :class="activeTab === 'faq2' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div x-show="activeTab === 'faq2'" x-collapse x-cloak class="px-6 py-4 text-gray-600">
                        <p>We offer a comprehensive range of shipping services including air freight, sea/ocean freight, road transportation, express delivery, diplomatic shipping, and specialized logistics solutions. Each service is tailored to meet specific shipping requirements and timeframes.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="activeTab = activeTab === 'faq3' ? 'none' : 'faq3'" 
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-900 font-medium hover:bg-gray-50 transition-colors"
                    >
                        <span>How do I get a shipping quote?</span>
                        <i class="fas" :class="activeTab === 'faq3' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div x-show="activeTab === 'faq3'" x-collapse x-cloak class="px-6 py-4 text-gray-600">
                        <p>You can request a shipping quote by filling out the contact form on this page with details about your shipment, or by clicking the "Get Quote" button in the navigation menu. Our team will promptly respond with a competitive quote based on your specific shipping needs.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="activeTab = activeTab === 'faq4' ? 'none' : 'faq4'" 
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-900 font-medium hover:bg-gray-50 transition-colors"
                    >
                        <span>What are your delivery timeframes?</span>
                        <i class="fas" :class="activeTab === 'faq4' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div x-show="activeTab === 'faq4'" x-collapse x-cloak class="px-6 py-4 text-gray-600">
                        <p>Delivery timeframes vary depending on the shipping service, destination, and any customs requirements. Express services typically deliver within 1-3 business days, while standard services may take 3-7 business days. International shipping timeframes depend on the destination country and chosen shipping method.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call To Action -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Ship with Us?</h2>
            <p class="text-xl text-primary-100 max-w-2xl mx-auto mb-10">
                Experience premium shipping and logistics services with our global network.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="track-order" class="bg-white text-primary-700 hover:bg-gray-100 px-8 py-4 rounded-lg font-medium transition-colors inline-flex items-center justify-center">
                    <i class="fas fa-search mr-2"></i>
                    Track Shipment
                </a>
                <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-primary-700 px-8 py-4 rounded-lg font-medium transition-colors inline-flex items-center justify-center">
                    <i class="fas fa-tag mr-2"></i>
                    Get a Quote
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Map Script -->
<script>
    // No Google Maps API required - using a static map implementation instead
</script>

@endsection
