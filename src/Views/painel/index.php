<?php require_once __DIR__ . "/../shared/header.php"; ?>
<div class="body">
    <!-- Menu lateral -->
    <aside id="sidebar">

        <div class="toggle" onclick="toggleSidebar()">
            <i id="toggleIcon" class="fas fa-chevron-left"></i>
        </div>

        <h2 id="panelTitle">Painel Controle</h2>
        <nav>
            <a href="/painel-controle">
                <i class="fas fa-home"></i>
                <span>Início</span>
            </a>
            <a href="#">
                <i class="fas fa-receipt"></i>
                <span>Vendas</span>
            </a>
            <a href="#">
                <i class="fas fa-box"></i>
                <span>Produtos</span>
            </a>
            <a href="#">
                <i class="fas fa-users"></i>
                <span>Clientes</span>
            </a>

            <a href="/listar-usuario">
                <i class="fas fa-user"></i>
                <span>Usuarios</span>
            </a>

            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Configurações</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>

        </nav>
    </aside>

    <!-- Conteúdo principal -->
    <main>
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


