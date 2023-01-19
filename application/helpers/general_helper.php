<?php

    function encode_date($date) 
    {
        list($day, $month, $year) = explode('/', $date);
        $new_date = $year . "-" . $month . "-" . $day;
        return $new_date;            
    }
    
    function decode_date($date) 
    {
        list($year, $month, $day) = explode('-', $date);
        $new_date = $day. "-" . $month . "-" . $year;
        return $new_date;            
    }
    
    function decode_date_time($date) 
    {
        list($dt,$tm) = explode(' ', $date);
        list($year, $month, $day) = explode('-', $dt);
        $new_date = $day. "-" . $month . "-" . $year;
        return $new_date;            
    }
      function StriptStr($text)
    {
        if(trim($text)!="") {$text=str_replace("'","''",$text);}
        return $text;
    }
    function getMaxId($table,$pid)
    {
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "SELECT MAX(".$pid.") AS myId FROM ".$table.""; 
        $query = $ci->db->query($sql);  
        $rows = $query->result_array();
        
        foreach($rows as $list)
        {   
            $id = $list['myId'];
        }      
        
        if($id==0)
       {
         $id = 1;
       } 
        else
       {
         $id = $id+1;
       }  
       
       return $id;
    }
    
    function getUserType($name)
    {
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "SELECT id FROM user_type_master WHERE user_slug='".$name."'";
        $query = $ci->db->query($sql);  
        $row = $query->result_array();
        return $row[0]["id"];
    }
    
    function show_all_car($id)
	{
		$CI =& get_instance();
		$CI->load->model('vehicle_model');
		$retArray=$CI->vehicle_model->singal_Car_View($id);
		return $retArray;
	}
    function curl_post_to_another_domain( $arrValues = array(), $strAnotherDomainPage = '', $strReturnValueFormat = 'array' ) {
		//$strReturnValueFormat = 'object'
		if( !extension_loaded( "curl" )) {
			echo( '<font color=\'red\'>cURL extension is not loaded in PHP.ini file.</font>' );
			exit();	    
		} 
		
		//extract( $arrValues ); -> extract the values from array to individual variables
		//display($arrValues);	
		$arrFields = array();
		if( 0 < sizeof( $arrValues )) {
			foreach( $arrValues as $strIndex => $strValue ) {
				$arrFields[$strIndex] = urlencode( $strValue );
			}
		}
		
		$strFieldsString = '';
		if( 0 < sizeof( $arrFields )) {
			foreach( $arrFields as $strKey => $strValue ) { $strFieldsString .= $strKey .'=' . $strValue . '&'; }
			$strFieldsString = rtrim( $strFieldsString, '&' );
		}
			
		//display($strFieldsString);
		//open connection
		$ch = curl_init();
		
		$arrResult = array();
		if( $ch ) {
			//set the url, number of POST vars, POST data
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_URL, $strAnotherDomainPage );//'http://domain.com/get-post.php';			
			if( 0 < count( $arrFields )) {
				curl_setopt( $ch, CURLOPT_POST, count( $arrFields ));
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $strFieldsString );
			}
			
			/*
			display( $strAnotherDomainPage );
			display( count( $arrFields ));
			display( $strFieldsString );
			*/
			
			//execute post
			if( false === ( $arrResult = curl_exec( $ch ))) {
				 echo '<font color=\'red\'>Curl error: ' . curl_error($ch) . '</font>';	
				 exit();		
			}		
			
			//display( $arrResult );
			
			//close connection
			curl_close($ch);
		} else {
			echo( '<font color=\'red\'>Error in curl initialization.</font>' );
			exit();
		}
	
		if( 'object' == $strReturnValueFormat ) {
			return json_decode( $arrResult );
		} else {
			return json_decode( $arrResult, true );
		}
	}  
     function setSeoCompUrlStr($sStr)   
     {
      $sSeoUrl = '';
      $sStr = trim($sStr);
       
      if($sStr != '')
      {
       $sStr      = trim(preg_replace('/&amp;/',' and ', $sStr));
       $sStr      = trim(preg_replace('/&/',' and ', $sStr));
       $sStr      = trim(preg_replace('/\s\s+/',' ', $sStr));
       $sStr      = strtolower($sStr);  
       $sStr      = strtolower(str_replace("&amp;","and",$sStr)); 
       $sStr      = str_replace("&#039;","",$sStr);
       $sStr      = str_replace("&nbsp;","-",$sStr);
       $sStr = preg_replace('/[\s-]+/', '-', $sStr);
 	  
      }
      
      return $sStr;
     }
     
    function msgDisplay($type,$msgs)
    {
       $msg   = "<div class='msgblock'>";
       
       if($type=="ins")
       {
         $msg .= "<div class='green-left'>".$msgs."<div class='close-icon'><a class='close-green'><img src='".base_url()."library/images/table/icon_close_green.gif' alt='' /></a></div></div>";
       } 
       
       if($type=="del")
       {
         $msg .= "<div class='red-left'>".$msgs."<div class='close-icon'><a class='close-red'><img src='".base_url()."library/images/table/icon_close_red.gif'   alt='' /></a></div></div>"; 
       }  
         
       if($type=="upd")
       {
          $msg .= "<div class='blue-left'>".$msgs."<div class='close-icon'><a class='close-blue'><img src='".base_url()."library/images/table/icon_close_blue.gif'  alt='' /></div></div><div class='clear'></a></div>";    
       } 
       
          $msg .= "</div>"; 
          $msg .= "<div class='clear'></div>";
          
          return $msg;
    } 
    
    function checkadmin($username)
    {
        $ci=& get_instance();
        $ci->load->database(); 
        $query = $ci->db->query("SELECT * FROM user_master WHERE user_name='".$username."' AND is_admin='Y'");
        
        if($query->num_rows() > 0)
        {
            return false;
        }
         else
        {
            return true;
        } 
        
    }
    
    function getImgAttr($sAttributeName, $sImgTag)  
  {
      $aAttrArray = array();
      
      $result = "";
      preg_match_all('/('.$sAttributeName.')=("[^"]*")/i',$sImgTag, $aAttrArray);
      if( count($aAttrArray[0]) == 0)
     {
        $result = "Image atribute not found";
     }
      else
     {
        $result = $aAttrArray[0][0];
     }
     
      return $result;
   
  } 
  
    function setImgAttr($sAttributeName, $sAttrValue, $sImgTag)
    {
    $newAttr = $sAttributeName."=\"".$sAttrValue."\"";
    $sImgAttr = getImgAttr($sAttributeName, $sImgTag) ;
    $sImgTag = str_replace($sImgAttr,$newAttr,$sImgTag);
    return $sImgTag;
    }
    
        function pr($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
	function getLastUriSeg($dataspacfic)
    {
        $arr =Array();
        $arr = explode("/",$dataspacfic);
        $last_segment = end($arr);
        return $last_segment;
    }

	function product_category($id)
	{
		$CI = & get_instance();
		$CI->load->model('category_model');
		$headerdata['results']  = $CI->category_model->GetAllcategoryyyy($id);
		return $headerdata;
	}
	
?>