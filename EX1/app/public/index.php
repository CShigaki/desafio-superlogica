<?php
require_once dirname(__DIR__) . '/../vendor/autoload.php';

use Superlogica\SignUpController;
use Superlogica\Helpers;

?>
<html>
    <head>
      <title>Teste Superlogica</title>
      <link rel="stylesheet" href="./styles/base.css">
    </head>

    <?php
    $errors = [];
    $id = '';

    if (isset($_POST['submit'])) {
        $validator = new SignUpController();
        unset($_POST['submit']);

        $signUpResponse = $validator->signUp($_POST);

        if (isset($signUpResponse['id'])) {
            $id = $signUpResponse['id'];
        } else {
            $errors = $signUpResponse;
        }
    }
    ?>

    <body>
      <form method="post">
        <div class="inputs-container">
            <div class="input-wrapper">
              <label for="name">Nome completo*</label>
              <input required type="text" id="name" name="name" value="<? echo $_POST['name'] ?>" />
              <?
                if ($errors['name']) {
                    echo "<p class='input-error'>{$errors['name']}</p>";
                }
              ?>
            </div>
            <div class="input-wrapper">
              <label for="login">Nome de login*</label>
              <input required type="text" id="login" name="login" value="<? echo $_POST['login'] ?>" />
              <?
                if ($errors['login']) {
                    echo "<p class='input-error'>{$errors['login']}</p>";
                }
              ?>
            </div>
            <div class="input-wrapper">
              <label for="zip_code">CEP*</label>
              <input required type="text" id="zip_code" name="zip_code" value="<? echo $_POST['zip_code'] ?>"/>
              <?
                if ($errors['zip_code']) {
                    echo "<p class='input-error'>{$errors['zip_code']}</p>";
                }
              ?>
            </div>
            <div class="input-wrapper">
              <label for="email">Email*</label>
              <input required type="email" id="email" name="email" value="<? echo $_POST['email'] ?>" />
              <?
                if ($errors['email']) {
                    echo "<p class='input-error'>{$errors['email']}</p>";
                }
              ?>
            </div>
            <div class="input-wrapper">
              <label for="password">Senha*</label>
              <input required type="password" id="password" name="password" value="<? echo $_POST['password'] ?>" />
              <?
                if ($errors['password']) {
                    echo "<p class='input-error'>{$errors['password']}</p>";
                }
              ?>
            </div>
            <input type="submit" name="submit" value="Cadastrar">
            <?php
                if ($errors['general']) {
                    echo "<p class='input-error'>{$errors['general']}</p>";
                }

                if ($id) {
                    echo "<p>Cadastro feito com sucesso. Id {$id}</p>";
                }
            ?>
        </div>
      </form>
    </body>
</html>