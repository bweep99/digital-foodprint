<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Digital Foodprint - SHIP IT OUT!</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background-color:rgb(236, 255, 237);
      overflow-x: hidden;
    }

    header {
      background-color:  #c8e6c9;
      color: #00796b;
      padding: 20px;
      text-align: center;
      box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .map-container {
      position: relative;
      margin: 20px auto;
      width: 80%;
      max-width: 800px;
    }

    .map {
      width: 0%;
      border-radius: 12px;
      box-shadow: 0 0 8px rgba(0,0,0,0.2);
    }

    .boat {
      position: absolute;
      width: 40px;
      top: 50%;
      left: 5%;
      transition: all 2s ease;
    }

    .region-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      padding: 20px;
    }

    .region {
      background: #fff7e6;
      border-radius: 12px;
      padding: 16px;
      width: 220px;
      box-shadow: 0 0 6px rgba(0,0,0,0.1);
      text-align: center;
    }

    .region img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .item {
      margin: 8px 0;
    }

    button {
      padding: 6px 12px;
      background: #43a047;
      color: #fff7e6;
      border: none;
      border-radius: 6px;
      margin: 4px;
      cursor: pointer;
    }

    .status-bar {
      background: #fff7e6;
      padding: 10px;
      text-align: center;
      margin-top: 20px;
      box-shadow: 0 0 6px rgba(0,0,0,0.1);
    }

    .popup-level, .victory-popup, .notif-popup {
      position: fixed;
      top: 20%;
      left: 50%;
      transform: translateX(-50%);
      background: #fff176;
      padding: 20px 30px;
      border-radius: 12px;
      font-size: 22px;
      font-weight: bold;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      animation: fadePop 0.7s ease;
      z-index: 9999;
      display: none;
      text-align: center;
    }

    .victory-popup {
      background-color: #d1ffd1;
    }

    .victory-popup button {
      background: #00796b;
      margin-top: 10px;
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

    @keyframes fadePop {
      0% { opacity: 0; transform: translate(-50%, -20%) scale(0.8); }
      60% { opacity: 1; transform: translate(-50%, -50%) scale(1.1); }
      100% { transform: translate(-50%, -50%) scale(1); }
    }

    canvas#confetti-canvas {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      pointer-events: none;
      z-index: 9998;
    }
  </style>
</head>
<body>

<header>
  <h1>SHIP IT OUT!</h1>
  <p>Distribute each island's authentic crops and be the best trader around!</p>
  <a href='/growpedia' class="button-link">Back to Growpedia</a>
    
</header>

<canvas id="confetti-canvas"></canvas>

<div class="map-container">
  <img src="assets/images/growpedia/transparent.png" class="map" alt="Map Indonesia">
  <img src="assets/images/growpedia/transparent.png" class="boat" id="boat" alt="Boat">
</div>

<div class="status-bar" id="status">
  <strong>Money:</strong> Rp3000000 | <strong>Level:</strong> Starter  (XP: 0)
</div>

<div class="region-list" id="regions"></div>

<div id="popup-level" class="popup-level"></div>
<div id="victoryPopup" class="victory-popup">
  <p>🎉 Good job! You are now the King of Trades 🎉</p>
  <button onclick="restartGame()">restartGame</button>
  <button onclick="exitGame()">exitGame</button>
</div>
<div id="notifPopup" class="notif-popup"></div>

