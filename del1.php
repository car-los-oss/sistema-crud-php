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
    <form action="del1.php" method="POST">
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

           
                $sql = $conn->prepare("SELECT id, nome, forma, turma FROM professor WHERE id = ?");
                $sql->bind_param("i", $id);
                $sql->execute();
                $result = $sql->get_result();
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $nome = $row['nome'];
                            $forma = $row['forma'];
                            $turma = $row['turma'];
                            
                            echo"
<div class='result-card danger'>
    <div class='result-badge danger'>#$id</div>
    <div class='result-info'>
        <span class='result-label'>Nome</span>
        <span class='result-value'>$nome</span>
    </div>
    <div class='result-info'>
        <span class='result-label'>Formação</span>
        <span class='result-value'>$forma</span>
    </div>
    <div class='result-info'>
        <span class='result-label'>Turma</span>
        <span class='result-value'>$turma</span>
    </div>
    <form action='del2.php' method='POST'>
        <input type='hidden' name='id' value='$id'>
        <p class='result-warn'>Deseja realmente excluir este registro?</p>
        <input type='submit' value='Confirmar exclusão'>
    </form>
</div>";

                        }
                    }
                    else{
                        echo"<p class='verm'> Nada encontrado!!!</p>";
                    }

            



      
        }

       
    ?>
    </main>
    <footer><h1>Sistemas WEB - Carlos Eduardo</h1></footer>
</body>
</html>