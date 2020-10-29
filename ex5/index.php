 <?php
    
    /**
    * Exercicio 5
    * Created on 28/10/2020
    * @author Claudemir Trevisan
    * Parser para converter um arquivo xml para csv
    * Função criarCsv($xml,$f)   
    */
    
        $arquivo_xml='filmes.xml';

        if (file_exists($arquivo_xml)) 
        {
           $xml = simplexml_load_file($arquivo_xml);
           $f = fopen('filmes.csv', 'w');
           criarCsv($xml, $f);
           echo "Verificar o novo arquivo criado: filmes.csv";
           fclose($f);
        }

        function criarCsv($xml,$f)
        {
            foreach ($xml->children() as $item) 
            {
                $hasChild = (count($item->children()) > 0)?true:false;

                if(!$hasChild)
                {
                   $put_arr = array($item->getName(),$item); 
                   fputcsv($f, $put_arr ,';','"');
                }
                else
                {
                   criarCsv($item, $f);
                }
            }
        }
?>    