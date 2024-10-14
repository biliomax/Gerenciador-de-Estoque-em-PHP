<?php
if(!isset($seguranca)){
    exit;
}
?>

<div class="well conteudo">
    <div class="pull-right">
        <button class="btn btn-xs btn-success" type="button">Cadastrar</button>
    </div>
    <div class="page-header">
        <h1>Listar Usuários</h1>
    </div>

    <?php
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
                while($row_usuario = mysqli_fetch_array($resultado_usuario)){
                   // echo $row_usuario['nome']."<br>";
            ?>
                <tr>
                    <td><?php echo $row_usuario['id']; ?></td>
                    <td><?php echo $row_usuario['nome']; ?></td>
                    <td><?php echo $row_usuario['email']; ?></td>
                    <td><?php echo $row_usuario['nome_nivel_acesso']; ?></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-xs btn-success">Visualizar</button>
                        <button type="button" class="btn btn-xs btn-warning">Editar</button>
                        <button type="button" class="btn btn-xs btn-danger">Apagar</button>
                    </td>
                </tr>
            <?php
                }
            ?>
                
            </tbody>
          </table>
        </div>
    </div>
</div>