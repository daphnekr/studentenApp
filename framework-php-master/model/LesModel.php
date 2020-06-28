<?php

// tijd aanmaken, als tijd al bestaat wordt hij niet opnieuw aangemaakt maar gebruikt
function createTime($data1)
{
   $conn = openDatabaseConnection();
   $query1 = $conn->prepare("SELECT * FROM tijden WHERE tijd = :tijd");
   $query1->execute([":tijd" => $data1]);
   $result1 = $query1->fetch();

   if ($result1 == false){
       $query = $conn->prepare("INSERT INTO tijden (tijd) VALUES (:tijd)");
       return $query->execute([":tijd" => $data1]);
   }
  
}
// nieuwe les toevoegen
function newLes($data1, $data2, $data3, $data4)
{
   $conn = openDatabaseConnection();
   
   $stmt = $conn->prepare("INSERT INTO lessen (les, tijd_id, tijdsduur, leraar_id) VALUES (:les, (SELECT id FROM tijden WHERE tijd=:tijd LIMIT 1), :tijdsduur, :leraar)");
   $stmt->bindParam(":les", $data1);
   $stmt->bindParam(":tijd", $data2);
   $stmt->bindParam(":tijdsduur", $data3);
   $stmt->bindParam(":leraar", $data4);
   $stmt->execute();
   
   $conn = null;
}

function getTime()
{
   $conn = openDatabaseConnection();

   $stmt = $conn->prepare("SELECT lessen.id AS les_id, lessen.*, tijden.*, leraar.* FROM lessen JOIN tijden ON lessen.tijd_id=tijden.id JOIN leraar ON lessen.leraar_id = leraar.id ORDER BY tijd");

  $stmt->execute();

  $conn = null;

  return $stmt->fetchAll();
}