<?php
session_start();
require_once 'config.php'; // Adjust this to match your database configuration

// Check if cartData is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve cart data from POST
  $cartData = json_decode($_POST['cartData'], true);

  if (!$cartData) {
    // Handle JSON decoding error
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON data']);
    exit;
  }

  // Example: Save cart items to database
  try {
    foreach ($cartData as $item) {
      $plan = $item['plan'];
      $fee = $item['fee'];
      $userId = $_SESSION['user_id']; // Assuming you have user session stored

      // Insert into database
      $stmt = $pdo->prepare("INSERT INTO cart_items (user_id, plan, fee) VALUES (:user_id, :plan, :fee)");
      $stmt->bindParam(':user_id', $userId);
      $stmt->bindParam(':plan', $plan);
      $stmt->bindParam(':fee', $fee);
      $stmt->execute();
    }

    // Return success response
    echo json_encode(['success' => true]);
    exit;
  } catch (PDOException $e) {
    // Handle database errors
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    exit;
  }
} else {
  // Return error response if cartData is not sent via POST
  http_response_code(400);
  echo json_encode(['error' => 'Cart data not received via POST']);
  exit;
}
?>
