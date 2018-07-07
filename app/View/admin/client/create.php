
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cliente
            <small>Cadastro de Cliente</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/client"><i class="fa fa-user"></i> Cliente</a></li>
            <li class="active"><i class="fa fa-plus-square"></i> Novo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus-square"></i> Novo Cliente</h3>
                    </div>
                    <!-- Form -->
                    <form action="/admin/client/create" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome:</label>
                                        <input type="text" name="desName" class="form-control" minlength="8" maxlength="100" placeholder="Nome Completo" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>CEP:</label>
                                        <input type="tel" name="desZip" id="desZip" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rua:</label>
                                        <input type="text" name="desStreet" id="desStreet" class="form-control" placeholder="Rua" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Número:</label>
                                        <input type="number" name="desNumber" class="form-control" placeholder="Nº">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Complemento:</label>
                                        <input type="text" name="desComplement" class="form-control" placeholder="Complemento">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Bairro:</label>
                                        <input type="text" name="desNeighborhood" id="desNeighborhood" class="form-control" placeholder="Bairro" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Cidade:</label>
                                        <input type="text" name="desCity" id="desCity" class="form-control" placeholder="Cidade" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Estado:</label>
                                        <input type="text" name="desState" id="desState" class="form-control" placeholder="UF" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telefone:</label>
                                        <input type="tel" name="desPhone" id="desPhone" class="form-control phone" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Celular:</label>
                                        <input type="tel" name="desMobile" id="desMobile" class="form-control phone" placeholder="Celular" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>E-mail:</label>
                                        <input type="email" name="desEmail" class="form-control" placeholder="E-mail" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Aniversário:</label>
                                        <input type="date" name="dtBirthday" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success btn-flat">Cadastrar</button>
                            <button type="button" class="btn btn-warning btn-flat" onclick="javascript: location.href='/admin/client'">Cancelar</button>
                        </div>
                    </form>
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
