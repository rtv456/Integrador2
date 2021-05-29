<?php

class ConexionBD
{
    const SERVER = "localhost";
    const USER = "root";
    const PASS = "123456";
    const DATABASE = "citas";
    private $cn = null;
	private $cncursor = null;
	
		
	public function getConexionCursor()
    {
        try {
            $this->cncursor =  new mysqli("localhost","root","123456","citas");
			if (mysqli_connect_errno()) {
			
			 exit();
			 
			}
        } catch (Exception $e) { }

        return $this->cncursor;
    }
	
		

    public function getConexionBD()
    {
        try {
            $this->cn = mysqli_connect(self::SERVER, self::USER, self::PASS, self::DATABASE);
            $this->cn->set_charset("utf8");
        } catch (Exception $e) { }

        return $this->cn;
    }
	
	
	
	
}    


