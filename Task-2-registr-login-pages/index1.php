<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Landing Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      line-height: 1.6;
     
      background-color: #030303;
      background-size: 100%;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    header {
     
      background: transparent;
      color:transparent;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      backdrop-filter: blur(3px);
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
      color: #fff
    }

    nav {
      position: relative;
      top: 0;
      color: #fff;
    }

    .nav-links {
      display: flex;
      gap: 1.5rem;
      list-style: none;
    }

    .nav-item {
      position: relative;    
    }

    .dropdown-content {
      display: none;
      position: absolute;
      backdrop-filter: blur(5px);
      background: linear-gradient(to top, #5089df, transparent);
      color: #333;
      min-width: 150px;
      top: 40px;
      left: 0;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      border-radius: 10px;
      z-index: 1;
    }

    .dropdown-content a {
      display: block;
      padding: 0.75rem 1rem;
      color: #fff;
    }

    .nav-item:hover .dropdown-content {
      display: block;
    }

    .background{
      background-image: url(back.jpg);
      background-size: 100%;
    }
    .hero {
      background: linear-gradient(to right, transparent, #000000);
      color: #fff;
      width: 100%;
      background-size: 100%;
      padding: 21.5rem 16rem;
      text-align: center;
    }

    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: #5089df;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 0 auto;
    }

   

    @media (max-width: 768px) {
    .background{
      background-size: 100%;
    }
  header {
    flex-direction: row;
    align-items: flex-start;
    padding: 1rem;
  }

  .nav-links {
    flex-direction: row;
    width: 100%;
    gap: 1rem;
    margin-top: 1rem;
  }

  .hero {
    padding: 18rem 2rem;
    text-align: center;
  }

  .hero h1 {
    font-size: 2rem;
  }

  .hero p {
    font-size: 1rem;
    max-width: 100%;
  }
  .dropdown-content {
    position: static;
    box-shadow: none;
    background: rgba(80, 137, 223, 0.3);
  }

  .nav-item:hover .dropdown-content {
    display: block;
  }

  .logo {
    font-size: 1.25rem;
  }
    }
  </style>
</head>
<body> 
  <header>
    <div class="logo">Mainflow</div>
    <nav>
      <ul class="nav-links">
        <li class="nav-item">
          <a href="#">Home</a>
        </li>
        <li class="nav-item">
          <a href="#down">Features</a>
        </li>
        <li class="nav-item">
          <a href="#About">About</a>
          <div class="dropdown-content" id="About">
            <a href="#">Team</a>
            <a href="#">Mission</a>
            <a href="#">Careers</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="logout.php">logout</a>
        </li>
      </ul>
    </nav>
  </header>
  <section class="background">
  <section class="hero">
    <h1>Welcome to Mainflow</h1>
    <p>Your all-in-one solution to grow faster, smarter, and better.</p>
  </section>
  </section>
</body>
</html>
