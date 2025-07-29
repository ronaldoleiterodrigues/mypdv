<?php require_once "../src/Views/shared/header.php";
?>
<div class="body">
    <aside id="sidebar">

        <div class="toggle" onclick="toggleSidebar()">
            <i id="toggleIcon" class="fas fa-chevron-left"></i>
        </div>


        <nav class="">
        <div class="box-12">
            <h3 class="fonte12 espaco-letra fnc-laranja mg-b-3">Ola, <?= $_SESSION['nome'] ?>. Seja bem vindo! </h3>
        </div>    
        
            <a href="/painel-controle">
                <i class="fas fa-home fonte14"></i>
                <span>Início</span>
            </a>
            <a href="/listar-categorias">
                <i class="fas fa-receipt fonte14"></i>
                <span>Categorias</span>
            </a>
            <a href="/listar-produtos">
                <i class="fas fa-box fonte14"></i>
                <span>Produtos</span>
            </a>
            <a href="/listar-clientes">
                <i class="fas fa-users fonte14"></i>
                <span>Clientes</span>
            </a>

            <a href="/listar-usuarios">
                <i class="fas fa-user fonte14"></i>
                <span>Usuarios</span>
            </a>

            <a href="/listar-configuracoes">
                <i class="fas fa-cog fonte14"></i>
                <span>Configurações</span>
            </a>

            <a href="/logout">
                <i class="fa-solid fa-right-from-bracket fonte14"></i>
                <span>Logout</span>
            </a>

        </nav>
    </aside>

    <!-- Conteúdo principal -->
    <main>
        <h2 id="panelTitle" class=" fonte32 mg-b-4">Painel Controle</h2>

        <?= $content ?? ''; ?>

    </main>
    <script>
        let table = new DataTable('#tabela');

        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const icon = document.getElementById("toggleIcon");

            sidebar.classList.toggle("collapsed");

            if (sidebar.classList.contains("collapsed")) {
                icon.classList.remove("fa-chevron-left");
                icon.classList.add("fa-chevron-right");
            } else {
                icon.classList.remove("fa-chevron-right");
                icon.classList.add("fa-chevron-left");
            }
        }
    </script>
</div>