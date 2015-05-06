<?php
session_start();

$page_title = 'Halaman Utama YOLO CA';
include('includes/header.html');
?>
<!--Header-->

  <div class="container">
    <div class="row" style="padding-top: 100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <h1>Content Title</h1>

          <p>This is where the page-specific content goes. This section will change from
          one page to the next.</p>

          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum."</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include('includes/footer.html');
?>
