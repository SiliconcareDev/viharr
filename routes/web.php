<?php

use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
Route::get('/intro','LandingpageController@index');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/install/check-db', 'HomeController@checkConnectDatabase');

// Social Login
Route::get('social-login/{provider}', 'Auth\LoginController@socialLogin');
Route::get('social-callback/{provider}', 'Auth\LoginController@socialCallBack');

// Logs
Route::get(config('admin.admin_route_prefix').'/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['auth', 'dashboard','system_log_view'])->name('admin.logs');

Route::get('/install','InstallerController@redirectToRequirement')->name('LaravelInstaller::welcome');
Route::get('/install/environment','InstallerController@redirectToWizard')->name('LaravelInstaller::environment');

Route::get('about.html', function () {
    return response()->make('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>About Us</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    margin: 20px;
                    padding: 20px;
                }
                h1, h2 {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <h1 class="text-danger">Welcome to Viharr</h1>
            <p>At Viharr, we elevate travel and event planning to new heights. We are your one-stop destination for all your travel and event needs, ensuring every detail is meticulously planned and executed. Our team of experienced professionals works tirelessly to create unique and memorable experiences for our clients. Whether you are planning a family vacation, a corporate retreat, or a special celebration, we provide tailored solutions to meet your specific requirements. Our services include comprehensive travel arrangements, top-notch accommodation options, and seamless transportation solutions, all designed to make your journey and event as smooth and enjoyable as possible. Trust us to take care of every aspect of your travel and event planning, so you can focus on making lasting memories.</p>

            <h2 class="text-info">Comprehensive Services</h2>
            <h3>Travel Options:</h3>
            <p>We offer a wide array of domestic and international travel options. Our services include detailed information, competitive pricing, real-time availability updates, and convenient booking facilities.</p>

            <h3>Accommodation:</h3>
            <p>Choose from a variety of hotels, holiday packages, and homestays to suit your preferences and budget.</p>

            <h3>Transportation:</h3>
            <p>We provide seamless travel solutions, including flight bookings, train bookings, and city and inter-city cab services.</p>

            <h2 class="text-info">Event Planning</h2>
            <p>Whether it’s a corporate event, family vacation, or a milestone celebration, our team is equipped to handle all aspects of event planning. From concept to execution, we ensure that your event is memorable and stress-free.</p>

            <h2 class="text-info">Our Promise</h2>
            <h3>Exceptional Service:</h3>
            <p>Our dedicated team is committed to delivering top-notch service, ensuring that your experience with us is smooth and enjoyable.</p>

            <h3>Creating Unforgettable Moments:</h3>
            <p>We believe in turning your vision into reality. With our expertise and personalized approach, we aim to create unforgettable moments for you and your guests.</p>

            <h2 class="text-info">Why Choose Us?</h2>
            <h3>Expertise:</h3>
            <p>With years of experience in the travel and event planning industry, we bring a wealth of knowledge and expertise to the table.</p>

            <h3>Personalized Approach:</h3>
            <p>We understand that every client is unique. We offer personalized solutions tailored to your specific needs and preferences.</p>

            <h3>Hassle-Free Planning:</h3>
            <p>Let us take the hassle out of planning. From booking to execution, we handle everything so you can focus on creating lasting memories.</p>
        </body>
        </html>
    ', 200);
});



Route::get('work-with-us.html', function () {
    return response()->make('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Work With Us</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container my-5">
                <h1 class="text-danger text-center mb-4">Join Our Team at Viharr</h1>
                <p class="text-center mb-4">At Viharr, we are always on the lookout for passionate and dedicated individuals to join our dynamic team. If you thrive in a fast-paced environment and are committed to delivering exceptional service, we want to hear from you!</p>

                <h2 class="text-info text-center mb-4">Why Work With Us?</h2>
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Innovative Environment">
                    <div class="card-body">
                        <h3 class="card-title text-center">Innovative Environment</h3>
                        <p class="card-text text-center">At Viharr, we believe in pushing the boundaries of travel and event planning. Our innovative approach ensures that we stay ahead of the curve, offering fresh and exciting solutions for our clients.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Professional Growth">
                    <div class="card-body">
                        <h3 class="card-title text-center">Professional Growth</h3>
                        <p class="card-text text-center">We are committed to the professional growth of our team members. With a wealth of experience in the hospitality industry, we provide ample opportunities for training, development, and career advancement.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Team Spirit">
                    <div class="card-body">
                        <h3 class="card-title text-center">Team Spirit</h3>
                        <p class="card-text text-center">Our team is our greatest asset. We foster a collaborative and inclusive work environment where everyone\'s contributions are valued. Join a team that supports and motivates each other to achieve excellence.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Comprehensive Benefits">
                    <div class="card-body">
                        <h3 class="card-title text-center">Comprehensive Benefits</h3>
                        <p class="card-text text-center">We offer a competitive benefits package, including health insurance, retirement plans, and paid time off. We understand the importance of work-life balance and strive to ensure our employees\' well-being.</p>
                    </div>
                </div>

                <h2 class="text-info text-center mb-4">Our Opportunities</h2>
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Event Planners">
                    <div class="card-body">
                        <h3 class="card-title text-center">Event Planners</h3>
                        <p class="card-text text-center">If you have a knack for organizing and executing flawless events, our event planner positions might be the perfect fit for you. Help us create unforgettable experiences for our clients.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Travel Consultants">
                    <div class="card-body">
                        <h3 class="card-title text-center">Travel Consultants</h3>
                        <p class="card-text text-center">As a travel consultant, you will assist our clients in planning their perfect getaways. Your expertise in travel options and destinations will ensure our clients have an amazing journey.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <img src="https://via.placeholder.com/900x300" class="card-img-top" alt="Customer Service Representatives">
                    <div class="card-body">
                        <h3 class="card-title text-center">Customer Service Representatives</h3>
                        <p class="card-text text-center">Join our customer service team and be the first point of contact for our clients. Your dedication to exceptional service will ensure a smooth and enjoyable experience for our clients.</p>
                    </div>
                </div>

                <h2 class="text-info text-center mb-4">How to Apply</h2>
                <p class="text-center mb-4">Ready to join the Viharr family? Send your resume and cover letter to <a href="mailto:info@viharr.com">info@viharr.com</a> or click the button below to apply online.</p>
                <div class="text-center">
                    <a href="mailto:info@viharr.com" class="btn btn-primary">Apply Now</a>
                </div>
            </div>
        </body>
        </html>
    ', 200);
});


Route::get('privacy_policy.html', function () {
    return response()->make('
       <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #2a2a2a;
        }

        h2 {
            color: #2a2a2a;
            margin-top: 20px;
        }

        p {
            margin: 10px 0;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Privacy Policy</h1>

    <h2>1. Introduction:</h2>
    <p>We value your privacy and are committed to protecting your personal information. This Privacy Policy outlines how
        we collect, use, and safeguard your data when you use <span>"www.viharr.com."</span></p>

    <h2>2. Information We Collect:</h2>
    <p class="bold">Personal Information:</p>
    <p>When you book a service, we collect details such as your name, contact information, payment details, and travel
        preferences.</p>

    <p class="bold">Usage Information:</p>
    <p>We track your activity on the website to improve user experience and provide relevant offers.</p>

    <h2>3. Use of Information:</h2>
    <p>We use your personal information to process bookings, provide customer support, and send updates about your
        bookings.</p>
    <p><span>Your data is also used for marketing and promotional purposes</span>, with your consent.
    </p>

    <h2>4. Data Sharing:</h2>
    <p>We share your information with service providers (hotels, airlines, etc.) to confirm bookings.</p>
    <p>We do not sell or share your data with third parties for their own marketing purposes without
        your consent.</p>

    <h2>5. Security:</h2>
    <p>We use encryption and secure servers to protect your data.</p>
    <p><span>However, no online data transmission is 100% secure.</span> You are advised to exercise
        caution.</p>

    <h2>6. Your Rights:</h2>
    <p>You have the right to access, update, or delete your personal data by contacting us at
        <span>info@viharr.com</span>.</p>
    <p>You can opt out of marketing communications at any time.</p>

</body>

</html>
    ', 200);
});


Route::get('refund_policy.html', function () {
    return response()->make('
       <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund/Cancellation Policy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #2a2a2a;
        }

        h2 {
            color: #2a2a2a;
            margin-top: 20px;
        }

        p {
            margin: 10px 0;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Viharr</h1>
    <h2>Refund/Cancellation Policy</h2>

    <h2>1. Cancellations by Customers:</h2>
    <p>Cancellations must be made at least 3 hours before the scheduled travel or stay.</p>
    <p>Cancellation fees may apply as per the policies of the service provider (e.g., hotel, airline).</p>
    <p>Refunds will be processed within 7-10 working days after a valid cancellation request is made.</p>
    <p>Any bookings canceled within 3 hours of the departure/check-in date are non-refundable.</p>

    <h2>2. Cancellations by Service Providers:</h2>
    <p>In case of cancellations by hotels, airlines, or other service providers, a full refund will be issued to the customer.</p>
    <p>We will notify you via email and assist in finding alternative bookings.</p>

    <h2>3. Refund Policy:</h2>
    <p>Refunds will be credited to the original mode of payment.</p>
    <p>In cases of partial cancellations, refunds will be processed based on the cancellation terms provided by the service provider.</p>
    <p>Processing times may vary depending on the payment gateway or bank.</p>
    <p>No refunds will be given for no-shows or failure to cancel within the required timeframe.</p>

</body>

</html>

    ', 200);
});


Route::get('terms_and_conditions.html', function () {
    return response()->make('
       <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #2a2a2a;
        }

        h2 {
            color: #2a2a2a;
            margin-top: 20px;
        }

        p {
            margin: 10px 0;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Terms and Conditions</h1>

    <h2>1. Acceptance of Terms:</h2>
    <p>By using <span class="bold">"www.viharr.com,"</span> you agree to abide by these Terms and Conditions. Please read them carefully before making any bookings.</p>

    <h2>2. Booking Terms:</h2>
    <p>All bookings made through our platform are subject to availability.</p>
    <p>You are responsible for ensuring that all information provided is accurate and complete at the time of booking.</p>
   

    <h2>3. Pricing and Payment:</h2>
    <p>Prices listed on the website are inclusive of taxes and service fees.</p>
    <p>Payment must be made at the time of booking. We accept Gpay,PhonePay Card Payments.</p>
    <p>We reserve the right to change prices at any time without notice, but any confirmed booking will not be affected.</p>

    <h2>4. Intellectual Property:</h2>
    <p>All content on the website, including text, images, and logos, is the intellectual property of <span class="bold">"www.viharr.com"</span> or its licensors.</p>
    <p>You may not copy, distribute, or reproduce any content without our permission.</p>

    <h2>5. Limitation of Liability:</h2>
    <p><span class="bold">"www.viharr.com"</span> is not liable for any direct or indirect damages arising from the use of this platform, including but not limited to lost bookings or delays caused by service providers.</p>
    <p>We are also not responsible for any personal injury or damage during your travel or stay booked through our platform.</p>

    <h2>6. Amendments to Terms:</h2>
    <p>We reserve the right to update or change these Terms and Conditions at any time.</p>
    <p>Continued use of the platform after any changes implies your acceptance of the revised terms.</p>

    <h2>7. Governing Law:</h2>
    <p>These Terms and Conditions are governed by the laws of India, Maharashtra, and any disputes will be handled in accordance with local courts.</p>

</body>

</html>

    ', 200);
});


