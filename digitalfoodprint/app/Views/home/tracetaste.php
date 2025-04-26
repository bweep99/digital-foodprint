<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Foodprint</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/tracetaste.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="logo">
                    <img src="assets/images/logo.png" alt="Digital Foodprint">
                </div>
                <ul class="nav-links">
                    <li><a href="/home">HOME</a></li>
                    <li><a href="/tracetaste">TRACE & TASTE</a></li>
                    <li><a href="/growpedia">GROWPEDIA</a></li>
                </ul>
                <div class="menu-toggle">☰</div>
            </nav>
        </header>
        <section class="hero">
            <div class="hero-top">
              <div class="trace-taste-logo">
                <img src="/assets/images/tracetaste/truck.png" alt="Truck Icon" class="truck-icon">
                <div class="trace-taste-text">
                  <span class="trace">TRACE &</span><br>
                  <span class="taste">TASTE</span>
                </div>
              </div>              
              <div class="hero-text">
                <h2>How Does it Happen?</h2>
                <p>
                  Indonesia is made up of over 17,000 islands — and that means food takes many different paths to reach your plate. 
                  Some travel by boat across the sea, some by truck over long winding roads, and others through small village trails.
                </p>
                <p>
                  With the Food Tracker, you can explore how different crops move across land, sea, and sky — from farmers in remote villages to markets in the city.
                </p>
              </div>
            </div>
            <div class="cards-container">
                <div class="card">
                  <h3>JAWA JOURNEY</h3>
                  <img src="assets/images/tracetaste/Jawa.png" alt="Jawa Journey">
                  <button id="openJawaModal">Learn More !</button>
                  
                </div>
          
                <div class="card">
                  <h3>KALIMANTAN KRAZE</h3>
                  <img src="assets/images/tracetaste/Kalimantan.png" alt="Kalimantan Kraze">
                  <button id="openKalimantanModal">Learn More !</button>
                </div>
          
                <div class="card">
                  <h3>SUMATRA STRIDE</h3>
                  <img src="assets/images/tracetaste/Sumatra.png" alt="Sumatra Stride">
                  <button id="openSumatraModal">Learn More !</button>
                </div>
                <div style="height: 100px;"></div>
              </div>
            </div>
            <!-- Jawa Journey Modal -->
          <div id="jawaModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <img src="assets/images/tracetaste/jawa/new.png" alt="Jawa Journey Flowchart" class="flowchart-img">
            </div>
          </div>
          <!-- Kalimantan Modal -->
          <div id="kalimantanModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <img src="assets/images/tracetaste/kalimantan/new.png" alt="Kalimantan Journey Flowchart" class="flowchart-img">
            </div>
          </div>

        <!-- Sumatra Modal -->
          <div id="sumatraModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <img src="assets/images/tracetaste/sumatra/new.png" alt="Sumatra Journey Flowchart" class="flowchart-img">
            </div>
          </div>
          </section>
        <script src="assets/js/script.js"></script>
    </body>
</html>
