<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM events ORDER BY eventDate ASC LIMIT 5";
$featuredEventSql = "SELECT * FROM events ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);
$featuredEvent = $conn->query($featuredEventSql)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Event Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff8c00;
            --accent-color: #007bff;
            --bg-light: #f8f9fa;
            --bg-gradient: linear-gradient(135deg, #f0f4f8, #e0e5e8);
            --text-dark: #333;
            --text-light: #777;
            --success-color: #28a745;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.8rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            font-size: 1rem;
            transition: color 0.3s;
        }

        nav a:hover {
            color: var(--primary-color);
        }

        .dashboard {
            display: flex;
            gap: 2rem;
            padding: 2rem;
        }

        .sidebar {
            width: 250px;
            background: #2d3b41;
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
        }

        .sidebar h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 1rem 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ccc;
            display: block;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: var(--primary-color);
            color: white;
        }

        .dashboard-content {
            flex: 1;
        }

        .card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .event-card {
            background-color: var(--bg-light);
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 1rem;
            transition: transform 0.3s;
        }

        .event-card:hover {
            transform: translateY(-8px);
        }

        .event-title {
            font-size: 1.2rem;
            color: var(--text-dark);
        }

        .event-venue {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .event-date {
            font-size: 1rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .btn {
            text-decoration: none;
            padding: 0.6rem 1rem;
            color: white;
            border-radius: 5px;
            display: inline-block;
            margin-top: 1rem;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--primary-color);
        }

        .btn-secondary {
            background-color: var(--accent-color);
        }

        .featured-event {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
        }

        .featured-event-content h2 {
            font-size: 1.6rem;
            color: var(--primary-color);
        }

        .event-details {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .event-details span {
            background-color: var(--accent-color);
            padding: 0.5rem 1rem;
            color: white;
            border-radius: 5px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1><i class="fas fa-calendar-alt"></i> EventHub</h1>
            <nav>
                <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($username); ?></span>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
    </header>

    <main class="dashboard">
        <aside class="sidebar">
            <h3><i class="fas fa-user-circle"></i> My Account</h3>
            <ul>
                <li><a href="user.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-calendar-check"></i> My Events</a></li>
                <li><a href="#"><i class="fas fa-user-edit"></i> Profile</a></li>
                <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>

            <h3><i class="fas fa-calendar-day"></i> Quick Actions</h3>
            <ul>
                <li>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create Event
                    </a>
                </li>
            </ul>
        </aside>

        <div class="dashboard-content">
            <?php if ($featuredEvent): ?>
            <div class="featured-event">
                <div class="featured-event-content">
                    <h2><?php echo htmlspecialchars($featuredEvent['eventName']); ?></h2>
                    <p><?php echo htmlspecialchars(substr($featuredEvent['eventDescription'], 0, 150)); ?>...</p>
                    <div class="event-details">
                        <span><i class="fas fa-calendar-day"></i> <?php echo date('M j, Y', strtotime($featuredEvent['eventDate'])); ?></span>
                        <span><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($featuredEvent['eventVenue']); ?></span>
                    </div>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-ticket-alt"></i> Register Now
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <div class="card">
                <h2><i class="fas fa-fire"></i> Trending Events</h2>
                <div class="event-grid">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="event-card">
                                <div class="event-card-content">
                                    <span class="event-date"><?php echo date('M j', strtotime($row["eventDate"])); ?></span>
                                    <h3 class="event-title"><?php echo htmlspecialchars($row["eventName"]); ?></h3>
                                    <p class="event-venue"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row["eventVenue"]); ?></p>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Details</a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No upcoming events found</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
