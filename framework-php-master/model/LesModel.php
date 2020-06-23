<?php

// tijd aanmaken, als tijd al bestaat wordt hij niet opnieuw aangemaakt maar gebruikt
function createTime($tijd)
{
   $conn = openDatabaseConnection();
   $query1 = $conn->prepare("SELECT * FROM tijden WHERE tijd = :tijd");
   $query1->execute(["tijd" => $tijd]);
   $result = $query1->fetch();
   if ($result == false){
       $query = $conn->prepare("INSERT INTO tijden (tijd) VALUES (:tijd)");
       return $query->execute(["tijd" => $tijd]);
   } 
}
// nieuwe les toevoegen
function newLes($data1, $data2, $data3)
{
   $conn = openDatabaseConnection();
   
   $stmt = $conn->prepare("INSERT INTO lessen (les, tijd_id, leraar_id) VALUES (:les, (SELECT id FROM tijden WHERE tijd = :tijd LIMIT 1), :leraar)");
   $stmt->bindParam(":les", $data1);
   $stmt->bindParam(":tijd", $data2);
   $stmt->bindParam(":leraar", $data3);
   $stmt->execute();
   
   $conn = null;
}