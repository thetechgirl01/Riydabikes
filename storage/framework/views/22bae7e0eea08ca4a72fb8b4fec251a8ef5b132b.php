<?php $__env->startSection('title', 'About Us'); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('temp/custom/images/about-page-bg.jpg');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-primary-900/80 to-primary-700/60"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fade-in">About Us</h1>
        <nav class="flex justify-center" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-primary-200">
                <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li class="text-white">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Company Profile Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Company Description -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Company Profile</h2>
                    <h3 class="text-xl font-semibold text-primary-600 mb-6">
                        <?php echo e($settings->site_name); ?> is a privately owned, premier international freight forwarder, delivery and logistics service provider.
                    </h3>
                </div>
                
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        <?php echo e($settings->site_name); ?> has extensive experience handling and delivery sensitive domestic and industrial products including consumer technology products like networking equipment, desktop and mobile computers, servers, cell phones and more.
                    </p>
                    
                    <p>
                        <?php echo e($settings->site_name); ?> delivers real-time, actionable information reliably and ensures optimal efficiency and on-time activities by utilizing advanced, custom software systems. Fully EDI capable, <?php echo e($settings->site_name); ?>'s systems interface with your trading partners to provide unprecedented product visibility throughout the entire supply chain.
                    </p>
                    
                    <p>
                        Our global regional hubs offer a wide range of mission-critical technology, logistic, IT and security services to clients and its partners overseas. Through our overseas secure services to more than 250 diplomatic offices, across 160 countries, we support around 14,000 staff globally, as well as many more from other government departments co-located at posts under the One HMG ethos.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="contact" class="bg-primary-600 text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors font-medium inline-flex items-center justify-center">
                        Get In Touch
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="services" class="border border-primary-600 text-primary-600 px-6 py-3 rounded-lg hover:bg-primary-50 transition-colors font-medium inline-flex items-center justify-center">
                        Our Services
                    </a>
                </div>
            </div>
            
            <!-- Company Images Slider -->
            <div class="relative" x-data="{ currentImage: 0, images: 3 }" x-init="setInterval(() => { currentImage = (currentImage + 1) % images }, 4000)">
                <div class="relative h-96 rounded-2xl overflow-hidden shadow-2xl">
                    <div x-show="currentImage === 0" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="temp/custom/images/slider/company-slide-1.jpg" alt="Company Image 1" class="w-full h-full object-cover">
                    </div>
                    <div x-show="currentImage === 1" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="temp/custom/images/slider/company-slide-2.jpg" alt="Company Image 2" class="w-full h-full object-cover">
                    </div>
                    <div x-show="currentImage === 2" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="temp/custom/images/slider/company-slide-3.jpg" alt="Company Image 3" class="w-full h-full object-cover">
                    </div>
                </div>
                
                <!-- Image Indicators -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <template x-for="i in images" :key="i">
                        <button @click="currentImage = i - 1" :class="currentImage === (i - 1) ? 'bg-white' : 'bg-white bg-opacity-50'" class="w-3 h-3 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision & Values -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Foundation</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Built on strong values and clear vision, driving excellence in logistics
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/about_our_mission.jpg');"></div>
                <div class="p-8">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bullseye text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Connecting people, businesses and communities to a better future – through logistics.
                    </p>
                </div>
            </div>
            
            <!-- Vision -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/about_our_vision.jpg');"></div>
                <div class="p-8">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-eye text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To become the world's preferred supply chain logistics company – applying insights, service quality and innovation to create sustainable growth for business and society.
                    </p>
                </div>
            </div>
            
            <!-- Values -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/about_core_values.jpg');"></div>
                <div class="p-8">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-heart text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Core Values</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Value Creation – Openness – Integrity – Commitment – Excellence – Mutual Respect – Customer Orientation
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Safety & Security -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Safety -->
            <div class="space-y-6">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900">Safety First</h2>
                </div>
                
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        At <?php echo e($settings->site_name); ?>, ensuring the safety of our customers, employees and our communities is our priority. We understand the importance of continuous training and are proud of our safety knowledge, experienced staff and ability to exceed industry standards year after year.
                    </p>
                    <p>
                        We have established and continually maintain excellent motor carrier safety ratings and low accident frequencies. As a company, we have a solid safety performance history and will continue to be a leader in the area of safety and compliance.
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-2xl font-bold text-green-600">99.9%</div>
                        <div class="text-sm text-gray-600">Safety Rating</div>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-2xl font-bold text-green-600">24/7</div>
                        <div class="text-sm text-gray-600">Monitoring</div>
                    </div>
                </div>
            </div>
            
            <!-- Security -->
            <div class="space-y-6">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-lock text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900">Advanced Security</h2>
                </div>
                
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        At <?php echo e($settings->site_name); ?>, we offer industry-leading asset protection and security compliance programs. We understand that our customers may have important and unique needs related to homeland security regulatory compliance, high-risk products, or brand protection.
                    </p>
                    <p>
                        By leveraging modern and proven technologies, we provide for the integrity of customer assets while in-transit or at one of our facilities. We offer consultation and proactive partnership to ensure that our customers' security needs are met.
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <div class="text-2xl font-bold text-blue-600">256-bit</div>
                        <div class="text-sm text-gray-600">Encryption</div>
                    </div>
                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <div class="text-2xl font-bold text-blue-600">ISO</div>
                        <div class="text-sm text-gray-600">Certified</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gradient-to-br from-primary-600 to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Achievements</h2>
            <p class="text-xl text-primary-200">Numbers that speak for our excellence</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
            <div class="text-center">
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 200ms;">
                    101,273+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Delivered Packages
                </div>
            </div>
            
            <div class="text-center">
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 400ms;">
                    673,754+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    KM Per Year
                </div>
            </div>
            
            <div class="text-center">
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 600ms;">
                    11+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Years Experience
                </div>
            </div>
            
            <div class="text-center">
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 800ms;">
                    16,714+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Happy Clients
                </div>
            </div>
            
            <div class="text-center">
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 1000ms;">
                    8+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Industry Awards
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Stats animation
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('translate-y-4', 'opacity-0');
                        entry.target.classList.add('translate-y-0', 'opacity-100');
                    }
                });
            }, {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            });

            statNumbers.forEach(stat => {
                observer.observe(stat);
            });
        });
    </script>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Trusted by industry leaders worldwide
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-500 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-600 mb-6 leading-relaxed">
                    "Given my past experiences with other logistics companies, I can say without exception that the services provided by <?php echo e($settings->site_name); ?> greatly exceed industry standards."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        MP
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Monique Pete</div>
                        <div class="text-sm text-gray-500">Logistics Manager, Martrax Inc.</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-500 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-600 mb-6 leading-relaxed">
                    "More than once, <?php echo e($settings->site_name); ?> has 'saved the day', delivering our cargo on time with short notice. They have won my gratitude and loyalty with their 'can do' approach."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        SA
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Steve Anderson</div>
                        <div class="text-sm text-gray-500">President/Owner, Duplication Factory</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-500 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-600 mb-6 leading-relaxed">
                    "I am very pleased with the service provided by <?php echo e($settings->site_name); ?>. They find good carriers and use them regularly so we get a high level of service. Their communication is outstanding."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        CB
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Cathy Beckman</div>
                        <div class="text-sm text-gray-500">Logistics Team, Oxea Chemicals</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Trusted Partners</h2>
            <p class="text-gray-600">Working with industry leaders worldwide</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center opacity-60 hover:opacity-100 transition-opacity duration-300">
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-01.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-02.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-03.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-04.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-05.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Ready to Experience Excellence?
            </h2>
            <p class="text-xl text-primary-100 mb-8 leading-relaxed">
                Join thousands of satisfied customers who trust us with their logistics needs. Get started with <?php echo e($settings->site_name); ?> today.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contact" class="bg-white text-primary-600 px-8 py-4 rounded-lg hover:bg-gray-100 transition-all duration-300 font-semibold text-lg shadow-lg">
                    Get Free Quote
                </a>
                <a href="services" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg hover:bg-white hover:text-primary-600 transition-all duration-300 font-semibold text-lg">
                    Our Services
                </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elitemaxpro/shypdirect.elitemaxpro.click/resources/views/home/about.blade.php ENDPATH**/ ?>