<?php
    include_once('conexao.php');

    if(!empty($_GET['idpet']))
    {
        $idpet = $_GET['idpet'];
        $sqlSelect = "SELECT * FROM pets WHERE idpet=$idpet";
        $result = $conn->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id_usuario = $user_data['id_usuario'];
                $nomepet = $user_data['nomepet'];
                $data = $user_data['data'];
                $ativo = $user_data['ativo'];
               
            }
        }
        else
        {
            header('Location: listpet.php');
        }
    }
    else
    {
        header('Location: listpet.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
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
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
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
    <div class="box">
        <form action="saveEditpet.php" method="POST">
            <fieldset>
                <legend><b>Editar Usuario</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="id_usuario" id="id_usuario" class="inputUser" value=<?php echo $id_usuario;?> required>
                    <label for="id_usuario" class="labelInput">Tutor</label>
                </div>
                
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nomepet" id="nomepet" class="inputUser" value=<?php echo $nomepet;?> required>
                    <label for="nomepet" class="labelInput">Nome Do Pet</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="data" id="data" class="inputUser" value=<?php echo $data;?> required>
                    <label for="data" class="labelInput">Data</label>
                </div>
                <br><br>
             
                <div class="inputBox">
                <select name="ativo" id="ativo" value=<?php echo $ativo;?> required>
                <option value="nao">NAO</option>
      <option value="sim">SIM</option>
  </select>
  <label for="ativo" class="labelInput">Ativo</label>
                </div>
                <br><br>
               
                <br><br>
				<input type="hidden" name="idpet" value=<?php echo $idpet;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>