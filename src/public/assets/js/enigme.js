(() => {
  const enigmes = {
    ba1: {
      titre: "BA1 - GARROS",
      duree: 30,
      question: "Résous t² - t = 12 (donne les deux solutions, ex: 4 et -3).",
      valider: (val) => {
        const nums = (val.match(/-?\d+/g) || []).map(Number);
        return nums.includes(4) && nums.includes(-3) && new Set(nums).size >= 2;
      }
    },
    ba2: {
      titre: "BA2 - BOUCHER",
      duree: 25,
      question: "Combien vaut 7 × 8 ?",
      valider: (val) => Number(val.trim()) === 56
    },
    ba3: {
      titre: "BA3 - BASTIE",
      duree: 25,
      question: "Combien vaut 3x + 5 quand x = 4 ?",
      valider: (val) => Number(val.trim()) === 17
    },
    ba4: {
      titre: "BA4 - ST EXUPERY",
      duree: 30,
      question: "Résous 2x + 6 = 20. Combien vaut x ?",
      valider: (val) => Number(val.trim()) === 7
    },
    ba5: {
      titre: "BA5 - MERMOZ",
      duree: 30,
      question: "Combien vaut le nombre binaire 1010 en décimal ?",
      valider: (val) => Number(val.trim()) === 10
    },
    ba6: {
      titre: "BA6 - BLERIOT",
      duree: 25,
      question: "Quelle est la racine carrée positive de 144 ?",
      valider: (val) => Number(val.trim()) === 12
    },
    ba7: {
      titre: "BA7 - ANCIENNE LOGE GARDIEN",
      duree: 20,
      question: "Quel est le prochain nombre de la suite 2, 4, 8, 16, … ?",
      valider: (val) => Number(val.trim()) === 32
    },
    ba8: {
      titre: "BA8 - MODULAIRES",
      duree: 30,
      question: "Quel est le reste de la division euclidienne de 47 par 5 ?",
      valider: (val) => Number(val.trim()) === 2
    }
  };

  const root = document.getElementById("enigme");
  const zoneId = enigmes[root.dataset.zone] ? root.dataset.zone : "ba1";
  const enigme = enigmes[zoneId];

  const timerEl = document.getElementById("timer");
  const msgEl = document.getElementById("message");
  const inputEl = document.getElementById("reponse");
  const btnValider = document.getElementById("btn-valider");

  document.getElementById("titre-zone").textContent = enigme.titre;
  document.getElementById("question").textContent = enigme.question;

  let tempsRestant = enigme.duree;
  let expire = false;
  let interval = null;

  function lancerTimer() {
    clearInterval(interval);
    tempsRestant = enigme.duree;
    expire = false;
    btnValider.disabled = false;
    timerEl.textContent = tempsRestant;
    msgEl.textContent = "";

    interval = setInterval(() => {
      tempsRestant -= 1;
      timerEl.textContent = tempsRestant;
      if (tempsRestant <= 0) {
        clearInterval(interval);
        expire = true;
        btnValider.disabled = true;
        msgEl.textContent = "Temps écoulé ! Clique sur Recommencer pour réessayer.";
      }
    }, 1000);
  }

  document.getElementById("form-enigme").addEventListener("submit", (e) => {
    e.preventDefault();
    if (expire) return;

    if (enigme.valider(inputEl.value)) {
      clearInterval(interval);
      btnValider.disabled = true;
      msgEl.textContent = "Bonne réponse ! Zone débloquée.";
      window.parent.postMessage({ type: "enigme_validee", zone: zoneId }, window.location.origin);
    } else {
      msgEl.textContent = "Réponse incorrecte, réessaie avant la fin du temps.";
    }
  });

  document.getElementById("btn-retry").addEventListener("click", () => {
    inputEl.value = "";
    lancerTimer();
  });

  lancerTimer();
})();
