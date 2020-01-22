<?php
$str = file_get_contents('./FoodData.json');
$FoodArray = json_decode($str, true); // decode the JSON into an associative array
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
FoodCourt
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" />
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="../assets/js/core/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.11.0/css/mdb.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          CrewBot NextGen
        </a>
        <a class="simple-text logo-normal">
          Assistant
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">fastfood</i>
              <p>Food Court</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./News">
              <i class="material-icons">sms</i>
              <p>News</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./CrewTube">
              <i class="material-icons">video_library</i>
              <p>CrewTube</p>
            </a>
          </li>
         
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content" style="margin-top: 0px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-warning">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Categories</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="#profile" data-toggle="tab">
                            <i class="material-icons">cake</i>Snacks
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Meals
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> Beverages
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="profile">
                      <div class="container ml-5" style="max-width: 100%;">
                        <div class="row ml-5">
                          <!-- Card Narrower -->
                          <?php foreach ($FoodArray as $food) {
                            if ($food['Category'] == "Breakfast/Snacks") {
                              echo '  <div class="card card-cascade narrower col-lg-3 col-md-12 ml-5" style="height: auto;">
                            <!-- Card image -->
                            <div class="view view-cascade overlay">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" alt="Card image cap" />
                              <a>
                                <div class="mask rgba-white-slight"></div>
                              </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body card-body-cascade">
                              <!-- Label -->
                              <h5 class="pink-text pb-2 pt-1">
                                <i class="fas fa-utensils"></i>&nbsp ' . $food['Category'] . '
                              </h5>
                              <form id="snacks" method="post">
                              <!-- Title -->
                              <h4 class="font-weight-bold card-title">
                              ' . $food['Name'] . '
                              </h4>
                              <!-- Text -->
                              <p class="card-text">
                              ' . $food['Description'] . '
                              </p>
                              <!-- Button -->
                              <a class="btn btn-indigo btn-round" onclick="markOrder(\'' . $food['Name'] . '\',\'' . $food['Price'] . '\')">Order</a>
                            </div>

                            <!-- Card footer -->
                            <div class="card-footer text-muted text-center">
                            ' . $food['Price'] . '
                            </div>
                            </form>
                          </div>';
                            }
                          }
                          ?>
                          <!-- Card Narrower -->
                        </div>
                      </div>
                    </div>


                    <div class="tab-pane" id="messages">
                      <div class="container ml-5" style="max-width: 100%;">
                        <div class="row ml-5">
                          <?php foreach ($FoodArray as $food) {
                            if ($food['Category'] == "Meal") {
                              echo '  <div class="card card-cascade narrower col-lg-3 col-md-12 ml-5" style="height: auto;">
                            <!-- Card image -->
                            <div class="view view-cascade overlay">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" alt="Card image cap" />
                              <a>
                                <div class="mask rgba-white-slight"></div>
                              </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body card-body-cascade">
                              <!-- Label -->
                              <h5 class="pink-text pb-2 pt-1">
                                <i class="fas fa-utensils"></i>&nbsp ' . $food['Category'] . '
                              </h5>
                              <!-- Title -->
                              <h4 class="font-weight-bold card-title">
                              ' . $food['Name'] . '
                              </h4>
                              <!-- Text -->
                              <p class="card-text">
                              ' . $food['Description'] . '
                              </p>
                              <!-- Button -->
                              <a class="btn btn-primary btn-round" onclick="markOrder(\'' . $food['Name'] . '\',\'' . $food['Price'] . '\')">Order</a>
                            </div>

                            <!-- Card footer -->
                            <div class="card-footer text-muted text-center">
                            ' . $food['Price'] . '
                            </div>
                          </div>';
                            }
                          }
                          ?>


                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="settings">
                      <div class="container ml-5" style="max-width: 100%;">
                        <div class="row ml-5">


                          <!-- Card Narrower -->
                          <?php foreach ($FoodArray as $food) {
                            if ($food['Category'] == "Beverages") {
                              echo '  <div class="card col-lg-3 col-md-12 ml-5" style="height: auto;">
                            <!-- Card image -->
                            <div class="view view-cascade overlay">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" alt="Card image cap" />
                              <a>
                                <div class="mask rgba-white-slight"></div>
                              </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body card-body-cascade">
                              <!-- Label -->
                              <h5 class="pink-text pb-2 pt-1">
                                <i class="fas fa-utensils"></i>&nbsp ' . $food['Category'] . '
                              </h5>
                              <!-- Title -->
                              <h4 class="font-weight-bold card-title">
                              ' . $food['Name'] . '
                              </h4>
                              <!-- Text -->
                              <p class="card-text">
                              ' . $food['Description'] . '
                              </p>
                              <!-- Button -->
                              <a class="btn btn-unique btn-round" onclick="markOrder(\'' . $food['Name'] . '\',\'' . $food['Price'] . '\')">Order</a>
                            </div>

                            <!-- Card footer -->
                            <div class="card-footer text-muted text-center">
                            ' . $food['Price'] . '
                            </div>
                          </div>';
                            }
                          }
                          ?>
                          <!-- Card Narrower -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">
            , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Amigos</a>
            for a better experience.
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById("date");
        date.innerHTML = "&copy; " + x + date.innerHTML;
      </script>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title">Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="" />
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="" />
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="" />
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="" />
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard-dark" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard/tree/dark-edition" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter">
            <i class="fa fa-twitter"></i> &middot; 45
          </button>
          <button id="facebook" class="btn btn-round btn-facebook">
            <i class="fa fa-facebook-f"></i> &middot; 50
          </button>
          <br />
          <br />
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $(".sidebar");

        $sidebar_img_container = $sidebar.find(".sidebar-background");

        $full_page = $(".full-page");

        $sidebar_responsive = $("body > .navbar-collapse");

        window_width = $(window).width();

        $(".fixed-plugin a").click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $(".fixed-plugin .active-color span").click(function() {
          $full_page_background = $(".full-page-background");

          $(this)
            .siblings()
            .removeClass("active");
          $(this).addClass("active");

          var new_color = $(this).data("color");

          if ($sidebar.length != 0) {
            $sidebar.attr("data-color", new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr("filter-color", new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr("data-color", new_color);
          }
        });

        $(".fixed-plugin .background-color .badge").click(function() {
          $(this)
            .siblings()
            .removeClass("active");
          $(this).addClass("active");

          var new_color = $(this).data("background-color");

          if ($sidebar.length != 0) {
            $sidebar.attr("data-background-color", new_color);
          }
        });

        $(".fixed-plugin .img-holder").click(function() {
          $full_page_background = $(".full-page-background");

          $(this)
            .parent("li")
            .siblings()
            .removeClass("active");
          $(this)
            .parent("li")
            .addClass("active");

          var new_image = $(this)
            .find("img")
            .attr("src");

          if (
            $sidebar_img_container.length != 0 &&
            $(".switch-sidebar-image input:checked").length != 0
          ) {
            $sidebar_img_container.fadeOut("fast", function() {
              $sidebar_img_container.css(
                "background-image",
                'url("' + new_image + '")'
              );
              $sidebar_img_container.fadeIn("fast");
            });
          }

          if (
            $full_page_background.length != 0 &&
            $(".switch-sidebar-image input:checked").length != 0
          ) {
            var new_image_full_page = $(".fixed-plugin li.active .img-holder")
              .find("img")
              .data("src");

            $full_page_background.fadeOut("fast", function() {
              $full_page_background.css(
                "background-image",
                'url("' + new_image_full_page + '")'
              );
              $full_page_background.fadeIn("fast");
            });
          }

          if ($(".switch-sidebar-image input:checked").length == 0) {
            var new_image = $(".fixed-plugin li.active .img-holder")
              .find("img")
              .attr("src");
            var new_image_full_page = $(".fixed-plugin li.active .img-holder")
              .find("img")
              .data("src");

            $sidebar_img_container.css(
              "background-image",
              'url("' + new_image + '")'
            );
            $full_page_background.css(
              "background-image",
              'url("' + new_image_full_page + '")'
            );
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css(
              "background-image",
              'url("' + new_image + '")'
            );
          }
        });

        $(".switch-sidebar-image input").change(function() {
          $full_page_background = $(".full-page-background");

          $input = $(this);

          if ($input.is(":checked")) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn("fast");
              $sidebar.attr("data-image", "#");
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn("fast");
              $full_page.attr("data-image", "#");
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr("data-image");
              $sidebar_img_container.fadeOut("fast");
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr("data-image", "#");
              $full_page_background.fadeOut("fast");
            }

            background_image = false;
          }
        });

        $(".switch-sidebar-mini input").change(function() {
          $body = $("body");

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $("body").removeClass("sidebar-mini");
            md.misc.sidebar_mini_active = false;

            $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
          } else {
            $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
              "destroy"
            );

            setTimeout(function() {
              $("body").addClass("sidebar-mini");

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event("resize"));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
      });
    });


    function markOrder(item, price) {


      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to cancle this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Place order'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url: "./storefoodorder.php", //the page containing php script
            type: "post", //request type,
            data: {
              'item': item,
              'price': price
            },
            success: function(result) {
              Swal.fire(
                'order placed',
                result,
                'success'
              )
            },
            error: function(result) {
              swal.fire(
                'OH No!',
                result.responseText,
                'error'
              );
              // window.location.reload(true);
            }

          });
        }
      })




    };
  </script>
</body>

</html>