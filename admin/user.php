<?php
include('../admin/partials/topbar.php');
include('../admin/partials/sidebar.php');
include('../config.php'); 

// Ambil data users dari database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box table-opp-color-box">
                <h4>User Details</h4>
                <p>List of registered users</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><img src="<?php echo $row['profile_image']; ?>" alt="Profile" width="50"></td>
                                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                    <td><a href="../admin/view_user.php?id=<?php echo $row['id']; ?>" class="badge badge-success"><i class="far fa-eye"></i></a></td>
                                    <td><a href="../admin/user_edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success"><i class="far fa-edit"></i></a></td>
                                    <td><a href="../admin/delete_user.php?id=<?php echo $row['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php include('../admin/partials/footers.php'); ?>
