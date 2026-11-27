(() => {
  const areas = Array.from(document.querySelectorAll('map[name="plan-iut"] area'));
  const zonesRequises = areas.map((area) => area.dataset.zone);
  const zonesValidees = new Set();

  const img = document.querySelector('img[usemap="#plan-iut"]');
  const dialog = document.getElementById("enigme-dialog");
  const frame = document.getElementById("enigme-frame");
  const closeBtn = document.getElementById("enigme-close");
  const progEl = document.getElementById("progression");
  const victoireEl = document.getElementById("victoire");

  function majProgression() {
    progEl.textContent = `${zonesValidees.size} / ${zonesRequises.length}`;
  }
  majProgression();

  // Les coordonnées des zones sont données pour l'image à sa taille réelle :
  // on les recalcule si l'image est affichée plus petite (écran étroit).
  const coordsInitiales = areas.map((area) => area.coords.split(",").map(Number));

  function ajusterZones() {
    if (!img.naturalWidth) return;
    const ratio = img.clientWidth / img.naturalWidth;
    areas.forEach((area, i) => {
      area.coords = coordsInitiales[i].map((c) => Math.round(c * ratio)).join(",");
    });
  }

  img.addEventListener("load", ajusterZones);
  window.addEventListener("resize", ajusterZones);
  ajusterZones();

  // Popup d'énigme
  function ouvrirEnigme(url) {
    frame.src = url;
    if (!dialog.open) dialog.showModal();
  }

  function fermerEnigme() {
    if (dialog.open) dialog.close();
  }

  // On vide l'iframe à la fermeture : le chrono de l'énigme s'arrête.
  dialog.addEventListener("close", () => {
    frame.src = "about:blank";
  });

  closeBtn.addEventListener("click", fermerEnigme);

  // Clic sur le fond sombre = fermer
  dialog.addEventListener("click", (e) => {
    if (e.target === dialog) fermerEnigme();
  });

  areas.forEach((area) => {
    area.addEventListener("click", (e) => {
      e.preventDefault();
      ouvrirEnigme(area.href);
    });
  });

  window.addEventListener("message", (event) => {
    if (event.origin !== window.location.origin) return;
    if (!event.data || event.data.type !== "enigme_validee") return;
    if (!zonesRequises.includes(event.data.zone)) return;

    zonesValidees.add(event.data.zone);
    majProgression();

    // Laisse le temps de lire "Bonne réponse !" puis referme la popup
    setTimeout(fermerEnigme, 1500);

    if (zonesRequises.every((z) => zonesValidees.has(z))) {
      victoireEl.hidden = false;
      victoireEl.scrollIntoView({ behavior: "smooth", block: "nearest" });
    }
  });
})();
