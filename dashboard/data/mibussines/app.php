<?php 
	
    if(isset($files['tmp_name'])){
        if (is_array($files['tmp_name']))
        {
            foreach($files['name'] as $idx => $name)
            {
                $ret[$idx] = array(
                    'name' => $name,
                    'tmp_name' => $files['tmp_name'][$idx],
                    'size' => $files['size'][$idx],
                    'type' => $files['type'][$idx],
                    'error' => $files['error'][$idx]
                );
            }
        }
        else
        {
            $ret = $files;
        }
    }
    else
    {
        foreach ($files as $key => $value)
        {
            $ret[$key] = self::fixGlobalFilesArray($value);
        }
    }

    print_r(json_encode($ret));

?>
