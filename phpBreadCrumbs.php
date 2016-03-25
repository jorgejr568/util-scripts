public function breadcrumb(){
        echo "<ul class=\"breadcrumb\">";
        $link=null;
        $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
        $fromSite=explode(DIRECTORY_SEPARATOR,siteURL);
        foreach($crumbs as $i => $crumb){
            if(!empty($crumb)){
                if(!in_array($crumb,$fromSite)) {
                    $link .= $crumb . DIRECTORY_SEPARATOR;
                }
                $selected=(count($crumbs)-1)==$i?true:false;
                if($selected){
                    echo "<li $selected>".strtoupper(str_replace(array(".php","_","."),array(""," "," "),$crumb))."</li>";
                }
                else {
                    echo "<li><a href='$link'>" . strtoupper(str_replace(array(".php", "_", "."), array("", " ", " "), $crumb)) . "</a></li>";
                }
            }
        }
        echo "</ul>";
    }
