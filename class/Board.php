<?php

class Board
{
	function __construct(Storage $storage)
	{
		$this->storage = $storage;
	}

	function newFigures()
	{
		$this->storage->save('rnbqkbnrpppppppp11111111111111111111111111111111PPPPPPPPRNBQKBNR');
		return $this->storage->load();
	}

	function getFigures()
	{
		return $this->storage->load();
	}

	function moveFigures($frCoord, $toCoord)
	{
		$figures = $this->storage->load();
		$frFigure = $figures[$frCoord];
		$toFigure = $figures[$toCoord];
		if (!$this->canMove($frFigure, $toFigure)) return $figures;
		$figures[$frCoord] = '1';
		$figures[$toCoord] = $frFigure;
		$this->storage->save($figures);
		return $this->storage->load();
	}

	function canMove($frFigure, $toFigure)
	{
		if (strpos('Kk', $toFigure) !== false) return false;

	$frColor = $this->getFigureColor($frFigure);
	$toColor = $this->getFigureColor($toFigure);
	return $frColor != $toColor;
	}	

	function getFigureColor($figure){
		if (strpos('RNBQKP', $figure) !== false) return "white";
		if (strpos('rnbqkp', $figure) !== false) return "black";
		return "empty";
	}
}
