@extends('layouts.landingPage.welcome')

@section('title', 'Home Page')

@section('content')
<header class="bg-blue-500 text-white p-4">
    <h1 class="text-2xl">Institute Management</h1>
</header>

<section class="bg-white text-black py-20 bg-[url('/public/images/welcome_banner.png')] bg-cover bg-center"
    style="background-color: #f1c288c7; background-blend-mode: color-dodge;">
    <div>

        <div class="w-2/3 mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Welcome to the Institute Management System</h1>
            <p class="text-lg sm:text-xl mb-8">Simplifying the management of students, teachers, and courses</p>
            <a href="#"
                class="bg-primary-blue text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-gray-700">Get
                Started</a>
        </div>
    </div>
</section>
<!-- Hero Section -->
<section class="text-white py-16" style="background: linear-gradient(201deg, #ffd5a0, #ffffff, #2c4dff);">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4" style="color: #1b5fff;">All-in-One Institute Management Tool – Free and
            Effective</h1>
        <p class="text-lg mb-8 p-8 rounded-[15px] text-black">Simplify and enhance the management of your
            educational institution with our comprehensive, free platform. From student records and attendance to
            scheduling and administrative tasks, this tool offers a full suite of features to keep everything
            running smoothly and efficiently.</p>
        <a href="#try-out"
            class="bg-white text-blue-700 px-6 py-3 rounded-full text-xl font-semibold hover:bg-gray-200 hover:border-2 hover:border-blue-600">Get
            Started</a>
    </div>
</section>
<div>
    <h1 class="text-center text-4xl py-3 " style="background: linear-gradient(97deg, #2c4dff, #ffffff);">
        What Makes IMS Special?
    </h1>
</div>


<!-- Role-Based Login Section -->
<section class="bg-[#ffffff] py-16 flex flex-row justify-around items-bottom flex-wrap gap-4" style="background:linear-gradient(216deg, #ffffff, #eff1ff, #1d4ed8);">
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/roll_based.jpg')] bg-contain bg-top bg-no-repeat hover:pt-[20%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Role-Based
                Authentication With Enhanced Security</h5>
            <p class="text-lg">Keep your institution's data safe with our advanced, role-based login system. Each
                user, whether an admin, faculty, or student, has access to only what they need, minimizing risks and
                ensuring privacy. Sensitive data is always protected by top-tier security measures.</p>
        </div>
    </div>
    <!-- Intuitive UI/UX Section -->
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/ui_ux.jpg')] bg-contain bg-no-repeat bg-top hover:pt-[20%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Intuitive UI/UX – Simple, User-Friendly Design</h5>
            <p class="text-lg">Experience an intuitive interface that makes managing your institution a breeze. With a
                sleek, easy-to-navigate design and smooth user experience, our platform ensures that users of all
                technical levels can get started quickly and enjoy seamless operations.</p>
        </div>
    </div>
    <!-- Responsive and Cross-Platform Section -->
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/responsive.png')] bg-contain bg-no-repeat bg-top hover:pt-[20%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Responsive and Cross-Platform Compatibility</h5>
            <p class="text-lg">Whether you're on a desktop, tablet, or mobile device, our platform is fully responsive
                and compatible across all devices and browsers. You can manage your institute from anywhere, anytime,
                ensuring you stay connected even on the go.</p>
        </div>
    </div>
    <!-- Effortless Data Management Section -->
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/record.jpg')] bg-contain bg-no-repeat bg-top hover:pt-[20%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Effortless Data Management – Streamline Your Processes</h5>
            <p class="text-lg">Manage everything from student records and faculty assignments to attendance and fee
                collection in one place. Our tool eliminates manual processes, saving you time and effort while ensuring
                data accuracy and accessibility.</p>
        </div>
    </div>
    <!-- Customizable and Scalable Section -->
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/custom_scalabe.png')] bg-contain bg-no-repeat bg-top hover:pt-[12%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Customizable and Scalable for Growing Institutions</h5>
            <p class="text-lg">As your institution grows, so does our platform. Easily customize features and scale the
                system to match your expanding needs. Whether you have a small school or a large university, our
                platform adapts to your unique requirements.</p>
        </div>
    </div>
    
    <!-- Comprehensive Reporting Section -->
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/analytics.jpg')] bg-contain bg-no-repeat bg-top hover:pt-[12%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Comprehensive Reporting and Analytics</h5>
            <p class="text-lg">Make informed decisions with powerful reporting tools and real-time analytics. Get
                insights into student performance, attendance patterns, financials, and more, helping you manage your
                institution more effectively.</p>
        </div>
    </div>
    
    
    <!-- Continuous Updates and Support Section -->
    <div
        class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] bg-[url('/public/images/update.jpg')] bg-contain bg-no-repeat bg-top hover:pt-[12%] transition-all duration-[700ms] ease-in">
        <div class="flex flex-col justify-between p-4 leading-normal bg-gradient-to-b from-[#FFFFFF90] to-[#ffffff]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-blue-700">Continuous Updates and Support</h5>
            <p class="text-lg">Enjoy regular updates and improvements, ensuring your platform stays current with the
                latest technology and educational trends. Plus, our dedicated support team is always ready to assist
                with any queries or issues you may face.</p>
        </div>
    </div>
    

</section>


<!-- Call to Action Section -->
<section class="bg-blue-700 text-white py-8">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-lg mb-8">Join thousands of institutions already managing their operations more efficiently
            with our all-in-one platform. Start for free today!</p>
        <a href="#"
            class="bg-white text-blue-700 px-6 py-3 rounded-full text-xl font-semibold hover:bg-gray-200">Try Out
            Now</a>
    </div>
</section>

<section id="about" class="mx-auto max-w-[80%] bg-[url('/public/images/about.jpg')] bg-contain bg-no-repeat bg-right hover:pt-[12%] transition-all duration-[700ms] ease-in py-20 bg-light-gray text-dark-gray">
    <div class="max-w-7xl mx-[5px] text-center px-[12px]">
        <h2 class="text-3xl font-semibold mb-6">About Us</h2>
        <p class="text-lg mb-6 max-w-2xl">We provide a comprehensive solution for managing educational institutes, students, teachers, and courses efficiently.</p>
        <a href="#contact" class="text-primary-blue hover:text-blue-600 font-semibold">Learn More</a>
    </div>
    <div class="container text-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-[300px] md:max-h-[300px] bg-[url('/public/images/about.jpg')] bg-contain bg-no-repeat bg-top hover:pt-[12%] transition-all duration-[700ms] ease-in">

    </div>
</section>
<section id="contact" class="py-20">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-3xl font-semibold mb-6">Contact Us</h2>
        <p class="text-lg mb-6">Have questions? Feel free to reach out to us.</p>
        <a href="mailto:support@institute.com" class="text-primary-blue hover:text-blue-600 font-semibold">Email
            Us</a>
    </div>
</section>

@endsection
