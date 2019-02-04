<?php include 'includes/header.php'; ?>
        <H1>Lista de todos os usuarios.</H1>
        <?php 
            user().deleteUser().getUsers();
        ?>
<?php include 'includes/footer.php'; ?>








