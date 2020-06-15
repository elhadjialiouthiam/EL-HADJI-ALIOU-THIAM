<?php 
//session_start();
$username = 'Ass';
$password = 'Ass97';
$connection = new PDO( 'mysql:host=localhost;dbname=Quizz_SA', $username, $password ); 

if(isset($_POST["action"])) 
{
if($_POST["action"] == "Load") 
{
$statement = $connection->prepare("SELECT * FROM Joueur ORDER BY score DESC");
$statement->execute();
$result = $statement->fetchAll();
$output = '';
$output .= '
<table class="table table-bordered">
    <tr>
    <th scope="col">PRENOM</th>
    <th scope="col">NOM</th>
    <th scope="col">SCORE</th>
    <th scope="col">Update</th>
    <th scope="col">Delete</th>
    </tr>
';
if($statement->rowCount() > 0)
{
foreach($result as $row)
{
    $output .= '
    <tr>
    <td>'.$row["prenom"].'</td>
    <td>'.$row["nom"].'</td>
    <td>'.$row["score"].'</td>
    <td><button type="button" id="'.$row["id_joueur"].'" class="btn btn-warning btn-xs update">Update</button></td>
    <td><button type="button" id="'.$row["id_joueur"].'" class="btn btn-danger btn-xs delete">Delete</button></td>
    </tr>
    ';
}
}
else
{
$output .= '
    <tr>
    <td align="center">Data not Found</td>
    </tr>
';
}
$output .= '</table>';
echo $output;
}

if($_POST["action"] == "Select")
{
$output = array();
$statement = $connection->prepare(
"SELECT * FROM Joueur 
WHERE id_joueur = '".$_POST["id_joueur"]."' 
LIMIT 1"
);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
$output["prenom"] = $row["prenom"];
$output["nom"] = $row["nom"];
$output["score"] = $row["score"];
}
echo json_encode($output);
}

if($_POST["action"] == "Update")
{
$statement = $connection->prepare(
"UPDATE Joueur 
SET prenom = :prenom, nom = :nom 
WHERE id_joueur = :id_joueur
"
);
$result = $statement->execute(
array(
    ':prenom' => $_POST["prenom"],
    ':nom' => $_POST["nom"],
    ':id_joueur'   => $_POST["id_joueur"]
)
);
if(!empty($result))
{
echo 'Data Updated';
}
}

if($_POST["action"] == "Delete")
{
$statement = $connection->prepare(
"DELETE FROM Joueur WHERE id_joueur = :id_joueur"
);
$result = $statement->execute(
array(
    ':id_joueur' => $_POST["id_joueur"]
)
);
if(!empty($result))
{
echo 'Data Deleted';
}
}

}
?>