<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clean Fund</title>
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
        padding: 20px;
      }

      /* Card Styles */
      #campaigns {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
      }

      .card {
        width: 250px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: transform 0.2s;
      }

      .card:hover {
        transform: scale(1.05);
      }

      .card-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
      }

      .card-content {
        padding: 15px;
      }

      .card-content h2 {
        margin: 0;
        font-size: 18px;
      }

      .card-content p {
        color: #777;
      }

      /* Modal Styles */
      .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
      }

      .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        position: relative;
      }

      .modal-content img {
        width: 100%;
        height: auto;
        border-radius: 8px;
      }

      .modal-content h2 {
        margin-top: 10px;
        font-size: 24px;
      }

      .modal-content p {
        margin: 10px 0;
      }

      .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
      }

      #donate-btn {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        display: block;
        margin: 20px auto 0;
      }

      #donate-btn:hover {
        background-color: #45a049;
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
      <h1>Clean Fund</h1>
      <p>Temukan campaign untuk mendukung inisiatif kebersihan dan lingkungan.</p>
    </header>

    <!-- Main Content Section -->
    <main>
      <section id="campaigns">
        <!-- Card Campaign 1 -->
        <div class="card" onclick="showDetails('campaign1')">
          <img src="images/Log-Clean-App3.jpg" alt="Campaign 1" class="card-img" />
          <div class="card-content">
            <h2>Campaign 1</h2>
            <p>Lokasi: Jakarta</p>
          </div>
        </div>

        <!-- Card Campaign 2 -->
        <div class="card" onclick="showDetails('campaign2')">
          <img src="images/Log-Clean-App3.jpg" alt="Campaign 2" class="card-img" />
          <div class="card-content">
            <h2>Campaign 2</h2>
            <p>Lokasi: Bandung</p>
          </div>
        </div>

        <!-- Add more cards as needed -->
      </section>

      <!-- Detail Modal -->
      <div id="detail-modal" class="modal">
        <div class="modal-content">
          <span class="close-btn" onclick="closeDetails()">&times;</span>
          <img id="detail-img" src="" alt="Campaign Detail" />
          <h2 id="detail-name">Campaign Name</h2>
          <p id="detail-location">Location</p>
          <p id="detail-description">Description</p>
          <button id="donate-btn">Donasi Sekarang</button>
        </div>
      </div>
    </main>

    <!-- Footer Section -->
    <!-- <footer>
      <p>&copy; 2024 CleanFund. All Rights Reserved.</p>
    </footer> -->

    <script>
      // Function to show details modal
      function showDetails(campaignId) {
        const detailModal = document.getElementById("detail-modal");
        const detailImg = document.getElementById("detail-img");
        const detailName = document.getElementById("detail-name");
        const detailLocation = document.getElementById("detail-location");
        const detailDescription = document.getElementById("detail-description");

        // Dummy data for demonstration
        const campaigns = {
          campaign1: {
            img: "campaign1.jpg",
            name: "Campaign 1",
            location: "Jakarta",
            description: "Deskripsi detail campaign 1.",
          },
          campaign2: {
            img: "campaign2.jpg",
            name: "Campaign 2",
            location: "Bandung",
            description: "Deskripsi detail campaign 2.",
          },
        };

        const campaign = campaigns[campaignId];

        detailImg.src = campaign.img;
        detailName.textContent = campaign.name;
        detailLocation.textContent = `Lokasi: ${campaign.location}`;
        detailDescription.textContent = campaign.description;

        detailModal.style.display = "flex";
      }

      // Function to close details modal
      function closeDetails() {
        const detailModal = document.getElementById("detail-modal");
        detailModal.style.display = "none";
      }
    </script>
  </body>
</html>
