<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin | Plateforme Scolaire</title>
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
      font-size: 1.5rem;
      font-weight: 700;
    }
    
    .logout-button {
      background-color: white;
      color: #1d4ed8;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      text-decoration: none;
    }
    
    .logout-button:hover {
      background-color: #f1f5f9;
    }
    
    main {
      padding: 2.5rem 0;
    }
    
    .dashboard-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 2rem;
    }
    
    .stats-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-bottom: 2rem;
    }
    
    @media (min-width: 768px) {
      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    
    @media (min-width: 1024px) {
      .stats-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }
    
    .stat-card {
      background-color: white;
      padding: 1.5rem;
      border-radius: 0.75rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    
    .stat-label {
      color: #6b7280;
      margin-bottom: 0.5rem;
    }
    
    .stat-value {
      font-size: 1.875rem;
      font-weight: 700;
    }
    
    .blue-value {
      color: #2563eb;
    }
    
    .green-value {
      color: #059669;
    }
    
    .purple-value {
      color: #7c3aed;
    }
    
    .quick-access-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 1rem;
    }
    
    .quick-access-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    
    @media (min-width: 768px) {
      .quick-access-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    
    .quick-access-card {
      background-color: white;
      padding: 1rem;
      border-radius: 0.75rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      text-decoration: none;
      color: inherit;
    }
    
    .quick-access-card:hover {
      background-color: #e0e7ff;
    }
  </style>
</head>
<body>
  <!-- Barre de navigation -->
  <header class="header">
    <div class="container header-content">
      <h1 class="header-title">🎓 Admin - Plateforme Scolaire</h1>
      <a href="inscriptions.blade.php" class="logout-button">Déconnexion</a>
    </div>
  </header>

  <!-- Contenu principal -->
  <main class="container">
    <h2 class="dashboard-title">📊 Tableau de bord</h2>

    <!-- Cartes statistiques -->
    <div class="stats-grid">
      <div class="stat-card">
        <p class="stat-label">Élèves inscrits</p>
        <p class="stat-value blue-value">245</p>
      </div>
      <div class="stat-card">
        <p class="stat-label">Parents/Tuteurs</p>
        <p class="stat-value green-value">120</p>
      </div>
      <div class="stat-card">
        <p class="stat-label">Inscriptions validées</p>
        <p class="stat-value purple-value">230</p>
      </div>
      <div class="stat-card">
        <p class="stat-label">Année active</p>
        <p class="stat-value">2024–2025</p>
      </div>
    </div>

    <!-- Accès rapide -->
    <div>
      <h3 class="quick-access-title">🚀 Accès rapide</h3>
      <div class="quick-access-grid">
        <a href="eleves.blade.php" class="quick-access-card">
          👧 Gérer les élèves
        </a>
        <a href="parents.blade.php" class="quick-access-card">
          👨‍👧 Gérer les parents
        </a>
        <a href="inscriptions.blade.php" class="quick-access-card">
          📝 Gérer les inscriptions
        </a>
        <a href="classes.blade.php" class="quick-access-card">
          🏫 Gérer les classes/cycles
        </a>
        <a href="annees.blade.php" class="quick-access-card">
          📅 Années scolaires
        </a>
        <a href="notifications.blade.php" class="quick-access-card">
          📢 Envoyer une notification
        </a>
      </div>
    </div>
  </main>
</body>
</html>