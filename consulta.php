<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="formata.css">
</head>
<body>
    <header><h1>Consulta</h1></header>
    <nav>
        <a href="consulta.php"><button>Consulta</button></a>
        <a href="cadastro.php"><button>Cadastro</button></a>
        <a href="up1.php"><button>Update</button></a>
        <a href="del1.php"><button>Delete</button></a>
    </nav>
    <main>
        <div class="form-card">
            <h2>Consultar professor</h2>
            <p class="sub">Preencha um dos campos para buscar.</p>
            <form action="consulta.php" method="POST">
                <input type="hidden" name="a" value="1">
                <table>
                    <tr>
                        <td>Id:</td><td><input type="text" name="id"></td>
                    </tr>
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
                        <td><input type="reset" value="Limpar"></td>
                        <td><input type="submit" value="Consultar"></td>
                    </tr>
                </table>
            </form>
        </div>

        <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            if(isset($_POST["a"])){ $a = $_POST["a"]; } else { $a = null; }
            if(isset($_POST["id"])){ $id = $_POST["id"]; } else { $id = null; }
            if(isset($_POST["nome"])){ $nome = $_POST["nome"]; } else { $nome = null; }
            if(isset($_POST["forma"])){ $forma = $_POST["forma"]; } else { $forma = null; }
            if(isset($_POST["tur"])){ $tur = $_POST["tur"]; } else { $tur = null; }

            if($a == "1"){
                if($nome != null or $forma != null or $tur != null or $id != null){
                    $conn = new mysqli("localhost", "root", "", "curso");
                    if($conn->connect_errno){
                        print("Connect failed: " . $conn->connect_errno);
                        exit();
                    }

                    // Busca por ID
                    if($id != null){
                        $sql = $conn->prepare("SELECT id, nome, forma, turma FROM professor WHERE id = ?");
                        $sql->bind_param("i", $id);
                        $sql->execute();
                        $result = $sql->get_result();
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo"
                                <div class='result-card'>
                                    <div class='result-badge'>#".$row['id']."</div>
                                    <div class='result-info'>
                                        <span class='result-label'>Nome</span>
                                        <span class='result-value'>".$row['nome']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Formação</span>
                                        <span class='result-value'>".$row['forma']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Turma</span>
                                        <span class='result-value'>".$row['turma']."</span>
                                    </div>
                                </div>";
                            }
                        } else { echo"<p class='verm'>Nada encontrado!</p>"; }
                        $sql->close();
                    }

                    // Busca por Nome
                    if($nome != null){
                        $busca = "%$nome%";
                        $sql = $conn->prepare("SELECT id, nome, forma, turma FROM professor WHERE nome LIKE ?");
                        $sql->bind_param("s", $busca);
                        $sql->execute();
                        $result = $sql->get_result();
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo"
                                <div class='result-card'>
                                    <div class='result-badge'>#".$row['id']."</div>
                                    <div class='result-info'>
                                        <span class='result-label'>Nome</span>
                                        <span class='result-value'>".$row['nome']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Formação</span>
                                        <span class='result-value'>".$row['forma']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Turma</span>
                                        <span class='result-value'>".$row['turma']."</span>
                                    </div>
                                </div>";
                            }
                        } else { echo"<p class='verm'>Nada encontrado!</p>"; }
                        $sql->close();
                    }

                    // Busca por Formação
                    if($forma != null){
                        $sql = $conn->prepare("SELECT id, nome, forma, turma FROM professor WHERE forma = ?");
                        $sql->bind_param("s", $forma);
                        $sql->execute();
                        $result = $sql->get_result();
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo"
                                <div class='result-card'>
                                    <div class='result-badge'>#".$row['id']."</div>
                                    <div class='result-info'>
                                        <span class='result-label'>Nome</span>
                                        <span class='result-value'>".$row['nome']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Formação</span>
                                        <span class='result-value'>".$row['forma']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Turma</span>
                                        <span class='result-value'>".$row['turma']."</span>
                                    </div>
                                </div>";
                            }
                        } else { echo"<p class='verm'>Nada encontrado!</p>"; }
                        $sql->close();
                    }

                    // Busca por Turma
                    if($tur != null){
                        $sql = $conn->prepare("SELECT id, nome, forma, turma FROM professor WHERE turma = ?");
                        $sql->bind_param("s", $tur);
                        $sql->execute();
                        $result = $sql->get_result();
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo"
                                <div class='result-card'>
                                    <div class='result-badge'>#".$row['id']."</div>
                                    <div class='result-info'>
                                        <span class='result-label'>Nome</span>
                                        <span class='result-value'>".$row['nome']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Formação</span>
                                        <span class='result-value'>".$row['forma']."</span>
                                    </div>
                                    <div class='result-info'>
                                        <span class='result-label'>Turma</span>
                                        <span class='result-value'>".$row['turma']."</span>
                                    </div>
                                </div>";
                            }
                        } else { echo"<p class='verm'>Nada encontrado!</p>"; }
                        $sql->close();
                    }

                } else {
                    echo"<p class='verm'>Preencha um dos campos para consultar</p>";
                }
            }
        ?>
    </main>
    <footer><h1>Sistemas WEB - Carlos Eduardo</h1></footer>
</body>
</html>