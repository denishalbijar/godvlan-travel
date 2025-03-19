<?php include('../admin/partials/topbar.php'); ?>
<?php include('../admin/partials/sidebar.php'); ?>

<div class="container" style="max-width:600px; margin:20px auto; padding:10px;">
  <h2>Add Package</h2>
  <form action="submit_package.php" method="post" enctype="multipart/form-data">
    
    <!-- Basic Info -->
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" class="form-control" required>
    </div>
    
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
    </div>
    
    <div class="form-group">
      <label for="keywords">Keywords:</label>
      <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Comma separated keywords">
    </div>
    
    <!-- Pricing Info -->
    <div class="form-group">
      <label for="sale_price">Sale Price:</label>
      <input type="text" id="sale_price" name="sale_price" class="form-control" required>
    </div>
    
    <div class="form-group">
      <label for="regular_price">Regular Price:</label>
      <input type="text" id="regular_price" name="regular_price" class="form-control" required>
    </div>
    
    <div class="form-group">
      <label for="discount">Discount (%):</label>
      <input type="number" id="discount" name="discount" class="form-control">
    </div>

    <!-- Trip Details -->
    <div class="form-group">
      <label for="group_size">Group Size:</label>
      <input type="number" id="group_size" name="group_size" class="form-control" placeholder="Number of people">
    </div>
    
    <div class="form-group">
      <label>Trip Duration:</label>
      <div class="row">
        <div class="col">
          <input type="number" name="days" class="form-control" placeholder="Days">
        </div>
        <div class="col">
          <input type="number" name="nights" class="form-control" placeholder="Nights">
        </div>
      </div>
    </div>
    
    <!-- Gallery -->
    <div class="form-group">
      <label for="gallery_images">Gallery Image:</label>
      <input type="file" id="gallery_images" name="gallery_images[]" class="form-control-file">
    </div>
    
    <!-- Optional Itinerary -->
    <div class="form-group">
      <label for="itinerary">Itinerary (optional):</label>
      <textarea id="itinerary" name="itinerary" class="form-control" rows="3" placeholder="Describe itinerary (optional)"></textarea>
    </div>
    
    <!-- Location Info -->
    <div class="form-group">
      <label for="address">Address:</label>
      <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter full address"></textarea>
    </div>
    
    <!-- Settings -->
    <div class="form-group">
      <label for="status">Status:</label>
      <select id="status" name="status" class="form-control">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="visibility">Visibility:</label>
      <select id="visibility" name="visibility" class="form-control">
        <option value="public">Public</option>
        <option value="private">Private</option>
      </select>
    </div>
    
    <div class="form-group">
      <div class="form-check">
        <input type="checkbox" id="popularCheck" name="popular" class="form-check-input">
        <label for="popularCheck" class="form-check-label">Mark as Popular</label>
      </div>
    </div>
    
    <input type="submit" name="submit_package" value="Submit Package" class="btn btn-primary btn-block">
  </form>
</div>

<?php include('../admin/partials/footers.php'); ?>
