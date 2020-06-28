<div class = "container"> 
    <h1 class = "text-danger text-center"> <?= $klas['groepnaam'] ?> </h1>


<div class="card w-50 mx-auto m-5">
  <div class="card-body">
  <?php
    if($studenten == NULL){
        echo "Er zijn geen studenten aan deze klas gekoppeld";
    }
    ?>
    <?php
    foreach($studenten as $student){ ?>
      <ul>
        <li><?= $student['voornaam'], " ", $student['achternaam']; ?> </li>
      </ul>
        <?php
    }
    ?>

  </div>
</div>
 </div>