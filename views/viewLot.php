<?php $this->_t = "mon concours" ; ?>
<?php foreach ($lots as $value) : ?>
    <h5> nom: <?= $value->title() ?> </h5>
    <p> descripotion:  <?= $value->description() ?> </p>
    <p> Debut: <?= $value->start() ?></p>
    <p> Fin: <?= $value->end() ?></p>

<?php endforeach; ?>