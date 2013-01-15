<?php 
	$i = 1;
	$contacts = $this->requestAction('home/get_contacts');
	
	// print_r($contacts);

	$icons = array('&#xe000;', '&#xe002;', '&#xe00c;', '&#xe003;', '&#xe004;', '&#xe001;', '&#xe00e;');
	$pre = array('tel:', '', 'tel:', 'mailto:', '', '', '');
	$blank = array(false, true, false, false, true, true, true);

 	foreach($contacts as $k){
	 	if((isset($top) && $k['Contact']['top'] == 1) || !isset($top)){
	 		if($blank[$k['Contact']['contact_type']]){
	 			$bl = ' target="_blank"';
	 		}else{
	 			$bl = '';
	 		}
	 		echo '<a' . $bl . ' href="'. $pre[$k['Contact']['contact_type']] . $k['Contact']['value'] .'"><span class="icon" aria-hidden="true" data-icon="' . $icons[$k['Contact']['contact_type']] . '"></span> <span class="data">' . $k['Contact']['display'] . '</span></a>';
	 	}
 	}
?>