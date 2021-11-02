<?php

class Controler
{
    private $conect;

    public function __construct($database = "usersys")
    {
        $this->conect = new PDO("mysql:host=localhost;port=3306;dbname=$database", "root", "");
    }

    public function _selectData($query, array $bind, $index)
    {
        if (!empty($bind)) {
            if ($index == 1) {
                $request = $this->_search($query, $bind);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                if ($result) {
                    session_start();
                    $_SESSION["UserName"] = $result[0]["Nome"];
                    $_SESSION["UserEmail"] = $result[0]["Email"];
                    return $result;
                }
            } else {
                $querysecond = "SELECT * FROM usuarios WHERE Email = :email";
                $bindsecond = array(
                    "email" => $bind["email"]
                );
                $search = $this->_search($querysecond, $bindsecond);
                $search_arr  = $search->fetch(PDO::FETCH_ASSOC);
                if($search_arr){
                    return $search_arr;
                } else {
                    $this->_search($query, $bind);
                    session_start();
                    $_SESSION["UserName"] = $bind["nome"];
                    $_SESSION["UserEmail"] = $bind["email"];
                    return -2;
                }
            }
        }
    }

    public function _search($query, array $bind)
    {
        $request = $this->conect->prepare($query);
        foreach ($bind as $keys => $values) {
            $request->bindValue($keys, $values);
        }
        $request->execute();
        return $request;
    }
}
