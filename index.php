<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3b82f6;
      --secondary-color: #3b82f6;
      --success-color: #2ecc71;
      --error-color: #e74c3c;
      --light-gray: #f5f5f5;
      --dark-gray: #333;
      --medium-gray: #777;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f9f9f9;
      color: var(--dark-gray);
      line-height: 1.6;
      padding: 20px;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
      color: var(--primary-color);
      text-align: center;
      margin-bottom: 30px;
      font-weight: 500;
    }
    
    #employeeForm {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    
    .form-group.full-width {
      grid-column: span 2;
    }
    
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--medium-gray);
    }
    
    input, select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-family: inherit;
      font-size: 16px;
      transition: border 0.3s;
    }
    
    input:focus, select:focus, textarea:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }
    
    textarea {
      min-height: 100px;
      resize: vertical;
    }
    
    button[type="submit"] {
      grid-column: span 2;
      background-color: var(--primary-color);
      color: white;
      border: none;
      padding: 14px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    button[type="submit"]:hover {
      background-color: var(--secondary-color);
    }
    
    #response {
      margin-top: 20px;
      padding: 15px;
      border-radius: 4px;
      text-align: center;
    }
    
    .success {
      color: var(--success-color);
      background-color: rgba(46, 204, 113, 0.1);
      display: block;
      padding: 10px;
    }
    
    .error {
      color: var(--error-color);
      background-color: rgba(231, 76, 60, 0.1);
      display: block;
      padding: 10px;
    }
    
    .view-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }
    
    .view-link:hover {
      color: var(--secondary-color);
      text-decoration: underline;
    }
    
    @media (max-width: 768px) {
      #employeeForm {
        grid-template-columns: 1fr;
      }
      
      .form-group.full-width {
        grid-column: span 1;
      }
      
      button[type="submit"] {
        grid-column: span 1;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add New Employee</h2>
    <form id="employeeForm" method="POST" action="api/employee.php">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required maxlength="100" placeholder="John Doe">
      </div>
      
      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="marital_status">Marital Status</label>
        <select id="marital_status" name="marital_status" required>
          <option value="">Select Status</option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Divorced">Divorced</option>
          <option value="Widowed">Widowed</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="phone">Phone No</label>
        <input type="tel" id="phone" name="phone" pattern="^\d{10,15}$" required placeholder="1234567890">
      </div>
      
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="employee@example.com">
      </div>
      
      <div class="form-group full-width">
        <label for="address">Address</label>
        <textarea id="address" name="address" required maxlength="255" placeholder="Street, City, State, ZIP"></textarea>
      </div>
      
      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>
      </div>
      
      <div class="form-group">
        <label for="nationality">Nationality</label>
        <input type="text" id="nationality" name="nationality" required maxlength="50" placeholder="Country">
      </div>
      
      <div class="form-group">
        <label for="hire_date">Hire Date</label>
        <input type="date" id="hire_date" name="hire_date" required>
      </div>
      
      <div class="form-group">
        <label for="department">Department</label>
        <input type="text" id="department" name="department" required maxlength="50" placeholder="Department name">
      </div>
      
      <div class="form-group">
        <label for="position">Position</label>
        <input type="text" id="position" name="position" maxlength="50" placeholder="Job title">
      </div>
      
      <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" id="salary" name="salary" min="0" step="0.01" placeholder="0.00">
      </div>
      
      <button type="submit">Add Employee</button>
    </form>
    
    <div id="response"></div>
    
    <a href="list.php" class="view-link">View All Employees →</a>
  </div>

  <script>
    document.getElementById('employeeForm').onsubmit = async function(e) {
      e.preventDefault();
      const form = e.target;
      const responseDiv = document.getElementById('response');
      
      // Show loading state
      responseDiv.innerHTML = "<div style='color: var(--primary-color)'>Processing...</div>";
      
      try {
        const data = new FormData(form);
        const resp = await fetch(form.action, { 
          method: 'POST', 
          body: data 
        });
        
        const result = await resp.json();
        
        if(result.success){
          responseDiv.innerHTML = `<span class='success'>✓ ${result.message}</span>`;
          form.reset();
          
          // Clear success message after 3 seconds
          setTimeout(() => {
            responseDiv.innerHTML = '';
          }, 3000);
        } else {
          responseDiv.innerHTML = `<span class='error'>✗ ${result.message}</span>`;
        }
      } catch (error) {
        responseDiv.innerHTML = `<span class='error'>✗ Network error occurred. Please try again.</span>`;
        console.error('Error:', error);
      }
    }
    
    // Add today's date as default for hire date
    document.addEventListener('DOMContentLoaded', function() {
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('hire_date').value = today;
    });
  </script>
</body>
</html>