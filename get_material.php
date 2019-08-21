<?php 

$materialCategory = '';
if (isset($_POST['material'])) {
    $materialCategory = $_POST['material'];
    echo $materialCategory;
} 

?>

<?php ob_start(); ?>
<div class="wrapper">
<?php foreach ($materials as $key => $material) { 
      //  echo $key . ' ' . $materialCategory;
      echo '111';
        if ($key == $materialCategory) {
        ?>

        <div class="material">

        <?php foreach ($material as $color) { ?>
            <div class="material__color">
                <?php echo $color; ?>
            </div>
        <?php } ?>

        </div>

<?php 
        }
    } 
?>
<?php 
    $selectedMaterial = ob_get_contents();
    ob_end_clean();
    
    echo $selectedMaterial;
?>
</div>