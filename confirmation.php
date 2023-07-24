<?php 

    if(isset($_SESSION['confirmation'])) :
?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['confirmation'] ?></strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION['confirmation']);
endif;
?>