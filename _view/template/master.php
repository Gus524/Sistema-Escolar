<?php
include "_view/template/head.php";
include '_view/template/navbar_'. $_SESSION['tipo'] .'.php'; 
$ctrl->renderContent();
include "_view/template/footer.php";