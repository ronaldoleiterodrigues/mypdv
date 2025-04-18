<?php require_once __DIR__ . "/../shared/header.php"; ?>
<div class="box-12 mg-t-12">
    <div class="box-8">
        <h2 class=" poppins-medium fw-300 fonte22">
            <i class="fa-solid fa-user mg-r-1 fonte22 fnc-secundario"></i> Lista de Usuario
        </h2>
    </div>
    <div class="box-4 flex justify-end item-centro">
        <a href="/cadastrar-usuario" class=" bg-primario fnc-secundario pd-10 radius fw-600">Novo Usuario</a>
    </div>
</div>

<div class="box-12 divider mg-t-1 mg-b-2"></div>

<div class="box-12">
<table class="zebra wd-100 collapse" id="tabela">
    <thead>
        <tr>
            <th class="fonte12 espaco-letra fw-bold">Data Cadastro</th>
            <th class="fonte12 espaco-letra fw-bold">Nome</th>
            <th class="fonte12 espaco-letra fw-bold">Email</th>
            <th class="fonte12 espaco-letra fw-bold">Perfil</th>
            <th class="fonte12 espaco-letra fw-bold">Status</th>
            <th class="fonte12 espaco-letra fw-bold">Açoes</th>
        </tr>
    </thead>
    <tbody>

        <?php
        #var_dump($proprietario);
        if (isset($usuarios) && count($usuarios) > 0):
            foreach ($usuarios as  $usuario):
                $dataCadastro = $usuario->DATACADASTRO ?: date('0000-00-00');
        ?>
                <tr class=" zebra">
                    <td class="espaco-letra fw-300 txt-c"><?= $formater->formatarDataTime($dataCadastro); ?></td>
                    <td class="espaco-letra fw-300 txt-c"><?= $formater->formataTextoCap($usuario->NOME); ?></td>
                    <td class="espaco-letra fw-300 txt-c"> <?= $formater->formataTextoLow($usuario->EMAIL); ?></td>
                    <td class="espaco-letra fw-300 txt-c"><?php if ($usuario->PERFIL == '1'): echo 'Administrador';
                                                                    else: echo 'Usuário';
                                                                    endif; ?></td>
                    <td class=" txt-c">
                        <?php if ($usuario->ATIVO == '1'): ?>
                            <span class="ativo" data-id="<?= $usuario->ID; ?>" data-status="0" data-url="/alterar-status">
                                <i class="fa-solid fa-lock-open fonte16 fnc-sucesso"></i>
                            </span>
                        <?php else: ?>
                            <span class="ativo" data-id="<?= $usuario->ID; ?>" data-status="1" data-url="/alterar-status">
                                <i class="fa-solid fa-lock fonte16 fnc-error"></i>
                            </span>

                        <?php endif; ?>
                    </td>
                    <td class="flex justify-center item-centro">
                        <a href="/deletar-usuario/<?= $usuario->ID; ?>">
                            <i class="fa-solid fa-trash-can fonte12 mg-r-2 fnc-cinza"></i>
                        </a>
                        <a href="/editar-usuario/<?= $usuario->ID; ?>">
                            <i class="fa-solid fa-pen fonte12 fnc-vermelho-claro "></i>
                        </a>

                    </td>
                </tr>
            <?php endforeach;
        else: ?>
           <td colspan="7" class="pd-t-2"> 
           <h1 class="txt-c fonte16 poppins-medium"> Nenhum registro na base de dados </h1>
           </td>
        <?php endif; ?>


    </tbody>
    <tfoot>

    </tfoot>
</table>   
    
</div>
