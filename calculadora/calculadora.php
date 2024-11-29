<?php
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero1 = $_POST['numero1'] ?? 0;
    $numero2 = $_POST['numero2'] ?? 0;
    $operacion = $_POST['operacion'] ?? '';

    if (is_numeric($numero1) && is_numeric($numero2)) {
        switch ($operacion) {
            case 'sumar':
                $resultado = $numero1 + $numero2;
                break;
            case 'restar':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicar':
                $resultado = $numero1 * $numero2;
                break;
            case 'dividir':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Error: División por cero";
                }
                break;
            default:
                $resultado = "Operación no válida.";
        }
    } else {
        $resultado = "Por favor, ingrese números válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #00c6ff, #0072ff);
            color: #ffffff;
        }
        .card {
            background: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            font-size: 1.2rem;
            border-radius: 50px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="text-center text-primary mb-4">Calculadora</h2>
                        <form action="calculadora.php" method="POST">
                            <div class="mb-3">
                                <label for="numero1" class="form-label">Número 1</label>
                                <input type="number" name="numero1" id="numero1" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="numero2" class="form-label">Número 2</label>
                                <input type="number" name="numero2" id="numero2" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Seleccione una operación:</label>
                                <div class="d-flex justify-content-around">
                                    <button type="submit" name="operacion" value="sumar" class="btn btn-primary btn-custom">+</button>
                                    <button type="submit" name="operacion" value="restar" class="btn btn-warning btn-custom">-</button>
                                    <button type="submit" name="operacion" value="multiplicar" class="btn btn-success btn-custom">×</button>
                                    <button type="submit" name="operacion" value="dividir" class="btn btn-danger btn-custom">÷</button>
                                </div>
                            </div>
                        </form>
                        <?php if ($resultado !== null): ?>
                            <div class="alert alert-info text-center">
                                <h4>Resultado:</h4>
                                <p><?php echo htmlspecialchars($resultado); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
