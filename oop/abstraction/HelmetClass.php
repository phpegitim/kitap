<?php 

class HelmetCLass{
	
	private $type;
	const typeOptions = ['longDistance','shortDistance'];
	
	public function getType(){
		return $this->type;
	}

	public function setType($type){
		if(!in_array($type, self::typeOptions))
			throw new Exception($type. ' geçerli bir kask türü değil');
			
		$this->type = $type;
	}	
	
}
