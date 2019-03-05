<?php

namespace App;

class CSVReader
{
     /**
     * The CSV string to be read
     */
    protected $string;

    protected $headers = [];
    protected $valus = [];

    /**
     * add the csv file.
     */
    public function __construct( string $string )
    {
        $this->string = $string;
    }


    /**
     * Read the file
     */
    public function read()
    {
        $explodedString = explode("\n", $this->string);

        foreach( $explodedString as $rowIndex => $row )
        {
            $rowValues = explode(',', $row);

            foreach( $rowValues as $valueIndex => $value )
            {
                if ( $rowIndex == 0 )
                {
                    $this->headers[] = $value;
                    continue;
                }

                $this->values[] = $value;
            }
        }

        return [
            'headers'   => $this->headers,
            'values'    => $this->values
        ];
    }
}
