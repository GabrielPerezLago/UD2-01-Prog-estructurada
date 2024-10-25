<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo']; ?></h6>
            </div>
            <div class="card-body">
                <form action="./?sec=formulario" method="post">
                    <div class="mb-3">
                        <label for="jsonInput">Notas en formato JSON</label>
                        <textarea class="form-control" id="jsonInput" name="jsonInput" rows="5"><?php echo isset($data[S_POST]['json']) ? htmlspecialchars($data[S_POST]['json']) : ''; ?></textarea>
                        <?php if ($data['formSent'] && isset($data['mensaje'])): ?>
                            <p class="text-danger"><?php echo $data['mensaje']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="submit" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>