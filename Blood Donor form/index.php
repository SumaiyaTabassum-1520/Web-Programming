
<?php include 'connection.php' ?>
<!DOCTYPE html>
<html>
<head>
    <title>Donor Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('lab6Img1.jpg');
            background-size: cover;
            background-color: rgba(108, 99, 101, 0.7); 
            background-blend-mode: overlay; 
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            text:bold;
            position: relative;
            color: #333;
        }
        
        h1 {
            text-align: center;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            background-color: rgba(237, 231, 232, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px white;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="radio"], .form-group input[type="checkbox"] {
            width: auto;
            accent-color: rgb(191, 30, 57);
        }
        .form-group .radio-group {
            display: flex;
            gap: 10px;
        }
        .form-group .radio-group label {
            margin-right: 10px;
        }
        .form-group .password-group {
            display: flex;
            gap: 10px;
        }
        .form-group .password-group input {
            flex: 1;
        }
        .submit-btn {
            display: block;
            width: 20%;
            padding: 5px;
            background-color: #c57579;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 20px;
            margin: 20px auto 0 auto;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .form-column {
            flex: 1;
        }
        .toggle-password {
            cursor: pointer;
            color: pink;
            margin-left: 10px;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
<h1>Registration Form of a Donor</h1>
<div class="container">
    <form action="insert.php" method="post">
        <div class="form-row">
            <div class="form-column">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder= "Mr.X" required>
                </div>
                <div class="form-group">
                    <label for="nid">NID:</label>
                    <input type="text" id="nid" name="nid" placeholder= "1112223334445"required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder= "abc@xyz.com"required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="radio-group">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other" required>
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number:</label>
                    <input type="number" id="contact" name="contact" placeholder= "+880 123 4567890" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder= "House#11, Road#11, xyz, xyz" required>
                </div>
                <div class="form-group">
                    <label for="blood_type">Blood Type:</label>
                    <select id="blood_type" name="blood_type" placeholder= "Select one" required>
                        <option value="">Select one</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" placeholder= "170 cm" required>
                </div>
                <div class="form-group">
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight"placeholder= "75kg" required>
                </div>
            </div>
            <div class="form-column">
                <div class="form-group">
                    <label for="donated-before">Donated Blood Before?</label>
                    <div class="radio-group">
                        <input type="radio" id="donated-yes" name="donated-before" value="yes" required>
                        <label for="donated-yes">Yes</label>
                        <input type="radio" id="donated-no" name="donated-before" value="no" required>
                        <label for="donated-no">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="allergies">Allergy Details:</label>
                    <textarea id="allergies" name="allergies" placeholder= "I have no allergy"></textarea>
                </div>
                <div class="form-group">
                    <label for="disease-history">Serious Disease History:</label>
                    <textarea id="disease-history" name="disease-history" placeholder= "HbsAg/Hcv/HIV/Hepatitis/T/Covid" ></textarea>
                </div>
                <div class="form-group">
                    <label for="anemia">Has Anemia?</label>
                    <div class="radio-group">
                        <input type="radio" id="anemia-yes" name="anemia" value="yes" required>
                        <label for="anemia-yes">Yes</label>
                        <input type="radio" id="anemia-no" name="anemia" value="no" required>
                        <label for="anemia-no">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cardiac-patient">Cardiac Patient?</label>
                    <div class="radio-group">
                        <input type="radio" id="cardiac-yes" name="cardiac-patient" value="yes" required>
                        <label for="cardiac-yes">Yes</label>
                        <input type="radio" id="cardiac-no" name="cardiac-patient" value="no" required>
                        <label for="cardiac-no">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="under-medication">Under Medication?</label>
                    <div class="radio-group">
                        <input type="radio" id="medication-yes" name="under-medication" value="yes" required>
                        <label for="medication-yes">Yes</label>
                        <input type="radio" id="medication-no" name="under-medication" value="no" required>
                        <label for="medication-no">No</label>
                    </div>
                </div>
                <div class="form-group password-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder= "AbcD@1234" required>
                    <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
                </div>
                <div class="form-group password-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder= "AbcD@1234" required>
                    <span class="toggle-password" onclick="togglePassword('confirm-password')">&#128065;</span>
                </div>
            </div>
        </div>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>
<script>
    function togglePassword(id) {
        var input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>
</body>
</html>
