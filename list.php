<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Profiles</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3b82f6;
      --primary-dark: #2563eb;
      --secondary-color: #64748b;
      --light-bg: #f8fafc;
      --card-bg: #ffffff;
      --text-dark: #1e293b;
      --text-medium: #475569;
      --text-light: #64748b;
      --border-color: #e2e8f0;
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --error-color: #ef4444;
      --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      --rounded-sm: 0.125rem;
      --rounded-md: 0.375rem;
      --rounded-lg: 0.5rem;
      --rounded-xl: 0.75rem;
      --rounded-2xl: 1rem;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--light-bg);
      color: var(--text-dark);
      line-height: 1.5;
      padding: 0;
      min-height: 100vh;
    }

    .container {
      background: var(--card-bg);
      margin: 2rem auto;
      max-width: 1500px;
      padding: 2.5rem;
      border-radius: var(--rounded-xl);
      box-shadow: var(--shadow-md);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    h2 {
      color: var(--text-dark);
      font-size: 1.875rem;
      font-weight: 700;
      margin: 0;
    }

    .add-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background-color: var(--primary-color);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: var(--rounded-md);
      font-weight: 500;
      text-decoration: none;
      transition: all 0.2s;
      box-shadow: var(--shadow-sm);
    }

    .add-btn:hover {
      background-color: var(--primary-dark);
      transform: translateY(-1px);
      box-shadow: var(--shadow-md);
      text-decoration: none;
    }

    .add-btn svg {
      width: 1.25rem;
      height: 1.25rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1.5rem;
      background: var(--card-bg);
      border-radius: var(--rounded-lg);
      overflow: hidden;
      box-shadow: var(--shadow-sm);
    }

    thead {
      background-color: var(--primary-color);
      color: white;
    }

    th, td {
      padding: 1rem 1.25rem;
      text-align: left;
      font-size: 0.875rem;
    }

    th {
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-size: 0.75rem;
    }

    tbody tr {
      border-bottom: 1px solid var(--border-color);
      transition: background-color 0.2s;
    }

    tbody tr:last-child {
      border-bottom: none;
    }

    tbody tr:nth-child(even) {
      background-color: var(--light-bg);
    }

    tbody tr:hover {
      background-color: #eff6ff;
    }

    .status-badge {
      display: inline-block;
      padding: 0.25rem 0.5rem;
      border-radius: var(--rounded-full);
      font-size: 0.75rem;
      font-weight: 500;
      text-transform: capitalize;
    }

    .salary {
      font-weight: 600;
      color: var(--success-color);
    }

    .empty-state {
      text-align: center;
      padding: 3rem;
      color: var(--text-medium);
    }

    .empty-state svg {
      width: 4rem;
      height: 4rem;
      margin-bottom: 1rem;
      color: var(--border-color);
    }

    .empty-state h3 {
      font-size: 1.25rem;
      margin-bottom: 0.5rem;
      color: var(--text-dark);
    }

    .empty-state p {
      margin-bottom: 1.5rem;
    }

    .action-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 2rem;
      height: 2rem;
      border-radius: var(--rounded-full);
      background-color: var(--light-bg);
      color: var(--text-medium);
      transition: all 0.2s;
      border: none;
      cursor: pointer;
    }

    .action-btn:hover {
      background-color: var(--primary-color);
      color: white;
    }

    /* Responsive styles */
    @media (max-width: 1200px) {
      .container {
        margin: 1rem;
        padding: 1.5rem;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 1rem;
      }
      
      th, td {
        padding: 0.75rem;
      }
      
      h2 {
        font-size: 1.5rem;
      }
      
      .add-btn {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
      }
    }

    @media (max-width: 640px) {
      table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
      
      .header {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Employee Directory</h2>
      <a href="index.php" class="add-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Add New Employee
      </a>
    </div>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Gender</th>
          <th>Status</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Date of Birth</th>
          <th>Nationality</th>
          <th>Hire Date</th>
          <th>Department</th>
          <th>Position</th>
          <th>Salary</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $file = __DIR__ . '/data/employees.json';
        if(file_exists($file)){
          $employees = json_decode(file_get_contents($file), true);
          if (!empty($employees)) {
            foreach($employees as $emp){
              echo "<tr>";
              echo "<td><strong>".htmlspecialchars($emp['name'])."</strong></td>";
              echo "<td>".htmlspecialchars($emp['gender'])."</td>";
              echo "<td><span class='status-badge'>".htmlspecialchars($emp['marital_status'])."</span></td>";
              echo "<td>".htmlspecialchars($emp['phone'])."</td>";
              echo "<td><a href='mailto:".htmlspecialchars($emp['email'])."'>".htmlspecialchars($emp['email'])."</a></td>";
              echo "<td>".htmlspecialchars($emp['dob'])."</td>";
              echo "<td>".htmlspecialchars($emp['nationality'])."</td>";
              echo "<td>".htmlspecialchars($emp['hire_date'])."</td>";
              echo "<td>".htmlspecialchars($emp['department'])."</td>";
              echo "<td>".htmlspecialchars($emp['position'] ?? '—')."</td>";
              echo "<td class='salary'>$".number_format(htmlspecialchars($emp['salary'] ?? 0), 2)."</td>";
              echo "</tr>";
            }
          } else {
            echo '<tr><td colspan="11">
              <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3>No Employees Found</h3>
                <p>There are currently no employee records in the system.</p>
                <a href="index.php" class="add-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  Add First Employee
                </a>
              </div>
            </td></tr>';
          }
        } else {
          echo '<tr><td colspan="11">
            <div class="empty-state">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <h3>No Data File Found</h3>
              <p>The employee data file could not be located.</p>
              <a href="index.php" class="add-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add First Employee
              </a>
            </div>
          </td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>