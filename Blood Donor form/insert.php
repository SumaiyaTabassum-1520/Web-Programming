<?php
// Connection to the database
include 'connection.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Collect and validate inputs
    $name = trim($_POST['name']);
    $nid = trim($_POST['nid']);
    $dob = $_POST['dob'];
    $email = trim($_POST['email']);
    $gender = $_POST['gender'];
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $blood_type = $_POST['blood_type'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $donated_before = $_POST['donated-before'];
    $allergies = trim($_POST['allergies']);
    $disease_history = trim($_POST['disease-history']);
    $anemia = $_POST['anemia'];
    $cardiac_patient = $_POST['cardiac-patient'];
    $under_medication = $_POST['under-medication'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Required fields check
    $required_fields = [
        'name', 'nid', 'dob', 'email', 'gender', 'contact', 'address', 'blood_type', 
        'height', 'weight', 'donated-before', 'anemia', 'cardiac-patient', 'under-medication', 'password'
    ];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = "$field is required.";
        }
    }

    // Name validation
    if (!preg_match("/^(?!.*\s{2})[A-Za-z]{2,}(\s[A-Za-z]{2,}){1,2}$/", $name) || strlen($name) < 4 || strlen($name) > 25) {
        $errors['name'] = "Name must be 4-25 characters, include first and last names, and have no extra spaces.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // NID validation (Bangladesh format: at least 10 digits)
    if (!preg_match("/^\d{10,17}$/", $nid)) {
        $errors['nid'] = "Invalid NID format.";
    }

    // Date of Birth validation
    $age = (new DateTime())->diff(new DateTime($dob))->y;
    if ($age < 18) {
        $errors['dob'] = "You must be at least 18 years old.";
    }

    // Mobile number validation (Bangladesh: starts with 01, followed by 9 digits)
    if (!preg_match("/^01[0-9]{9}$/", $contact)) {
        $errors['contact'] = "Invalid Bangladeshi mobile number.";
    }

    // Duplicate check (NID and DOB)
    $stmt = $conn->prepare("SELECT * FROM donors WHERE nid = ? AND dob = ?");
    $stmt->bind_param("ss", $nid, $dob);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header("Location: duplicate_entry.php");
        exit;
    }

    // Word limit and offensive word sanitization
    $sanitize = function ($input) {
        $offensive_words = ['offensiveWord1', 'offensiveWord2'];
        $safe_words = ['***', '***'];
        return str_replace($offensive_words, $safe_words, $input);
    };

    foreach (['address', 'allergies', 'disease_history'] as $field) {
        if (str_word_count($$field) > 150) {
            $errors[$field] = "$field cannot exceed 150 words.";
        }
        ${$field} = $sanitize(${$field});
    }
    

    // Password validation
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/", $password)) {
        $errors['password'] = "Password must be 8-20 characters with uppercase, lowercase, and a number.";
    }
    if ($password !== $confirm_password) {
        $errors['confirm-password'] = "Passwords do not match.";
    }

    // If no errors, proceed to save data
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO donors (name, nid, dob, email, gender, contact, address, blood_type, height, weight, donated_before, allergies, disease_history, anemia, cardiac_patient, under_medication, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssiiissssss", $name, $nid, $dob, $email, $gender, $contact, $address, $blood_type, $height, $weight, $donated_before, $allergies, $disease_history, $anemia, $cardiac_patient, $under_medication, $hashed_password);
        if ($stmt->execute()) {
            header("Location: success.php");
            exit; 
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
    $conn->close();
}
?>
