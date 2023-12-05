<?php
include_once("conexao.php"); // incluindo a conexao com banco de dados

$sql = "SELECT * FROM pets INNER JOIN solicitar ON pets.id_usuario = solicitar.id WHERE ativo = 'sim'";

$result = $conn->query($sql);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>SITE</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
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
    </style>
</head>
<body>
<div>
<h5>REMEMBER PETS</h5>
        <a href="Cadastro.php">Solicitar Cadastro</a>
        <a href="listuser.php">Aprovar Cadastro</a>
        <a href="listpet.php">Covas</a>
        <a href="homenagem.php">Fazer Homenagem</a>
    </div>
   
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-5">
          <!--div id="map" style="width: 790px; height: 560px"></div-->
          <div id="map" style="width: 55em; height: 40em"></div>
        </div>
        <div class="col-md-5">
          <div class="add">
            <div class="escolha" style="width: 25em; height: 1em; float: right;">
              <h5>Lista de Pets:</h5>
              <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Nome</th> 
                    <th scope="col">Tutor</th> 
                    <th scope="col">Data Falecimento</th>          
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['nomepet']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['data']."</td>";
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
          
          </div>
	      <div class="curso"></div>
        </div>
      </div>
    </div>

<div>
        
    </div>

 
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" 
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" 
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="anonymous"></script>
<style>
  #map {
    height: 98vh;
    width: 100hw
  }
</style>

<script>
  //inserir mapa
var map = L.map('map').setView([-22.9942246673889, -47.51850458950489], 100);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    minZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  var greenIcon = L.icon({
    iconUrl: 'cova.png',
 
    iconSize:     [15, 15], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
 

  
  const url = 'coordenadas.php'; // api responsavel por buscar os dados que estao salvos no banco.

  fetch(url)
    .then(response => response.json())
    .then(result => {
      const dados = JSON.stringify(result);
      result.forEach(function(retorno) {
        var location = new L.LatLng(retorno.latitude, retorno.longitude);
        console.log("RETORNO ",result);
        var markerGroup = L.featureGroup([]).addTo(map);
        var latLng = L.latLng([retorno.latitude, retorno.longitude]);
        L.marker(latLng, {icon: greenIcon}).bindPopup( "<b>Nome pet: </b>" + retorno.nomepet + '<br>' +
        "<b>Tutuor: </b>" + retorno.nome + 
        '<br>' + "<b>Data falecimento: </b>" + retorno.data +
        '<br><br><br>' + "<a href='listhomenagem.php?idpet= "  + retorno.idpet + "' title='Editar'>Homenagem</a> ").addTo(markerGroup).addTo(map);
          
      });

    })
    
    .catch(function(err) {
      console.error(err);
    })
</script>

</body>
</html>

