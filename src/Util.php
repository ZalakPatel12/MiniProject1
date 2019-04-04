<?php
/**
 * Created by PhpStorm.
 * User: zalakpatel
 * Date: 2019-03-27
 * Time: 09:27
 */
namespace App;

/**
 * For Generate Tables
 */
class HTML_Table
{
    public function generate_headings($array)
    {
        $th="";
        foreach ($array as $key => $value) {
            $th .= "<th>{$value}</th>";
        }
        $tr = "<tr>".$th."</tr>";
        echo $tr;
        return $tr;
    }

    public function generate_rows($array)
    {
        $td="";
        foreach ($array as $key => $value) {
            $td .= "<td>{$value}</td>";
        }
        $tr = "<tr>".$td."</tr>";
        echo $tr;
        return $tr;
    }
}

/**
 * Get Records From CSV
 */
class CSV_File
{
    public function create_handle($filename)
    {
        return fopen($filename, "r");
    }

    public function get_file_data($handler)
    {
        return fgetcsv($handler, 1000, ",");
    }

    public function data_into_HTML($data)
    {
        return (new HTML_Table)->generate_rows($data);
    }
}


/**
 * For initialization
 */

class initialization
{
    public function initial($filename)
    {
        $handler	= (new CSV_File)->create_handle($filename);
        $data		= (new CSV_File)->get_file_data($handler);
        (new HTML_Table)->generate_headings($data);
        while ($data = (new CSV_File)->get_file_data($handler)) {
            (new CSV_File)->data_into_HTML($data);
        }
    }
}


