<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Professional Visiting Card</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: #1e1e2f; /* Dark background */
        color: #ffffff;
        background-image: url("https://www.transparenttextures.com/patterns/hexellence.png"); /* Coding-related hexagonal background */
      }

      .custom-design {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .card-container {
        position: relative;
        background: linear-gradient(145deg, #f5f5f5, #e4e4e4); /* Soft gradient background */
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        max-width: 600px;
        width: 90%; /* Responsive width */
        border: 5px solid #00bfff; /* Frame effect */
        margin: auto;
      }

      .circle {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background-color: #00bfff;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 20px;
      }

      .inner-circle img {
        width: 190px;
        height: 190px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #ffffff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      }

      .logo-section {
        text-align: center;
        margin-left: 20px;
      }

      .triangle {
        width: 0;
        height: 0;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-bottom: 40px solid #00bfff;
        margin-bottom: 10px;
      }

      .logo-text {
        font-size: 24px;
        font-weight: bold;
        color: #333;
      }

      .tagline {
        font-size: 14px;
        color: #555;
      }

      @media (max-width: 768px) {
        .card-container {
          flex-direction: column;
          text-align: center;
        }

        .circle {
          margin: 0 auto 20px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="custom-design">
        <div class="card-container">
          <div class="circle">
            <div class="inner-circle">
              <img
                src="https://avatars.githubusercontent.com/u/176903235?v=4"
                alt="Placeholder"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="logo-section">
            <div class="triangle"></div>
            <h2 class="logo-text">MahiUddin Samad</h2>
            <p class="tagline">Jr. Software Developer</p>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
