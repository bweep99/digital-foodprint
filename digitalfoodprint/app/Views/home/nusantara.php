<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Digital Foodprint</title>
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
      color:  #006400;
    }
  </style>
</head>
<body>
  <header>
    <h1>NUSANTARA HARVEST</h1>
    <p>Pick the right crops for each region in Indonesia!</p>
    <a href='/growpedia' class="button-link">Back to Growpedia</a>
  </header>

  <div class="game-container">
    <label for="region">Choose a region:</label>
    <select id="region">
      <option value="Sumatra island">Sumatra Island</option>
      <option value="Java island">Java Island</option>
      <option value="Kalimantan island">Kalimantan Island</option>
    </select>

    <label for="crop">Choose a crop:</label>
    <select id="crop">
      <option value="Rice">Rice</option>
      <option value="Rubber">Rubber</option>
      <option value="Palm Oil">Palm Oil</option>
    </select>

    <button onclick="checkAnswer()">Check</button>
    <div class="result" id="result"></div>

    <div class="region-info">
      <h3>Regions and Provinces:</h3>
      <ul>
      <li><strong>Sumatra Island</strong>: North Sumatra, South Sumatra, West Sumatra, Bengkulu, Riau, Riau Islands, Jambi, Lampung, Bangka Belitung</li>
     <li><strong>Java Island</strong>: Banten, West Java, DKI Jakarta, Central Java, East Java, Special Region of Yogyakarta</li>
<li><strong>Kalimantan Island</strong>: West Kalimantan, East Kalimantan, South Kalimantan, Central Kalimantan, North Kalimantan</li>

      </ul>
    </div>
  </div>

  <script>
    const correctAnswers = {
      "Sumatra Island": "Palm Oil", 
      "Java Island":"Rice",
      "Kalimantan Island": "Rubber",
    };

    function checkAnswer() {
      const region = document.getElementById("region").value;
      const crop = document.getElementById("crop").value;
      const result = document.getElementById("result");

      if (correctAnswers[region] === crop) {
        result.innerHTML = `✅ Correct! ${crop} is a/an authentic crop of ${region}.`;
        result.style.color = 'green';
      } else {
        result.innerHTML = `❌ Wrong! ${crop} is not a/an authentic crop of ${region}.`;
        result.style.color = 'red';
      }
    }
  </script>
</body>
</html>