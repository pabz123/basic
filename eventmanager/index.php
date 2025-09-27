<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Event Manager App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(135deg, #a8dadc, #457b9d);
            background-size: cover;
            background-attachment: fixed;
            color: #333;
        }

        .overlay {
            background: rgba(255, 255, 255, 0.3);
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 4rem 2rem;
        }

        .logo {
            font-size: 3rem;
            font-weight: 800;
            color: #ffd700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1.5s ease-out;
        }

        .tagline {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #fff;
            animation: fadeIn 2s ease-out 0.3s;
        }

        .btn-login {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            background-color: #ffd700;
            color: #222;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 2s ease-out 0.8s;
        }

        .btn-login:hover {
            background-color: #e6c200;
            transform: scale(1.05);
        }

        .features {
            margin-top: 4rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            padding: 2rem;
            animation: fadeIn 2s ease-out 1s;
        }

        .feature {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid #eee;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature i {
            font-size: 2.2rem;
            color: #ffd700;
            margin-bottom: 1rem;
        }

        .feature h3 {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
            color: #222;
        }

        .feature p {
            font-size: 0.95rem;
            color: #555;
        }

        .footer {
            margin-top: 4rem;
            font-size: 0.95rem;
            text-align: center;
            color: #f0f0f0;
            padding: 2rem 1rem;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .contact {
            margin-top: 1rem;
            font-size: 1rem;
        }

        .contact a {
            color: #ffd700;
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .logo {
                font-size: 2.2rem;
            }

            .tagline {
                font-size: 1.1rem;
            }

            .btn-login {
                font-size: 1rem;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="content">
        <div class="logo"><i class="fas fa-calendar-day"></i> Event Manager</div>
        <div class="tagline">Plan • Promote • Manage Memorable Events</div>
        <a href="login.php" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login Now</a>

        <div class="features">
            <div class="feature">
                <i class="fas fa-calendar-alt"></i>
                <h3>Schedule Events</h3>
                <p>Plan your events, set schedules, and manage timelines effortlessly.</p>
            </div>
            <div class="feature">
                <i class="fas fa-users-cog"></i>
                <h3>Manage Participants</h3>
                <p>Add hosts, assign roles, and send out invitations easily.</p>
            </div>
            <div class="feature">
                <i class="fas fa-ticket-alt"></i>
                <h3>Ticketing & RSVP</h3>
                <p>Automate booking and confirmation with built-in ticketing.</p>
            </div>
            <div class="feature">
                <i class="fas fa-comments"></i>
                <h3>Live Feedback</h3>
                <p>Engage your audience with real-time comments and polls.</p>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date("Y"); ?> Event Manager App. All rights reserved.
            <div class="contact">
                For more info, email: <a href="mailto:mulungipabire11@gmail.com">mulungipabire11@gmail.com</a>
            </div>
        </div>
    </div>
</body>
</html>
