<?php
    
    /**
    * Exercicio 1
    * Created on 27/10/2020
    * @author Claudemir Trevisan
    * Crie um script PHP que mostra o nome do país e sua capital usando uma array chamada $location. 
    * Ordene a Lista pelo nome da capital e adicione pelo menos 5 entradas no array.
    */
    
    $location = array( 'Brasilia' => 'Brasil', 'Buenos Aires' => 'Argentina', 'Madrid' =>'Espanha', 'Camberra' => 'Australia', 'Cairo' => 'Egito');
    
    ksort($location);
    
    echo "Lista de 5 países ordenados pelas suas capitais:";
    echo "<ul>";
    foreach ($location as $key => $val) {
        echo "<li>A Capital do(a) " . $val ." é  ".$key."</li>";
    }
    echo "</ul>";
?>

