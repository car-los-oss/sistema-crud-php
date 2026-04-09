<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="formata.css">
</head>
<body>
    <header><h1>Update<h1></header>
    <nav>
    <a href="consulta.php"><button>Consulta</button></a>
    <a href="cadastro.php"><button>Cadastro</button></a>
    <a href="up1.php"><button>Update</button></a>
    <a href="del1.php"><button>Delete</button></a>
    </nav>
    <main>
    <form action="up1.php" method="POST">
        <table>
        <tr>
        <td>Id:</td><td><input type="text" name="id"></td>
        </tr>
        <tr>
        <td><input type="reset" value="Limpa"></td><td><input type="submit" value="Consultar"></td>
        </tr>
        </table>
    </form>

    <?php
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        else{
            $id = null;
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

        if($id != null){
            $host = "localhost";
            $user = "root";
            $password = "";
            $banco = "curso";

            $conn = new mysqli($host, $user, $password, $banco);
            if($conn->connect_errno){
                print("Connect failed: %s\n" . $conn->connect_errno);
                exit();
            }

           
                $sql = $conn->prepare("UPDATE professor SET nome = ?, forma = ?, turma = ? WHERE id = ?");
                $sql->bind_param("sssi", $nome, $forma, $tur, $id);

                if($sql->execute()){
                    echo "<p class='verd'>Atualizado com sucesso!</p>";
                } else {
                    echo "<p class='verm'>Erro na atualização!</p>";
                }
                $sql->close();
                    
            



      
        }

       
    ?>
    </main>
    <footer><h1>Carlos Eduardo de Andrade Gonçalves</h1></footer>
</body>
</html>