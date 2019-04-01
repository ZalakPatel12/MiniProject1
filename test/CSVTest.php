<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class CSVTest extends TestCase
{
    protected $filepath;
    protected $csv_file;
    protected $handler;
    protected $expected_file_data;
    protected $html_table;
    protected $expected_headings;
    protected $expected_row;

    public function setUp()
    {
        $this->filepath = './src/03.csv';
        $this->csv_file = new \App\CSV_File;
        $this->handler = fopen($this->filepath, "r");
        $this->expected_file_data = fgetcsv($this->handler, 1000, ",");
        $this->html_table = new \App\HTML_Table;
        $th="";
        foreach ($this->expected_file_data as $key => $value) {
            $th .= "<th>{$value}</th>";
        }
        $this->expected_headings = "<tr>".$th."</tr>";
        $td="";
        foreach ($this->expected_file_data as $key => $value) {
            $td .= "<td>{$value}</td>";
        }
        $this->expected_row = "<tr>".$td."</tr>";
    }

    public function test_create_handle()
    {
        $this->assertTrue(file_exists($this->filepath));
        $this->assertNotNull($this->csv_file->create_handle($this->filepath));
    }

    public function test_get_file_data()
    {
        $actual_handler = $this->csv_file->create_handle($this->filepath);
        $actual_file_data = $this->csv_file->get_file_data($actual_handler);
        $this->assertFalse(empty($actual_file_data));
        $this->assertEquals($this->expected_file_data, $actual_file_data);
    }

    public function test_generate_headings()
    {
        $actual_handler = $this->csv_file->create_handle($this->filepath);
        $actual_file_data = $this->csv_file->get_file_data($actual_handler);
        $actual_headings = $this->html_table->generate_headings($actual_file_data);
        $this->assertFalse(empty($actual_headings));
        $this->assertEquals($this->expected_headings, $actual_headings);
    }

    public function test_generate_row()
    {
        $actual_handler = $this->csv_file->create_handle($this->filepath);
        $actual_file_data = $this->csv_file->get_file_data($actual_handler);
        $actual_headings = $this->html_table->generate_headings($actual_file_data);
        $actual_row = $this->html_table->generate_rows($actual_file_data);
        $this->assertFalse(empty($actual_row));
        $this->assertEquals($this->expected_row, $actual_row);
    }
}
