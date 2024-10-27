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
    <?php if ($data['formSent'] && empty($data['errors'])): ?>
        <div class="mt-5">
            <h3 class="text-center">Resultados de Calificaciones por Asignatura</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                    <tr>
                        <th>Asignatura</th>
                        <th>Media</th>
                        <th>Aprobados</th>
                        <th>Suspensos</th>
                        <th>Nota Máxima</th>
                        <th>Nota Mínima</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data[S_POST]['resultado'] as $resultado): ?>
                        <tr>
                            <td><?php echo $resultado['modulo']; ?></td>
                            <td><?php echo $resultado['media']; ?></td>
                            <td><?php echo $resultado['aprobados']; ?></td>
                            <td><?php echo $resultado['suspensos']; ?></td>
                            <td><?php echo $resultado['max']; ?></td>
                            <td><?php echo $resultado['min']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <h3 class="text-center mt-5">Listados de Alumnos</h3>
            <div class="row mt-3">
                <!-- Alumnos que aprobaron todas las asignaturas -->
                <div class="col-12 col-lg-6 mb-3">
                    <div class="alert alert-success">
                        <h5>Alumnos que han aprobado todo</h5>
                        <ul>
                            <?php foreach ($data['alumnosAprobados'] as $alumno): ?>
                                <li><?php echo $alumno; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Alumnos que suspendieron al menos una asignatura -->
                <div class="col-12 col-lg-6 mb-3">
                    <div class="alert alert-warning">
                        <h5>Alumnos que han suspendido al menos una asignatura</h5>
                        <ul>
                            <?php foreach ($data['alumnosSuspensos'] as $alumno): ?>
                                <li><?php echo $alumno; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Alumnos que promocionan -->
                <div class="col-12 col-lg-6 mb-3">
                    <div class="alert alert-info">
                        <h5>Alumnos que promocionan (máximo un suspenso)</h5>
                        <ul>
                            <?php foreach ($data['alumnosPromocionan'] as $alumno): ?>
                                <li><?php echo $alumno; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Alumnos que no promocionan -->
                <div class="col-12 col-lg-6 mb-3">
                    <div class="alert alert-danger">
                        <h5>Alumnos que no promocionan (dos o más suspensos)</h5>
                        <ul>
                            <?php foreach ($data['alumnosNoPromocionan'] as $alumno): ?>
                                <li><?php echo $alumno; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>