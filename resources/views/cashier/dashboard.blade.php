<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two Column Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/pos.css') }}">
</head>
<style>
    
</style>
<body>

  <div class="container">
    <div class="column-1">
      <div>
        <div class="logo-section">
          <img src="/image/logo.png" alt="Logo" class="logo-img">
          <div class="name-date-container">
            <span class="logo-text">Tabing's Pater House</span>
            <div class="date-time" style="color:black;" id="date-time"></div>
          </div>
        </div>
      </div>
      <div><div class="category-grid">
  <button class="category-item" onclick="showCategoryProducts(1, this)">
    <i class=""></i> Pater
  </button>
  <button class="category-item" onclick="showCategoryProducts(2, this)">
    <i class=""></i> Side Dishes
  </button>
  <button class="category-item" onclick="showCategoryProducts(3, this)">
    <i class=""></i> Sweet Treats
  </button>  <button class="category-item" onclick="showCategoryProducts(5, this)">
    <i class=""></i> Beverages
  </button> 
  <button class="category-item" onclick="showCategoryProducts(4, this)">
    <i class=""></i> Dessert
  </button>

</div>
</div>
      <div>
  
<div class="category-products-container">
  @foreach ($categories as $category)
    <div id="category-{{ $category->id }}" class="category-products" style="display: none;">
      <div class="row">
        @foreach ($category->products as $product)
          <div class="column">
            <div class="product-container">
              <img src="{{ asset('storage/' . $product->ProductImage) }}" alt="{{ $product->productName }}">
              <h4>{{ $product->productName }}</h4>
              <p>Stock: 
                  <span class="{{ $product->productStock < 5 ? 'low-stock' : '' }}">
                      {{ $product->productStock }}
                  </span>
              </p>
              <p>₱{{ number_format($product->productPrice, 2) }}</p>
              <button 
                  onclick="addToOrder('{{ $product->productName }}', {{ $product->productPrice }}, {{ $product->productStock }})"
                  id="add-to-order-{{ $product->id }}"
                  {{ $product->productStock <= 0 ? 'disabled' : '' }}
              >
                  Add to Order
              </button>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>

      </div>
    </div>
    <div class="column-2">
      <div><div class="cashier-info">
    @if($cashiers && $cashiers->isNotEmpty() && $cashiers->first()->CashierProfile)
        <div class="cashier-details">
            <img src="{{ asset('storage/' . $cashiers->first()->CashierProfile) }}" alt="Cashier Profile" class="cashier-img" id="profilePicture"/>
            <div class="cashier-text">
                <p class="cashier-name">{{ $cashiers->first()->CashierFname }} {{ $cashiers->first()->CashierLname }}</p>
                <p class="cashier-title">Cashier</p>
            </div>
        </div>
    @else
        <div class="cashier-details">
            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile" class="cashier-img" id="profilePicture"/>
            <div class="cashier-text">
                <p class="cashier-name">Cashier Not Available</p>
                <p class="cashier-title">Cashier</p>
            </div>
        </div>
    @endif
 <div class="dropdown">
    <button class="dropdown-btn" style="font-size: 24px; font-weight: bold;">...</button>
    <div class="dropdown-content">
        <a href="#">View Profile</a>
        <a href="#">Logout</a>
    </div>
</div>

</div>
</div>
      <div> <button class="btn btn-success" id="clear-all" style="margin-top:10px;">Clear All</button></div>
      <div class="summary">  <h2>Order Summary</h2>
    <div class="order-items" id="order-items">
        <!-- Dynamically added order items will appear here -->
    </div>
    <div class="total">
        <h3>Total: ₱<span id="total-amount">0.00</span></h3>
    </div>
<!-- Pay Now Button -->
<button id="pay-now" class="btn btn-primary">Pay Now</button>
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">Payment Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Left Column: Order List -->
          <div class="col-md-6">
            <h5>Order Items</h5>
            <div class="order-items" id="modal-order-items">
              <!-- Dynamically added order items will appear here -->
              <ul>
                <li>Item 1 - ₱100.00</li>
                <li>Item 2 - ₱150.00</li>
                <li>Item 3 - ₱50.00</li>
              </ul>
            </div>
          </div>
          
          <!-- Right Column: Payment Details -->
          <div class="col-md-6">
            <h5>Payment Details</h5>
            <div class="total">
              <p>Total: ₱<span id="modal-total-amount">300.00</span></p>
            </div>
            <div class="order-type">
              <label for="order-type">Order Type:</label>
              <select id="order-type" class="form-control">
                <option value="dine-in" selected>Dine-In</option>
                <option value="take-out">Take-Out</option>
              </select>
            </div>

            <div class="payment-method">
              <label for="payment-method">Payment Method:</label>
              <select id="payment-method" class="form-control" onchange="togglePaymentDetails()">
                <option value="cash" selected>Cash</option>
                <option value="gcash">Gcash</option>
              </select>
            </div>

            <div id="payment-details">
              <!-- Default cash payment fields -->
              <div class="cash-payment">
                <label for="cash-amount">Cash Amount:</label>
                <input type="number" class="form-control" id="cash-amount" placeholder="Enter amount" oninput="calculateChange()">
                <p>Change: ₱<span id="change-amount">0.00</span></p>
              </div>
              <!-- Gcash payment fields will be shown if Gcash is selected -->
              <div class="gcash-payment" style="display:none;">
                <label for="gcash-receipt-no">Receipt No:</label>
                <input type="text" class="form-control" id="gcash-receipt-no" placeholder="Enter receipt number">
                <label for="gcash-amount">Amount:</label>
                <input type="number" class="form-control" id="gcash-amount" placeholder="Enter amount">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirm-payment">Confirm Payment</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Function to toggle payment details based on payment method
  function togglePaymentDetails() {
    const paymentMethod = document.getElementById('payment-method').value;
    if (paymentMethod === 'gcash') {
      document.querySelector('.gcash-payment').style.display = 'block';
      document.querySelector('.cash-payment').style.display = 'none';
    } else {
      document.querySelector('.gcash-payment').style.display = 'none';
      document.querySelector('.cash-payment').style.display = 'block';
    }
  }

  // Function to calculate the change when cash is selected
  function calculateChange() {
    const total = parseFloat(document.getElementById('modal-total-amount').innerText);
    const cashAmount = parseFloat(document.getElementById('cash-amount').value) || 0;
    const change = cashAmount - total;
    document.getElementById('change-amount').innerText = change >= 0 ? change.toFixed(2) : '0.00';
  }

  // Initialize payment details display on load
  togglePaymentDetails();
