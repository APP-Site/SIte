  <?php while ($piece = $pieces->fetch())
  { ?>
    <article class="onglet">
      <div>
        <header><?php echo $piece['nom']; ?> <a href="index.php?action=supprimer_piece&piece=<?= $piece['nom'] ?>">(Supprimer la pièce)</a></header>
        <ul>
          <?php $capteurs_actionneurs = select_capteur_actionneur($code);
          while ($objet = $capteurs_actionneurs->fetch())
          {
            $data = htmlspecialchars($piece['nom']);
            $data2=htmlspecialchars($objet['nom_piece']);
            if ($data == $objet['nom_piece'])
            {
              $valeur = select_donnee($data2); ?>
              <li><img src="<?php echo $objet['image'];?>"><br><?php echo $valeur['valeur']?> <?php echo $objet['unite'];?></li>
            <?php }}?>
          </ul>
        </div>
      </article>
    <?php }?>
    <article>
      <form action="index.php?action=rajout_piece" method="post">
        <label for="rajout_piece">Rajouter une pièce : </label><input type="text" name="rajout_piece" id="rajout_piece"><input type="submit" value="Rajouter">
      </form>
    </article>
