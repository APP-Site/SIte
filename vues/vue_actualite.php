<?php $titre = $sujet_actu['titre_sujet'] ; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class= "topicaffiche">
        <p><a href="index.php?action=tableau_bord">Retour au tableau de bord</a></p>

        <h2><?php echo $sujet_actu['titre_sujet']?></h2>
        <?php echo $sujet_actu['contenu_actualite']?>
      </article>
    </section>
  </div>

  <?php include('pages_base/ppage.php');?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
