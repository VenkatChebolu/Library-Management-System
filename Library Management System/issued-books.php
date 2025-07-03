<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

if(strlen($_SESSION['login'])==0) {   
    header('location:index.php');
    exit();
} 

// Use the correct session variable based on your login system
$sid = isset($_SESSION['stdid']) ? $_SESSION['stdid'] : $_SESSION['login'];

// Debug output (comment or remove these lines after testing)
echo "<!-- Debug Info:";
echo "\nSession Data: "; print_r($_SESSION);
echo "\nStudent ID Being Used: $sid";
echo "\n-->";

$sql = "SELECT b.BookName, b.ISBNNumber, i.IssuesDate, i.ReturnDate, i.fine 
        FROM tblissuedbookdetails i
        JOIN tblbooks b ON b.id = i.BookId
        WHERE i.StudentId = :sid 
        ORDER BY i.IssuesDate DESC";

$query = $dbh->prepare($sql);
$query->bindParam(':sid', $sid, PDO::PARAM_STR);

if(!$query->execute()) {
    $error = $query->errorInfo();
    echo "<!-- Query Error: " . print_r($error, true) . " -->";
}

$results = $query->fetchAll(PDO::FETCH_OBJ);
$bookCount = $query->rowCount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Manage Issued Books</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Issued Books (<?php echo $bookCount; ?> books)
                        </div>
                        <div class="panel-body">
                            <?php if(isset($_SESSION['msg'])): ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN</th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine in(USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($bookCount > 0): ?>
                                            <?php $cnt = 1; ?>
                                            <?php foreach($results as $result): ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo $cnt; ?></td>
                                                    <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                                    <td class="center"><?php echo htmlentities($result->ISBNNumber); ?></td>
                                                    <td class="center"><?php echo htmlentities($result->IssuesDate); ?></td>
                                                    <td class="center">
                                                        <?php if(empty($result->ReturnDate)): ?>
                                                            <span style="color:red">Not Returned Yet</span>
                                                        <?php else: ?>
                                                            <?php echo htmlentities($result->ReturnDate); ?>
                                                        <?php endif; ?>
                                                    </td>
<td class="center">
    <?php 
    // Handle NULL fine values gracefully
    if ($result->fine === null) {
        echo '0.00';
    } else {
        echo htmlentities($result->fine);
    }
    ?>
</td>                                                </tr>
                                                <?php $cnt++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No books have been issued to you</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>