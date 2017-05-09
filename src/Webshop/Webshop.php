<?php

namespace Talm\Webshop;

class Webshop implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;

    public function getProductCat()
    {
        $this->app->db->connect();
        $sql = "SELECT * FROM VProducts;";
        return $this->app->db->executeFetchAll($sql);
    }

    public function getProduct($id)
    {
        $this->app->db->connect();
        $sql = "CALL getProduct(?);";
        return $this->app->db->executeFetchAll($sql, [$id])[0];
    }

    public function addProduct($name)
    {
        $this->app->db->connect();
        $sql = "CALL addProduct(?);";
        $this->app->db->execute($sql, [$name]);
    }

    public function editProduct($params)
    {
        $this->app->db->connect();
        $sql = "CALL editProduct(?, ?, ?, ?, ?, ?, ?);";
        $this->app->db->execute($sql, $params);
    }

    public function deleteProduct($id)
    {
        $this->app->db->connect();
        $sql = "CALL deleteProduct(?);";
        $this->app->db->execute($sql, [$id]);
    }

    public function getLastId()
    {
        $this->app->db->connect();
        $sql = "SELECT MAX(id) AS id FROM Product;";
        return $this->app->db->executeFetchAll($sql)[0]->id;
    }
}
