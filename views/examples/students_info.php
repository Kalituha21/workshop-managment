<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row text-white">

                <?php
                // Include config file
                require_once "db_upd_del.php";

                // Attempt select query execution
                $sql = "SELECT * FROM studenti";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>Edit</th>";
                        echo "<th>Surname <a class='show'><span class='fa fa-eye'></span><a class='hide'><span class='fa fa-eye'></span> </th>";
                        echo "<th>Name <a class='show'><span class='fa fa-eye'></span><a class='hide'><span class='fa fa-eye'></span> </th>";
                        echo "<th>Student <a class='show'><span class='fa fa-eye'></span><a class='hide'><span class='fa fa-eye'></span> </th>";
                        echo "<th>Email <a class='show'><span class='fa fa-eye'></span><a class='hide'><span class='fa fa-eye'></span> </th>";
                        echo "<th>Paper #1</th>";
                        echo "<th>Paper #2</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>";
                            //echo '<form method="POST" action="update.php" id="sample_form">';
                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record"  data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Student'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['Paper1'] . "</td>";
                            echo "<td>" . $row['Paper2'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close connection
                mysqli_close($link);
                ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.show').hide();
            $('.hide').on('click',function(){
                $('tr').find('td:eq('+$(this).closest('th').index()+')').css('visibility','hidden');
                $(this).closest('th').find('.show').show();
                $(this).hide();
            });
            $('.show').on('click',function(){
                $('tr').find('td:eq('+$(this).closest('th').index()+')').css('visibility','visible');
                $(this).closest('th').find('.hide').show();
                $(this).hide();
            });
        });
    </script>
</body>
</html>