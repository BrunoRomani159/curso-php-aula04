<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <title>CodeForce - Sistema de Bilheteria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4 text-center">🎫 Sistema de Bilheteria</h2>

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
                <label class="form-label">Quantidade de Bilhetes (máx 10)</label>
                <input type="number" class="form-control" name="quantidade" value="1" min="1" max="1000" required>
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
            $quantidadeDesejada = (int)$_POST['quantidade'];
            $cupom = $_POST['cupomvip'];

            echo "<h4>Resultado da Validação:</h4>";

            // TODO: 2. CRIAR A LÓGICA DE ACESSO (if / else if / else)
            // Regra 1: Se a idade for menor que 18, o acesso é NEGADO (independente do bilhete).
            // Regra 2: Se for maior ou igual a 18 E o bilhete for "vip", exibir ACESSO VIP LIBERADO.
            // Regra 3: Se for maior ou igual a 18 E o bilhete for "pista", exibir ACESSO PISTA LIBERADO.

            // Escreva o seu código abaixo:
          if ($idade <18) {echo 'ACESSO NEGADO';}
          

          else {/* {switch($bilhete) {
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
                break; */
              $nomeSetor = '';

                 switch($bilhete) {

            case 'camarote':
              $nomeSetor = 'Camarote VIP';
              break;


            case 'vip':
              $nomeSetor = 'VIP';
              break;

            case 'pista':
              if ($cupom === 'JUMPERVIP') {
                $nomeSetor = 'pista (UPGRADE VIP)';
              }
                else {
                  $nomeSetor = 'Pista Padrão';
                }
                break;}
          
          echo "<h5>Imprimindo {$quantidadeDesejada} bilhete(s) para: {$nomeSetor}</h5>";
          echo '<ul class="list-group mb-3 shadow-sm">';

          /* $bilheteAtual = 1;

          while ($bilheteAtual <= $quantidadeDesejada) {
            echo "<li class='list-group-item'>";
            echo "🎫 Bilhete #{$bilheteAtual} (cód: " . rand(1000, 9999) . ")";
            echo "</li>";

            $bilheteAtual++;
          }*/

          for ($bilheteAtual = 1; $bilheteAtual <= $quantidadeDesejada; $bilheteAtual++) {

            if ($bilheteAtual > 10) {
              echo "<div class='alert alert-danger mt-2'> ☣ Limite de segurança! Impressão abortada. </div>";
              break;
            }

            if($bilheteAtual == 3) {
              echo "<li class='list-group-item list-group-item-warning'>💥 Bilhete #3 amassado. Pulando...</li>";
              continue;
            }
            echo "<li class = 'list-group=item d-flex justify-content-between aling-items-center'>";
            echo "🎫 Bilhete #{$bilheteAtual} <small class='text-muted'> (cód: " . rand(1000, 9999) . ") </small>";
            echo "<span class = 'badge bg-sucess rounded-pill'> Impresso </span>";
          }
          echo '</ul>';



          if($bilhete === 'vip') {
            echo ",<h5 class='mt-4'> 🎁 KIT VIP Liberado</h5>";

            $brindes = ["Copo Neon","Pulseira de Pano","Vale Drink VIP","Acesso ao backstage"];

            echo "<ul class='list-group mb-3 shadow-sm'>";

          foreach ($brindes as $item) {
            echo "<li class='list-group-item-info'> 🎇 Você ganhou : {$item}</li>";
          }
          echo "</ul>";
          }



          if($cupom === 'JUMPERVIP') {
            echo ",<h5 class='mt-4'> 🎁 KIT VIP Liberado</h5>";

            $brindes = ["Copo Neon","Pulseira de Pano","Vale Drink VIP","Acesso ao backstage"];

            echo "<ul class='list-group mb-3 shadow-sm'>";

          foreach ($brindes as $item) {
            echo "<li class='list-group-item-info'> 🎇 Você ganhou : {$item}</li>";
          }
          echo "</ul>";
          }


          if($bilhete == 'camarote') {
            echo ",<h5 class='mt-4'> 🎁 KIT Camarote VIP Liberado</h5>";

            $brindecamarote = ["Copo Neon","Pulseira de Led","Vale Drink com gelo personalizado","Acesso ao backstage","Oculos com Led"];

            echo "<ul class='list-group mb-3 shadow-sm'>";

          foreach ($brindecamarote as $item) {
            echo "<li class='list-group-item-info'> 🎇 Você ganhou : {$item}</li>";
          }
          echo "</ul>";
          }


          
          echo '<div class="alert alert-success fw-bold"> ✔ Lote gerado com sucesso!</div>';
          }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>