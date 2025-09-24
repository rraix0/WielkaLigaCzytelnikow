<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wielka Liga Czytelników - Strona Główna</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

      :root {
        --primary-color: #4CAF50;
        --secondary-color: #388E3C;
        --text-color: #333;
        --bg-color: #f4f4f4;
        --card-bg: #fff;
        --shadow-color: rgba(0, 0, 0, 0.1);
      }

      body {
        width: 100vw;
        height: 100vh;
        font-family: 'Montserrat', sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: var(--bg-color);
        color: var(--text-color);
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        overflow-x: hidden;
      }

      .header {
        width: 100%;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: #fff;
        padding: 2rem 1rem;
        text-align: center;
        box-shadow: 0 4px 8px var(--shadow-color);
      }

      .header h1 {
        margin: 0;
        font-size: 2.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px var(--shadow-color);
      }

      .header p {
        margin: 0.5rem 0 0;
        font-size: 1.2rem;
      }

      .nav-buttons {
        margin-top: 1.5rem;
        display: flex;
        gap: 1rem;
        justify-content: center;
      }

      .nav-buttons a {
        text-decoration: none;
        color: #fff;
        background-color: var(--secondary-color);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 700;
        transition: transform 0.2s, background-color 0.2s;
        box-shadow: 0 2px 4px var(--shadow-color);
      }

      .nav-buttons a:hover {
        transform: translateY(-2px);
        background-color: #2e7d32;
      }

      .main-container {
        width: 100%;
        max-width: 1200px;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        flex-grow: 1;
      }

      .section {
        background-color: var(--card-bg);
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px var(--shadow-color);
      }

      .section h2 {
        color: var(--primary-color);
        margin-top: 0;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
        font-size: 1.8rem;
      }

      .about-us p {
        font-size: 1.1rem;
        text-align: justify;
      }

      .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
      }

      .feature-card {
        background-color: var(--bg-color);
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 6px var(--shadow-color);
        text-align: center;
        transition: transform 0.2s;
      }

      .feature-card:hover {
        transform: translateY(-5px);
      }

      .feature-card h3 {
        color: var(--secondary-color);
        font-size: 1.3rem;
        margin-top: 0;
      }

      .footer {
        width: 100%;
        text-align: center;
        padding: 1.5rem;
        background-color: var(--text-color);
        color: #fff;
        margin-top: auto;
      }

      @media (max-width: 768px) {
        .header h1 {
          font-size: 2rem;
        }

        .header p {
          font-size: 1rem;
        }

        .main-container {
          padding: 1rem;
        }
      }
    </style>
</head>
<body>

<header class="header">
    <h1>Wielka Liga Czytelników</h1>
    <p>Miejsce, gdzie Twoja pasja do książek staje się przygodą!</p>
    <div class="nav-buttons">
        <a href="login.php">Zaloguj się</a>
        <a href="register.php">Zarejestruj się</a>
    </div>
</header>

<main class="main-container">

    <section class="section about-us">
        <h2>O nas</h2>
        <p>
            Wielka Liga Czytelników to platforma stworzona z myślą o wszystkich miłośnikach książek. Niezależnie od tego, czy pochłaniasz bestsellery, zaczytujesz się w klasyce, czy odkrywasz niszowe tytuły, tutaj znajdziesz swoje miejsce. Nasza społeczność łączy ludzi, którzy wierzą, że czytanie to nie tylko hobby, ale prawdziwa supermoc. Dołącz do nas i pokaż, że czytanie to siła!
        </p>
    </section>

    <section class="section features">
        <h2>Dlaczego warto dołączyć?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>Rywalizuj i wygrywaj</h3>
                <p>Bierz udział w pasjonujących wyzwaniach czytelniczych i zdobywaj nagrody. Pokaż, że to Ty jesteś prawdziwym Mistrzem Czytania!</p>
            </div>
            <div class="feature-card">
                <h3>Odkrywaj nowe książki</h3>
                <p>Przeglądaj recenzje i rekomendacje od innych czytelników. Znajdź swoją następną ulubioną historię.</p>
            </div>
            <div class="feature-card">
                <h3>Buduj swoją bibliotekę</h3>
                <p>Śledź swoje postępy w czytaniu, twórz listy książek do przeczytania i dziel się swoimi osiągnięciami ze znajomymi.</p>
            </div>
            <div class="feature-card">
                <h3>Poznaj innych czytelników</h3>
                <p>Dołącz do dyskusji, wymieniaj się opiniami i buduj relacje z osobami o podobnych zainteresowaniach.</p>
            </div>
        </div>
    </section>

</main>

<footer class="footer">
    <p>&copy; 2025 Wielka Liga Czytelników. Wszelkie prawa zastrzeżone.</p>
</footer>

</body>
</html>