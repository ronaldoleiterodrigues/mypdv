<?php require_once "../src/Views/venda/index.php"; ?>
<div class="modal">
    <div class="lista-produto-modal bg-branco  animate__animated animate__flipInX flex justify-center flex-wrap">
        <h2 class="box-12 poppins-medium fw-300 fonte22 ">
            <i class="fa-solid fa-tags mg-r-1 fonte22 fnc-preto-azulado"></i> Finalizar venda
        </h2>

        <form action="/finalizar-venda" method="POST" class="box-4" id="formFinalizarVenda">
            <label for="">Escolha um Cliente</label>

            <select name="cliente" id="">
                <?php
                if (isset($clientes) && count($clientes) > 0):
                    foreach ($clientes as $cliente):
                ?>
                        <option value="<?= $cliente->ID; ?>"> <?= $cliente->NOME; ?></option>
                <?php
                    endforeach;
                endif;
                ?>

            </select>

            <label for="">Escolha a forma de pagamento</label>

            <select name="formapagamento" id="">
                <?php
                if (isset($formapagamento) && count($formapagamento) > 0):
                    foreach ($formapagamento as $fp):
                ?>
                        <option value="<?= $fp->ID; ?>"> <?= $fp->DESCRICAO; ?></option>
                <?php
                    endforeach;
                endif;
                ?>

            </select> 
            
            <button type="submit" class="btn bg-primario fnc-terciario sem-borda">Finalizar venda 
                <span class="fnc-laranja-claro fw-500 mg-l-1 fonte12">(ENTER)</span>
            </button>

        </form>

    </div>
</div>