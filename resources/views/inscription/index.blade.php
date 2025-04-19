<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Liste des Élèves Inscrits</title>
  <style>
    body {
      background-color: #f3f4f6;
      min-height: 100vh;
      padding: 2.5rem 1rem;
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }
    
    .container {
      max-width: 72rem;
      margin: 0 auto;
      background-color: white;
      padding: 1.5rem;
      border-radius: 1rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #1d4ed8;
      text-align: center;
      margin-bottom: 1.5rem;
    }
    
    .table-container {
      overflow-x: auto;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 100%;
    }
    
    thead {
      background-color: #dbeafe;
      color: #1e40af;
      text-align: left;
      font-size: 0.875rem;
      font-weight: 500;
      text-transform: uppercase;
    }
    
    th, td {
      padding: 0.75rem 1rem;
      border-bottom: 1px solid #e5e7eb;
    }
    
    tbody {
      font-size: 0.875rem;
      color: #374151;
    }
    
    tbody tr:hover {
      background-color: #f1f5f9;
    }
    
    .action-links {
      display: flex;
      gap: 0.5rem;
    }
    
    .action-link {
      color: #1d4ed8;
      text-decoration: none;
    }
    
    .action-link:hover {
      text-decoration: underline;
    }
    
    .view-link {
      color: #1d4ed8;
    }
    
    .card-link {
      color: #059669;
    }
    
    .reinscription-link {
      color: #d97706;
    }
    
    .delete-link {
      color: #dc2626;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">Liste des Élèves Inscrits</h1>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Classe</th>
            <th>Année scolaire</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Exemple 1 -->
          <tr>
            <td>ZONGO</td>
            <td>Béatrice</td>
            <td>CM2</td>
            <td>2024–2025</td>
            <td>
              <div class="action-links">
                <a href="voir_fiche.html" class="action-link view-link">Voir fiche</a>
                <a href="carte.html" class="action-link card-link">Carte</a>
                <a href="reinscription.html" class="action-link reinscription-link">Réinscrire</a>
                <span class="action-link delete-link">Supprimer</span>
              </div>
            </td>
          </tr>
          <!-- Exemple 2 -->
          <tr>
            <td>DAO</td>
            <td>Issa</td>
            <td>6e</td>
            <td>2024–2025</td>
            <td>
              <div class="action-links">
                <a href="voir_fiche.html" class="action-link view-link">Voir fiche</a>
                <a href="carte.html" class="action-link card-link">Carte</a>
                <a href="reinscription.html" class="action-link reinscription-link">Réinscrire</a>
                <span class="action-link delete-link">Supprimer</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>