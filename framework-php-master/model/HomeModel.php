<?php 
    function sanitize($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }
    function loadStudent($data1, $data2)
    {
        $conn = openDatabaseConnection();
        session_start();

            $query = $conn->prepare("SELECT * FROM studenten WHERE `e-mail`=:EM and `password`=:PW");
            $query->bindParam(':EM', $data1);
            $query->bindParam(':PW', $data2);
            $query->execute();

            $result = $query->fetchAll();
            if($query->rowCount($result) > 0){
                session_regenerate_id();
                $_SESSION['Loggedin'] = true;
                $_SESSION['userID'] = $result[0]['id'];
                $_SESSION['Voornaam'] = $result[0]['voornaam'];
                $_SESSION['password'] = $result[0]['password'];
                session_write_close();
            }
            elseif($PW != $result[0]['password']){
                render("home/index");
            }
            $conn = NULL;
            return $result;
    }
    function addStudent($data1, $data2, $data3, $data4, $data5, $data6)
    {
        //DS == Dependency Statement
        //D == Dependency
        $conn = openDatabaseConnection();

        $DS1 = $conn->prepare("SELECT * FROM studenten WHERE `e-mail`=:EM");
        $DS1->bindParam(":EM", $data3);
        $DS1->execute();
        $D1 = $DS1->fetchAll();

            if($data4 == $data5){
                if(empty($D1)){
                    $query = $conn->prepare("INSERT INTO studenten (voornaam, achternaam, `e-mail`, `password`, klas_id) VALUES (:UN, :AN, :EM, :PW, (SELECT id FROM klassen WHERE groepnaam=:k_ID))");
                    $query->bindParam(":UN", $data1);
                    $query->bindParam(":AN", $data2);
                    $query->bindParam(":EM", $data3);
                    $query->bindParam(":PW", $data4);
                    $query->bindParam(":k_ID", $data6);
                    $query->execute();
                    $conn = NULL;
                }
                elseif(!empty($D1)){
                    $conn = NULL;
                    render("home/index");
                }
            }
            else{
                $conn = NULL;
                render("home/index");
            }
    }
    function exitSession()
    {
    
    }