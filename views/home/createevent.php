<section id="" class="contact mt-5 pt-5">
  <div class="container">

    <div class="section-title">
      <h2><span>Declare a room</span></h2>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </div>
  </div>

  <div class="container mt-5">
    <form action="/register" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Room Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name of your room" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Room Capacity</label>
          <input type="text" name="capacity" class="form-control" placeholder="Capacity of your room" required>
        </div>

        <div class="form-group">
          <label>Room Picture</label>
          <input type="file" name="profile_picture" class="form-control">
        </div>
        
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Room Description</label>
          <input type="text" name="description" class="form-control" placeholder="Description of your room" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Room Address</label>
          <input type="text" name="address" class="form-control" placeholder="Address of your room" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Room City</label>
          <input type="text" name="city" class="form-control" placeholder="City of your room" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Room postal code</label>
          <input type="text" name="postal code" class="form-control" placeholder="Postal code of your room" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Type of course</label>
          <select name="type" class="form-control" required>
            <option disabled selected value="">Votre choix</option>
            <option value="Online courses">Cours en distanciel</option>
            <option value="face-to-face courses">présentiel</option>
          </select>
        </div>


      
        <div class="col-md-6 form-group mt-3 mt-md-0">
  <label>Add products in your room</label>
  <div id="product-group">
    <div class="input-group mb-2">
      <select name="product[]" class="form-control" required>
        <option disabled selected value="">Choisir un produit</option>
        <option value="Table">Table</option>
        <option value="Chair">Chaise</option>
        <option value="Knife">Couteau</option>
        <option value="Spoon">Cuillere</option>
      </select>
      <input type="number" name="product_quantity[]" class="form-control" placeholder="Quantité" min="0">
    </div>
  </div>
  
  <div ><button type="submit"  id="add-product">Add product</button></div>
</div>

<script>
$(document).ready(function() {
  $('#add-product').click(function() {
    var productGroup = $('#product-group');
    var newInput = '<div class="input-group mb-2"><select name="product[]" class="form-control" required><option disabled selected value="">Choisir un produit</option><option value="Table">Table</option><option value="Chair">Chaise</option><option value="Knife">Couteau</option><option value="Spoon">Cuillere</option></select><input type="number" name="product_quantity[]" class="form-control" placeholder="Quantité" min="0"></div>';
    productGroup.append(newInput);
  });
});
</script>


 </div>

        


      <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit">Declare a room</button></div>
    </form>
  </div>
</section>