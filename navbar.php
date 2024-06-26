<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="right-navbar">
        <?php
        if ($paginaCorrente == "Ospedale_direttore.php") {
        ?>
            <a href="index.php">
                <button>
                    <img class="right-image" src="img/home2.png" height="30px" width="30px"></img>
                    Home
                </button>
            </a>
            <a href="Ospedale.php">
                <button>
                    <img class="right-image" src="img/ospedale3.png" height="30px" width="30px"></img>
                    Ospedale
                </button>
            </a>
        <?php
        } else {
        ?>
            <a href="index.php">
                <button <?php if ($paginaCorrente == 'index.php') echo 'class="active"'; ?>>
                    <img class="right-image" src="img/home2.png" height="30px" width="30px"></img>
                    Home
                </button>
            </a>
            <a href="Ospedale.php">
                <button <?php if ($paginaCorrente == 'Ospedale.php') echo 'class="active"'; ?>>
                    <img class="right-image" src="img/ospedale3.png" height="30px" width="30px"></img>
                    Ospedale
                </button>
            </a>
            <a href="Cittadino.php">
                <button <?php if ($paginaCorrente == 'Cittadino.php') echo 'class="active"'; ?>>
                    <img class="right-image" src="img/cittadino.png" height="30px" width="30px"></img>
                    Cittadino
                </button>
            </a>
            <a href="Ricovero.php">
                <button <?php if ($paginaCorrente == 'Ricovero.php') echo 'class="active"'; ?>>
                    <img class="right-image" src="img/ricovero.png" height="30px" width="30px"></img>
                    Ricovero
                </button>
            </a>
            <a href="Patologia.php">
                <button <?php if ($paginaCorrente == 'Patologia.php') echo 'class="active"'; ?>>
                    <img class="right-image" src="img/patologia.png" height="30px" width="30px"></img>
                    Patologia
                </button>
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>