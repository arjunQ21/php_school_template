<?php 

class Notice{
	public $title;
	public $date;
	public $description;
	public $bgColor;
	public static $defaults = [
			'title'=>'Notice',
			'date'=>'2018-09-23',
			'description'=>"… May I have your attention, please? 
							Will the real Slim Shady please stand up? 
							I repeat, will the real Slim Shady please stand up? 
							We're gonna have a problem here..",
			'bgColor'=>"#ffffff"				
	];
	public function __construct($data = []){
		$options = array_merge(Self::$defaults, $data);
		foreach( $options as $key -> $val){
			$this->$key = $val;
		}
	}

	public function toArr(){
		return [
			'title'=>$this->title,
			'date'=>$this->date,
			'description'=>$this->description,
			'bgColor'=>$this->bgColor
		];
	}
}



?>