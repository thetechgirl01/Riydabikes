<?php $__env->startSection('title', 'Contact RydaBikes'); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Contact Us</h1>
            <p class="text-lg text-white/80 max-w-2xl">
                Have questions about renting, buying, or tracking a delivery? We're here to help
            </p>
            <div class="flex items-center gap-2 text-sm text-white/70 mt-6">
                <a href="/" class="hover:text-[#FFD600] transition-colors">Home</a>
                <i class="fas fa-angle-right text-xs"></i>
                <span class="text-white">Contact</span>
            </div>
        </div>
    </div>
</section>
<!-- Contact Info Cards -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-headset mr-1"></i> Get In Touch
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">We're Here For You</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Reach out to our team for any inquiries about bike rentals, purchases, or deliveries
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <!-- Phone Card -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-[#800020]/20">
                <div class="w-16 h-16 bg-[#800020]/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-[#800020] transition-colors">
                    <i class="fas fa-phone text-[#800020] text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Call Us</h3>
                <p class="text-gray-500 text-sm mb-3">Mon - Sun, 24/7 Support</p>
                <p class="text-lg font-semibold text-[#800020]">+234 800 000 0000</p>
            </div>
            
            <!-- Email Card -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-[#800020]/20">
                <div class="w-16 h-16 bg-[#800020]/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-[#800020] transition-colors">
                    <i class="fas fa-envelope text-[#800020] text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Email Us</h3>
                <p class="text-gray-500 text-sm mb-3">We reply within 24 hours</p>
                <a href="mailto:<?php echo e($settings->contact_email); ?>" class="text-lg font-semibold text-[#800020] hover:underline"><?php echo e($settings->contact_email); ?></a>
            </div>
            
            <!-- Location Card -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-[#800020]/20">
                <div class="w-16 h-16 bg-[#800020]/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-[#800020] transition-colors">
                    <i class="fas fa-map-marker-alt text-[#800020] text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Visit Us</h3>
                <p class="text-gray-500 text-sm mb-3">Our headquarters</p>
                <p class="text-md font-medium text-gray-800"><?php echo e($settings->locations ?? 'Lagos, Nigeria'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form + Map Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-md p-6 md:p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Send Us a Message</h3>
                <p class="text-gray-500 text-sm mb-6">Fill out the form and we'll get back to you shortly</p>
                
                <form method="post" action="<?php echo e(route('enquiry')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input name="name" type="text" required placeholder="John Doe"
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input name="email" type="email" required placeholder="john@example.com"
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input name="phone" type="text" required placeholder="+234 800 000 0000"
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input name="subject" type="text" required placeholder="Rental inquiry"
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Message</label>
                        <textarea name="message" rows="5" required placeholder="Tell us how we can help you..."
                                  class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-[#800020] text-white py-3 rounded-full font-semibold hover:bg-[#6b001a] transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
            
            <!-- Map & Info -->
            <div class="space-y-6">
                <!-- Location Map Card -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                    <div class="px-5 py-4 bg-gray-50 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-map text-[#800020]"></i>
                            <h3 class="font-bold text-gray-800">Our Location</h3>
                        </div>
                    </div>
                    <div class="p-0">
                        <div id="contact-map" class="h-64 w-full bg-gray-100 relative">
                            <iframe 
                                src="https://www.openstreetmap.org/export/embed.html?bbox=3.3792%2C6.5244%2C3.3992%2C6.5444&layer=mapnik&marker=6.5344%2C3.3892" 
                                class="w-full h-full border-0" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-location-dot text-[#800020] mt-0.5"></i>
                            <div>
                                <p class="text-gray-800 font-medium"><?php echo e($settings->site_name); ?></p>
                                <p class="text-gray-500 text-sm"><?php echo e($settings->locations ?? 'Lagos, Nigeria'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Support Info -->
                <div class="bg-[#800020]/5 rounded-2xl p-5 border border-[#800020]/10">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-[#800020] rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <h3 class="font-bold text-gray-800">Support Hours</h3>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium text-gray-800">24/7</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Saturday - Sunday</span>
                            <span class="font-medium text-gray-800">24/7</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Holidays</span>
                            <span class="font-medium text-gray-800">24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-question-circle mr-1"></i> Help Center
            </span>
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Quick answers to common questions about our services
            </p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-3" x-data="{ active: null }">
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button @click="active = active === 1 ? null : 1" class="flex justify-between items-center w-full px-5 py-3 text-left text-gray-900 font-medium bg-white hover:bg-gray-50 transition-colors">
                    <span>How do I track my delivery?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 1}"></i>
                </button>
                <div x-show="active === 1" x-collapse class="px-5 py-3 bg-gray-50">
                    <p class="text-gray-600 text-sm">Enter your tracking ID on our Track Delivery page. You'll find it in your confirmation email or SMS.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button @click="active = active === 2 ? null : 2" class="flex justify-between items-center w-full px-5 py-3 text-left text-gray-900 font-medium bg-white hover:bg-gray-50 transition-colors">
                    <span>How do I rent a bike?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 2}"></i>
                </button>
                <div x-show="active === 2" x-collapse class="px-5 py-3 bg-gray-50">
                    <p class="text-gray-600 text-sm">Browse our bikes, choose your rental dates, and complete the booking form. We'll confirm availability and delivery details.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button @click="active = active === 3 ? null : 3" class="flex justify-between items-center w-full px-5 py-3 text-left text-gray-900 font-medium bg-white hover:bg-gray-50 transition-colors">
                    <span>How long does delivery take?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 3}"></i>
                </button>
                <div x-show="active === 3" x-collapse class="px-5 py-3 bg-gray-50">
                    <p class="text-gray-600 text-sm">Same-day delivery available in Lagos and major cities. Other locations typically within 24-48 hours.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button @click="active = active === 4 ? null : 4" class="flex justify-between items-center w-full px-5 py-3 text-left text-gray-900 font-medium bg-white hover:bg-gray-50 transition-colors">
                    <span>What payment methods do you accept?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 4}"></i>
                </button>
                <div x-show="active === 4" x-collapse class="px-5 py-3 bg-gray-50">
                    <p class="text-gray-600 text-sm">Bank transfer, credit/debit cards, and secure online payments. All transactions are encrypted and safe.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold text-white mb-4">Need Immediate Assistance?</h2>
            <p class="text-white/80 mb-6">Our support team is available 24/7 to help you</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+2348000000000" class="inline-flex items-center justify-center gap-2 bg-[#FFD600] text-[#800020] px-8 py-3 rounded-full hover:bg-[#e6c200] transition-all duration-300 font-bold shadow-lg">
                    <i class="fas fa-phone-alt"></i> Call Support
                </a>
                <a href="https://wa.me/2348000000000" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-[#800020] transition-all duration-300 font-bold">
                    <i class="fab fa-whatsapp"></i> WhatsApp Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/contact.blade.php ENDPATH**/ ?>