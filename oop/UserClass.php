<?php

class UserClass{
	
	private $userName;
	private $pass;
	private $fullName;
	
	function __construct(string $userName=null, string $pass=null, string $fullName=null){
		
		//$this->setUserName($userName);
		//$this->setFullName($fullName);
		//$this->setPass($pass);
		
	}
	
	
	public function getUserName():string{
			
		if($this->userName==null)
			throw new InvalidArgumentException('Kullanıcı adı henüz tanımlanmadı');
		
		return $this->userName;
	}

	public function setUserName(string $userName):bool{

		if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName))
			throw new InvalidArgumentException('Kullanıcı adı en az 5 karakterden oluşmalı, sadece rakam ve harf içermelidir.');
		
		$this->userName = $userName;
		
		return true;
		
	}

	public function getPass():string{
			
		if($this->pass==null)
			throw new InvalidArgumentException('parola  henüz tanımlanmadı');		
		
		return $this->pass;
	}

	public function setPass(string $pass):bool{
		
	 	if (strlen($pass) < 9)
	        throw new LengthException('Parola en az 8 karakter olmalıdır.');
	    
	    if(!preg_match("#[0-9]+#",$pass))
	        throw new InvalidArgumentException('Parola en az bir rakam içermelidir.');
	    
	    if(!preg_match("#[A-Z]+#",$pass)) 
	        throw new InvalidArgumentException('Parola en az bir büyük harf içermelidir.');
	    
	    if(!preg_match("#[a-z]+#",$pass))
	        throw new InvalidArgumentException('Parola en az bir küçük harf içermelidir.');
   	
		$this -> pass = md5($pass);
		
		return true;
	}

	public function getFullName():string{
			
		if($this->fullName==null)
			throw new InvalidArgumentException('Tam isim henüz tanımlanmadı');			

		return $this->fullName;
	}

	public function setFullName(string $fullName):bool{
		
	 	if (strlen($fullName) < 5)
	        throw new LengthException('Tam isminiz en az 4 karakter uzunluğunda olmalıdır.(İsim Soyisim)');		
		
		if(!preg_match("/^([a-zA-Z' ]+)$/", $fullName))
			throw new InvalidArgumentException('Geçersiz isim ve soyadı.');
		
		$this->fullName = $fullName;
		return true;
	}
	
	
}