</script>

    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    // When Pay Now button is clicked, show the modal
    $('#pay-now').click(function() {
      $('#paymentModal').modal('show');
    });

    // Optional: handle the confirmation button action
    $('#confirm-payment').click(function() {
      // Handle the payment logic (e.g., AJAX request to the server, etc.)
      alert('Payment confirmed!');
      $('#paymentModal').modal('hide');
    });
  });
</script>

  <script>
        // Get references to the button and the columns container
        const payNowButton = document.getElementById("pay-now");
        const columnsContainer = document.getElementById("columns-container");

        // Toggle columns visibility when 'Pay Now' button is clicked
        payNowButton.addEventListener("click", function() {
            // Check if columns are currently hidden or visible
            if (columnsContainer.style.display === "none" || columnsContainer.style.display === "") {
                columnsContainer.style.display = "flex"; // Show columns
            } else {
                columnsContainer.style.display = "none"; // Hide columns
            }
        });
    </script>
<script>
let totalAmount = 0;
let orderItems = [];

function addToOrder(productName, productPrice, productStock) {
    // Check if product is already in the order
    let existingItem = orderItems.find(item => item.name === productName);

    if (existingItem) {
        // Update quantity
        existingItem.quantity++;
    } else {
        // Add new product to order
        orderItems.push({
            name: productName,
            price: productPrice,
            quantity: 1
        });
    }

    // Sort order items by name
    orderItems.sort((a, b) => a.name.localeCompare(b.name));

    // Update the order summary
    updateOrderSummary();
}

function updateOrderSummary() {
    let orderItemsContainer = document.getElementById('order-items');
    orderItemsContainer.innerHTML = '';  // Clear current items

    totalAmount = 0;  // Reset total amount

    orderItems.forEach(item => {
        // Create the HTML for each order item
        let orderItem = document.createElement('div');
        orderItem.classList.add('order-item');
        orderItem.innerHTML = `
            <div class="product-info">
                <p>${item.name}</p>
                <p>₱${item.price}</p>
            </div>
            <div class="quantity-control">
                <button class="minus-btn" onclick="changeQuantity('${item.name}', -1)">-</button>
                <span>${item.quantity}</span>
                <button class="plus-btn" onclick="changeQuantity('${item.name}', 1)">+</button>
            </div>
            <button class="delete-btn" onclick="deleteItem('${item.name}')">Delete</button>
        `;
        orderItemsContainer.appendChild(orderItem);

        // Update the total amount
        totalAmount += item.price * item.quantity;
    });

    // Update the total displayed
    document.getElementById('total-amount').textContent = totalAmount.toFixed(2);
}

function changeQuantity(productName, change) {
    let item = orderItems.find(item => item.name === productName);

    if (item) {
        item.quantity += change;

        // Remove the item if quantity is 0 or less
        if (item.quantity <= 0) {
            orderItems = orderItems.filter(i => i !== item);
        }

        // Update the order summary
        updateOrderSummary();
    }
}

function deleteItem(productName) {
    // Remove item from the order
    orderItems = orderItems.filter(item => item.name !== productName);

    // Update the order summary
    updateOrderSummary();
}

function processPayment() {
    // Here, you can add logic to process the payment
    alert('Proceeding to payment...');
}
</script>
  <script>
    // Function to display the current date, time, and day in Philippine Time
    function displayDateTime() {
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', timeZone: 'Asia/Manila' };
      const date = new Date().toLocaleString('en-US', options);
      document.getElementById('date-time').textContent = date;
    }

    // Update the time every second
    setInterval(displayDateTime, 1000); // Call displayDateTime every second
  </script>
<script>
function showCategoryProducts(categoryId) {
    // Hide all category products
    const allCategories = document.querySelectorAll('.category-products');
    allCategories.forEach(category => {
        category.style.display = 'none';
    });

    // Show the selected category products
    const selectedCategory = document.getElementById('category-' + categoryId);
    selectedCategory.style.display = 'grid';
}

</script>
<script></script>
</body>
</html>
