<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin – Inscriptions</title>
  <style>
    body {
      background-color: #f3f4f6;
      min-height: 100vh;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      margin: 0;
    }
    
    .header {
      background-color: #4f46e5;
      color: white;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .container {
      max-width: 80rem;
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
      color: #4f46e5;
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
    
    .filter-bar {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    
    @media (min-width: 768px) {
      .filter-bar {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }
    }
    
    .section-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: #374151;
    }
    
    .filter-select {
      padding: 0.5rem 1rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      width: 100%;
    }
    
    @media (min-width: 768px) {
      .filter-select {
        width: 33.333333%;
      }
    }
    
    .table-container {
      background-color: white;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      border-radius: 0.75rem;
      overflow: hidden;
    }
    
    table {
      width: 100%;
      font-size: 0.875rem;
      text-align: left;
      color: #4b5563;
    }
    
    thead {
      background-color: #f3f4f6;
      color: #374151;
      text-transform: uppercase;
    }
    
    th {
      padding: 0.75rem 1.5rem;
    }
    
    tr {
      border-top: 1px solid #e5e7eb;
    }
    
    td {
      padding: 1rem 1.5rem;
    }
    
    tr:hover {
      background-color: #f9fafb;
    }
    
    .class-badge {
      background-color: #e0e7ff;
      color: #4f46e5;
      padding: 0.25rem 0.5rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .action-buttons {
      display: flex;
      gap: 0.5rem;
    }
    
    .view-button {
      background-color: #2563eb;
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      text-decoration: none;
    }
    
    .view-button:hover {
      background-color: #1d4ed8;
    }
    
    .card-button {
      background-color: #059669;
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      text-decoration: none;
    }
    
    .card-button:hover {
      background-color: #047857;
    }
  </style>
</head>
<body>
  <!-- Barre de navigation -->
  <header class="header">
    <div class="container header-content">
      <h1 class="header-title">📋 Liste des Inscriptions</h1>
      <a href="admin_dashboard.html" class="back-button">🏠 Retour</a>
    </div>
  </header>

  <!-- Contenu -->
  <main class="container">
    <!-- Filtre par année scolaire -->
    <div class="filter-bar">
      <h2 class="section-title">Inscriptions enregistrées</h2>
      <select class="filter-select">
        <option value="">📅 Filtrer par année scolaire</option>
        <option>2023–2024</option>
        <option selected>2024–2025</option>
      </select>
    </div>

    <!-- Tableau -->
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Élève</th>
            <th>Classe</th>
            <th>Parent</th>
            <th>Téléphone</th>
            <th>Date d'inscription</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Exemple -->
          <tr>
            <td>1</td>
            <td>Kameni Sarah</td>
            <td>
              <span class="class-badge">CM2</span>
            </td>
            <td>Kameni Jean</td>
            <td>+237 699999999</td>
            <td>05/04/2024</td>
            <td>
              <div class="action-buttons">
                <a href="voir_fiche.html" target="_blank" class="view-button">🔍 Voir fiche</a>
                <a href="carte.html" target="_blank" class="card-button">🪪 Carte</a>
              </div>
            </td>
          </tr>
          <!-- Autres lignes dynamiques ici -->
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>