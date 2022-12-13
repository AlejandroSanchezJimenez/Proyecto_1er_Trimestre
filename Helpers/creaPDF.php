<?php

// reference the Dompdf namespace
use Dompdf\Dompdf;

class creaPDF {
    static function creaPDF ($tipo,$indicativo,$puntos,$concurso) {
            // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml("Es usted el ganador del diploma de oro");
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream();
        
        }
        
    }


?>