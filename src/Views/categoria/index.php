<div class="box-12 mg-t-2">
    <h2 class=" poppins-medium fw-300 fonte22">
        <i class="fa-solid fa-tags mg-r-1 fonte22  fnc-preto-azulado"></i>
        <?php
        $titulo = isset($id) && $id <> '' ?  'Atualizar Categoria ' : 'Cadastrar Categoria';
        echo $titulo;
        ?>
    </h2>
</div>

<div class="box-12 divider mg-t-1 mg-b-2"></div>

<div class="box-12">
    <form action="/cadastrar-categoria" method="POST">
        <div>
            <input type="hidden" name="id" value="<?php if (isset($id) && $id <> ''): echo $categoria[0]->ID;
                                                    endif; ?>">
        </div>
        <div class="box-12"><label for="">Nova Categoria</label></div>
        <div class="box-6"> <input type="text" name="descricao" value="<?php if (isset($id) && $id <> ''): echo $categoria[0]->DESCRICAO;
                                                                        endif; ?>"></div>

        <div class="box-12">
            <input type="submit" value="cadastrar" class="captalize btn-100 bg-primario fnc-terciario">
        </div>
    </form>
</div>