<audio id="level-up-sound" src="https://www.soundjay.com/human/sounds/applause-2.mp3"></audio>
<audio id="winSound" src="https://www.soundjay.com/human/sounds/cheering-01.mp3"></audio>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
  const player = {
    money: 3000000,
    inventory: {},
    xp: 0,
    won: false
  };

  const commodities = {
    'Rice': { basePrice: 98000 },
    'Rubber': { basePrice: 31000 },
    'Vegtable': { basePrice: 160000 },
    'Palm Oil': { basePrice: 100000 },
    'Coffee': { basePrice: 98000 },
    'Corn':{basePrice: 85000},
    'Sweet Potato':{basePrice: 90000}
  };

  const levels = [
    { name: "Novice trader", xp: 10 },
    { name: "Skilled trader", xp: 500 },
    { name: "Expert trader", xp: 1200 },
    { name: "Best trader", xp: 2500 },
    { name: "King of trades", xp: 10000 }
  ];

  const regions = [
    { name: 'Sumatra Island', produces: ['Rubber', 'Rice', 'Palm Oil'], img: 'assets/images/tracetaste/Sumatra.png', x: '18%' },
    { name: 'Java Island', produces: ['Vegtable', 'Rice', 'Coffee'], img: 'assets/images/tracetaste/Jawa.png', x: '35%' },
    { name: 'Kalimantan Island', produces: ['Sweet Potato', 'Corn'], img: 'assets/images/tracetaste/Kalimantan.png', x: '50%' }
  ];

  let lastLevel = "";
  const levelUpSound = document.getElementById("level-up-sound");
  const winSound = document.getElementById("winSound");

  function getRandomPrice(base) {
    return Math.floor(base * (0.5 + Math.random() * 0.5));
  }

  function getLevel() {
    return levels.slice().reverse().find(lvl => player.xp >= lvl.xp).name;
  }

  function moveBoat(xPos) {
    document.getElementById("boat").style.left = xPos;
  }

  function showNotification(message) {
    const notif = document.getElementById("notifPopup");
    notif.innerText = message;
    notif.style.display = "block";
    setTimeout(() => notif.style.display = "none", 3000);
  }

  function showLevelUpPopup(levelName) {
    const popup = document.getElementById("popup-level");
    popup.innerText = `🎖️ Level Up: ${levelName}!`;
    popup.style.display = "block";
    levelUpSound.play();
    setTimeout(() => {
      popup.style.display = "none";
    }, 2500);
  }

  function launchConfetti() {
    const duration = 5 * 1000;
    const end = Date.now() + duration;

    const frame = () => {
      confetti({
        particleCount: 5,
        angle: 60,
        spread: 55,
        origin: { x: 0 }
      });
      confetti({
        particleCount: 5,
        angle: 120,
        spread: 55,
        origin: { x: 1 }
      });

      if (Date.now() < end) requestAnimationFrame(frame);
    };
    frame();
  }

  function updateStatus() {
    const status = document.getElementById("status");
    const currentLevel = getLevel();

    if (currentLevel !== lastLevel && !player.won) {
      showLevelUpPopup(currentLevel);
      lastLevel = currentLevel;
    }

    status.innerHTML = `<strong>Money:</strong> Rp${player.money} | <strong>Level:</strong> ${currentLevel} (XP: ${player.xp})`;

    if (player.xp >= 10000 && !player.won) {
      player.won = true;
      winSound.play();
      launchConfetti();
      document.getElementById("victoryPopup").style.display = "block";
    }
  }

  function renderRegions() {
    const container = document.getElementById("regions");
    container.innerHTML = "";

    regions.forEach(region => {
      const div = document.createElement("div");
      div.className = "region";
      div.innerHTML = `<h3>${region.name}</h3><img src="${region.img}" alt="${region.name}">`;

      region.produces.forEach(item => {
        const price = getRandomPrice(commodities[item].basePrice);
        div.innerHTML += `
          <div class="item">${item} - Rp${price}<br>
            <button onclick="buy('${item}', ${price}, '${region.x}')">Buy</button>
            <button onclick="sell('${item}', ${price}, '${region.x}')">Sell</button>
          </div>
        `;
      });

      container.appendChild(div);
    });

    updateStatus();
  }

  function buy(item, price, xPos) {
    if (player.money >= price) {
      player.money -= price;
      player.inventory[item] = (player.inventory[item] || 0) + 1;
      player.xp += 50;
      moveBoat(xPos);
    } else {
      alert("Sorry! But You don't have enough money");
    }
    renderRegions();
  }

  function sell(item, price, xPos) {
    if (player.inventory[item] > 0) {
      player.money += price;
      player.inventory[item]--;
      player.xp += 50;
      moveBoat(xPos);
    } else {
      alert("You don't have this item.");
      player.xp -= 50;
    }
    renderRegions();
  }

  function restartGame() {
    player.money = 3000000;
    player.inventory = {};
    player.xp = 10;
    player.won = false;
    lastLevel = "Novice trader";
    document.getElementById("victoryPopup").style.display = "none";
    showNotification("Restarting the Game!");
    renderRegions();
  }

  function exitGame() {
    showNotification("Thank you for Playing!");
    setTimeout(() => {
      window.location.href = "about:blank";
    }, 2000);
  }

  window.onload = function () {
    renderRegions();
  };
</script>
</body>
</html>
