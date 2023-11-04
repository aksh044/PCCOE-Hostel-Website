<?php
session_start();

$mysqli =new mysqli("127.0.0.1:3306", "root", "", "hostel");

if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $adn = "DELETE FROM registration WHERE regNo=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Manage Registered Students</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <script>
        fetch('nav.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-container').innerHTML = data;
            });
    </script>

</head>

<body>
    <div id="navbar-container"></div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title" style="margin-top:4%">Manage Registered Students</h2>
                    <div class="panel panel-default">
                        <table id="zctb" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Student Name</th>
                                    <th>Reg no</th>
                                    <th>Contact no</th>
                                    <th>room no</th>
                                    <th>Staying From</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = "SELECT * FROM registration";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $cnt = 1;
                                while ($row = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td>
                                            <?php echo $row->firstName; ?>
                                            <?php echo $row->middleName; ?>
                                            <?php echo $row->lastName; ?>
                                        </td>
                                        <td><?php echo $row->regno; ?></td>
                                        <td><?php echo $row->contactno; ?></td>
                                        <td><?php echo $row->roomno; ?></td>
                                        <td><?php echo $row->stayfrom; ?></td>
                                        <td>
                                            <a href="manage-students.php?del=<?php echo $row->regno; ?>" title="Delete Record" onclick="return confirm('Do you want to delete?')">
                                            &#10060
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $cnt = $cnt + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
