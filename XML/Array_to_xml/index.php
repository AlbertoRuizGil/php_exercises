<?php

  require_once("functions.php");

  $users_array = array(
    "total_users" => 3,
    "users" => array(
        array(
            "id" => 1,
            "name" => "Nitya",
            "address" => array(
                "country" => "India",
                "city" => "Kolkata",
                "zip" => 700102,
            )
        ),
        array(
            "id" => 2,
            "name" => "John",
            "address" => array(
                "country" => "USA",
                "city" => "Newyork",
                "zip" => "NY1234",
            )
        ),
        array(
            "id" => 3,
            "name" => "Viktor",
            "address" => array(
                "country" => "Australia",
                "city" => "Sydney",
                "zip" => 123456,
            )
        ),
    )
  );

//creating object of SimpleXMLElement
$xml_user_info = new SimpleXMLElement("<?xml version='1.0'?><user_info></user_info>");

//function call to convert array to xml
array_to_xml($users_array,$xml_user_info);

//saving generated xml file
$xml_file = $xml_user_info->asXML('users.xml');

//success and error message based on xml creation
if($xml_file){
  echo 'XML file have been generated successfully.';
}else{
  echo 'XML file generation error.';
}

?>