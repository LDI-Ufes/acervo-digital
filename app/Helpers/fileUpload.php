<?php 


    if(!function_exists('getSanitizedFileName')) {
    function getSanitizedFileName($request) {

      $file_extension = $request
        ->file('upload_input')
        ->getClientOriginalExtension();

      $file_name = basename($request
        ->file('upload_input')
        ->getClientOriginalName(), '.' . $file_extension
      );

      $file_name = iconv(
        'UTF-8', 
        'ASCII//TRANSLIT//IGNORE',
        $file_name
      );

      $file_name = strtolower($file_name);

      $file_name = preg_replace( 
        array( '/[ ]/', '/[^A-Za-z0-9\-]/'),
        array( '-', '-'),
        $file_name
      );

      return $file_name .'.'. $file_extension;
    }
  }

  if(!function_exists('uploadFile')) {
    function uploadFile($request) {
      $file_name = getSanitizedFileName($request);

      $request
        ->file('upload_input')
        ->move(
          public_path('/arquivos'),
          $file_name
        );
     
      return '/arquivos/' . $file_name;
    }
  }

?>
