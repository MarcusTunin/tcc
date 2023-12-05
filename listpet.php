<?php
include_once("conexao.php"); // incluindo a conexao com banco de dados

$sql = "SELECT * FROM pets INNER JOIN solicitar ON pets.id_usuario = solicitar.id";

$result = $conn->query($sql);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
        }
        a:hover{
            background-color: dodgerblue;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
<div>
<h5>REMEMBER PETS</h5>
        <a href="index.php">Inicio</a>
        <a href="Cadastro.php">Solicitar Cadastro</a>
        <a href="listuser.php">Aprovar Cadastro</a>
        <a href="listpet.php">Covas</a>
        <a href="homenagem.php">Fazer Homenagem</a>
    </div>
</body>
</div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Ativo</th>          
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['idpet']."</td>";
                        echo "<td>".$user_data['nomepet']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['ativo']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='editpet.php?idpet=$user_data[idpet]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-primary' href='listhomenagem.php?idpet=$user_data[idpet]' title='Editar'>Homenagens
                            </a> 
                            </td>";
                        echo "</tr>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</html>

