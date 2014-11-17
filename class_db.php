<?php
class Db {
        private $db = null;
        private $result = null; 
 
/*Конструктору передаем адрес, имя пользователя, пароль, имя базы данных, порт, а также кодировку для соединения.
По умолчанию используется utf8*/ 
 
        public function __construct($host, $user, $password, $base)
        {
                $this->db = new mysqli($host, $user, $password, $base);
                
        } 
 
/*основная и единственная функция, которая выполняет запрос и возвращает результат его работы*/ 
 
        public function query($query)
        {
                if(!$this->db)
                        return false; 
 
/*очищаем предыдущий результат*/ 
 
                if(is_object($this->result))
                        $this->result->free(); 
 
/*выполняем запрос*/ 
 
                $this->result = $this->db->query($query); 
 
/*если есть ошибки - выводим их*/ 
 
                if($this->db->errno)
                        die("mysqli error #".$this->db->errno.": ".$this->db->error); 
 
/*если в результате выполнения запроса (например SELECT...) получены данные - возвращаем их.
ВНИМАНИЕ! данные всегда возвращаются в массиве, даже если запрос возвращает одну запись.*/ 
 
                if(is_object($this->result))
                {
                        while($row = $this->result->fetch_array())
                                $data[] = $row;
                        
                        return $data;
                } 
 
/*если результат отрицательный - возвращаем false*/ 
 
                else if($this->result == FALSE)
                        return false;
                        
/*если запрос (например UPDATE или INSERT) затронул какие-либо строки - возвращаем их количество*/ 
 
                else return $this->db->affected_rows;
        }
}

?>
