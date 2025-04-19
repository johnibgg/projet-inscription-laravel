<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin – Notifications</title>
  <style>
    body {
      background-color: #f3f4f6;
      font-family: Arial, sans-serif;
      margin: 0;
      min-height: 100vh;
    }

    header {
      background-color: #4338ca;
      color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 1.25rem;
      font-weight: bold;
    }

    header a {
      background-color: white;
      color: #4338ca;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      text-decoration: none;
    }

    header a:hover {
      background-color: #f3f4f6;
    }

    main {
      max-width: 768px;
      margin: auto;
      padding: 2rem 1.5rem;
    }

    p {
      font-size: 0.875rem;
      color: #4b5563;
    }

    form {
      background-color: white;
      padding: 1.5rem;
      border-radius: 1rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      margin-top: 1rem;
    }

    label {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      color: #374151;
      margin-bottom: 0.25rem;
    }

    select, textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      font-size: 1rem;
      margin-top: 0.25rem;
    }

    textarea {
      resize: vertical;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-actions {
      display: flex;
      justify-content: flex-end;
      margin-top: 1rem;
    }

    button {
      background-color: #4338ca;
      color: white;
      padding: 0.5rem 1.5rem;
      border: none;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      cursor: pointer;
    }

    button:hover {
      background-color: #3730a3;
    }

    .history {
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      border-radius: 1rem;
      padding: 1rem;
      margin-top: 2rem;
    }

    .history h2 {
      font-size: 1rem;
      font-weight: bold;
      color: #374151;
      margin-bottom: 1rem;
    }

    .history ul {
      font-size: 0.875rem;
      color: #4b5563;
      list-style-type: none;
      padding-left: 0;
    }

    .history li {
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body>

  <!-- Barre de navigation -->
  <header>
    <h1>📢 Notifications aux Parents</h1>
    <a href="admin_dashboard.html">🏠 Retour</a>
  </header>

  <!-- Contenu -->
  <main>

    <!-- Informations -->
    <p>Utilisez ce formulaire pour envoyer une notification à tous les parents ou aux parents d’une classe spécifique.</p>

    <!-- Formulaire d’envoi -->
    <form action="#" method="POST">
      <div class="form-group">
        <label for="classe">📚 Classe ciblée</label>
        <select id="classe" name="classe">
          <option value="">📢 Tous les parents</option>
          <option value="cp1">CP1</option>
          <option value="cp2">CP2</option>
          <option value="ce1">CE1</option>
          <option value="ce2">CE2</option>
          <option value="cm1">CM1</option>
          <option value="cm2">CM2</option>
        </select>
      </div>

      <div class="form-group">
        <label for="message">✉️ Message</label>
        <textarea id="message" name="message" rows="6" placeholder="Rédigez votre message ici..."></textarea>
      </div>

      <div class="form-actions">
        <button type="submit">📨 Envoyer la notification</button>
      </div>
    </form>

    <!-- Historique -->
    <div class="history">
      <h2>📜 Historique des notifications</h2>
      <ul>
        <li>✔️ 08/04/2025 – Message envoyé aux parents de CM2</li>
        <li>✔️ 05/04/2025 – Message général envoyé à tous les parents</li>
      </ul>
    </div>

  </main>

</body>
</html>
