<?php $titre="Forum"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>


    <section class="forum">

      <article class="ongletForum">
        <div class="sujet">
          <form class="creationtopic" action="index.php?action=creation_topic" method="post">
            <p class="contenu"><label for="titre_sujet_forum">Titre : </label><input type="text" name="titre_sujet_forum" id="titre_sujet_forum" size="91" /></p>
            <p class="contenu"><label for="contenu_sujet_forum">Contenu : </label><textarea name="contenu_sujet_forum" id="contenu_sujet_forum" rows="4" cols="75"></textarea></p>
            <input type="submit" value="Creer" class="creer"/>
          </form>

          <div class="liste_sujet">
            <div class="news">
              <table>
                <tr>
                  <th>Sujet</th>
                  <th>Createur</th>
                  <th>Date</th>
                </tr>
                <?php while ($sujet = $sujets -> fetch())
                {?>
                  <tr>
                    <td><a href="index.php?action=topic&topic=<?php echo $sujet['id_sujet_forum']; ?>"><?php echo htmlspecialchars($sujet['titre_sujet_forum']); ?></a></td>
                    <td><?php echo $sujet['prenom']; ?> <?php echo $sujet['nom']; ?></td>
                    <td><?php echo $sujet['date_sujet_forum']; ?></td>
                  </tr>
                <?php }?>
              </table>
            </div>
          </div>
        </div>
      </article>

      <aside class="cote_D_page">
        <div class="asideforum">
          <p class="infoforum1"> Nombre de connecté: 136</p>
          <div class="infoforum2">
            Mes sujets favoris :
            <ul>
              <li>-Les meilleurs capteurs de présence</li>
              <li>-[HELP]Bug système general</li>
              <li>-Le modérateur du forum</li>
            </ul>
          </div>
        </div>
      </aside>
    </section>
  </div>

  <?php include("pages_base/ppage.php");?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
