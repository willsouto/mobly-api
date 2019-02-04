<?php include 'includes/header.php'; ?>
    <?php
        if (isset($_GET["id"]))  : ?>
            <H1>Posts do usuario "<?php echo $_GET["id"] ?>"</H1>
            <?php 
                user().getPosts();
            ?>
        <?php else : ?>
            <h1>Id não informado <br> param: ?id=x</h1>
        <?php endif ?>
<?php include 'includes/footer.php'; ?>
