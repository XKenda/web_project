<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Coffee House</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="header-content">
            <h1>World of Premium Coffee</h1>
            <p class="tagline"><i>Your Perfect Coffee Experience</i></p>
            <?php if(isset($_SESSION['user_name'])): ?>
            <p class="welcome-msg">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            <?php endif; ?>
        </div>
    </header>

    <nav class="main-nav">
        <ul>
            <li><a href="index.html" class="active">Home</a></li>
            <li><a href="menu.html">Food Menu</a></li>
            <li><a href="drinks.html">Drinks</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
            <?php else: ?>
            <li><a href="sign_up.php" class="login-btn">Login/Signup</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main>
        <section class="hero">
            <h2>Welcome to Premium Coffee House</h2>
            <p>Discover the finest coffee and delicious dishes in a cozy atmosphere</p>
        </section>

        <section class="featured">
            <h2>Our Specialties</h2>
            <div class="featured-items">
                <div class="featured-item">
                    <h3>Premium Coffee</h3>
                    <p>Expertly roasted beans and perfectly crafted drinks</p>
                    <a href="drinks.html" class="btn-link">View Drinks Menu</a>
                </div>
                <div class="featured-item">
                    <h3>Gourmet Food</h3>
                    <p>Delicious meals prepared with the finest ingredients</p>
                    <a href="menu.html" class="btn-link">View Food Menu</a>
                </div>
            </div>
        </section>

        <section id="about" class="about-section">
            <h2>About Us</h2>
            <p>At Premium Coffee House, we are passionate about delivering the highest quality coffee experiences. 
                Our beans are ethically sourced and carefully roasted to perfection.</p>
        </section>

        <section id="contact" class="contact-section">
            <h2>Contact Us</h2>
            <form id="contact-form" class="contact-form">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <button type="submit" class="btn">Send Message</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Premium Coffee House. All rights reserved.</p>
    </footer>
</body>
</html> 