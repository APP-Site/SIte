<?php $titre = $topic['titre_sujet_forum'] ; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class= "topicaffiche">
        <p><a href="index.php?action=forum">Retour au forum</a></p>

        <h2><?php echo $topic['titre_sujet_forum']?> de <?php echo $topic['prenom'] ?></h2>
        <?php echo $topic['contenu_sujet_forum']?>
      </article>

      <article>
        <?php while ($com = $commentaires -> fetch())
        { ?>
          <div class="liste_commentaire">
            <p><strong><?php echo $com['prenom']; ?> <?php echo $com['nom']; ?></strong> le <?php echo $com['date_commentaire']; ?></p>
            <p><?php echo nl2br(htmlspecialchars($com['contenu_commentaire'])); ?></p>
          </div>
        <?php } ?>
      </article>

      <article>
        <form class="creationtopic" action="index.php?action=creation_commentaire&id=<?php echo $topic['id_sujet_forum'] ?>" method="post">
          <p class="ajouter_commentaire"><label for="contenu_commentaire">Ajouter un commentaire</label> :  <textarea name="contenu_commentaire" id="contenu_commentaire" rows="7" cols="85"></textarea></p>
          <input type="submit" value="Envoyer" />
        </form>
      </article>

    </section>
  </div>

  <?php include('pages_base/ppage.php');?>

<?php $content = ob_get_clean(); ?>
<?php require('pages_base/vues/base.php'); ?>
