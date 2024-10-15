<?php

if (!isset($seguranca) ) { 
    exit; 
} 
?>

<div class="well conteudo">

<?php 

$botao_cad = caregar_botao('cadastrar/cad_usuarios', $conn);

if ($botao_cad) { ?>
    <div class="pull-right">
        <a href="<?php echo pg.'/cadastrar/cad_usuarios' ?>">
            <button class="btn btn-xs btn-success" type="button">Cadastrar</button>
        </a>
    </div>
<?php } ?>
    <div class="page-header">
        <h1>Listar Usuários</h1>
    </div>

    <?php
        /* Verifica o botão */
        $botao_editar = caregar_botao('editar/edit_usuarios', $conn);
        $botao_ver = caregar_botao('visualizar/ver_usuarios', $conn);
        $botao_apagar = caregar_botao('processa/proc_apagar_usuarios', $conn);

        $result_usuario = "SELECT user.id, user.nome, user.email, user.niveis_acesso_id, niv.nome_nivel_acesso
        FROM usuarios user
        INNER JOIN niveis_acessos niv ON niv.id=user.niveis_acesso_id";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
    ?>

    <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Nível de Acesso</th>
                <th class="text-right">Ações</th>
              </tr>
            </thead>
            <tbody>
            <?php
while($row_usuario = mysqli_fetch_array($resultado_usuario) ) { ?>

<tr>
    <td><?php echo $row_usuario['id']; ?></td>
    <td><?php echo $row_usuario['nome']; ?></td>
    <td><?php echo $row_usuario['email']; ?></td>
    <td><?php echo $row_usuario['nome_nivel_acesso']; ?></td>
<td class="text-right">
    
<?php 
    if ($botao_ver) { ?>
        <a href="<?php echo pg ?>/visualizar/ver_usuarios">
        <button type="button" class="btn btn-xs btn-success">Visualizar</button>
        </a>
    <?php }
    if ($botao_editar) { ?>
        <a href="<?php echo pg ?>/editar/edit_usuarios">
            <button type="button" class="btn btn-xs btn-warning">Editar</button>
        </a>
    <?php } 
        if ($botao_apagar) { ?>
            <a href="<?php echo pg ?>/processa/proc_apagar_usuarios">
            <button type="button" class="btn btn-xs btn-danger">Apagar</button>
            </a>
        <?php } ?>
</td>
</tr>
<?php } ?>
                
            </tbody>
          </table>
        </div>
    </div>
</div>