<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;  
}

// Fetch events
$eventsSql = "SELECT * FROM events";
$eventsResult = $conn->query($eventsSql);

// Count events
$countEvents = $conn->query("SELECT COUNT(*) as total FROM events")->fetch_assoc();

// Count users
$countUsers = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Event Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background-color: #f4f6f8;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            padding: 1rem 2rem;
            color: white;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #f1c40f;
        }

        main.dashboard {
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #34495e;
            padding: 1.5rem 1rem;
            min-height: 100vh;
            color: white;
        }

        .sidebar h3 {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 1rem;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #1abc9c;
        }

        .dashboard-content {
            flex: 1;
            padding: 2rem;
        }

        .stats-grid {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            flex: 1;
        }

        .stat-card h3 {
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-weight: bold;
            color: #2980b9;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 0.4rem 0.8rem;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-success {
            background-color: #27ae60;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        table th, table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        table th {
            background-color: #ecf0f1;
            font-weight: 600;
        }

        table td img.event-image {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
        }

        .card h2 {
            margin-bottom: 1rem;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-bar input {
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        @media (max-width: 768px) {
            .stats-grid {
                flex-direction: column;
            }

            .sidebar {
                display: none;
            }

            .dashboard-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1><i class="fas fa-calendar-alt"></i> Admin Dashboard</h1>
            <nav>
                <span><i class="fas fa-user-shield"></i> Admin</span>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
    </header>
    <main class="dashboard">
        <aside class="sidebar">
            <h3><i class="fas fa-tachometer-alt"></i> Menu</h3>
            <ul>
                <li><a href="admin.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-calendar-plus"></i> Add Event</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </aside>
        <div class="dashboard-content">
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Events</h3>
                    <p><?php echo $countEvents['total']; ?></p>
                    <a href="#" class="btn"><i class="fas fa-eye"></i> View All</a>
                </div>
                <div class="stat-card">
                    <h3>Registered Users</h3>
                    <p><?php echo $countUsers['total']; ?></p>
                    <a href="#" class="btn"><i class="fas fa-users"></i> Manage</a>
                </div>
                <div class="stat-card">
                    <h3>Upcoming Events</h3>
                    <p>5</p>
                    <a href="#" class="btn"><i class="fas fa-calendar-check"></i> View</a>
                </div>
            </div>
            
            <div class="card">
                <h2><i class="fas fa-calendar"></i> Event Management</h2>
                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                    <a href="#" class="btn btn-success"><i class="fas fa-plus"></i> Add New Event</a>
                    <div class="search-bar">
                        <input type="text" placeholder="Search events...">
                        <button class="btn"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Event No</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($eventsResult->num_rows > 0) {
                            while($row = $eventsResult->fetch_assoc()) {
                                $imageFile = "event" . substr($row["eventNo"], -1) . ".jpg";
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["eventNo"] . "</td>";
                                echo "<td>" . $row["eventName"] . "</td>";
                                echo "<td>" . $row["eventDate"] . "</td>";
                                echo "<td>" . $row["eventVenue"] . "</td>";
                                echo "<td><img src='$imageFile' class='event-image' alt='" . $row["eventName"] . "'></td>";
                                echo "<td>
                                        <a href='#' class='btn'><i class='fas fa-edit'></i></a>
                                        <a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No events found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
