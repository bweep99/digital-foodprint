<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EcoBite Quest</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background-color:  #c8e6c9;;
      overflow-x: hidden;
      text-align: center;
    }

    #game-container {
      max-width: 500px;
      margin: 30px auto;
      background-color:rgb(236, 255, 237);
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      padding: 20px;
      text-align: center;
      position: relative;
    }

    h1 {
      color:  #00796b;
      font-size: 26px;
    }

    select {
      padding: 10px;
      font-size: 16px;
      margin-bottom: 12px;
      width: 100%;
      max-width: 300px;
    }

    #score, #high-score {
      font-weight: bold;
      font-size: 18px;
      margin: 5px 0;
    }

    #collect-button, .option-button {
      background-color: #97faad;
      color: whitesmoke;
      border: none;
      padding: 12px 24px;
      margin: 10px 8px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    #collect-button:hover, .option-button:hover {
      background-color: #5cfb20;
    }

    #game-area {
      height: 220px;
      border: 2px dashed #a5fb20;
      margin-top: 20px;
      border-radius: 10px;
      position: relative;
      overflow: hidden;
      background-color:rgb(255, 255, 255);
    }

    .foodprint {
      font-size: 24px;
      position: absolute;
      animation: bounce 0.5s ease;
      cursor: pointer;
      padding: 5px 10px;
      background-color: #fff7e6;
      border-radius: 6px;
      border: 1px solid #b6faa5;
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

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }

    .fade-out {
      animation: fade 0.5s forwards;
    }

    @keyframes fade {
      from { opacity: 1; }
      to { opacity: 0; transform: scale(0.5); }
    }

    .end-message {
      font-size: 22px;
      font-weight: bold;
      margin-top: 20px;
      animation: popUp 0.6s ease;
    }

    @keyframes popUp {
      0% { transform: scale(0); opacity: 0; }
      60% { transform: scale(1.2); opacity: 1; }
      100% { transform: scale(1); }
    }

    .shake {
      animation: shake 0.4s ease-in-out;
    }

    @keyframes shake {
      0% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      50% { transform: translateX(10px); }
      75% { transform: translateX(-5px); }
      100% { transform: translateX(0); }
    }

    @media (max-width: 600px) {
      #game-container {
        width: 90%;
        padding: 15px;
      }
      h1 { font-size: 22px; }
      .foodprint { font-size: 20px; }
    }
  </style>
