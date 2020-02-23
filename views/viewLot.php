<?php $this->_t = "mon concours" ; ?>
<?php foreach ($lots as $value) : ?>
    <h5> nom: <?= $value->title() ?> </h5>
    <p> descripotion:  <?= $value->description() ?> </p>
    <p> Debut: <?= $value->start() ?></p>
    <p> Fin: <?= $value->end() ?></p>

    <form action="index.php?url=accueil/participation" method="post">
    <?php

        $form = new Form;
        echo 'firstname' .  $form->input('firstname');
        echo 'lastname' .  $form->input('lastname');
        echo 'email' . $form->email('email');
        echo $form->submit();
    ?>
    </form>
<?php endforeach; ?>