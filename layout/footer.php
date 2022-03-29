  <!-- Footer section -->
  <!-- <footer class="container-fluid bg-primary">
      <main class="container">
          <div class="row">
              <div class="col-md-4 border border text-dark" style="height: 300px;">
                  <h3>Quick Links</h3>
                  <ul class="list-unstyled text-dark">
                      <li>
                          <a href="index.php" style="color:inherit !important">
                              Home
                          </a>
                      </li>
                      <li>
                          <a href="about.php" style="color:inherit !important">
                              About Us
                          </a>
                      </li>
                      <li>
                          <a href="blog.php" style="color:inherit !important">
                              Blogs
                          </a>
                      </li>
                      <li>
                          <a href="contact.php" style="color:inherit !important">
                              Contact Us
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="col-md-4 border border-white d-none d-md-block" style="height: 300px;">Quick</div>
              <div class="col-md-4 border border-white d-none d-md-block" style="height: 300px;">Other Link</div>
          </div>
      </main>
  </footer> -->
  <!-- Footer section -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $(document).ready(function() {
          $(".owl-carousel").owlCarousel({
              margin: 10,
              loop: true,
              autoplay: true,
              responsive: {
                  0: {
                      items: 1,
                  },
                  // breakpoint from 480 up
                  768: {
                      items: 4,
                      center: false
                  },
              },

          });
      });
  </script>
  </body>

  </html>