<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin – Années Scolaires</title>
  <style>
    body {
      background-color: #f3f4f6;
      min-height: 100vh;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      margin: 0;
    }
    
    .header {
      background-color: #0f766e;
      color: white;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .container {
      max-width: 72rem;
      margin: 0 auto;
      padding: 0 1.5rem;
    }
    
    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
    }
    
    .header-title {
      font-size: 1.25rem;
      font-weight: 700;
    }
    
    .back-button {
      background-color: white;
      color: #0f766e;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      text-decoration: none;
    }
    
    .back-button:hover {
      background-color: #f1f5f9;
    }
    
    main {
      padding: 2.5rem 0;
    }
    
    .section {
      margin-bottom: 2.5rem;
    }
    
    .section-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 1rem;
    }
    
    .add-form {
      display: flex;
      gap: 1rem;
      align-items: center;
      flex-wrap: wrap;
    }
    
    .form-input {
      border: 1px solid #d1d5db;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      width: 100%;
    }
    
    @media (min-width: 768px) {
      .form-input {
        width: 33.333333%;
      }
    }
    
    .submit-button {
      background-color: #0d9488;
      color: white;
      padding: 0.5rem 1.5rem;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
    }
    
    .submit-button:hover {
      background-color: #0f766e;
    }
    
    .year-list {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    
    .year-card {
      background-color: white;
      padding: 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .year-info {
      display: flex;
      flex-direction: column;
    }
    
    .year-name {
      font-weight: 600;
      color: #1f2937;
    }
    
    .year-status {
      font-size: 0.875rem;
    }
    
    .status-active {
      color: #059669;
    }
    
    .status-archived {
      color: #6b7280;
    }
    
    .action-buttons {
      display: flex;
      gap: 0.5rem;
    }
    
    .action-button {
      padding: 0.25rem 1rem;
      border-radius: 0.25rem;
      font-size: 0.875rem;
      color: white;
      border: none;
      cursor: pointer;
    }
    
    .set-active {
      background-color: #d97706;
    }
    
    .set-active:hover {
      background-color: #b45309;
    }
    
    .delete {
      background-color: #dc2626;
    }
    
    .delete:hover {
      background-color: #b91c1c;
    }
  </style>
</head>
<body>
  <!-- Barre de navigation -->
  <header class="header">
    <div class="container header-content">
      <h1 class="header-title">📅 Gestion des Années Scolaires</h1>
      <a href="admin_dashboard.html" class="back-button">🏠 Retour</a>
    </div>
  </header>

  <!-- Contenu -->
  <main class="container">
    <!-- Ajouter une année -->
    <section class="section">
      <h2 class="section-title">➕ Ajouter une nouvelle année scolaire</h2>
      <form class="add-form">
        <input type="text" placeholder="Ex: 2025–2026" class="form-input">
        <button type="submit" class="submit-button">Ajouter</button>
      </form>
    </section>

    <!-- Liste des années -->
    <section class="section">
      <h2 class="section-title">📂 Années scolaires enregistrées</h2>
      <div class="year-list">
        <!-- Exemple -->
        <div class="year-card">
          <div class="year-info">
            <p class="year-name">2024–2025</p>
            <p class="year-status status-active">✅ Année active</p>
          </div>
          <div class="action-buttons">
            <button class="action-button set-active">Définir comme active</button>
            <button class="action-button delete">Supprimer</button>
          </div>
        </div>

        <div class="year-card">
          <div class="year-info">
            <p class="year-name">2023–2024</p>
            <p class="year-status status-archived">Année archivée</p>
          </div>
          <div class="action-buttons">
            <button class="action-button set-active">Définir comme active</button>
            <button class="action-button delete">Supprimer</button>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>