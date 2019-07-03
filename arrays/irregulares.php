<h2>Verbos irregulares</h2>
<div style="text-align: center">
    <?php
    $verbos = array(
        array("be", "was/were", "been", "ser/estar"),
        array("become", "became", "become", "convertirse en,hacerse"),
        array("begin", "began", "begun", "empezar, comenzar"),
        array("bite", "bit", "bitten", "morder"),
        array("blow", "blew", "blown", "soplar"),
        array("break", "broke", "broken", "romper"),
        array("bring", "brought", "brought", "llevar,traer"),
        array("build", "built", "built", "construir"),
        array("buy", "bought", "bought", "comprar"),
        array("can", "could", "been able", "poder"),
        array("catch", "caught", "caught", "coger,atrapar,tomar"),
        array("come", "came", "come", "venir"),
        array("cost", "cost", "cost", "costar"),
        array("cut", "cut", "cut", "cortar"),
        array("draw", "drew", "drawn", "dibujar"),
        array("drink", "drank", "drunk", "beber"),
        array("eat", "ate", "eaten", "comer"),
        array("fall", "fell", "fallen", "caer"),
        array("feel", "felt", "felt", "sentir"),
        array("fight", "fought", "fought", "pelear,luchar"),
        array("find", "found", "found", "encontrar"),
        array("fly", "flew", "flown", "volar")
    );

    echo "
            <table style='border: 1px solid; margin: 0 auto'>
                <tr>
                    <td style='border: 1px solid; font-weight: bold;'>Infinitivo</td>
                    <td style='border: 1px solid; font-weight: bold;'>Pasado</td>
                    <td style='border: 1px solid; font-weight: bold;'>Participio</td>
                    <td style='border: 1px solid; font-weight: bold;'>TraducciÃ³n</td>
                </tr>
            ";

    for ($i = 0; $i < count($verbos); $i++) {
        echo "<tr>";
        for ($j = 0; $j < 4; $j++) {
            echo "<td style='border: 1px solid'>" . $verbos[$i][$j] . "</td>";
        }

        echo "</tr>";
    }


    echo "</table>";
    ?>
</div>
<h3 id="verCodigo">
    <a href="../verCodigo2.php?src=arrays/irregulares.php">Ver código</a>
</h3>
