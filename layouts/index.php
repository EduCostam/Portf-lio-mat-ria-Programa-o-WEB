<?php include(__DIR__ . '/layouts/header.php'); ?>

<div class="container-fluid main-container d-flex align-items-cemter justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="content-wrapper text-center p-5" style="background-color: white; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px;">
        <h1 class="text-center">Descubra seu Signo</h1>
        <p class="subtitle text-muted mb-4">Vamos ver o que seu signo tem a revelar!</p>


        <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
        <div class="form-group">
                    <label for="data_nascimento" class="form-label text-secondary">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4 w-100">Enviar</button>
            </form>

            <footer class="footer mt-5">
                <p class="text-muted">Desenvolvido por: Eduardo Marques Costa </p>
            </footer>
        </div>
    </div>
</body>