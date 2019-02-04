<?php include 'includes/header.php'; ?>

   <h1>Editar usuario</h1>

    <form action="/mobly/edituser.php?id=<?php echo $_GET['id']; ?>" method="post">
        <?php 
            user().updateUser();
        ?>
    </form>
    
    
<?php include 'includes/footer.php'; ?>