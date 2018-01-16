  <?php while ($piece = $pieces->fetch())
  { ?>
    <article class="onglet">
      <div>
        <header><?php echo $piece['nom']; ?></header>
        <ul>
          <?php $capteurs_actionneurs = select_capteur_actionneur($code);
          while ($objet = $capteurs_actionneurs->fetch())
          {
            $data = htmlspecialchars($piece['id']);
            $data2=htmlspecialchars($objet['id']);
            if ($data == $objet['id_possession_piece'])
            {
              $valeur = select_donnee($data2); ?>
              <li><img src="<?php echo $objet['image'];?>"><br><?php echo $valeur['valeur']?> <?php echo $objet['unite'];?></li>
            <?php }}?>
          </ul>
        </div>
      </article>
    <?php }?>
