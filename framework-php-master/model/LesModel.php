<?php

// tijd aanmaken, als tijd al bestaat wordt hij niet opnieuw aangemaakt maar gebruikt
function createTime($data1, $data2)
{
   $conn = openDatabaseConnection();
   $query1 = $conn->prepare("SELECT * FROM tijden WHERE tijd = :tijd1");
   $query1->execute([":tijd1" => $data1]);
   $result1 = $query1->fetch();

   $conn = openDatabaseConnection();
   $query2 = $conn->prepare("SELECT * FROM tijden WHERE tijd = :tijd2");
   $query2->execute([":tijd2" => $data2]);
   $result2 = $query1->fetch();

   if ($result1 == false){
       $query = $conn->prepare("INSERT INTO tijden (tijd) VALUES (:tijd1)");
       return $query->execute([":tijd1" => $data1]);
   }
   if ($result2 == false){
      $query = $conn->prepare("INSERT INTO tijden (tijd) VALUES (:tijd2)");
      return $query->execute([":tijd2" => $data2]);
  } 
}
// nieuwe les toevoegen
function newLes($data1, $data2, $data3, $data4)
{
   $conn = openDatabaseConnection();
   
   $stmt = $conn->prepare("INSERT INTO lessen (les, start_tijd_id, eind_tijd_id, leraar_id) VALUES (:les, (SELECT id FROM tijden WHERE tijd=:tijd1 LIMIT 1), (SELECT id FROM tijden WHERE tijd=:tijd2 LIMIT 1), :leraar)");
   $stmt->bindParam(":les", $data1);
   $stmt->bindParam(":tijd1", $data2);
   $stmt->bindParam(":tijd2", $data3);
   $stmt->bindParam(":leraar", $data4);
   $stmt->execute();
   
   $conn = null;
}

function getTime()
{
   $conn = openDatabaseConnection();

   $stmt = $conn->prepare("SELECT lessen.id AS les_id, lessen.*, tijden.*, leraar.* FROM lessen JOIN tijden ON lessen.start_tijd_id=tijden.id JOIN leraar ON lessen.leraar_id = leraar.id ORDER BY tijd");

  $stmt->execute();

  $conn = null;

  return $stmt->fetchAll();
}