<?php include('../admin/partials/topbar.php'); ?>
<?php include('../admin/partials/sidebar.php'); ?>

<div class="db-info-wrap db-package-wrap">
  <div class="dashboard-box table-opp-color-box">
    <h4>Packages List</h4>
    <p>Daftar paket yang telah dibuat.</p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Destination</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include('../config.php');
          // Ambil semua paket
          $sql = "SELECT * FROM packages ORDER BY created_at DESC";
          $result = $conn->query($sql);
          if ($result && $result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
                  echo "<tr>";
                  echo "<td><span class='package-name'>" . htmlspecialchars($row['title']) . "</span></td>";
                  echo "<td>" . date("d M Y", strtotime($row['created_at'])) . "</td>";
                  // Misalnya Destination diambil dari field address
                  echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                  
                  // Tentukan tampilan status berdasarkan nilai di database
                  if($row['status'] == 'published'){
                      $currentStatus = 'Active';
                  } elseif($row['status'] == 'expired'){
                      $currentStatus = 'Expired';
                  } elseif($row['status'] == 'pending'){
                      $currentStatus = 'Pending';
                  } else {
                      $currentStatus = ucfirst($row['status']);
                  }
                  
                  // Dropdown untuk update status
                  echo "<td>";
                    echo "<form action='update_status.php' method='post'>";
                      echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                      echo "<select name='status' onchange='this.form.submit()'>";
                        echo "<option value='Active'" . ($currentStatus == 'Active' ? " selected" : "") . ">Active</option>";
                        echo "<option value='Pending'" . ($currentStatus == 'Pending' ? " selected" : "") . ">Pending</option>";
                        echo "<option value='Expired'" . ($currentStatus == 'Expired' ? " selected" : "") . ">Expired</option>";
                      echo "</select>";
                    echo "</form>";
                  echo "</td>";
                  
                  // Action: Edit dan Delete
                  echo "<td>";
                      echo "<a href='edit_package.php?id=" . $row['id'] . "' class='badge badge-success'><i class='far fa-edit'></i></a> ";
                      echo "<a href='delete_package.php?id=" . $row['id'] . "' class='badge badge-danger' onclick=\"return confirm('Are you sure you want to delete this package?');\"><i class='far fa-trash-alt'></i></a>";
                  echo "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>No packages found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- (Opsional) Pagination dapat ditambahkan di sini -->
</div>

<?php include('../admin/partials/footers.php'); ?>
