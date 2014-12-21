<?php 
/**************************************************
 *                  Kursy walut                   *
 **************************************************
 * Ostatnia modyfikacja: 18.01.2013 (wersja 5.0)  *
 * Autor: Jacek Kowalski (http://jacekk.info)     *
 *                                                *
 * Strona WWW: http://jacekk.info/scripts/kursy   *
 *                                                *
 * Utwór rozprowadzany na licencji                *
 * http://creativecommons.org/licenses/by-nc/2.5/ *
 **************************************************/

/* Kodowanie znaków UTF-8 */

/****************************************************
 * UWAGA! Po każdej zmianie tego pliku, należy      *
 * usunąć plik kursy_cache.txt z głównego folderu!  *
 ****************************************************/

function convert($text) {
	// Zmień na żądane kodowanie znaków - puste pozostawia UTF-8
	$charset = '';
	
	if($charset && function_exists('iconv')) {
		return iconv('utf-8', $charset, $text);
	}
	elseif($charset && function_exists('recode_string')) {
		return recode_string('utf8...'.$charset, $text);
	}
	else
	{
		return $text;
	}
}

class NBP {
	/* zawartość arkusza XML z kursami */
	private $contents = '';
	
	function __construct($url, $cache = 'kursy_cache.txt',
					$lastupdate = '12:16 -1 day', $thisupdate = '12:16') {
		// Plik z cache:
		// $cache
		// Czy dane w cache w cache aktualne?
		$recent = TRUE;
		
		// Daty ostatnich aktualizacji
		$lastupdate = strtotime($lastupdate);
		$thisupdate = strtotime($thisupdate);
		
		// Sprawdzenie możliwości zapisania kursów
		if( ( !file_exists($cache) AND !is_writable(dirname($cache)) )
			OR ( file_exists($cache) AND !(is_writable($cache)) ) ) {
			// Plik cache "nie działa"
			$cache = '';
		}
		else
		{
			// Dane są aktualne?
			if(@filemtime($cache) < $lastupdate) {
				$recent = FALSE;
			}
			elseif(time() > $thisupdate && @filemtime($cache) < $thisupdate) {
				$recent = FALSE;
			}
		}
		
		// Nie istnieje możliwość zapisu w cache lub dane są nieaktualne
		if($cache == '' OR !$recent) {
			// Link do arkusza XML
			$this->contents = file_get_contents($url);
			if($this->contents == FALSE) {
				throw new Exception('Nie udało się pobrać kursów walut.');
			}
			
			// Można zapisać do cache'a
			if($cache != '') {
				// Zapamiętujemy arkusz
				file_put_contents($cache, $this->contents);
			}
		}
		else
		{
			// Ładujemy zapisane dane
			$this->contents = file_get_contents($cache);
		}
	}
	
	function znajdz($fields) {
		if(!is_array($fields)) {
			$fields = array($fields);
		}
		
		$last = libxml_use_internal_errors(TRUE);
		$info = new SimpleXMLElement($this->contents);
		libxml_use_internal_errors($last);
		
		/* tablica wypełniana kursami */
		$rates = array(
			'numer_tabeli' => (string)$info->numer_tabeli,
			'data_publikacji' => (string)$info->data_publikacji
		);
		
		foreach($info->pozycja as $v) {
			$kod = (string)$v->kod_waluty;
			$rates[$kod] = array(
				'nazwa' => convert((string)$v->nazwa_waluty),
				'ilosc' => (string)$v->przelicznik
			);
			foreach($fields as $field) {
				$rates[$kod][$field] = (string)$v->$field;
			};
		}
		
		return $rates;
	}
}

?>