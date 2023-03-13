<?php

/**
 * File name to read
 */
const READ_FILE_NAME = 'read.txt';

/**
 * File name to write.
 */
const WRITE_FILE_NAME = 'result.txt';

/**
 * Read file.
 *
 * @param string $file_path File path.
 *
 * @return false|resource
 */
function file_read( string $file_path ) {
	$file = fopen( $file_path, 'r' );

	$i = 1;
	while ( ! feof( $file ) ) {
		$str = trim( fgets( $file ) );
		if ( $i % 2 != 0 ) {
			var_dump( $i, $str );
			file_write( WRITE_FILE_NAME, $str );
		}

		$i ++;
	}

}

function file_write( string $file_path, string $str ) {
	$file = fopen( $file_path, 'a+' );

	fwrite( $file, $str . PHP_EOL );

	fclose( $file );
}

file_read( READ_FILE_NAME );