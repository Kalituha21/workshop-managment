<?php
// Include config file
require_once "db_upd_del.php";

// Define variables and initialize with empty values
$Surname = $Name = $Student = $Email = $Paper1 = $Paper2 = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_Surname = trim($_POST["Surname"]);
    $Surname = $input_Surname;
    $input_Name = trim($_POST["Name"]);
    $Name = $input_Name;
    $input_Student = trim($_POST["Student"]);
    $Student = $input_Student;
    $input_Email = trim($_POST["Email"]);
    $Email = $input_Email;
    $input_Paper1 = trim($_POST["Paper1"]);
    $Paper1 = $input_Paper1;
    $input_Paper2 = trim($_POST["Paper2"]);
    $Paper2 = $input_Paper2;

        // Prepare an update statement
        $sql = "UPDATE studenti SET Surname=?, Name=?, Student=?, Email=?, Paper1=?, Paper2=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_Surname,$param_Name, $param_Student, $param_Email, $param_Paper1, $param_Paper2, $param_id);

            // Set parameters
            $param_Surname = $Surname;
            $param_Name = $Name;
            $param_Student = $Student;
            $param_Email = $Email;
            $param_Paper1 = $Paper1;
            $param_Paper2 = $Paper2;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: students_info.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);


    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM studenti WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $Surname = $row["Surname"];
            $Name = $row["Name"];
            $Student = $row["Student"];
            $Email = $row["Email"];
            $Paper1 = $row["Paper1"];
            $Paper2 = $row["Paper2"];

                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Update Record</h2>
                <p>Please edit the input values and submit to update the employee record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="Surname" value="<?php echo $Surname; ?>">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" value="<?php echo $Name; ?>">
                    </div>
                    <div class="form-group">
                        <label>Student</label>
                        <input type="text" name="Student" value="<?php echo $Student; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="Email" value="<?php echo $Email; ?>">
                    </div>
                    <div class="form-group">
                        <label>Paper1</label>
                        <input type="text" name="Paper1" value="<?php echo $Paper1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Paper2</label>
                        <input type="text" name="Paper2"  value="<?php echo $Paper2; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="students_info.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>