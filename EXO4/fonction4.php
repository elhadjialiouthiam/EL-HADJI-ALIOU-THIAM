<?php
// fonction pour valider une phrase
    function EstPhrase($phrase){
        $phrase_valide='';
        if (preg_match("#^[A-Z][a-z0-9_;', &éà@]+[!.?]$#",$phrase)) {
            $phrase_valide=$phrase;
        }
        else{
            echo"les phrases non valide seront suprimé";
            unset($phrase);
        }
echo $phrase_valide;
    }
//fonction pour decouper une texte en des phrases correcte
    function DecoupTexte($text){
    if(preg_match_all("#[A-Z]{1}[^.!?]*[.!?]#",$text,$phrase)){
        echo"<pre>";
        print_r($phrase[0]);
        echo "</pre>";
    }
    }

     function CorrigéText($text){
        preg_match_all("#[A-Z]{1}[^.!?]*[.!?]#",$text,$phrase);
            $i=0;
            foreach ($phrase[0] as $value)
             {
                $value=preg_replace('#\s\s+#'," " ,$value);
                $value=preg_replace('#\'\s+#',"'" ,$value);
                $value=preg_replace('#\s+\'#',"'"  ,$value);
                $value=preg_replace('#\(\s+#',"("  ,$value);
                $value=preg_replace( '#\s+\)#',")" ,$value);
                $value=preg_replace('#\s+,#',","  ,$value);
                $value=preg_replace('#,\s+#',", "  ,$value);
                $value=preg_replace('#\s+\.#',"."  ,$value);
                $value=preg_replace('#\s+\?#',"?"  ,$value);
                $value=preg_replace('#\s+\!#',"!"  ,$value);
                $tableau[$i]=$value;
                $i++;
            }
            foreach($tableau as $value){
                if (preg_match("#^[A-Z]#",$value)) {
                    $b=mb_strtoupper($value[0]);
                    $value=preg_replace("#^[A-Z]#",$b,$value);
                    $tabcorrige[]=$value;
                }
            }
            echo"<pre>";
            print_r($tabcorrige);
            echo "</pre>";
        }
?>