<?php 
    include ('includes/header.php');

    $res = $conn->query ("select COUNT(*) as list from post");
    $row = $res->fetch_assoc ();

    $post = $row['list'];

    $res = $conn->query ("select COUNT(*) as list from users where activated=0");
    $row = $res->fetch_assoc ();

    $unverified = $row['list'];

    $res = $conn->query ("select COUNT(*) as list from users where activated=1");
    $row = $res->fetch_assoc ();

    $verified = $row['list'];

    $res = $conn->query ("select COUNT(*) as list from report");
    $row = $res->fetch_assoc ();

    $report = $row['list'];
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Draft Admin - Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-header">
                                        <h5>Post</h5>
                                    </div>
                                    <div class="card-body fix-height-dash">
                                        <p>There are total <?php echo $post; ?> posts.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-header">
                                        <h5>Unverified Users</h5>
                                    </div>
                                    <div class="card-body fix-height-dash">
                                        <p>There are total <?php echo $unverified; ?> unverified users.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-header">
                                        <h5>Verified Users</h5>
                                    </div>
                                    <div class="card-body fix-height-dash">
                                        <p>There are total <?php echo $verified; ?> verified users.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-header">
                                        <h5>Reports</h5>
                                    </div>
                                    <div class="card-body fix-height-dash">
                                        <p>There are total <?php echo $report; ?> reports.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

</div>



<?php 
include ('includes/footer.php');
?>
<?php 
include ('includes/script.php');
?>
