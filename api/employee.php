<?php
header('Content-Type: application/json');

// Simple backend validation function
function validate($data) {
    $errors = [];
    if(empty($data['name']) || strlen($data['name']) > 100) $errors[] = "Invalid name";
    if(!in_array($data['gender'], ['Male', 'Female', 'Other'])) $errors[] = "Invalid gender";
    if(!in_array($data['marital_status'], ['Single', 'Married', 'Divorced', 'Widowed'])) $errors[] = "Invalid marital status";
    if(!preg_match('/^\d{10,15}$/', $data['phone'])) $errors[] = "Invalid phone number";
    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email";
    if(empty($data['address']) || strlen($data['address']) > 255) $errors[] = "Invalid address";
    if(empty($data['dob'])) $errors[] = "Invalid date of birth";
    if(empty($data['nationality']) || strlen($data['nationality']) > 50) $errors[] = "Invalid nationality";
    if(empty($data['hire_date'])) $errors[] = "Invalid hire date";
    if(empty($data['department']) || strlen($data['department']) > 50) $errors[] = "Invalid department";
    // Optional fields
    if(!empty($data['position']) && strlen($data['position']) > 50) $errors[] = "Invalid position";
    if(!empty($data['salary']) && (!is_numeric($data['salary']) || $data['salary'] < 0)) $errors[] = "Invalid salary";
    return $errors;
}

// Handle POST request
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'name', 'gender', 'marital_status', 'phone', 'email', 'address',
        'dob', 'nationality', 'hire_date', 'department', 'position', 'salary'
    ];
    $data = [];
    foreach($fields as $f) $data[$f] = trim($_POST[$f] ?? '');

    $errors = validate($data);
    if(count($errors) > 0){
        echo json_encode(['success'=>false, 'message'=>implode(', ', $errors)]);
        exit;
    }

    // Save to JSON file
    $file = __DIR__ . '/../data/employees.json';
    if(!is_dir(dirname($file))) mkdir(dirname($file), 0777, true);

    $employees = [];
    if(file_exists($file)){
        $json = file_get_contents($file);
        $employees = json_decode($json,true) ?: [];
    }
    $data['id'] = uniqid('emp_');
    $employees[] = $data;
    file_put_contents($file, json_encode($employees, JSON_PRETTY_PRINT));
    echo json_encode(['success'=>true, 'message'=>'Employee added successfully.']);
    exit;
}
echo json_encode(['success'=>false, 'message'=>'Invalid request']);