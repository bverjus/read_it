<!DOCTYPE html>
<html lang="en">
  <body>
    <div class="container">
      <h2>Liste des catégories</h2>
      <form action="?addCategory" method="post">
        <div class="mb-3 row">
          <input
            type="text"
            name="name"
            class="form-control form-control-lg col-3 mr-3"
            placeholder="New Category"
            required
          />
          <input
            type="submit"
            class="form-control form-control-lg btn btn-primary col-1"
          />
        </div>
      </form>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $i => $category){?>
          <tr>
            <th scope="row"><?php echo($i+1) ?></th>
            <td><?php echo($category['name']) ?></td>
            <td>
              <a href="" class="btn btn-primary"
                ><i class="fa-solid fa-pen-to-square"></i></a
              >&nbsp;
              <a href="deleteCategory/<?php echo $category['id'] ?>" class="btn btn-secondary"
                ><i class="fa-solid fa-trash"></i
              ></a>
            </td>
          </tr>
          <tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>