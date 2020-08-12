<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $signup = [
		'userName' => [
			'label' => 'Username',
			'rules' => 'required|min_length[3]|max_length[15]',
			'errors' => [
				'required' => 'Ju need a Username main']],

		'firstName' => [
			'label' => 'First Name',
			'rules' => 'required|min_length[3]|max_length[25]'],

		'lastName' => [
			'label' => 'lastName',
			'rules' => 'required|min_length[3]|max_length[25]'],

		'email' => [
			'label' => 'email',
			'rules' => 'required|valid_email|min_length[5]|max_length[30]'],

		'password1' => [
			'label' => 'Password',
			'rules' => 'required|min_length[8]|max_length[100]'],

		'password2' => [
			'label' => 'Repeat Password',
			'rules' => 'required|matches[password1]|min_length[8]|max_length[100]',
			'errors' => [
				'matches[password1]' => 'The passwords do not match!']]
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
