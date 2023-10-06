<table border="2">

     <tr>
        <td>nom du pays</td><td>Devise</td><td>Code devise</td>
    </tr>            

       

    <?php  foreach ($data as $key => $pays): ?>
        <tr>
            <td>
                <?= $pays['nomPays'] ?>
            </td>
            <td>
                <?= $pays['nomDevise'] ?>
            </td>
            <td>
                <?= $pays['codeDevise'] ?>
            </td>

        </tr>
        <?php endforeach ?>
</table>