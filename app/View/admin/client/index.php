
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cliente
            <small>Lista de Clientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-user"></i> Cliente</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="/admin/client/create" class="btn btn-success btn-flat"><i class="fa fa-plus-square"></i> Novo</a>
                        <a href="/admin/client/report" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-file-pdf-o"></i> Relatório</a>
                    </div>
                    <div class="box-body">
                        <!-- List -->
                        <table id="table" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">Cod.</th>
                                    <th>Nome</th>
                                    <th width="20%">Contato</th>
                                    <th width="20%">E-mail</th>
                                    <th width="10%">Aniversário</th>
                                    <th width="5%">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($clients)): ?>
                            <?php foreach ($clients as $key): ?>
                                <tr>
                                    <td class="text-center"><?= str_pad($key['idClient'], 5, 0, STR_PAD_LEFT)?></td>
                                    <td><?= $key['desName'] ?></td>
                                    <td><?= (!empty($key['desPhone'])) ? $key['desPhone'] . " / " : null  . (!empty($key['desMobile'])) ? $key['desMobile'] : null ?></td>
                                    <td><?= $key['desEmail'] ?></td>
                                    <td><?= $key['dtBirthday'] ?></td>
                                    <td class="text-center">
                                        <a href="/admin/client/update/<?= $key['idClient'] ?>" class="btn btn-xs btn-primary btn-flat" style="width: 25px;" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                        <a href="/admin/client/delete/<?= $key['idClient'] ?>" onclick="return confirm('Deseja excluir este registro?')" class="btn btn-xs btn-danger btn-flat" style="width: 25px;" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
