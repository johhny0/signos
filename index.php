<?php include('./src/layouts/header.php'); ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white py-3">
                        <h1 class="h4 text-center mb-0">AstroSignos - Sabedoria Ocidental e Oriental</h1>
                    </div>
                    <div class="card-body">
                        <form id="formSigno" method="POST" action="MostrarSigno.php">
                            <div class="mb-3">
                                <label for="dataNascimento" class="form-label">Selecione sua data de nascimento:</label>
                                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                                <div class="invalid-feedback">Por favor, selecione uma data válida.</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Descobrir Signo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

  <!-- Bootstrap JS + Popper -->
<?php include('./src/layouts/footer.php'); ?>

    
