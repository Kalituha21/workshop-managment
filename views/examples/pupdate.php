<?php
// Include config file
require_once "db_upd_del.php";

// Define variables and initialize with empty values
$Title = $Surname = $Name = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_Title = trim($_POST["Title"]);
    $Title = $input_Title;
    $input_Surname = trim($_POST["Surname"]);
    $Surname = $input_Surname;
    $input_Name = trim($_POST["Name"]);
    $Name = $input_Name;


    // Prepare an update statement
    $sql = "UPDATE papiri SET Title=?, Surname=?, Name=? WHERE id=?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssi", $param_Title,$param_Surname, $param_Name, $param_id);

        // Set parameters
        $param_Title = $Title;
        $param_Surname = $Surname;
        $param_Name = $Name;
        $param_id = $id;

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            header("location: papers_info.php");
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
        $sql = "SELECT * FROM papiri WHERE id = ?";
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
                    $Title = $row["Title"];
                    $Surname = $row["Surname"];
                    $Name = $row["Name"];

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
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="Title" value="<?php echo $Title; ?>">
                        </div>
                        <label>Surname</label>
                        <input type="text" name="Surname" value="<?php echo $Surname; ?>">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" value="<?php echo $Name; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="papers_info.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>