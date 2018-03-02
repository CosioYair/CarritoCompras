
   <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Inicio</li>
            </ol>

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="">
                    <center><h1>Bienvenido: <?php echo $this->session->userdata('user')->nombre_completo; ?></h1></center>
                </div>                    
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->