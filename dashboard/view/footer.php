<footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="../login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  <div class="popup-page" id="popup-page">
  
    <p class="popup-content" id="popup-content">
      <?php if (isset($_GET['view']) && isset($_GET['userid'])) {
        echo "Thanks You";
      } ?>
      
    </p>
  
  </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sydee-2.js"></script>
    <script src="../vendor/jquery.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="../vendor/sydeestack.js"></script>
    <script src="../vendor/mega.js"></script>
    <?php
      if (isset($_GET['page'])) {
        $page =  $_GET['page'];
        echo "<script src='./vendor/$page.js'></script> ";
        }else if(isset($_GET['view']) && isset($_GET['userid']))
        echo "<script src='./vendor/users.js'></script> ";
        
        if (isset($_GET['page']) == 'profile') {
          echo  '<script src="./vendor/lga.js"></script>';
        }
    ?>
    
    
  </body>
</html>
