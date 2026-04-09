<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="formata.css">
</head>
<body>
    <header><h1>Cadastro<h1></header>
    <nav>
    <a href="consulta.php"><button>Consulta</button></a>
    <a href="cadastro.php"><button>Cadastro</button></a>
    <a href="up1.php"><button>Update</button></a>
    <a href="del1.php"><button>Delete</button></a>
    </nav>
    <main>
        <div class="form-card"> 
    <form action="cadastro.php" method="POST">
    <input type="hidden" name="a" value="1">
        <table>
        <tr>
        <td>Nome:</td><td><input type="text" name="nome"></td>
        </tr>
        <tr>
        <td>Formação:</td><td><input type="text" name="forma"></td>
        </tr>
        <tr>
        <td>Turma:</td><td><input type="text" name="tur"></td>
        </tr>
        <tr>
        <td><input type="reset" value="Limpa"></td><td><input type="submit" value="Cadastrar"></td>
        </tr>
        </table>
    </form>

    <?php
        if(isset($_POST["a"])){
            $a = $_POST["a"];
        }
        else{
            $a = null;
        }

        if(isset($_POST["nome"])){
            $nome = $_POST["nome"];
        }
        else{
            $nome = null;
        }

        if(isset($_POST["forma"])){
            $forma = $_POST["forma"];
        }
        else{
            $forma = null;
        }

        if(isset($_POST["tur"])){
            $tur = $_POST["tur"];
        }
        else{
            $tur = null;
        }
        if($a == "1"){
        if($nome != null and $forma != null and $tur != null){
            $host = "localhost";
            $user = "root";
            $password = "";
            $banco = "curso";

            $conn = new mysqli($host, $user, $password, $banco);
            if($conn->connect_errno){
                print("Connect failed: %s\n" . $conn->connect_errno);
                exit();
            }

           $sql = $conn->prepare("INSERT INTO professor (nome, forma, turma) VALUES (?, ?, ?)");
                $sql->bind_param("sss", $nome, $forma, $tur);

            if($sql->execute()){
                echo "<p class='verd'>Cadastro realizado: Nome: $nome | Formação: $forma | Turma: $tur</p>";
                } else {
                     echo "<p class='verm'>Erro: " . $conn->error . "</p>";
                    }
                    $sql->close();
                 }
        else{
            echo"<p class='verm'>Preencha todos os campos!</p>";
        }
        }
    ?>
    </div>
    </main>
    <footer><h1>Carlos Eduardo de Andrade Gonçalves</h1></footer>
</body>
</html>