</head>
<body>
  <div id="game-container">
    <a href='/growpedia' class="button-link">Back to Growpedia</a>
    <h1>ECOBITE QUEST</h1>
    <p>Pick a region and click 🌱. Catch the correct commodity based on the region you picked</p>
    
    
    <select id="region-select">
      <option value="Sumatra Island">Sumatra Island</option>
      <option value="Java Island">Java Island</option>
      <option value="Kalimantan Island">Kalimantan Island</option>
    </select>

    <p id="score">Score: 0</p>
    <p id="high-score">High Score: 0</p>

    <button id="collect-button">Collect 🌱</button>
    <div id="game-area"></div>

    <div id="end-options" style="display: none;">
      <p id="end-message" class="end-message"></p>
      <button class="option-button" id="play-again">Play again 🔁</button>
      <button class="option-button" id="exit">Ex 🚪</button>
    </div>
  </div>

  <!-- Sound Effects -->
  <audio id="correct-sound" src="https://www.soundjay.com/buttons/sounds/button-3.mp3"></audio>
  <audio id="wrong-sound" src="https://www.soundjay.com/buttons/sounds/button-10.mp3"></audio>
  <audio id="win-sound" src="https://www.soundjay.com/human/sounds/applause-8.mp3"></audio>
  <audio id="lose-sound" src="https://www.soundjay.com/button/sounds/beep-07.mp3"></audio>

  <!-- Confetti -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

  <script>
    let score = 0;
    let highScore = localStorage.getItem('highScore') || 0;

    const scoreDisplay = document.getElementById('score');
    const highScoreDisplay = document.getElementById('high-score');
    const gameArea = document.getElementById('game-area');
    const collectButton = document.getElementById('collect-button');
    const regionSelect = document.getElementById('region-select');
    const correctSound = document.getElementById('correct-sound');
    const wrongSound = document.getElementById('wrong-sound');
    const winSound = document.getElementById('win-sound');
    const loseSound = document.getElementById('lose-sound');
    const endMessage = document.getElementById('end-message');
    const endOptions = document.getElementById('end-options');
    const playAgain = document.getElementById('play-again');
    const exit = document.getElementById('exit');

    const foods = ["Palm Oil", "Rice", "Rubber", "Vegetables", "Sweet Potato", "Corn"];
    const regionFoods = {
      "Sumatra Island": ["Palm Oil", "Rice", "Rubber"],
      "Java Island": ["Vegetables", "Rice"],
      "Kalimantan Island": ["Sweet Potato", "Corn"],
    };

    function updateScore() {
      scoreDisplay.innerText = `Score: ${score}`;
      if (score > highScore) {
        highScore = score;
        localStorage.setItem('highScore', highScore);
        highScoreDisplay.innerText = `High Score: ${highScore}`;
      }

      if (score >= 50) {
        showEndGame(true);
      } else if (score <= -50) {
        showEndGame(false);
      }
    }

    function showEndGame(isWin) {
      collectButton.disabled = true;
      endOptions.style.display = "block";

      if (isWin) {
        endMessage.innerText = "Good Job, your our Harvest Hero! 🎉";
        winSound.play();

        const duration = 3 * 1000;
        const animationEnd = Date.now() + duration;
        const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 2000 };
        const interval = setInterval(() => {
          const timeLeft = animationEnd - Date.now();
          if (timeLeft <= 0) clearInterval(interval);
          const particleCount = 50 * (timeLeft / duration);
          confetti(Object.assign({}, defaults, {
            particleCount,
            origin: { x: Math.random(), y: Math.random() - 0.2 }
          }));
        }, 250);
      } else {
        endMessage.innerText = "Try Again 😢";
        loseSound.play();
        gameArea.classList.add('shake');
        setTimeout(() => gameArea.classList.remove('shake'), 500);
      }
    }

    function spawnFoodprint() {
      const food = foods[Math.floor(Math.random() * foods.length)];
      const region = regionSelect.value;
      const correctFoods = regionFoods[region];

      const foodprint = document.createElement('div');
      foodprint.className = 'foodprint';
      foodprint.innerText = food;
      foodprint.style.top = Math.random() * 170 + 'px';
      foodprint.style.left = Math.random() * 270 + 'px';
      gameArea.appendChild(foodprint);

      foodprint.addEventListener('click', function () {
        if (correctFoods.includes(food)) {
          score += 5;
          correctSound.play();
        } else {
          score -= 5;
          wrongSound.play();
        }
        updateScore();
        this.classList.add('fade-out');
        setTimeout(() => this.remove(), 500);
      });

      setTimeout(() => {
        if (foodprint.parentNode) {
          foodprint.classList.add('fade-out');
          setTimeout(() => foodprint.remove(), 500);
        }
      }, 3000);
    }

    collectButton.addEventListener('click', spawnFoodprint);

    playAgain.addEventListener('click', () => {
      score = 0;
      updateScore();
      gameArea.innerHTML = '';
      collectButton.disabled = false;
      endOptions.style.display = "none";
    });

    exit.addEventListener('click', () => {
      endMessage.innerText = "Thank you for playing! 🌾💚";
      gameArea.innerHTML = '';
      collectButton.disabled = true;
      playAgain.style.display = "none";
      exit.style.display = "none";
    });

    highScoreDisplay.innerText = `High Score: ${highScore}`;
    updateScore();
  </script>
</body>
</html>
