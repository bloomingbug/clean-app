<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clean Up</title>
    <style>
      /* Global Styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
      }

      header {
        background-color: #4caf50;
        color: white;
        padding: 20px;
        text-align: center;
      }

      main {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
      }

      /* Map Section */
      #map-section {
        width: 100%;
        max-width: 800px;
        position: relative;
        margin-bottom: 30px;
      }

      #map-placeholder {
        background-color: #ddd;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ccc;
      }

      #add-location-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
      }

      #add-location-btn:hover {
        background-color: #45a049;
      }

      /* Location List Section */
      #location-list {
        width: 100%;
        max-width: 800px;
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      #location-list h2 {
        margin-top: 0;
      }

      #location-list ul {
        list-style: none;
        padding: 0;
      }

      #location-list li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
      }

      .vote-btn {
        background-color: #2196f3;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
      }

      .vote-btn:hover {
        background-color: #0b7dda;
      }

      .passing-grade {
        color: #666;
      }

      /* Footer Section */
      footer {
        text-align: center;
        padding: 10px;
        background-color: #333;
        color: white;
        position: relative;
        bottom: 0;
        width: 100%;
        margin-top: 30px;
      }
    </style>
  </head>
  <body>
    <!-- Header Section -->
    <header>
      <h1>Lokasi Clean Up</h1>
      <p>Inisiatif untuk membersihkan lingkungan kita. Tambahkan lokasi dan vote untuk mendukung aksi ini.</p>
    </header>

    <!-- Main Content Section -->
    <main>
      <!-- Map Section -->
      <section id="map-section">
        <div id="map-placeholder">
          <!-- Placeholder for the map -->
          <p>Map will be displayed here</p>
        </div>
        <button id="add-location-btn">+ Tambah Lokasi</button>
      </section>

      <!-- Location List Section -->
      <section id="location-list">
        <h2>Daftar Lokasi</h2>
        <ul>
          <li>
            <span>Lokasi 1</span>
            <button class="vote-btn">Vote Up</button>
            <span class="passing-grade">Passing Grade: 70%</span>
          </li>
          <li>
            <span>Lokasi 2</span>
            <button class="vote-btn">Vote Up</button>
            <span class="passing-grade">Passing Grade: 85%</span>
          </li>
          <!-- Add more locations as needed -->
        </ul>
      </section>
    </main>

    <!-- Footer Section -->
    <!-- <footer>
      <p>Copyright &copy; 2024 Clean App. All Rights Reserved.</p>
    </footer> -->
  </body>
</html>
