<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin – Gestion des Parents</title>
  <style>
    body {
      background-color: #f3f4f6;
      min-height: 100vh;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      margin: 0;
    }
    
    .header {
      background-color: #1d4ed8;
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
      color: #1d4ed8;
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
    
    .search-bar {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    
    @media (min-width: 768px) {
      .search-bar {
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
    
    .search-input {
      padding: 0.5rem 1rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      width: 100%;
    }
    
    @media (min-width: 768px) {
      .search-input {
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
    
    .action-buttons {
      display: flex;
      gap: 0.5rem;
    }
    
    .edit-button {
      background-color: #d97706;
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      border: none;
      cursor: pointer;
    }
    
    .edit-button:hover {
      background-color: #b45309;
    }
    
    .delete-button {
      background-color: #dc2626;
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      border: none;
      cursor: pointer;
    }
    
    .delete-button:hover {
      background-color: #b91c1c;
    }
  </style>
</head>
<body>
  <!-- Barre de navigation -->
  <header class="header">
    <div class="container header-content">
      <h1 class="header-title">👨‍👧 Gestion des Parents</h1>
      <a href="admin_dashboard.html" class="back-button">🏠 Retour au tableau de bord</a>
    </div>
  </header>

  <!-- Contenu principal -->
  <main class="container">
    <!-- Recherche -->
    <div class="search-bar">
      <h2 class="section-title">Liste des parents enregistrés</h2>
      <input type="text" placeholder="🔍 Rechercher un parent..." class="search-input" />
    </div>

    <!-- Tableau -->
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Nombre d'enfants</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Exemple de parent -->
          <tr>
            <td>1</td>
            <td>Kameni Jean</td>
            <td>+237 6 99 99 99 99</td>
            <td>parent@example.com</td>
            <td>2</td>
            <td>
              <div class="action-buttons">
                <button class="edit-button">✏️ Modifier</button>
                <button class="delete-button">🗑️ Supprimer</button>
              </div>
            </td>
          </tr>
          <!-- Autres parents dynamiques ici -->
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>