<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription Élève</title>
  <style>
    body {
      background-color: #f3f4f6;
      font-family: Arial, sans-serif;
      margin: 0;
      min-height: 100vh;
    }

    header {
      background-color: #2563eb;
      color: white;
      padding: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header ul {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
      gap: 1rem;
    }

    header a {
      color: white;
      text-decoration: none;
      font-size: 0.9rem;
    }

    main {
      display: flex;
      justify-content: center;
      padding: 2rem 1rem;
    }

    .form-wrapper {
      background-color: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      max-width: 720px;
      width: 100%;
    }

    h2 {
      text-align: center;
      color: #2563eb;
      font-size: 1.75rem;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      font-weight: 500;
      font-size: 0.9rem;
      margin-bottom: 0.25rem;
      color: #374151;
    }

    input, select, textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.75rem;
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    @media (min-width: 768px) {
      .grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    button {
      background-color: #2563eb;
      color: white;
      padding: 0.5rem 1.5rem;
      font-size: 1rem;
      border: none;
      border-radius: 0.75rem;
      cursor: pointer;
    }

    button:hover {
      background-color: #1d4ed8;
    }

    #file-name {
      font-size: 0.875rem;
      margin-top: -0.5rem;
      margin-bottom: 1rem;
    }

    .valid {
      color: green;
    }

    .invalid {
      color: red;
    }
  </style>
</head>
<body>

  <!-- ✅ Menu Parent -->
  <header>
    <h1>Plateforme d'Inscription</h1>
    <nav>
      <ul>
        <li><a href="tableau_de_bord_parent.html">Accueil</a></li>
        <li><a href="formulaire_inscription.html" style="text-decoration: underline; font-weight: bold;">Nouvelle inscription</a></li>
        <li><a href="liste_inscrit.html">Enfants inscrits</a></li>
        <li><a href="envoie_notification.html">Notifications</a></li>
        <li><a href="page_connexion.html">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <!-- 📄 Formulaire d'inscription -->
  <main>
    <div class="form-wrapper">
      <h2>Inscription d’un Élève</h2>

      <form id="inscriptionForm" action="/inscription" method="POST" enctype="multipart/form-data">
        <!-- Informations Élève -->
        <div class="grid">
          <div>
            <label>Nom</label>
            <input type="text" name="nom" required>
          </div>
          <div>
            <label>Prénom</label>
            <input type="text" name="prenom" required>
          </div>
          <div>
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" required>
          </div>
          <div>
            <label>Sexe</label>
            <select name="sexe">
              <option value="M">Masculin</option>
              <option value="F">Féminin</option>
            </select>
          </div>
        </div>

        <!-- Cycle et Classe -->
        <div class="grid">
          <div>
            <label>Cycle</label>
            <select name="cycle_id" id="cycleSelect">
              <option value="">Sélectionner un cycle</option>
              <option value="1">Primaire</option>
              <option value="2">Secondaire Général</option>
              <option value="3">Secondaire Technique</option>
            </select>
          </div>
          <div>
            <label>Classe</label>
            <select name="classe_id" id="classeSelect">
              <option value="">Sélectionner une classe</option>
            </select>
          </div>
        </div>

        <!-- Année scolaire -->
        <div>
          <label>Année scolaire</label>
          <select name="annee_scolaire_id">
            <option value="1">2024–2025</option>
            <option value="2">2025–2026</option>
            <option value="3">2026–2027</option>
            <option value="4">2027–2028</option>
            <option value="5">2028–2029</option>
          </select>
        </div>

        <!-- Téléversement d'image -->
        <div>
          <label>📷 Photo de l'élève (max 2 Mo)</label>
          <input type="file" id="photo" name="photo" accept="image/*" required>
          <div id="file-name"></div>
        </div>

        <!-- Bouton -->
        <div style="text-align:center; padding-top: 1rem;">
          <button type="submit">Enregistrer l'inscription</button>
        </div>
      </form>
    </div>
  </main>

  <script>
    const classesParCycle = {
      1: ['CP1', 'CP2', 'CE1', 'CE2', 'CM1', 'CM2'],
      2: ['6e', '5e', '4e', '3e', '2nde', '1ère', 'Terminale'],
      3: ['2nde Tech', '1ère Tech', 'Tle Tech']
    };

    const cycleSelect = document.getElementById('cycleSelect');
    const classeSelect = document.getElementById('classeSelect');
    const photoInput = document.getElementById('photo');
    const fileNameDisplay = document.getElementById('file-name');
    const form = document.getElementById('inscriptionForm');

    cycleSelect.addEventListener('change', function () {
      const cycleId = this.value;
      const classes = classesParCycle[cycleId] || [];

      classeSelect.innerHTML = '<option value="">Sélectionner une classe</option>';
      classes.forEach((classe, index) => {
        const option = document.createElement('option');
        option.value = index + 1;
        option.textContent = classe;
        classeSelect.appendChild(option);
      });
    });

    photoInput.addEventListener('change', function () {
      const file = this.files[0];
      if (file) {
        const maxSize = 2 * 1024 * 1024; // 2 Mo
        fileNameDisplay.textContent = file.name;

        if (file.size > maxSize) {
          fileNameDisplay.className = 'invalid';
          fileNameDisplay.textContent += " — Taille trop grande (> 2 Mo)";
        } else {
          fileNameDisplay.className = 'valid';
        }
      }
    });

    form.addEventListener('submit', function (e) {
      const file = photoInput.files[0];
      if (file && file.size > 2 * 1024 * 1024) {
        e.preventDefault();
        alert("Le fichier sélectionné dépasse 2 Mo. Veuillez choisir une image plus légère.");
      }
    });
  </script>

</body>
</html>
