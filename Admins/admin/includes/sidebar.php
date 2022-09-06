<?php
    $sql = "select fname, lname from admin where adminid = $adminid";

    $res = $conn->query ($sql);

    $row = $res->fetch_assoc ();
?>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                           
                           <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapscat" aria-expanded="true" aria-controls="collapscat">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapscat" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Category.php">View All categories</a>
                                    <a class="nav-link" href="AddCategory.php">Add a category</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapspost" aria-expanded="true" aria-controls="collapspost">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapspost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Post.php">View All posts</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseu" aria-expanded="true" aria-controls="collapseu">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                User Information
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="User.php">View All Users</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reports
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Report.php">View All Reports</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Mail
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePage" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Mail.php">View All Mails</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <div><?php echo $row['fname'] . ' ' . $row['lname']; ?></div>
                    </div>
                </nav>
 </div>