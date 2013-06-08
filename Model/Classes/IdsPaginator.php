<?php

namespace IDS\ApiBundle\Model\Classes;
/**
 * Description of IdsPaginator
 *
 * @author <daniele.centamore@gmail.com>
 */
class IdsPaginator {

    public static function paginate( $uri, $total_results, $rpp, $current) {
        
        if(!$current){$current=1;}
        $html = "<form id='ids_page_form' method='post' action='".$uri."'>";
        $html .= "<input type='hidden' id='ids_pager' name='ids_page' value='".$current."'></form>";
        $html .= "<table width='100%' align='right'><tr>";
        $html .= "<td>Number of IDS records found: " . $total_results . "</td>";
        
       
        
        if($current > 1){
            
             $html .= "<td><a href='#' onclick=\"document.forms['ids_page_form'].ids_page.value='1';";
             $html .= "document.forms['ids_page_form'].submit();\"> first </a></td>";
            
            $html .= "<td><a href='#' onclick=\"document.forms['ids_page_form'].ids_page.value='".($current-1)."';";
            $html .= "document.forms['ids_page_form'].submit();\"> previous </a></td>";
        }
        
        $html .= "<td> &nbsp;";
        $lastpage = ceil($total_results/$rpp);
        
        $rangepages = 4;
       
        if ( $current > ($rangepages) ) { $html .= " ... "; }
        
        if( $current > ($rangepages)) {
            $startingpage = ($current - ($rangepages));
        } else {
            $startingpage = 1;
        }
        
        for( $i = $startingpage; $i < $lastpage; $i++ ){
              
              if( $current == $i ) {
                  $html .= " <b>" . $i . "</b> &nbsp;";
              } else {                  
                   $html .= "<a href='#' onclick=\"document.forms['ids_page_form'].ids_page.value='" . $i . "';";
                   $html .= "document.forms['ids_page_form'].submit();\">" . $i . "</a> &nbsp;";
              }
              
              if( $i == ($current+$rangepages) ){
                  break;
              }
              
              

        }
        
        if ( ( $current < ($lastpage-$rangepages) ) && ( $lastpage > 6) ) {  $html .= " ... "; }
        
                
        if( $current < $lastpage-1 ) {
            $html .= "<td><a href='#' onclick=\"document.forms['ids_page_form'].ids_page.value='".($current+1)."';";
            $html .= "document.forms['ids_page_form'].submit();\"> next </a></td>";
        }
        
        $html .= "<td><a href='#' onclick=\"document.forms['ids_page_form'].ids_page.value='".($lastpage-1)."';";
        $html .= "document.forms['ids_page_form'].submit();\"> last </a></td>";
        
        

        $html .= "<td>Total pages: ".($lastpage-1)."</td>";
        $html .= "</tr></table><br>";
        return $html;
    }

       

}
