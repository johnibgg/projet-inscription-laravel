<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin – Cycles et Classes</title>
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
      background-color: #4f46e5;
      color: white;
      padding: 0.5rem 1.5rem;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
    }
    
    .submit-button:hover {
      background-color: #4338ca;
    }
    
    .cycles-list {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }
    
    .cycle-card {
      background-color: white;
      padding: 1rem;
      border-radius: 0.75rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .cycle-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.5rem;
    }
    
    .cycle-title {
      font-weight: 700;
      color: #4f46e5;
    }
    
    .delete-cycle {
      color: #dc2626;
      font-size: 0.875rem;
      text-decoration: none;
    }
    
    .delete-cycle:hover {
      text-decoration: underline;
    }
    
    .classes-list {
      padding-left: 1rem;
      list-style-type: disc;
      font-size: 0.875rem;
      color: #374151;
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }
    
    .class-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .delete-class {
      color: #ef4444;
      font-size: 0.75rem;
      text-decoration: none;
    }
    
    .delete-class:hover {
      text-decoration: underline;
    }
    
    .add-class-form {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
      margin-top: 0.75rem;
    }
    
    .class-input {
      border: 1px solid #d1d5db;
      padding: 0.5rem 0.75rem;
      border-radius: 0.375rem;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      width: 100%;
    }
    
    @media (min-width: 768px) {
      .class-input {
        width: 33.333333%;
      }
    }
    
    .add-class-button {
      background-color: #059669;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      border: none;
      cursor: pointer;
    }
    
    .add-class-button:hover {
      background-color: #047857;
    }
  </style>
</head>
<body>
  <!-- Barre de navigation -->
  <header class="header">
    <div class="container header-content">
      <h1 class="header-title">🏫 Gestion des Cycles & Classes</h1>
      <a href="admin_dashboard.html" class="back-button">🏠 Retour</a>
    </div>
  </header>

  <!-- Contenu principal -->
  <main class="container">
    <!-- Ajouter un cycle -->
    <section class="section">
      <h2 class="section-title">➕ Ajouter un cycle</h2>
      <form class="add-form">
        <input type="text" placeholder="Nom du cycle (ex: Primaire)" class="form-input">
        <button type="submit" class="submit-button">Ajouter</button>
      </form>
    </section>

    <!-- Liste des cycles -->
    <section class="section">
      <h2 class="section-title">📚 Cycles disponibles</h2>
      <div class="cycles-list">
        <!-- Exemple de cycle -->
        <div class="cycle-card">
          <div class="cycle-header">
            <h3 class="cycle-title">Cycle : Primaire</h3>
            <a href="#" class="delete-cycle">🗑 Supprimer le cycle</a>
          </div>

          <!-- Liste des classes dans le cycle -->
          <ul class="classes-list">
            <li class="class-item">
              CM1
              <a href="#" class="delete-class">Supprimer</a>
            </li>
            <li class="class-item">
              CM2
              <a href="#" class="delete-class">Supprimer</a>
            </li>
          </ul>

          <!-- Ajouter une classe -->
          <form class="add-class-form">
            <input type="text" placeholder="Nom de la classe" class="class-input">
            <button type="submit" class="add-class-button">Ajouter la classe</button>
          </form>
        </div>
      </div>
    </section>
  </main>
</body>
</html>