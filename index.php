<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <title>CodeForce - Controlo de Acesso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4 text-center">🎫 Sistema de Controlo de Acesso</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <form method="POST" action="index.php">
              <div class="mb-3">
                <label class="form-label">Qual a sua idade?</label>
                <input type="number" class="form-control" name="idadeUsuario" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tipo de Bilhete</label>
                <select class="form-select" name="tipoBilhete">
                  <option value="pista">Pista Padrão</option>
                  <option value="vip">VIP</option>
                  <option value="camarote">Camarote VIP+</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Cupom vip</label>
                <input type="text" class="form-control" name="cupomvip">
              </div>
              <button type="submit" class="btn btn-dark w-100">Validar Entrada</button>
            </form>
          </div>
        </div>

        <div class="mt-4">
          <?php
          // =========================================================================
          // ÁREA DE PROGRAMAÇÃO PHP - LÓGICA BOOLEANA
          // =========================================================================

          // Verificamos se o formulário foi submetido para evitar erros no ecrã inicial
          if (isset($_POST['idadeUsuario']) && isset($_POST['tipoBilhete']) && isset($_POST['cupomvip'])) {

            // 1. RECOLHA DE DADOS (O "Input" do utilizador)
            $idade = $_POST['idadeUsuario'];
            $bilhete = $_POST['tipoBilhete'];
            $cupom = $_POST['cupomvip'];

            echo "<h4>Resultado da Validação:</h4>";

            // TODO: 2. CRIAR A LÓGICA DE ACESSO (if / else if / else)
            // Regra 1: Se a idade for menor que 18, o acesso é NEGADO (independente do bilhete).
            // Regra 2: Se for maior ou igual a 18 E o bilhete for "vip", exibir ACESSO VIP LIBERADO.
            // Regra 3: Se for maior ou igual a 18 E o bilhete for "pista", exibir ACESSO PISTA LIBERADO.

            // Escreva o seu código abaixo:
          if ($idade <18) {echo 'ACESSO NEGADO';}
          /*else if (($idade >= 18) && ($bilhete == 'vip' || $cupom == 'bomfidjfbnf')) {echo 'ACESSO VIP AUTORIZADO';}
          else { echo 'ACESSO PISTA LIBERADO';}*/
          else {switch($bilhete) {
            case 'camarote':
              echo "Acesso Camarote Liberado";
              break;

            case 'vip':
              echo "Acesso VIP Liberado";
              break;

            case 'pista':
              if ($cupom == 'bomfidjfbnf') {echo "Acesso VIP Liberado";}
                else if ($cupom !=='vip') {echo "cupom invalido";}
                else {echo "Pista Liberada";}
                break;

            default: echo "BilheteInvalido";
              break;}
          } 

          }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>