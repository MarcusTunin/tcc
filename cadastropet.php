<?php

    if(isset($_POST['submit']))
    {
       include_once('conexao.php');

        $id_usuario = $_POST['id_usuario'];
        $nomepet = $_POST['nomepet'];
        $data = $_POST['data'];
        $ativo = $_POST['ativo'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
       
        $result = mysqli_query($conn, "INSERT INTO pets(id_usuario, nomepet, data, ativo, latitude, longitude) 
        VALUES ('$id_usuario','$nomepet', '$data','$ativo','$latitude','$longitude')");
         header('Location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
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
   <div class="box">
        <form action="cadastropet.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Pets</b></legend>
                <br>
                <br>
                <div class="inputBox">
                    <input type="text" name="id_usuario" id="id_usuario" class="inputUser" required>
                    <label for="id_usuario" class="labelInput">ID Usuario</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nomepet" id="nomepet" class="inputUser" required>
                    <label for="nomepet" class="labelInput">Nome do PET</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="data" id="data" class="inputUser" required>
                    <label for="data" class="labelInput">Data de Falecimento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="ativo" id="ativo" class="inputUser" required>
                    <label for="ativo" class="labelInput">Ativo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="latitude" id="latitude" class="inputUser" required>
                    <label for="latitude" class="labelInput">Latitude</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="longitude" id="longitude" class="inputUser" required>
                    <label for="longitude" class="labelInput">Longitude</label>
                </div>
                <br><br>
              
                <input  type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>