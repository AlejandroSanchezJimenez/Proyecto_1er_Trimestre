<?php
function mi_autocargador($clase) {
    $root=$_SERVER["DOCUMENT_ROOT"];
    if (file_exists($root.'/Proyecto_Radioaficionados/Helpers/'.$clase.'.php')) {
        include $root.'/Proyecto_Radioaficionados/Helpers/' . $clase . '.php';
    }
    else if (file_exists($root.'/Proyecto_Radioaficionados/Clases/'.$clase.'.php')) {
        include $root.'/Proyecto_Radioaficionados/Clases/' . $clase . '.php';
    }
    else if (file_exists($root.'/modelo/'.$clase.'.php')) {
        include $root.'/proyecto_objetos/modelo/' . $clase . '.php';
    }
}

spl_autoload_register('mi_autocargador');
?>