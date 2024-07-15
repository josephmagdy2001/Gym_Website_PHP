<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gym Website</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles\index.css">
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


   
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index.php">Gym</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
        </li>
      </ul>
    </div>
  </nav>

    <!-- Home Section -->
  

  <!-- About Us Section -->
  <section id="about" class="about-section">
  <h2>About Us</h2>
  <div class="about-content">
    <p>Welcome to our gym. We offer a variety of fitness classes and personal training sessions to help you achieve your fitness goals. Our experienced trainers are here to guide and motivate you every step of the way.</p>
    <img src="https://th.bing.com/th?id=OIF.lxOzUqt%2bUQ%2fXQKelIATTUQ&rs=1&pid=ImgDetMain" alt="About Us">
  </div>
</section>


  <!-- Trainers Section -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Our Trainers</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card trainer-card">
          <img loading="lazy" src="https://th.bing.com/th/id/R.03f9ed58ecd9ad70b46095d568957b01?rik=%2fZ%2fyJPr5y1jf8g&pid=ImgRaw&r=0" alt="Trainer 1">
          <div class="card-body text-center">
            <h5 class="card-title">Name : Joseph</h5>
            <p class="card-text">Certified Personal Trainer</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card trainer-card">
          <img loading="lazy" src="https://th.bing.com/th/id/R.7e063fe3f8c066424282466fa622751a?rik=deGl4EVHEgei0A&pid=ImgRaw&r=0" alt="Trainer 2">
          <div class="card-body text-center">
            <h5 class="card-title">Name : Ahmed</h5>
            <p class="card-text">Fitness Instructor</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div  class="card trainer-card">
          <img loading="lazy" src="https://www.attainbyaetna.com/content/dam/aetna/images/apollo/amir_headshot.jpg" alt="Trainer 3">
          <div class="card-body text-center">
            <h5 class="card-title">Name : Joe</h5>
            <p class="card-text">Yoga Specialist</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<section class="plan-section">
  <h2>Choose a Plan</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card plan-card">
          <h5>Basic Plan</h5>
          <p><strong>Fees:</strong> $30/month</p>
          <ul>
            <li>Access to gym equipment</li>
            <li>One personal training session per month</li>
            <li>Access to group classes</li>
          </ul>
          <button class="btn btn-primary add-to-cart" data-plan="Basic Plan" data-fee="30">Add to Cart</button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card plan-card">
          <h5>Standard Plan</h5>
          <p><strong>Fees:</strong> $50/month</p>
          <ul>
            <li>Access to gym equipment</li>
            <li>Four personal training sessions per month</li>
            <li>Access to group classes</li>
            <li>Nutrition consultation</li>
          </ul>
          <button class="btn btn-primary add-to-cart" data-plan="Standard Plan" data-fee="50">Add to Cart</button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card plan-card">
          <h5>Premium Plan</h5>
          <p><strong>Fees:</strong> $80/month</p>
          <ul>
            <li>Access to gym equipment</li>
            <li>Unlimited personal training sessions</li>
            <li>Access to group classes</li>
            <li>Nutrition consultation</li>
            <li>Spa access</li>
          </ul>
          <button class="btn btn-primary add-to-cart" data-plan="Premium Plan" data-fee="80">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Basket Icon and Cart Section -->
  <div class="cart-section mt-4">
    <h3>Shopping Cart</h3>
    <ul class="list-group" id="cartItems">
      <!-- Cart items will be dynamically added here -->
    </ul>
    <p><strong>Total:</strong> <span id="totalAmount">$0</span></p>
    <button class="btn btn-danger mt-3" id="clearCart">Clear Cart</button>
    <button class="btn btn-success mt-3" id="save">Save</button>
    <button class="btn btn-success mt-3" id="checkout">Checkout</button>
  </div>
</section>

<script>

    $(document).ready(function() {
      var cartItems = []; // Initialize cart items array

      // Function to update cart display
      function updateCartDisplay() {
        $('#cartItems').empty();
        var total = 0;

        cartItems.forEach(function(item) {
          $('#cartItems').append('<li class="list-group-item">' + item.plan + ' - $' + item.fee + '</li>');
          total += item.fee;
        });

        $('#totalAmount').text('$' + total); // Update total amount display
      }

      // Add to Cart button click event handler
      $('.add-to-cart').click(function() {
        var plan = $(this).data('plan');
        var fee = $(this).data('fee');

        // Check if the plan is already in cart
        var alreadyInCart = cartItems.some(item => item.plan === plan);

        if (!alreadyInCart) {
          // Add plan to cart
          cartItems.push({ plan: plan, fee: fee });

          // Update cart display
          updateCartDisplay();
        } else {
          alert('This plan is already in your cart.');
        }
      });

      // Clear Cart button click event handler
      $('#clearCart').click(function() {
        cartItems = []; // Clear cart items array
        updateCartDisplay(); // Update cart display
      });

      // Save Cart button click event handler
      $('#save').click(function() {
        // AJAX request to save cart items
        $.ajax({
          url: 'save_cart.php',
          type: 'POST',
          data: { cartData: JSON.stringify(cartItems) },
          success: function(response) {
            if (response.success) {
              alert('Cart items saved successfully.');
            } else {
              alert('Error saving cart items. Please try again.');
            }
          },
          error: function(xhr, status, error) {
            alert('Error saving cart items: ' + error);
          }
        });
      });

      // Checkout button click event handler
      $('#checkout').click(function() {
        // Check if cart has items
        if (cartItems.length === 0) {
          alert('Your cart is empty. Please add items before checkout.');
          return;
        }

        // Redirect to checkout page
        window.location.href = 'checkout.php';
      });

      // Initial cart display update
      updateCartDisplay();
    });
</script>


  <!-- Footer -->
  <footer id="contact" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Contact Us</h5>
          <p>Location: 123 Gym Street, Fitness City</p>
          <p>Email: info@gym.com</p>
        </div>
        <div class="col-md-4">
          <h5>Pages</h5>
          <ul class="list-unstyled">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
            <li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Follow Us</h5>
          <a href="#" class="text-dark mr-2"><i class="fab fa-facebook"></i></a>
          <a href="#" class="text-dark mr-2"><i class="fab fa-github"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="login.php">
        <label for="username">Email:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="register.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap and jQuery Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
      alert('Logged in successfully!');
      $('#loginModal').modal('hide');
    });

    document.getElementById('registerForm').addEventListener('submit', function(event) {
      event.preventDefault();
      alert('Registered successfully!');
      $('#registerModal').modal('hide');
    });


 

  </script>
 
</body>
</html>
