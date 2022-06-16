<?php
	include_once("../Models/ManageBook.php");
	$init = new Manage_Book();
	$data = $init->forxml();

	foreach($data as $k => $a){
		$xml = new DOMDocument("1.0");

		$books = $xml->createElement("books");
		$xml->appendChild($books);
		$xml->formatOutput=true;

		$book = $xml->createElement("book");
		$books->appendChild($book);

		$author = $xml->createElement("author",$a["author"]);
		$book->appendChild($author);

		$book = $xml->createElement("book");
		$books->appendChild($book);

		$author = $xml->createElement("title",$a["title"]);
		$book->appendChild($author);

		$book = $xml->createElement("book");
		$books->appendChild($book);

		$author = $xml->createElement("description",$a["description"]);
		$book->appendChild($author);

		$book = $xml->createElement("book");
		$books->appendChild($book);

		$author = $xml->createElement("time",$a["time"]);
		$book->appendChild($author);

		$book = $xml->createElement("book");
		$books->appendChild($book);

		// $author = $xml->createElement("created_on",$a["created_on"]);
		// $book->appendChild($author);

		$book = $xml->createElement("book");
		$books->appendChild($book);
		
		$author = $xml->createElement("label",$a["label"]);
		$book->appendChild($author);

		echo '<xmp>' . $xml->saveXML() . '</xmp>';
		$xml->save("reports.xml");

	}

?>