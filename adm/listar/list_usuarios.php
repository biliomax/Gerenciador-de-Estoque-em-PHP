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
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        /* Verifica o botão */
        $botao_editar = caregar_botao('editar/edit_usuarios', $conn);
        $botao_ver = caregar_botao('visualizar/ver_usuarios', $conn);
        $botao_apagar = caregar_botao('processa/proc_apagar_usuarios', $conn);

        /*Selecionar no banco de dados os usuários */
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual  : 1;

        // Setar a quantidade de itens por pagina
        $qnt_result_pg = 5;

        // Calcular o inincio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_usuario = "SELECT user.id, user.nome, user.email, user.niveis_acesso_id, niv.nome_nivel_acesso
        FROM usuarios user
        INNER JOIN niveis_acessos niv ON niv.id=user.niveis_acesso_id LIMIT $inicio, $qnt_result_pg";

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
          <?php
            // Paginação - Somar a quantidade de usuários
            $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);

            // Quantidade de pagina
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

            // Limitar de link antes depois
            $MaxLinks = 2;
            
            echo "<nav class='text-center'>";
            echo "<ul class='pagination'>";
            echo "
            <li>
                <a href='".pg."/listar/list_usuarios?pagina=1' aria-label='Previous'>
                    <span aria-hidden='true'>Primeira</span>
                </a>
            </li>";
            for ($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++) {
                if ($iPag >= 1) {
                    echo "<li><a href='".pg."/listar/list_usuarios?pagina=$iPag'>$iPag </a></li>";
                }
            }
            echo "
            <li class='page-item active'>
                <a href='#'>$pagina
                    <span class='sr-only'></span>
                </a>
            </li>";

            for ($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++) {
                if ($dPag <= $quantidade_pg) {
                    echo "<li><a href='".pg."/listar/list_usuarios?pagina=$dPag'>$dPag </a></li>";
                }
            }
            echo"
            <li>
                <a href='".pg."/listar/list_usuarios?pagina=$quantidade_pg' aria-label='Previous'>
                    <span aria-hidden='true'>Última</span>
                </a>
            </li>";
          ?>
        </div>
    </div>
</div>