<?php
include_once("conexao.php"); // incluindo a conexao com banco de dados

$idpet = $_GET['idpet'];
$sql = "SELECT * FROM homenagem INNER JOIN pets ON homenagem.idanimal = pets.idpet WHERE idpet=$idpet;";

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
            border: 3px solid white;
            border-radius: 10px;
            padding: 10px;
        }
        a:hover{
            background-color: white;
        }

        div.cardio{
margin-top : 5px;
border-style: solid;
            border-color: white;
            border-radius: 15px 15px 0 0;

}

div.cardio + div.cardio{
margin-top : 20px;
border-style: solid;
            border-color: white;
            border-radius: 15px 15px 0 0;

}
        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        div.container {
            display : flex;
            flex-direction : column  ; 
            width : 75%;
            align-items : start;
            background-color : white;
            border-radius: 15px 15px;
        }    
        img, b {
    float: left;
}
        b{
            
            border-radius: 15px 15px 0 0;
            border-color: black;
            color: black;
            height:200px;
            font-family: 'Georgia', serif;
            width: 700px;
            height: 450px;
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
<br><br><br><br>
    <div class="container">
             <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="cardio"> <img height="300"   width="250" src="<?php echo $user_data['arquivo']; ?>"></img>                     
                      <b> <?php echo $user_data['descricao']; ?></b></div>
                     
                      
                        <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
</html>

