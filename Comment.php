<?php

class Comment {

	/**
	 * id for this comment; this is the primary key
	 * @var float $commentSaltiness
	 **/
	private $commentSaltiness;
	/**
	 * content of the comment
	 * @var string $commentText
	 **/
	private $commentText;
	/**
	 * username of comment creator
	 * @var string $commentUsername
	 **/
	private $commentUsername;

// Constructor

	/**
	 * constructor for Comment
	 *
	 * @param float $commentSaltiness how salty was it?
	 * @param string $commentText content of comment
	 * @param string $commentUsername who posted the comment?
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(float $commentSaltiness, string $commentText, string $commentUsername) {
		try {
			$this->setCommentSaltiness($commentSaltiness);
			$this->setCommentText($commentText);
			$this->setCommentUsername($commentUsername);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for commentSaltiness
	 *
	 * @return float value of SALTINESS
	 **/
	public function getCommentSaltiness(): float {
		return ($this->commentSaltiness);
	}

	/**
	 * mutator method for commentSaltiness
	 *
	 * @param float $newCommentSaltiness new value of commentSaltiness
	 * @throws \RangeException if $commentSaltiness is not positive || $commentSaltiness > 1 || $commentSaltiness is empty
	 * @throws \TypeError if $commentSaltiness is not a float
	 **/
	public function setCommentSaltiness($newCommentSaltiness): void {
		if(is_float($newCommentSaltiness) === false) {
			throw(new \TypeError("Input is not a float"));
		}

		if($newCommentSaltiness > 1 || empty($newCommentSaltiness) === true) {
			throw(new \RangeException("comment saltiness empty or too large"));
		}

		if($newCommentSaltiness < 0) {
			throw(new \RangeException("comment saltiness less than 0"));
		}

		// store new comment saltiness
		$this->commentSaltiness = $newCommentSaltiness;

	}

	/**
	 * accessor method for commentText
	 *
	 * @return string value of commentText
	 **/
	public function getCommentText(): string {
		return ($this->commentText);
	}

	/**
	 * mutator method for commentText
	 *
	 * @param string $newCommentText new value of commentText
	 * @throws \RangeException if $newCommentText > 255chars OR is empty string
	 * @throws \TypeError if $newCommentText is not a string
	 **/
	public function setCommentText($newCommentText): void {
		if(is_string($newCommentText) === false) {
			throw(new \TypeError("Input must be a string"));
		}

		if(strlen($newCommentText) > 255 || empty($newCommentText) === true) {
			throw(new \RangeException("Input too large OR empty string"));
		}
		// store new commentText
		$this->commentText = $newCommentText;

	}

	/**
	 * accessor method for commentUsername
	 *
	 * @return string value of commentUsername
	 **/
	public function getCommentUsername(): string {
		return ($this->commentUsername);
	}

	/**
	 * mutator method for commentUsername
	 *
	 * @param string $newCommentUsername new value of commentText
	 * @throws \RangeException if $newCommentText > 255chars OR is empty string
	 * @throws \TypeError if $newCommentText is not a string
	 **/
	public function setCommentUsername($newCommentUsername): void {
		if(is_string($newCommentUsername) === false) {
			throw(new \TypeError("Input must be a string"));
		}

		if(strlen($newCommentUsername) > 64 || empty($newCommentUsername) === true) {
			throw(new \RangeException("Input too large OR empty string"));
		}
		// store new commentText
		$this->commentUsername = $newCommentUsername;

	}

}

$instance = new Comment('.99', 'lel dae 90s kids??', 'tEhPeNgUiNoFdOoM');
echo var_dump($instance);

$instanceTwo = new Comment('.01', 'be nice pls', 'WhitestKnight');
echo var_dump($instanceTwo);