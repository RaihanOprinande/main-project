<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <!-- Internal CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer {
            background-color: #ffffffef;
            color: #000000;
            padding: 40px 0 0;
            font-family: Arial, sans-serif;
        }

        .footer-border {
            border-top: 1px solid #c5c5c5;
            margin-bottom: 40px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-left {
            flex: 1;
            max-width: 30%;
            margin-right: 20px;
        }

        .footer-left h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer-left p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer-middle {
            display: flex;
            flex: 2;
            justify-content: space-around;
        }

        .footer-section h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #000000;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            text-decoration: none;
            color: #000000;
            font-size: 14px;
        }

        .footer-right {
            flex: 1;
            max-width: 30%;
        }

        .footer-contact p {
            margin: 8px 0;
            font-size: 14px;
            color: #000000;
        }

        .social-media a {
            margin-right: 10px;
            font-size: 20px;
            color: #000000;
            text-decoration: none;
        }

        .social-media a:hover {
            color: #777777;
        }

        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 14px;
            color: #000000;
        }
    </style>
</head>
<body>

<div class="content">
    <!-- Your main content goes here -->
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-border"></div>
        <div class="footer-container">
            <div class="footer-left">
                <h2>Influenca</h2>
                <p>Influence Marketing Agency</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.</p>
                <p><i class="fa fa-map-marker"></i> London Eye, London UK</p>
            </div>

            <div class="footer-middle">
                <div class="footer-section">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="/index">Home</a></li>
                        <li><a href="{{ route('sepatu.kategori', ['kategori' => 'pria']) }}">Men</a></li>
                        <li><a href="{{ route('sepatu.kategori', ['kategori' => 'wanita']) }}">Women</a></li>
                        <li><a href="/aboutus">About us</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Quick Link</h4>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Booking</a></li>
                        <li><a href="#">Pages</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-right">
                <div class="footer-section">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">404</a></li>
                    </ul>
                </div>

                <div class="footer-contact">
                    <p><i class="fa fa-phone"></i> (+62) 822 8514 1312</p>
                    <p><i class="fa fa-envelope"></i> mail@exmaple.id</p>
                    <div class="social-media">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Influenca Template - All Rights Reserved</p>
        </div>
    </div>
</footer>

</body>
</html>
