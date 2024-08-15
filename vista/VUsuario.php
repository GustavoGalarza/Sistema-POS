<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios Registrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Login</th>
                                <th>Perfil</th>
                                <th>Estado</th>
                                <th>Ultimo acceso</th>
                                <th>Fecha de Registro</th>
                                <td>
                        <button class="btn btn-primary">Nuevo User</button>
                    </td>
                            </tr>
                        </thead>
                       <tbody>
                    <?php
                    $usuario=ControladorUsuario::crtInfoUsuarios();
                    foreach($usuario as $value){
                    ?>
                    <tr>
                    <td><?php echo $value["id_usuario"]; ?></td>
                    <td><?php echo $value["login_usuario"]; ?></td>
                    <td><?php echo $value["perfil"]; ?></td>
                    <td><?php echo $value["estado"]; ?></td>
                    <td><?php echo $value["ultimo_login"]; ?></td>
                    <td><?php echo $value["fecha_registro"]; ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                    </tr>
                    <?php
                    
                    }
                    ?>
                       </tbody>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->