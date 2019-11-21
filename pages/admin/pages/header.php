            <link href="../css/bootstrap.min.css" rel="stylesheet">
        <?php
        $namaadmin = $_SESSION['username'];
        $login = mysqli_query($koneksi,"select dataadmin.Nama from dataadmin where username='$namaadmin'");
        $data = mysqli_fetch_assoc($login);
        $nama = $data['Nama'];
        ?>

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Admin Bengkel</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $nama ; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Tambahkan Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="tambah-data-jenis-montor.php">Data Jenis Montor</a>
                                    </li>
                                    <li>
                                        <a href="data-model.php">Data Model Montor</a>
                                    </li>
                                </ul>

                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="listbooking.php"><i class="fa fa-table fa-fw"></i> List Booking</a>
                            </li>
                            <li>
                                <a href="datakaryawan.php"><i class="fa fa-edit fa-fw"></i> Data Karyawan</a>
                            </li>
                            <li>
                                <a href="kontak-kami.php"><i class="fa fa-wrench fa-fw"></i> Kontak Kami</a>

                            </li>
                            <li>
                                <a href="lapaoranbulanan.php"><i class="fa fa-sitemap fa-fw"></i> Laporan</a>
                            </li>
                            <li>
                                <a href="artikel.php"><i class="fa fa-sitemap fa-fw"></i> Artikel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>