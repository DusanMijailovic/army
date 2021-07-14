<?php
header("Location: ../index.php?page=o autoru");
require_once "../config/connection.php";
require_once "../modules/functions.php";
$author = getAuthor();
$a = $author[0];
$word = new COM("word.application") or die("Unable to instantiate Word");
$word->Visible = true;
$word->Documents->Add();
$word->Selection->TypeText("Name: $a->firstName \t $a->lastName \n Description: $a->description \n");
$word->ActiveDocument->SaveAs("Author.docx");