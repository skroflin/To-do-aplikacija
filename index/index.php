<?php

$todos = [];
if (file_exists("../to-do-json/to-do.json")) {
    $json = file_get_contents("../to-do-json/to-do.json");
    $todos = json_decode($json, true);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="../novi-zad/novi-zad.php" method="post">
        <!-- Ako je file prazan može se ovdje unijeti putem submit-a -->
        <input type="text" name="todo_name" placeholder="Unesi svoj zadatak"> <!-- Buduću da radimo to do aplikaciju, pravimo zaseban file -->
        <button>Novi zadatak</button>
    </form>

    <br>

    <?php foreach ($todos as $todoName => $todo) : ?>
        <!-- Zaobljene zagrade su teže za razumjeti u većem for loop-u (kada počinje i završava kada je pomiješano sa HTML-om) -->
        <!-- : na početku i endforeach; funkcionira na isti način -->
        <div style="margin-bottom: 20px;">
            <!-- Zadatak za odraditi -->
            <form style="display: inline-block" action="../change-status/change-status.php" method="POST">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?>>
            </form>
            <?php echo $todoName ?>
            <form style="display: inline-block" action="../delete/delete.php" method="POST">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <button>Obriši</button>
            </form>
        </div>

    <?php endforeach; ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit() // this. odgovara samom checkbox-u 
                // Zato je napravljena normalna funkcija, a ne arrow funkcija
                // parentNode. je forma
                // Submit-amo formu kad god je checkbox check-an
            };
        })
    </script>
</body>

</html>