<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nusantara Harvest</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background-color:rgb(236, 255, 237);
      overflow-x: hidden;
      text-align: center;
    }
    header {
      background-color:  #c8e6c9;
      color: #00796b;
      padding: 20px;
      text-align: center;
      box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .button-link {
      display: inline-block;
      background-color: white;
      color: #006400; /* dark green */
      padding: 10px 20px;
      text-decoration: none;
      border: 2px solid #006400;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s, color 0.3s;
    }

    .button-link:hover {
          background-color: #006400;
          color: white;
    }
    .game-container {
      max-width: 900px;
      margin: 2rem auto;
      padding: 1rem;
      background: #fff7e6;
      border-radius: 3rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    select, button {
      padding: 0.5rem;
      font-size: 1rem;
      margin: 0.5rem;
    }
    .result {
      margin-top: 1rem;
      font-weight: bold;
    }
    .region-info {
      text-align: left;
      margin-top: 2rem;
    }
    .region-info h3 {
      margin-bottom: 0.25rem;
      color: #007bff;
    }
  </style>
</head>
<body>
  <header>
    <h1>NUSANTARA HARVEST</h1>
    <p>Pick the right crops for each region in Indonesia!</p>
    <a href='/growpedia' class="button-link">Back to Growpedia</a>
  </header> 
  </header>

  <div class="game-container">
    <label for="region">Choose a region:</label>
    <select id="region">
      <option value="P.Sumatera">P.Sumatera</option>
      <option value="P.Jawa">P.Jawa</option>
      <option value="P.Kalimantan">P.Kalimantan</option>
    </select>

    <label for="crop">Choose a crop:</label>
    <select id="crop">
      <option value="Padi">Padi</option>
      <option value="Karet">Karet</option>
      <option value="Sawit">Sawit</option>
    </select>

    <button onclick="checkAnswer()">Check</button>
    <div class="result" id="result"></div>

    <div class="region-info">
      <h3>Regions and Provinces:</h3>
      <ul>
        <li><strong>P.Sumatera</strong>: Sumatera Utara, Sumatera Selatan, Sumatera Barat, Bengkulu, Riau, Kepulauan Riau, Jambi, Lampung, Bangka Belitung</li>
        <li><strong>P.Jawa</strong>: Banten, Jawa Barat, DKI Jakarta, Jawa Tengah, Jawa Timur, D.I. Yogyakarta </li>
        <li><strong>P.Kalimantan</strong>: Kalimantan Barat, Kalimantan Timur, Kalimantan Selatan, Kalimantan Tengah, Kalimantan Utara</li>
      </ul>
    </div>
  </div>

  <script>
    const correctAnswers = {
      "P.Sumatera": "Sawit", 
      "P.Jawa":"Padi",
      "P.Kalimantan": "Karet",
    };

    function checkAnswer() {
      const region = document.getElementById("region").value;
      const crop = document.getElementById("crop").value;
      const result = document.getElementById("result");

      if (correctAnswers[region] === crop) {
        result.innerHTML = `✅ Benar! ${crop} cocok ditanam di wilayah ${region}.`;
        result.style.color = 'green';
      } else {
        result.innerHTML = `❌ Salah! ${crop} bukan hasil utama wilayah ${region}.`;
        result.style.color = 'red';
      }
    }
  </script>
</body>
</html>