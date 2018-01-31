<?php $titre="Forum"; ?> <!-- affiche la page du forum -->

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>


    <section class="forum">

      <article class="ongletForum">
        <div class="sujet">
          <h3>Liste des topics</h3>
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
        </article>

        <article class="cote_D_page">
          <h3>Créer un topic</h3>
          <form class="creationtopic" action="index.php?action=creation_topic" method="post"> <!-- créer un sujet dans le forum -->
            <p class="contenu"><label for="titre_sujet_forum">Titre : </label><input type="text" name="titre_sujet_forum" id="titre_sujet_forum" size="60" /></p>
            <p class="contenu"><label for="contenu_sujet_forum">Contenu : </label><textarea name="contenu_sujet_forum" id="contenu_sujet_forum" rows="6" cols="60"></textarea></p>
            <input type="submit" value="Creer" class="creer"/>
          </form>
        </article>
      </section>
    </div>

  <?php include("pages_base/ppage.php");?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
