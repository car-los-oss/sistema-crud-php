<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="formata.css">
</head>
<body>
    <header><h1>Delete<h1></header>
    <nav>
    <a href="consulta.php"><button>Consulta</button></a>
    <a href="cadastro.php"><button>Cadastro</button></a>
    <a href="up1.php"><button>Update</button></a>
    <a href="del1.php"><button>Delete</button></a>
    </nav>
    <main>


    <?php
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        else{
            $id = null;
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

           
                $sql = $conn->prepare("DELETE FROM professor WHERE id = ?");
                $sql->bind_param("i", $id);
                if($sql->execute()){
                    echo "<p class='verd'>Excluído com sucesso!</p>";
                } else {
                    echo "<p class='verm'>Erro na exclusão!</p>";
                }

                $sql->close();

            



      
        }

       
    ?>
    </main>
    <footer><h1>Carlos Eduardo de Andrade Gonçalves</h1></footer>
</body>
</html>