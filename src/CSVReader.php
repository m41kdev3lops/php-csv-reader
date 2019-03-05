<?php

namespace CSVReader;

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
                    if ( $v = self::beautify($value) )
                    {
                        $this->headers[] = $v;
                    }
                    continue;
                }

                if ( $v = self::beautify($value) )
                {
                    $this->values[] = $v;
                }
            }
        }

        return [
            'headers'   => $this->headers,
            'values'    => $this->values
        ];
    }


    public static function beautify(string $string)
    {
        $string = trim( $string );
        if ( $string != '' ) return $string;

        return null;
    }
}
